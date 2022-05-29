var startIconStr = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                    </g>
                                                </svg>`;
var inputstr = `<input type='text' class="form-control d-inline fill_in" style="width:fit-content" />`;
var textareastr = `<textarea class="form-control d-inline short_answer" style="height:150px;"></textarea>`;
var finish = `<span class="p-2 px-4 bg-primary text-light rounded h4">finish</span>`;
function QuizApp (_questions, prev, next,
    time = 0.15,
    question_panel = "#question_panel",
    answer_panel = "#answer_panel",
    result_panel = ".result_panel",
    qProgressBar=".quiz-progress-bar",
    quizCheckList = ".quiz-check-list"){
    this.cursor = null;
    this.timer = 60*time;
    this.ticks = null;
    this.questions = _questions;




    this.question_panel = document.querySelector(question_panel);
    this.answer_panel = document.querySelector(answer_panel);
    this.result_panel = document.querySelector(result_panel);
    this.qProgressBar = document.querySelector(qProgressBar);
    this.quizCheckList = document.querySelector(quizCheckList);



    this.previousBtn = document.querySelector(prev);
    this.previousBtn.style.display = "none";
    this.nextBtn = document.querySelector(next);
    this.previousBtn.addEventListener('click', ()=>{
        this.performPrevious();
    });
    this.nextBtn.addEventListener('click', ()=>{
        this.performNext();
    });

    this.performPrevious = ()=>{
         if(this.cursor > 0){
            this.checkState();
            this.cursor --;
        }else{
            alert("At starting question");
            return;
        }
        this.updateState();
    };
    this.performNext = ()=>{
        if (this.cursor == null && this.questions.length > 0) {
            this.cursor = 0;
            this.qProgressBar.style.width = "0%";
            this.quizCheckList.innerHTML = "";
            this.updateTimer();
            this.fillCheckList();

        }else if(this.cursor < this.questions.length -1){
            this.checkState();
            this.cursor ++;
        }else{
            this.checkState();
            swal.fire({
                text: "Are you done with the Quiz?",
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
                    this.computeResult();
                     KTApp.blockPage({
                      overlayColor: 'red',
                      opacity: 0.1,
                      state: 'primary' // a bootstrap color
                    });
                    this.pushToBackEnd();// Submit form
                } else if (result.dismiss === 'cancel') {

                }

            });

            return;
        }
        this.updateState();


    };


    this.checkState = ()=>{
        switch(this.questions[this.cursor].type){
            case "multi_choice":
                for(var child of this.answer_panel.children){

                    if(child.firstElementChild.checked){
                        // console.log(child.firstElementChild.value);
                        this.questions[this.cursor].selected = child.firstElementChild.value.trim();
                        break;
                    }
                }
                break;
            case "fill_in":
                var inps = this.question_panel.querySelectorAll('.fill_in');

                for(var child of inps){



                    if(child.value.length>0){
                        // this.questions[this.cursor].selected = 1;
                        this.questions[this.cursor].selected = child.value;
                        break;
                    }
                }

                break;
            case "short_answer":
                var textArea = this.answer_panel.querySelector('.short_answer');
                if(textArea.value.length>0){
                    // this.questions[this.cursor].selected = 1;
                    this.questions[this.cursor].selected = textArea.value;
                    break;
                }
                break;
        }

        this.quizCheckList.children[this.cursor].lastElementChild.classList.remove("text-success");
        this.quizCheckList.children[this.cursor].lastElementChild.classList.remove("text-info");

        if(this.questions[this.cursor].selected != null){
            this.quizCheckList.children[this.cursor].lastElementChild.classList.add("text-success");

        }
        return {'cursor': this.cursor};
    };
    this.updateState = ()=>{
        this.question_panel.innerHTML = this.questions[this.cursor].quiz_question_title;
        // console.log(this.questions[this.cursor].type);
        switch(this.questions[this.cursor].type){
            case "multi_choice":
                this.fillOptions(this.questions[this.cursor]);
                break;
            case "fill_in":
                this.question_panel.innerHTML = this.questions[this.cursor].quiz_question_title.replaceAll('__', inputstr);
                this.question_panel.querySelector('input').value = this.questions[this.cursor].selected=== undefined ? '':this.questions[this.cursor].selected;
                this.answer_panel.innerHTML = "";
                break;
            case "short_answer":
                this.answer_panel.innerHTML = "";
                this.answer_panel.innerHTML = textareastr;
                this.answer_panel.querySelector('textarea').value = this.questions[this.cursor].selected=== undefined ? '':this.questions[this.cursor].selected;
                break;
        }


        this.qProgressBar.style.width = ( (this.cursor+1)/this.questions.length * 100 )+"%";

        if(this.cursor == this.questions.length-1) {
            this.nextBtn.innerHTML = finish;

        }else{
            this.nextBtn.innerHTML = startIconStr;
            this.previousBtn.style.display = "block";
        }
        if (this.cursor==0) this.previousBtn.style.display = "none";
        this.quizCheckList.children[this.cursor].lastElementChild.classList.add("text-info");
        if ('short_answer' ==  this.questions[this.cursor].type) return;
        for(var child of this.answer_panel.children){
            child.firstElementChild.checked = (this.questions[this.cursor].selected != null && this.questions[this.cursor].selected ==  child.firstElementChild.value )? true : false;
        }
    };
    this.fillOptions = (mQuestion)=>{
        this.answer_panel.innerHTML = "";

        for(var option of mQuestion.options){

            var newNode = document.createElement('div');
            newNode.classList.add("row");
            newNode.classList.add("my-2");
            newNode.innerHTML = `<input type="${mQuestion.multiple_select == 1? 'checkbox':'radio'}" class="col-2 m-auto form-control form-control-sm" style="height:20px !important;" name="${mQuestion.quiz_question_id}" value="${option.quiz_option_id}">`;
            newNode.innerHTML += `<p class="card-text col-10">${option.quiz_option_title} </p>`;
            this.answer_panel.append(newNode);
        }
    };

    this.fillCheckList = ()=>{


        for(let i in this.questions){
            var newNode = document.createElement('div');
            newNode.classList.add("col-");
            newNode.classList.add("text-center");
            newNode.classList.add("d-inline");
            newNode.classList.add("m-2");
            // newNode.innerHTML = `<label class="m-auto">${(1+parseInt(i))}</label>`;
            newNode.innerHTML += `<i class="far fa-check-square h4 " style="font-size:2em!important;" ></i>`;

            newNode.addEventListener('click', ()=>{
                this.checkState();
                this.cursor = parseInt(i);
                this.updateState();
            });
            this.quizCheckList.append(newNode);
        }
    };

    this.computeResult = function() {
        let totalCorrect = 0;
        this.result_panel.innerHTML = "";
        for(let question of this.questions){
            var newNode = document.createElement('div');
            newNode.classList.add("col-md-6");

            var newCard = document.createElement('div');
            newCard.classList.add("card");
            newCard.classList.add("card-body");

            var questionPara = document.createElement('p');
            questionPara.classList.add("card-text");
            questionPara.innerHTML = question.quiz_question_title;

            newCard.append(questionPara);
            // console.log(question);
            for(var option of question.options){
                var newInnerDiv = document.createElement('div');
                newInnerDiv.classList.add("row");
                newInnerDiv.classList.add("my-2");
                if(option.is_correct == '1'){
                    newInnerDiv.innerHTML = `<i class="far fa-check-circle col-2  h2 text-success"></i>`;
                }else{
                    newInnerDiv.innerHTML = `<i class="far fa-check-circle col-2  h2 text-danger"></i>`;
                }


                newInnerDiv.innerHTML += `<p class="card-text col-8">${option.quiz_option_title} </p>`;
                // newInnerDiv.innerHTML += `<p class="card-text col-8">${question.selected} </p>`;
                switch(question.type){
                    case "multi_choice":
                        if(question.selected != null && question.selected == option.quiz_option_id){
                            newInnerDiv.innerHTML += `<i class="far fa-hand-point-left col-2  h2 ${(option.is_correct == '1')?'text-success':'text-danger'}"></i>`;
                            if(option.is_correct == '1'){
                                totalCorrect++;

                                console.log(question.selectedIndex );
                            }
                            question.selectedIndex = option.quiz_option_id;
                        }
                        break;
                    case "fill_in":
                        if(question.selected != null && question.selected == option.quiz_option_title){
                            newInnerDiv.innerHTML += `<i class="far fa-hand-point-left col-2  h2 ${(option.is_correct == '1')?'text-success':'text-danger'}"></i>`;
                            if(option.is_correct == '1'){
                                totalCorrect++;
                                question.selectedIndex = option.quiz_option_id;
                            }
                        }
                        break;
                    case "short_answer":
                        this.answer_panel.innerHTML = "";
                        break;
                }

                newCard.append(newInnerDiv);
            }
            if (question.type=='short_answer') {
                var shortAnswer =  document.createElement('p');
                shortAnswer.className = 'card-text col-8 text-muted';
                shortAnswer.innerHTML = 'Answer Will be Reviewed, Thank you';
                var selectedAnswer =  document.createElement('p');
                selectedAnswer.className = 'card-text col-8 text-bold';
                selectedAnswer.innerHTML = question.selected==undefined?'':question.selected;
                newCard.append(selectedAnswer);
                newCard.append(shortAnswer);
            }
            newNode.append(newCard);

            this.result_panel.append(newNode);
        }
        var totalNode = document.createElement('div');
        totalNode.classList.add("col-md-12");
        totalNode.classList.add("h3");
        totalNode.classList.add("text-center");
        totalNode.innerHTML = `${totalCorrect} out ${this.questions.length}. <b><i>${ Math.round(totalCorrect/this.questions.length*100, 2)}%</i></b>`;
        this.result_panel.insertBefore(totalNode, this.result_panel.firstElementChild);

    };

    this.updateTimer = ()=>{
        var timerNode = document.querySelector('.timer');

        // timerNode.classList.add("col-12");
        // timerNode.classList.add("h3");
        // timerNode.classList.add("my-3");
        // timerNode.classList.add("fixed-top");
        // timerNode.classList.add("text-center");
        timerNode.innerHTML = `${Math.floor(this.timer/60).toString().padStart(2, '0')} : ${Math.floor(this.timer%60 ).toString().padStart(2, '0') }`;
        // document.body.append(timerNode);
        this.ticks = setInterval(()=>{
            this.timer--;
            timerNode.innerHTML = `${Math.floor(this.timer/60).toString().padStart(2, '0')} : ${Math.floor((this.timer%60 )).toString().padStart(2, '0') }`;
            if(this.timer <= 0){
                clearInterval(this.ticks );
                this.computeResult();
            }
            document.querySelector('.counter').innerHTML = this.cursor + 1;
        }, 1000);
    };

    this.pushToBackEnd = async ()=>{
        await fetch(window.location.href,
                    {
                    method: 'POST',
                    headers: {
                      'Accept': 'application/json',
                      'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({'questions': this.questions, '_token': document.querySelector('input[name=_token]').value})
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


};
