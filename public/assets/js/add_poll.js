var optionsArr = [];
var addOptionBtn = document.querySelector(".add_new_option");
var addOptionList = document.querySelector("#option-list");
var optionElement = document.querySelector("input[name=new_option]");
addOptionBtn.classList.add("btn");

var addOption = ()=>{
    if (optionElement.value.length==0) {
        optionElement.focus();
        return;
    }

    var newEl = document.createElement('div');
    newEl.className = "form-group d-flex flex-wrap";
    newEl.innerHTML = `<input type="text" name="optionsArr[]" value="${optionElement.value}" disabled="" class="form-control w-75 form-control-solid" />
                       <span onclick="removeOptions(${optionsArr.length})" class="svg-icon svg-icon-danger w-25 text-center svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Code\Minus.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                    <rect fill="#000000" x="6" y="11" width="12" height="2" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>`;
    addOptionList.append(newEl);
    optionsArr.push(optionElement.value);
    optionElement.value = "";
}

var removeOptions = (index)=>{
    console.log(index);
    optionsArr.splice(index,1);
    addOptionList.removeChild(addOptionList.children[index]);
}
addOptionBtn.addEventListener("click", addOption);

///////

var submitFormBack = () =>{
    var allDisabled = document.querySelectorAll('input[disabled=""]');
    for(var disabledEl of allDisabled){
        disabledEl.disabled = false;
    }
    return true;
}