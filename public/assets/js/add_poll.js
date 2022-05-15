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
                       <i class="fas fa-minus-circle fa-2x" style="color: #F64E60 !important;"></i>

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
