var blockTitle = document.querySelector('.block-title');
var mEditor = null;
var lastBlockTarget = null;
var quizHasChanged = false;

var newChapterInput = document.querySelector('input[name=new_chapter]');
var chapterContainer = document.querySelector('#chapter_container');

var chapterHourGlass = document.querySelector('#chapter_hourglass');
var chapterAdd = document.querySelector('#chapter_add');
var chaptersAndBlocks = {};
var pushChapterToDB = async (chapter_name)=>{
    await fetch(`${window.location.href}/create/${chapter_name}`)
    .then((result)=>result.json())
    .then((chapters)=>{
        // console.log(chapter);
        try{
            chapterContainer.innerHTML = "";
            for(var chapter of chapters) renderNewChapter(chapter);
        }catch( e){
            alert(e);
        }
    })
    .catch((e)=>{
        console.log(e);
        alert(e);
    })
    ;
}
var pushBlockToDB = async (chapter_id, block_name, blockContainer)=>{
    await fetch(`${window.location.href}/create/${chapter_id}/${block_name}`)
    .then((result)=>result.json())
    .then((blocks)=>{
        // console.log(blocks);
        try{
            blockContainer.innerHTML = "";
            for(var block of blocks) renderNewBlock(block, blockContainer);
        }catch( e){
            alert(e);
        }
    })
    .catch((e)=>{
        console.log(e);
        alert(e);
    })
    ;
}
var pushBlockContentToDB = async (block_id, block_content, blockContainer, quizzes=null)=>{
    await fetch(`${window.location.href}/update-content/${block_id}`,
                {
                method: 'POST',
                headers: {
                  'Accept': 'application/json',
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({'block_content': block_content,'quizzes': quizzes, '_token': document.querySelector('input[name=_token]').value})
                }
        )
    .then((result)=>result.json())
    .then((blocks)=>{
        // console.log(blocks);
        try{
            blockContainer.innerHTML = "";
            for(var block of blocks) renderNewBlock(block, blockContainer);
        }catch( e){
            alert(e);
        }
    })
    .catch((e)=>{
        console.log(e);
        alert(e);
    })
    ;
}
var deleteChapterFromDB = async (chapter_id)=>{
    await fetch(`${window.location.href}/delete/${chapter_id}`)
    .then((result)=>result.json())
    .then((chapters)=>{
        // console.log(chapter);
        try{
            chapterContainer.innerHTML = "";
            for(var chapter of chapters) renderNewChapter(chapter);
        }catch( e){
            alert(e);
        }
    })
    .catch((e)=>{
        console.log(e);
        alert(e);
    })
    ;
}
var deleteBlockFromDB = async (block_id, blockContainer)=>{
    await fetch(`${window.location.href}/delete/block/${block_id}`)
    .then((result)=>result.json())
    .then((blocks)=>{
        // console.log(chapter);
        try{
            blockContainer.innerHTML = "";
            for(var block of blocks) renderNewBlock(block, blockContainer );
        }catch( e){
            alert(e);
        }
    })
    .catch((e)=>{
        console.log(e);
        alert(e);
    })
    ;
}
var getChapterFromDB = async ()=>{
    await fetch(`${window.location.href}/all`)
    .then((result)=>result.json())
    .then((chapters)=>{
        // console.log(chapters);
        try{
            chapterContainer.innerHTML = "";
            for(var chapter of chapters) renderNewChapter(chapter);
            
        }catch( e){
            alert(e);
        }
    })
    .catch((e)=>{
        console.log(e);
        alert(e);
    })
    ;
}
var renderNewChapter = (chapter)=>{
     var newEl = document.createElement('div');
        newEl.className = "navi navi-bold navi-hover navi-active navi-link-rounded";
        newEl.id = `chapter_${chapter.chapter_id}`;
        newEl.innerHTML = ` 
                        <div class="navi-item mb-2">
                            <div class="only_on_hover navi-link py-4 active" >
                                <i class=" fa fas fa-trash m-2 hidden_hover_child text-danger cursor-pointer" onclick="removeChapter(this)"></i>
                                <span class="navi-text font-size-lg">${chapter.chapter_title}</span>
                                <i class="fa fas fa-plus m-2 hidden_hover_child text-success float-right cursor-pointer" onclick="addBlock(this)"></i>

                            </div>
                            <div class="form-group d-none new_block_div ml-5 my-3" >
                                                
                                <div class="input-group">
                                    <input type="text" name="new_block" class="form-control" placeholder="Block Name"/>
                                    <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="createNewBlock(this)"><i class="flaticon2-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <span class="block_container">
                                
                            </span>
                        </div>
                                
                            `;
        newChapterInput.value = "";
        chapterContainer.append(newEl);
        chapterAdd.classList.remove('d-none');
        chapterHourGlass.classList.add('d-none');
        chapterAdd.parentElement.disabled = false;
        chaptersAndBlocks[newEl.id] = chapter;
        for(var block of chapter.blocks) renderNewBlock(block, newEl.querySelector('.block_container'));
}
var renderNewBlock = (block, blockContainer)=>{
    var newEl = document.createElement('div');
    newEl.className = "only_on_hover navi-item mb-2 ml-10";
    newEl.id = `block_${block.block_id}`;
    newEl.innerHTML = ` <i class=" fa fas fa-circle m-2 text-success"></i>
                        <span class="navi-text font-size-lg">${block.block_title}</span>
                        <i class="hidden_hover_child fa fas fa-trash-alt m-2 float-right text-danger cursor-pointer" onclick="removeBlock(this)"></i>`;
    
    blockContainer.append(newEl);
    if (lastBlockTarget == newEl.id) {
        var pointer = document.createElement('i');
        pointer.className = "flaticon2-pen text-success float-right";

        newEl.append(pointer);
    }
    // console.log(chaptersAndBlocks [blockContainer.parentElement.parentElement.id]);
    chaptersAndBlocks[blockContainer.parentElement.parentElement.id][newEl.id] = block;
    newEl.onclick = (e)=>{
        var mEl = e.target;
        if (mEl.tagName != "DIV") mEl = e.target.parentElement;  
        renderBlockContent(block, mEl);
    };
}

var renderBlockContent = (block, target)=>{
    var all_quiz_op = document.querySelectorAll('select option');

    if (lastBlockTarget!= null && document.getElementById(lastBlockTarget)!=null) {

        var nodeLastBlockTarget = document.getElementById(lastBlockTarget);

        // console.log(nodeLastBlockTarget);

        var m_quizzes = chaptersAndBlocks[nodeLastBlockTarget.parentElement.parentElement.parentElement.id].quizzes;
        
        m_quizzes.splice(0,m_quizzes.length);
        for (var i = 0; i < all_quiz_op.length; i++) {
            if (all_quiz_op[i].selected) m_quizzes.push({quiz_id: all_quiz_op[i].value});
            
        }


        
        nodeLastBlockTarget.removeChild(document.querySelector('.flaticon2-pen'));
        var mLastBlock = chaptersAndBlocks[nodeLastBlockTarget.parentElement.parentElement.parentElement.id]
                            [lastBlockTarget];
        // console.log("mLastBlock...", mLastBlock.block_content);
        // console.log("mEditor.getData()", mEditor.getData());
        var mData = $('.summernote').summernote('code');
        if(mLastBlock.block_content
                             != mData || quizHasChanged){
            quizHasChanged = false;
            pushBlockContentToDB(mLastBlock.block_id, mData, nodeLastBlockTarget.parentElement, m_quizzes);
            
        }
        // console.log(m_quizzes);
    }
    // console.log();
    
    lastBlockTarget = target.id;

    var pointer = document.createElement('i');
    pointer.className = "flaticon2-pen text-success float-right";

    target.append(pointer);
    blockTitle.innerHTML = block.block_title;
    // mEditor.setData();
    $('.summernote').summernote('code', block.block_content);
    
    var all_quiz_op_value = Array.from(all_quiz_op, (op)=>op.value);
    
    var m_quizzes = chaptersAndBlocks[target.parentElement.parentElement.parentElement.id].quizzes;
    for (var i = 0; i < all_quiz_op.length; i++) {      
            all_quiz_op[i].selected = false;
        }
    for (var i = 0; i < m_quizzes.length; i++) {
        console.log(typeof (m_quizzes[i].quiz_id+""));
        if (all_quiz_op_value.indexOf( (m_quizzes[i].quiz_id+"") ) != -1){
            all_quiz_op[all_quiz_op_value.indexOf((m_quizzes[i].quiz_id+""))].selected = true;
        }
    }
    
    $('#select_quiz').select2({
       placeholder: "Select Quizzes",
      });

}





var createNewChatper = ()=>{
    if(newChapterInput.value == ""){
        newChapterInput.focus();
        return;
    }
    chapterAdd.classList.add('d-none');
    chapterAdd.parentElement.disabled = true;
    chapter_hourglass.classList.remove('d-none');
    pushChapterToDB(newChapterInput.value);
    newChapterInput.value = "";
    
}



var removeChapter = (target)=>{
    // console.log();
    // target.parentElement.parentElement.parentElement.removeChild(target.parentElement.parentElement);
    deleteChapterFromDB(target.parentElement.parentElement.parentElement.id.split('_')[1]);
}

var addBlock = (target)=>{
    var new_block_div = target.parentElement.parentElement.querySelector('.new_block_div');
    if(new_block_div.classList.contains('d-none')){
        new_block_div.classList.remove('d-none');
    }else{
        new_block_div.classList.add('d-none');
    }
   
    var newEl = document.createElement('div');

}

var createNewBlock = (target)=>{
    var blockContainer = target.parentElement.parentElement.parentElement.parentElement.querySelector('.block_container');
    var newBlockInput = target.parentElement.parentElement.querySelector('input[name=new_block]');
    var chapter_id = blockContainer.parentElement.parentElement.id.split("_")[1];
    if(newBlockInput.value == ""){
        newBlockInput.focus();
        return;
    }
    pushBlockToDB(chapter_id, newBlockInput.value, blockContainer);
    newBlockInput.value = "";
    

}
var removeBlock = (target)=>{
    deleteBlockFromDB(target.parentElement.id.split('_')[1], target.parentElement.parentElement);
    // target.parentElement.parentElement.removeChild(target.parentElement);
}
// Class definition

// Class definition

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
    getChapterFromDB();
    KTSummernoteDemo.init();
    $('#select_quiz').select2({
       placeholder: "Select Quizzes",
      });
    $('#select_quiz').change(()=>{quizHasChanged=true})

})

var pushLastChange =(target)=>{
    target.innerHTML = "saving...";
    if (lastBlockTarget!= null && document.getElementById(lastBlockTarget)!=null) {
        var nodeLastBlockTarget = document.getElementById(lastBlockTarget);
        nodeLastBlockTarget.removeChild(document.querySelector('.flaticon2-pen'));
        var mLastBlock = chaptersAndBlocks[nodeLastBlockTarget.parentElement.parentElement.parentElement.id]
                            [lastBlockTarget];
        // console.log("mLastBlock...", mLastBlock.block_content);
        // console.log("mEditor.getData()", mEditor.getData());
        var mData = $('.summernote').summernote('code');
        if(mLastBlock.block_content
                             != mData){
            fetch(`${window.location.href}/update-content/${mLastBlock.block_id}`,
                        {
                        method: 'POST',
                        headers: {
                          'Accept': 'application/json',
                          'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({'block_content': mData, '_token': document.querySelector('input[name=_token]').value})
                        }
                )
            .then((result)=>result.json())
            .then((blocks)=>{
               
            });
            
            
            return true;
        }
    }
    return true;
}