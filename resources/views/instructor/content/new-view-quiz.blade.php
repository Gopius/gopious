
					<!--begin::Content-->
                    @include('forms.update-modal')
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile Account Information-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->

									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-8">
                                        <h3 class="card-label font-weight-bolder ">{{ $main_quiz->quiz_title}}</h3>
                                        <div class="w-100 text-right">
                                            <button
                                                class="btn btn-success"
                                                {{-- data-toggle="modal" data-target= --}}
                                                data-toggle="modal" data-target="#updateEditorInputModal"
                                                data-type="hidden"
                                                data-title="New Question"
                                                data-name="quiz_question_title"
                                                data-route="{{ route('add_instructor_quiz_new_question', ['quiz'=>$main_quiz->quiz_id]) }}"
                                                data-value="New Question"

                                                >Add New Question
                                            </button>
                                        </div>
										@foreach ($main_quiz->questions as $question)
                                            <!--begin::Card-->
                                            <div class="card card-custom my-4">
                                                <!--begin::Header-->
                                                <div class="card-header py-3">
                                                    <div class="flex-grow-1 card-title align-items-start flex-row justify-content-between">
                                                        <h3 class="card-label font-weight-bolder ">

                                                            <a
                                                            data-toggle="modal" href="#updateEditorInputModal"
                                                            data-type="hidden"
                                                            data-title="New Question"
                                                            data-name="quiz_question_title"
                                                            data-route="{{ route('instructor_quiz_question_update', ['quizQuestion'=>$question->quiz_question_id]) }}"
                                                            data-value="{{$question->quiz_question_title}}"
                                                            >
                                                                {!!  $question->quiz_question_title !!}
                                                                <i class="fa fa-pen mx-2 fs-4"></i>

                                                            </a>
                                                            <a
                                                            data-toggle="modal" href="#updateInputModal"
                                                            data-type="number"
                                                            data-title="New Score"
                                                            data-name="score"
                                                            data-route="{{ route('instructor_quiz_question_update', ['quizQuestion'=>$question->quiz_question_id]) }}"
                                                            >
                                                                <small>{{ $question->score }} point(s)</small>
                                                                <i class="fa fa-pen mx-2 fs-4"></i>

                                                            </a>
                                                        </h3>
                                                        <button
                                                            class="btn btn-success"
                                                            data-toggle="modal" data-target="#updateInputModal"
                                                            data-type="text"
                                                            data-title="New Option"
                                                            data-name="quiz_option_title"
                                                            data-route="{{ route('instructor_quiz_question_add_option', ['quizQuestion'=>$question->quiz_question_id]) }}"
                                                            >Add Option Question
                                                        </button>
                                                    </div>


                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Form-->
                                                <div class="card-body">
                                                    @foreach ($question->options as $option)
                                                        <div class="h4">
                                                            <a
                                                            data-toggle="modal" href="#updateInputModal"
                                                            data-type="text"
                                                            data-title="New Option"
                                                            data-name="quiz_option_title"
                                                            data-route="{{ route('instructor_quiz_option_update', ['quizOption'=>$option->quiz_option_id]) }}"
                                                            >
                                                            {{$option->quiz_option_title}}
                                                                <i class="fa fa-pen mx-2 fs-4"></i>

                                                            </a>
                                                            @if ($option->is_correct)
                                                                <a href="{{ route('instructor_quiz_option_update', ['quizOption'=>$option->quiz_option_id]) }}?is_correct=0">
                                                                    <i class="fas fa-toggle-off text-danger"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('instructor_quiz_option_update', ['quizOption'=>$option->quiz_option_id]) }}?is_correct=1">
                                                                    <i class="fas fa-toggle-on text-success"></i>
                                                                </a>

                                                            @endif

                                                            @if ($option->is_correct)
                                                                <i class="far fa-check-circle text-success float-right"></i>
                                                            @endif

                                                        </div>
                                                    @endforeach

                                                </div>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Card-->
                                        @endforeach
									</div>
									<!--end::Content-->
								</div>
								<!--end::Profile Account Information-->
							</div>
							<!--end::Container-->
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>

                    @csrf
                    <div class="modal fade" id="updateEditorInputModal" data-backdrop="static" tabindex="-1" role="dialog"
                        aria-labelledby="staticBackdrop" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Question</h5>

                              <i class="fas fa-times" data-dismiss="modal" id="close_modal"></i>

                                </div>
                                <div class="modal-body" >
                                    <div class="form-group">
                                        <label>Quiz type</label>
                                        <select class="form-control" id="quiz_type">
                                            <option value="0">Multiple Choice</option>
                                            <option value="1">True / False</option>
                                            <option value="2">Fill in the Blanks</option>
                                            <option value="3">Multiple Answers</option>
                                            <option value="4">Short Answers</option>

                                        </select>
                                    </div>
                                    {{-- <form class="mt-4" action="" method="post"> --}}
                                    @csrf
                                    <input type="hidden" name="_ulink" value="">
                                    <ul class="nav nav-success nav-pills m_option_list d-none" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="multi_choice-tab" data-toggle="tab" href="#multi_choice">
                                                <span class="nav-text">Multiple Choice</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="fill_in-tab" data-toggle="tab" href="#fill_in"
                                                aria-controls="profile">
                                                <span class="nav-text">Fill in</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="short_answer-tab" data-toggle="tab" href="#short_answer"
                                                aria-controls="contact">

                                                <span class="nav-text">Short Answer</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-5" id="myTabContent">

                                        <div class="tab-pane fade active show" id="multi_choice" role="tabpanel"
                                            aria-labelledby="home-tab-2">
                                            <div class="card-body p-0">


                                                <div class="form-group">
                                                    <label for="exampleTextarea">Question</label>
                                                    <div class="col-sm-12 p-0">
                                                        <!--begin::List Widget 14-->
                                                        <div class="card card-custom m-0 p-0">
                                                            <!--begin::Form-->

                                                            <div class="card-body col-12 m-0 p-0 mb-2">
                                                                <div class="col-12">
                                                                    <div class="summernote" id="kt_summernote_1"></div>
                                                                </div>

                                                            </div>


                                                            <!--end::Form-->
                                                        </div>
                                                        <!--end::List Widget 14-->
                                                    </div>
                                                </div>
                                                <div class="form-group" style="visibility: hidden;">
                                                    <label>Multiple options selection</label>
                                                    <input type="checkbox" disabled="" name="multi_options" class="form-control-solid">

                                                </div>
                                                <label>Options</label>
                                                <label class="btn btn-primary float-right" onclick="addNewOption()"><i
                                                        class="fas fa-plus text-white"></i> Add Option</label>
                                                <div class="all-options">

                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="fill_in" role="tabpanel" aria-labelledby="home-tab-2">
                                            <div class="form-group">
                                                <label>Question</label>
                                                <textarea class="form-control form-control-solid fill_in_textarea" rows="5"></textarea>
                                                <span class="form-text text-muted">Use '__' underscores to specify where you would like a
                                                    blank to appear in the text below</span>
                                                <h1
                                                    class="text-dark-75 text-hover-primary my-5 pl-0 font-size-lg font-weight-bolder fill_in_textarea_output">
                                                </h1>
                                            </div>
                                            <label>Possible answer</label>
                                            <label class="btn btn-primary float-right" onclick="addPossibleOption()"><i
                                                    class="fas fa-plus text-white"></i> Add Possible Answer</label>
                                            <div class="all-fill_options">

                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="short_answer" role="tabpanel" aria-labelledby="home-tab-2">
                                            <div class="form-group">
                                                <label>Question</label>
                                                <textarea class="form-control form-control short_answer_textarea" rows="5"></textarea>

                                            </div>


                                        </div>



                                    </div>


                                    <div class="card-footer">
                                        <div>
                                            <div class="form-group w-50">
                                                <label>Question Score</label>
                                                <input type="number" name="score" required="" value="1" min="1" class="form-control">

                                            </div>
                                        </div>
                                        <button onclick="addNewQuestion()" class="btn btn-primary mr-2 add_question"> <i
                                                class="fas fa-plus-circle text-white"></i> Add Question</button>
                                        <button class="d-none" data-dismiss="modal" id="close_modal"></button>

                                    </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="{{asset('assets/js/build_quiz.js')}}"></script>
