var editorObj = null;
var _initForm = function() {
    var formEl = KTUtil.getById("kt_forms_widget_2_form");
    var editorId = 'kt_forms_widget_2_editor';

    // init editor
    var options = {
        modules: {
            toolbar: {
                container: "#kt_forms_widget_2_editor_toolbar"
            }
        },
        placeholder: 'Type message...',
        theme: 'snow'
    };

    if (!formEl) {
        return;
    }

    // Init editor
    editorObj = new Quill('#' + editorId, options);
    editorObj.root.innerHTML = "";
}

var addAttachment = (target)=>{
    var mDiv = document.createElement('div');
    mDiv.className = `row w-100`;
    mDiv.innerHTML =`<input required onchange="validateFile(this)" type="file" name="post_attachment[]" accept="image/*"  class="form-control col-sm-11">
                    <i  onclick="removeAttachment(this)" class="la la-trash text-danger text-hover-primary icon-xl m-0 col-sm-1 btn"></i>`;
    target.parentElement.parentElement.parentElement.querySelector('.attachment_list').append(mDiv);
}

var removeAttachment = (target)=>{
    target.parentElement.parentElement.removeChild(target.parentElement);
}

var validateFile = (target)=> {
    
    if(target.files[0].size > 1* 1024* 1024){
       swal.fire({
            text: "File too Large, File should be less than 1 mb",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Type Question",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
       target.value = "";
    }
}

const myCalender = new CalendarPicker('#myCalendarWrapper', {});

const sendTimeLinePost = (target)=>{
    if (editorObj.root.innerHTML == '' || editorObj.root.innerHTML == "<p><br></p>" ) {
        editorObj.root.focus();
        return false;
    }
    var mForm = new FormData(target);
    mForm.append('content', editorObj.root.innerHTML);
    editorObj.root.innerHTML = '';
    target.querySelector('.attachment_list').innerHTML = '';
    KTApp.blockPage({
      overlayColor: 'red',
      opacity: 0.1,
      state: 'primary' // a bootstrap color
    });
    sendPostToBackEnd(mForm);
    return false;
}
const sendPostComment =(target)=>{
    var mForm = new FormData(target);
    mForm.append('_token', document.querySelector('input[name=_token]').value);
    KTApp.block(target, {});
    sendPostCommentToBackEnd(mForm, target);
    target.reset();
    return false;
}

const likePost = (target)=>{
    var mForm = new FormData();
    mForm.append('_token', document.querySelector('input[name=_token]').value);
    mForm.append('post_no', target.parentElement.parentElement.parentElement.querySelector('input[name=post_no]').value);
    KTApp.block(target, {});
    sendPostLikeToBackEnd(mForm, target);
    
}

const displayComment = (target)=>{
    var comment_list = target.parentElement.parentElement.querySelector('.comment_list');
    if (comment_list.style.display == 'block') {
        comment_list.style.display = 'none';
        target.classList.remove('bg-light-primary');
    }else{
        comment_list.style.display = 'block'
        target.classList.add('bg-light-primary');
    }
}

_initForm();
var sendPostToBackEnd = async (data)=>{
    await fetch(document.querySelector('input[name=_plink]').value,
                {
                method: 'POST',
                headers: {
                  'Accept': 'application/json',
                  
                },
                body: data,
                }
        )
    .then((result)=>result.json())
    .then((resp)=>{
        if (resp.status) {
            KTApp.unblockPage();
        }
        loadPost(resp.post);
        
    })
    .catch((e)=>{
        console.log(e);
        KTApp.unblockPage();
        swal.fire({
            text: "Unable to complete task",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Type Question",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
    })
    ;
    
}
var sendPostCommentToBackEnd = async (data, target)=>{
    await fetch(document.querySelector('input[name=_clink]').value,
                {
                method: 'POST',
                headers: {
                  'Accept': 'application/json',
                  
                },
                body: data,
                }
        )
    .then((result)=>result.json())
    .then((resp)=>{
        if (resp.status) {
            KTApp.unblock(target);
        }
        loadComment(resp.comment_post, target);
        target.parentElement.querySelector('.comment_post_count').innerHTML = resp.comment_post_count;
        
    })
    .catch((e)=>{
        console.log(e);
        KTApp.unblockPage();
        swal.fire({
            text: "Unable to complete task",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Type Question",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
    })
    ;
    
}
var sendPostLikeToBackEnd = async (data, target)=>{
    await fetch(document.querySelector('input[name=_llink]').value,
                {
                method: 'POST',
                headers: {
                  'Accept': 'application/json',
                  
                },
                body: data,
                }
        )
    .then((result)=>result.json())
    .then((resp)=>{
        if (resp.status) {
            target.classList.add('bg-light-danger');
            target.classList.add('btn-icon-danger');
        }else{
            target.classList.remove('bg-light-danger');
            target.classList.remove('btn-icon-danger');
        }
        target.querySelector('span').innerHTML = resp.like_post_count;
        console.log(resp);
        KTApp.unblock(target);
        
    })
    .catch((e)=>{
        console.log(e);
        KTApp.unblockPage();
        swal.fire({
            text: "Unable to complete task",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Type Question",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
    })
    ;
    
}

var loadPost = (post)=>{
    var attachment_list_str = '';
    for(var attachment of post.attachments){
        attachment_list_str += `<div class=" mt-2 bgi-no-repeat bgi-size-cover rounded min-h-265px" style="background-image: url(/storage/${attachment.url})"></div>`;
    }
    

    var block_ = `<div class="card-body">
                    <!--begin::Header-->
                    <div class="d-flex align-items-center">
                        <!--begin::Symbol-->
                        <div class="image-input image-input-outline " style="background-image: url('/assets/media/users/blank.png'); width: 40px; height: 40px;">
                            
                            <div class="image-input-wrapper" style="background-image: url(${user_img_path}); width: 40px; height: 40px;"></div>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Info-->
                        <div class="d-flex flex-column flex-grow-1">
                            <span>
                                <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">${post.poster}</a>
                                posted in
                                <a class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder"> ${post.class.cat_title} </a>
                                class
                            </span>
                            <span class="text-muted font-weight-bold">${post.date}</span>
                        </div>
                        <!--end::Info-->
                        
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="pt-5">
                        ${attachment_list_str}
                        <!--begin::Text-->
                        <p class="text-dark-75 font-size-lg font-weight-normal mb-2">${post.content}</p>
                        <!--end::Text-->
                        <!--begin::Action-->
                        <div class="d-flex align-items-center">
                            <a onclick="displayComment(this)" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2
                            mr-2">
                            <i class="fas fa-comments"></i>
                            <span class="comment_post_count">${post.comments.length}</span></a>
                            <a onclick="likePost(this)" class="btn btn-sm btn-text-dark-50 btn-hover-icon-danger btn-hover-text-danger
                            
                            bg-hover-light-danger font-weight-bolder rounded font-size-sm p-2">
                            <i class="fas fa-heart"></i>
                            <span>${post.likes.length}</span></a>
                        </div>
                        <!--end::Action-->
                        <span class="comment_list" style="display: none;">
                            
                            
                            
                        </span>
                    </div>
                    <!--end::Body-->
                    <!--begin::Separator-->
                    <div class="separator separator-solid mt-2 mb-4"></div>
                    <!--end::Separator-->
                    <!--begin::Editor-->
                    <form class="position-relative" method="post" onsubmit="return sendPostComment(this)">
                        <input type="hidden" name="post_no" value="${post.id}">
                        <textarea id="kt_forms_widget_3_input" class="form-control border-0 p-0 pr-10 resize-none" rows="1" placeholder="Reply..." maxlength="255" name="content" required></textarea>
                        <div class="position-absolute top-0 right-0 mt-n1 mr-n2">
                            
                            <button type="submit" class="btn btn-icon btn-md btn-hover-icon-primary">
                                <i class="la la-send-o icon-2x"></i>
                            </button>
                        </div>
                    </form>
                    <!--edit::Editor-->
                </div>`;
    var mDiv = document.createElement('div');
    mDiv.className = `card card-custom gutter-b`;
    mDiv.innerHTML = block_;

    var posts_list = document.querySelector('.posts_list');
    posts_list.insertBefore(mDiv, posts_list.firstChild);
}
var loadComment = (comment_post, target)=>{
    console.log(comment_post);
    var block_ = `  <!--begin::Symbol-->
                    <div class="image-input image-input-outline " style="background-image: url('/assets/media/users/blank.png'); width: 40px; height: 40px;">
                        
                        <div class="image-input-wrapper" style="background-image: url(${user_img_path}); width: 40px; height: 40px;"></div>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Info-->
                    <div class="d-flex flex-column flex-row-fluid">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center flex-wrap">
                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">${comment_post.poster}</a>
                            <span class="text-muted font-weight-normal flex-grow-1 font-size-sm">${comment_post.date}</span>
                            
                        </div>
                        <span class="text-dark-75 font-size-sm font-weight-normal pt-1">${comment_post.content}</span>
                        <!--end::Info-->
                    </div>
                    <!--end::Info-->`;
    var mDiv = document.createElement('div');
    mDiv.className = `d-flex py-5`;
    mDiv.innerHTML = block_;

    var comment_list = target.parentElement.querySelector('.comment_list');
    comment_list.insertBefore(mDiv, comment_list.firstChild);
}