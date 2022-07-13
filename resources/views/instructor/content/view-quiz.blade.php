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
                    <h3 class="card-label font-weight-bolder ">{{ $main_quiz->quiz_title }}</h3>
                    <div class="w-100 text-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#updateEditorInputModal"
                            data-type="hidden" data-title="New Question" data-name="quiz_question_title"
                            data-route="{{ route('instructor_quiz_new_question', ['quiz' => $main_quiz->quiz_id]) }}"
                            data-value="New Question">Add New Question
                        </button>
                    </div>
                    @foreach ($main_quiz->questions as $question)
                        {{-- @dd($question) --}}
                        <!--begin::Card-->
                        <div class="card card-custom my-4">
                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="flex-grow-1 card-title align-items-start flex-row justify-content-between">
                                    <h3 class="card-label font-weight-bolder ">

                                        <a data-toggle="modal" href="#updateEditorInputModal" data-type="hidden"
                                            data-title="New Question" data-name="quiz_question_title"
                                            data-route="{{ route('instructor_quiz_question_update', ['quizQuestion' => $question->quiz_question_id]) }}"
                                            data-value="{{ $question->quiz_question_title }}">
                                            {!! $question->quiz_question_title !!}
                                            {{-- <i class="fa fa-pen mx-2 fs-4"></i> --}}

                                        </a>
                                        <a data-toggle="modal" href="#updateInputModal" data-type="number"
                                            data-title="New Score" data-name="score"
                                            data-route="{{ route('instructor_quiz_question_update', ['quizQuestion' => $question->quiz_question_id]) }}">
                                            <small>{{ $question->score }} point(s)</small>
                                            {{-- <i class="fa fa-pen mx-2 fs-4"></i> --}}

                                        </a>
                                    </h3>
                                    @if ($question->type != 'short_answer')
                                        <button class="btn btn-success" data-toggle="modal"
                                            data-target="#updateInputModal" data-type="text" data-title="New Option"
                                            data-name="quiz_option_title"
                                            data-route="{{ route('instructor_quiz_question_add_option', ['quizQuestion' => $question->quiz_question_id]) }}">Add
                                            Option Question
                                        </button>
                                    @endif

                                </div>


                            </div>
                            <!--end::Header-->

                            <!--begin::Form-->
                            <div class="card-body">
                                @foreach ($question->options as $option)
                                    <div class="h4">

                                        @if ($option->is_correct)
                                            <a
                                                href="{{ route('instructor_quiz_option_update', ['quizOption' => $option->quiz_option_id]) }}?is_correct=0">
                                                {{-- <i class="fas fa-toggle-off text-danger"></i> --}}
                                                <i class="far fa-circle text-success"></i>

                                            </a>
                                        @else
                                            <a
                                                href="{{ route('instructor_quiz_option_update', ['quizOption' => $option->quiz_option_id]) }}?is_correct=1">
                                                {{-- <i class="fas fa-toggle-on text-success"></i> --}}
                                                <i class="fas fa-circle text-success"></i>
                                            </a>
                                        @endif

                                        <a data-toggle="modal" href="#updateInputModal" data-type="text"
                                            data-title="New Option" data-name="quiz_option_title"
                                            data-route="{{ route('instructor_quiz_option_update', ['quizOption' => $option->quiz_option_id]) }}">
                                            {{ $option->quiz_option_title }}
                                            {{-- <i class="fa fa-pen mx-2 fs-4"></i> --}}

                                        </a>


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
<!--end::Content-->
<!--end::Content-->
