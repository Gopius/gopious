'use strict';
var tabs = document.querySelectorAll('.nav_tab');
var removeAllActive = ()=>{
    for(var tab of tabs){
        tab.classList.remove('active')
    }
}
var handleTickFor = (target)=>{
    processTick(target);
}
jQuery(document).ready(function() {
   
    // getAllOrganizationCourses();
});


var processTick = async (block)=>{
    await fetch(window.location.href+'/ticked/'+block)
    .then((resp)=>resp.json())
    .then((block_learner)=>{
        var mId = `#block_ckeckbox_${block}`;
        var el = document.querySelector(mId);
        el.checked = block_learner.viewed;
        
        // console.log(result);
       
    });
}