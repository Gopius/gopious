var requirements = [];
var addRequirementBtn = document.querySelector("#add_new_requirement");
var addRequirementList = document.querySelector("#requirement-list");
var requirementValue = document.querySelector("input[name=new_requirement]");
addRequirementBtn.classList.add("btn");

var addRequirement = ()=>{
    if (requirementValue.value.length==0) {
        requirementValue.focus();
        return;
    }

    var newEl = document.createElement('div');
    newEl.className = "form-group d-flex flex-wrap";
    newEl.innerHTML = `<input type="text" name="requirements[]" value="${requirementValue.value}" disabled="" class="form-control w-75 form-control-solid" />
                       <span onclick="removeRequirement(${requirements.length})" class="svg-icon svg-icon-danger w-25 text-center svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Code\Minus.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                    <rect fill="#000000" x="6" y="11" width="12" height="2" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>`;
    addRequirementList.append(newEl);
    requirements.push(requirementValue.value);
    requirementValue.value = "";
}

var removeRequirement = (index)=>{
    console.log(index);
    requirements.splice(index,1);
    addRequirementList.removeChild(addRequirementList.children[index]);
}
addRequirementBtn.addEventListener("click", addRequirement);

///////

var outcomes = [];
var addOutcomeBtn = document.querySelector("#add_new_outcome");
var addOutcomeList = document.querySelector("#outcome-list");
var outcomeValue = document.querySelector("input[name=new_outcome]");
addOutcomeBtn.classList.add("btn");

var addOutcome = ()=>{
    if (outcomeValue.value.length==0) {
        outcomeValue.focus();
        return;
    }

    var newEl = document.createElement('div');
    newEl.className = "form-group d-flex flex-wrap";
    newEl.innerHTML = `<input type="text" name="outcomes[]" value="${outcomeValue.value}" disabled="" class="form-control w-75 form-control-solid" />
                       <span onclick="removeOutcome(${outcomes.length})" class="svg-icon svg-icon-danger w-25 text-center svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Code\Minus.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                    <rect fill="#000000" x="6" y="11" width="12" height="2" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>`;
    addOutcomeList.append(newEl);
    outcomes.push(outcomeValue.value);
    outcomeValue.value = "";
}

var removeOutcome = (index)=>{
    // console.log(index);
    
    outcomes.splice(index,1);
    addOutcomeList.removeChild(addOutcomeList.children[index]);
}
var renderResults = ()=>{
    
    

    var mform = this.kt_form

    var elemts = mform.elements
    document.querySelector(".m_course_title").innerHTML = elemts.course_title.value.trim();
    document.querySelector(".m_course_desc").innerHTML = elemts.course_desc.value.trim();
    // document.querySelector(".m_course_cat").innerHTML = elemts.cat_no.options[elemts.cat_no.selectedIndex].innerHTML.trim();
    document.querySelector(".m_course_status").innerHTML = elemts.course_status.options[elemts.course_status.selectedIndex].innerHTML.trim();
    var m_course_requirement = document.querySelector('.m_course_requirement');
    m_course_requirement.innerHTML = ``;
    for(var req of requirements){
        m_course_requirement.innerHTML += `<div>${req}</div>`;
    }
    var m_course_outcome = document.querySelector('.m_course_outcome');
    m_course_outcome.innerHTML = ``;
    for(var req of outcomes){
        m_course_outcome.innerHTML += `<div>${req}</div>`;
    }
}
addOutcomeBtn.addEventListener("click", addOutcome);
var submitFormBack = () =>{
    var allDisabled = document.querySelectorAll('input[disabled=""]');
    for(var disabledEl of allDisabled){
        disabledEl.disabled = false;
    }
    this.kt_form.submit();
}