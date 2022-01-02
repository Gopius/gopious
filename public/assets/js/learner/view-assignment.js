
var addAttachmentBtn = document.querySelector("#add_new_attachment");
var attachmentList = document.querySelector("#attachments-list");


var addAttachment = ()=>{
    
    var newEl = document.createElement('div');
    newEl.className = "form-group d-flex flex-wrap";
    newEl.innerHTML = `<input type="file" name="attachments[]" required class="form-control w-75 form-control-solid" />
                       <span onclick="removeAttachments(this)" class="svg-icon svg-icon-danger w-25 text-center svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Code\Minus.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                    <rect fill="#000000" x="6" y="11" width="12" height="2" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>`;
    attachmentList.append(newEl);
}

var removeAttachments = (target)=>{
    
    attachmentList.removeChild(target.parentElement);
}
addAttachmentBtn.addEventListener("click", addAttachment);

///////


var submitFormBack = () =>{
    var ass_answer = document.querySelector('input[name="ass_answer"]');
    ass_answer.value = quill.root.innerHTML;
    return true;
}

var quill = new Quill('#kt_quil_1', {
    modules: {
        toolbar: [
            [{
                header: [1, 2, false]
            }],
            ['bold', 'italic', 'underline'],
            ['image', 'code-block']
        ]
    },
    placeholder: 'Type your text here...',
    theme: 'snow' // or 'bubble'
});
