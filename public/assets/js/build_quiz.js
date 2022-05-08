var questionsList = [];
var optionsList = document.querySelector(".all-options");
var fillinPossibleOptionsList = document.querySelector(".all-fill_options");
var questionsContainer = document.querySelector(".draggable-zone");
function addNewOption(value ="") {
    var optionsStr = `<div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <label class="radio radio-inline m-0 p-0">
                                        <input type="radio" name="m_option_radio" value="${optionsList.children.length}"/>
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                            <input type="text" name="m_option" value="${value}" class="form-control" placeholder="Option" required/>
                            <div class="input-group-append" onclick="removeOption(this)">
                                <span class="input-group-text bg-danger">
                                    <i class="flaticon2-rubbish-bin text-white"></i>
                                </span>
                            </div>
                        </div>`;
    var optionNode = document.createElement('div');
    optionNode.classList.add("form-group");
    optionNode.innerHTML = optionsStr;
    optionsList.append(optionNode);
}
function addPossibleOption() {
    var optionsStr = `<div class="input-group">

                            <input type="text" name="m_option"  class="form-control" placeholder="Option" required/>
                            <div class="input-group-append" onclick="removeFillInOption(this)">
                                <span class="input-group-text bg-danger">
                                    <i class="flaticon2-rubbish-bin text-white"></i>
                                </span>
                            </div>
                        </div>`;
    var optionNode = document.createElement('div');
    optionNode.classList.add("form-group");
    optionNode.innerHTML = optionsStr;
    fillinPossibleOptionsList.append(optionNode);
}
function removeOption(target) {
    optionsList.removeChild(target.parentElement.parentElement);


}
function removeFillInOption(target) {
    fillinPossibleOptionsList.removeChild(target.parentElement.parentElement);


}

var addMultiQuestion = ()=>{
    var question = $('.summernote').summernote('code');
    if(question.length==0){
        swal.fire({
            text: "No Question was asked",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK, Got it",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
        return;
    }
    var questionObject = {};

    var mOptions = [];
    for(var option of optionsList.children){
        if(option.querySelector('input[name=m_option]').value == ''){
            option.querySelector('input[name=m_option]').focus();
            return;
        }
        mOptions.push({
                    'value':option.querySelector('input[name=m_option]').value,
                    'checked':option.querySelector('input[name=m_option_radio]').checked});
    }
    if (mOptions.length < 2) {
        swal.fire({
            text: "More than one Option is required",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK, Got it",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
        return;
    }
    if (document.querySelector('input[name=score]').value == 0) {
        swal.fire({
            text: "Please Add Question Score",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK, Got it",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
        return;
    }
    questionObject['question'] = question;
    questionObject['type'] = 'multi_choice';
    questionObject['multi_options'] = document.querySelector('input[name=multi_options]').checked;
    questionObject['score'] = document.querySelector('input[name=score]').value;
    questionObject['options'] = mOptions;

    questionsList.push(questionObject);
    renderQuestion(questionObject);
    optionsList.innerHTML ='';
    $('.summernote').summernote('code','');
    document.querySelector('#close_modal').click()
}
var addFillInQuestion = ()=>{
    var question = document.querySelector('.fill_in_textarea').value;
    if(question.length==0){
        swal.fire({
            text: "No Question was asked",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK, Got it",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
        return;
    }
    var questionObject = {};

    var mOptions = [];
    for(var option of fillinPossibleOptionsList.children){
        if(option.querySelector('input[name=m_option]').value == ''){
            option.querySelector('input[name=m_option]').focus();
            return;
        }
        mOptions.push({
                    'value':option.querySelector('input[name=m_option]').value,
                    'checked':true,
                });
    }
    if (mOptions.length == 0) {
        swal.fire({
            text: "An Option is required",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Add Option",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
        return;
    }
    if (document.querySelector('input[name=score]').value == 0) {
        swal.fire({
            text: "Please Add Question Score",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK, Got it",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
        return;
    }
    questionObject['question'] = question;
    questionObject['type'] = 'fill_in';
    questionObject['options'] = mOptions;
    questionObject['score'] = document.querySelector('input[name=score]').value;
    questionsList.push(questionObject);
    renderTheFillInQuestion(questionObject);
    fillinPossibleOptionsList.innerHTML ='';

    document.querySelector('.fill_in_textarea').value = '';
    document.querySelector('#close_modal').click()
}
var addShortAnwserQuestion = ()=>{
    var question = document.querySelector('.short_answer_textarea').value;
    if(question.length==0){
        swal.fire({
            text: "No Question was asked",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK, Got it",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
        return;
    }
    if (document.querySelector('input[name=score]').value == 0) {
        swal.fire({
            text: "Please Add Question Score",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK, Got it",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
        return;
    }
    var questionObject = {};


    questionObject['question'] = question;
    questionObject['type'] = 'short_answer';
    questionObject['options'] = [];
    questionObject['score'] = document.querySelector('input[name=score]').value;
    questionsList.push(questionObject);
    renderShortAnswerQuestion(questionObject);
    document.querySelector('.short_answer_textarea').value = '';
    document.querySelector('#close_modal').click()
}

function addNewQuestion() {
    var m_option_list = document.querySelector('.m_option_list');
    switch(m_option_list.querySelector('a.active').id){
        case 'multi_choice-tab':
            addMultiQuestion();
            break;
        case 'fill_in-tab':
            addFillInQuestion();
            break;
        case 'short_answer-tab':
            addShortAnwserQuestion();
            break;
        default :
    }





}
var removeQuestion = (target)=>{
    var mindex = -1;
    mChildNode = target.parentElement.parentElement.parentElement;
    for (var i = 0; i < mChildNode.parentElement.children.length; i++) {
        if(mChildNode.parentElement.children[i] == mChildNode){
            mindex = i;
            break;
        }
    }
    if(mindex == -1) return;
    questionsList.splice(mindex,1);
    mChildNode.parentElement.removeChild(mChildNode);


}
var renderQuestion =(questionObject)=>{
    var n_option = '';
    for(var option of questionObject.options){
        var checkedStr = option.checked ? '<i class="fas fa-check-circle h2 text-success"></i>':'<i class="flaticon-circle h2 text-danger"></i>';
        n_option += `<div class="row my-2">
                        ${checkedStr}
                        <p class="card-text col-8">${option.value} </p>
                    </div>`;
    }
    var questionStr = ` <div class="card-header">
                            <div class="card-title">

                            </div>
                            <div class="card-toolbar">
                                <a class="btn btn-icon btn-sm btn-hover-light-primary" onclick="removeQuestion(this)">
                                    <i class="flaticon2-rubbish-bin text-danger"></i>
                                <a class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle">
                                    <i class="ki ki-menu"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card card-body">
                                <div class="my-4"> ${questionObject.question} </div>
                                ${n_option}
                            </div>`;
    var questionNode = document.createElement('div');
    questionNode.className = "card card-custom gutter-b draggable";
    questionNode.innerHTML = questionStr;
    questionsContainer.append(questionNode);
}
var renderTheFillInQuestion =(questionObject)=>{
    var n_option = '';
    for(var option of questionObject.options){
        n_option += `<div class="row my-2">
                        <p class="card-text col-8">${option.value} </p>
                        <i class="fas fa-check-circle h2 text-info"></i>

                    </div>`;
    }
    var questionStr = ` <div class="card-header">
                            <div class="card-title">

                            </div>
                            <div class="card-toolbar">
                            <a class="btn btn-icon btn-sm btn-hover-light-primary" onclick="removeQuestion(this)">
                                    <i class="flaticon2-rubbish-bin text-danger"></i>
                                <a class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle">
                                    <i class="ki ki-menu"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card card-body">
                                <div class="my-4"> ${questionObject.question} </div>
                                ${n_option}
                            </div>`;
    var questionNode = document.createElement('div');
    questionNode.className = "card card-custom gutter-b draggable";
    questionNode.innerHTML = questionStr;
    questionsContainer.append(questionNode);
}
var renderShortAnswerQuestion =(questionObject)=>{

    var questionStr = ` <div class="card-header">
                            <div class="card-title">

                            </div>
                            <div class="card-toolbar">
                                <a class="btn btn-icon btn-sm btn-hover-light-primary" onclick="removeQuestion(this)">
                                    <i class="flaticon2-rubbish-bin text-danger"></i>
                                <a class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle">
                                    <i class="ki ki-menu"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card card-body">
                                <div class="my-4"> ${questionObject.question} </div>

                            </div>`;
    var questionNode = document.createElement('div');
    questionNode.className = "card card-custom gutter-b draggable";
    questionNode.innerHTML = questionStr;
    questionsContainer.append(questionNode);
}












var containers = document.querySelectorAll('.draggable-zone');

if (containers.length === 0) {
    // return false;
}

var swappable = null;

jQuery(document).ready(function () {
    swappable = new Sortable.default(containers, {
        draggable: '.draggable',
        // announcements: {drag:start:(e)=>{console.log    }},
        handle: '.draggable .draggable-handle',
        mirror: {
         appendTo: 'body',
         constrainDimensions: true
        }
    });

    swappable.on('sortable:start', (event) => {

    });
    swappable.on('sortable:stop', (event) => {
        swapElement(event.oldIndex, event.newIndex);
        // [questionsList[event.oldIndex], questionsList[event.newIndex]] = [questionsList[event.newIndex], questionsList[event.oldIndex]]
        console.log('oldIndex', event.oldIndex);
        console.log('newIndex', event.newIndex);
    });
});

var swapElement = (oldIndex, newIndex)=>{
    var temp = questionsList[oldIndex]
    questionsList[oldIndex] = questionsList[newIndex];
    questionsList[newIndex] = temp;
}

var uploadQuiz = ()=>{
    if(questionsList.length==0){
        swal.fire({
            text: "No Question has been added",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK, Got it",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        });
        return;
    }
    swal.fire({
        text: "Are you done building?",
        icon: "success",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Yes, submit!",
        cancelButtonText: "No, cancel",
        customClass: {
            confirmButton: "btn font-weight-bold btn-light-primary",
            cancelButton: "btn font-weight-bold btn-default"
        }

    }).then((result)=>{
        if (result.value) {
            KTApp.blockPage({
              overlayColor: 'red',
              opacity: 0.1,
              state: 'primary' // a bootstrap color
            });
            pushToBackEnd();// Submit form
        } else if (result.dismiss === 'cancel') {
            Swal.fire({
                text: "Your Quiz has not been submitted!.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-primary",
                }
            });
        }

    });

}

var pushToBackEnd = async ()=>{
    await fetch(document.querySelector('input[name=_ulink]').value,
                {
                method: 'POST',
                headers: {
                  'Accept': 'application/json',
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({'questions': questionsList, '_token': document.querySelector('input[name=_token]').value})
                }
        )
    .then((result)=>result.json())
    .then((status)=>{
        if (status) {
            window.location.href = window.location.href+'../../..';
        }
        console.log(status);

    })
    .catch((e)=>{
        console.log(e);
        alert(e);
    })
    ;

}

var renderFillInQuestion = (e)=>{
    var input_field = `<input type="text" class="form-control d-inline" style="width:fit-content" >`;
    document.querySelector('.fill_in_textarea_output').innerHTML = e.target.value.replaceAll('__', input_field);
}


var KTSummernoteDemo = function () {
 // Private functions
 var demos = function () {
  $('.summernote').summernote({
   height: 150
  });
 }

 return {
  // public functions
  init: function() {
   demos();
  }
 };
}();

// Initialization
jQuery(document).ready(function() {
    // getChapterFromDB();
    KTSummernoteDemo.init();
    $('.summernote').summernote('code','');
    document.querySelector('.fill_in_textarea').onkeyup = renderFillInQuestion;
})

var quiz_type = document.querySelector("#quiz_type");
var allLinks = document.querySelectorAll("#myTab a");
quiz_type.addEventListener('change', (e)=>{

    switch(parseInt(e.target.value)){
        case 0:
            optionsList.innerHTML = "";
            document.querySelector('input[name=multi_options]').checked = false;
            allLinks[0].click();
            return;
        case 1:
            optionsList.innerHTML = "";
            document.querySelector('input[name=multi_options]').checked = false;
            addNewOption("True");
            addNewOption("False");
            allLinks[0].click();
            return;
        case 3:
            optionsList.innerHTML = "";
            document.querySelector('input[name=multi_options]').checked = true;
            allLinks[0].click();
            return;
        case 2:
            allLinks[1].click();
            return;
        case 4:
            allLinks[2].click();
            return;
    }
    // allLinks[parseInt(e.target.value)].click();
});
