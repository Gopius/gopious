@include('instructor.header')
<style type="text/css">
    .btn.btn-light-primary {
        color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .svg-icon.svg-icon-primary svg g [fill],
    .svg-icon.svg-icon-success svg g [fill] {
        fill: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .bg-success {
        background-color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .header .header-top,
    .header-mobile {
        background: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .header-menu .menu-nav>.menu-item.menu-item-active>.menu-link .menu-text {
        color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .btn.btn-primary,
    .btn.btn-success,
    .datatable.datatable-default>.datatable-pager>.datatable-pager-nav>li>.datatable-pager-link.datatable-pager-link-active {
        background-color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
        border-color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .text-primary,
    .text-success,
    .datatable.datatable-default>.datatable-table>.datatable-body .datatable-toggle-detail i {
        color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .wizard.wizard-1 .wizard-nav .wizard-steps .wizard-step[data-wizard-state="current"] .wizard-label .wizard-title {
        color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .wizard.wizard-1 .wizard-nav .wizard-steps .wizard-step[data-wizard-state="current"] .wizard-label .wizard-icon {
        color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .wizard.wizard-1 .wizard-nav .wizard-steps .wizard-step[data-wizard-state="current"] .wizard-arrow svg g [fill] {
        fill: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .bg-primary {
        background-color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    .btn.btn-hover-text-primary:hover:not(.btn-text):not(:disabled):not(.disabled),
    .btn.btn-hover-text-primary:focus:not(.btn-text),
    .btn.btn-hover-text-primary.focus:not(.btn-text),
    .btn.btn-hover-icon-primary:hover:not(.btn-text):not(:disabled):not(.disabled) i,
    .btn.btn-hover-icon-primary:focus:not(.btn-text) i,
    .btn.btn-hover-icon-primary.focus:not(.btn-text) i,
    .btn.btn-clean:not(:disabled):not(.disabled):active:not(.btn-text),
    .btn.btn-clean:not(:disabled):not(.disabled).active,
    .show>.btn.btn-clean.dropdown-toggle,
    .show .btn.btn-clean.btn-dropdown,
    .btn.btn-clean:hover:not(.btn-text):not(:disabled):not(.disabled),
    .btn.btn-clean:focus:not(.btn-text),
    .btn.btn-clean.focus:not(.btn-text) {
        color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
    }

    @media (max-width: 991.98px) {

        .header-menu-mobile .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-text,
        .header-menu-mobile .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-text {
            color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
        }
    }

    @media (min-width: 992px) {

        .header-menu .menu-nav>.menu-item:hover:not(.menu-item-here):not(.menu-item-active)>.menu-link .menu-text,
        .header-menu .menu-nav>.menu-item.menu-item-hover:not(.menu-item-here):not(.menu-item-active)>.menu-link .menu-text {
            color: {{ Auth::guard('instructor')->user()->organization->setting->color }} !important;
        }
    }

    @media screen and (max-width: 480px) {
        .quize_card {
            display: none;
        }
    }



    {{ Auth::guard('instructor')->user()->organization->setting->css }}

</style>
@isset($header)
    @include('instructor.sub_header.' . $header)
@endisset





<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="flex-md-row-auto col-sm-4">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-column pt-4 h-100">
                                <div class="pb-5">
                                    <div class="d-flex flex-column flex-center">
                                     
                                        <div class="symbol symbol-45 symbol-light-warning mr-2">
                                            <span class="symbol-label font-size-h5 font-weight-bolder text-warning">
                                                {{ strtoupper(substr(explode(' ', $class->cat_title)[0] ?? '', 0, 1)) }}{{ strtoupper(substr(explode(' ', $class->cat_title)[1] ?? '', 0, 1)) }}
                                            </span>
                                        </div>
                                        <a
                                            class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{ $class->cat_title }}</a>
                                        <div class="font-weight-bold text-dark-50 font-size-sm pb-6">
                                            {!! $class->cat_desc !!}</div>
                                        <div class="font-weight-bold text-dark-50 font-size-sm pb-6">Students:
                                            {!! $class->cat_max_student !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex-row-fluid col-sm-8">
                    <div class="card card-custom">
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder ">View Activities</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                                <div class="card">
                                    <div class="card-header" id="headingOne6">
                                        <div class="card-title" data-toggle="collapse" data-target="#collapseOne6">
                                            <i class="flaticon-pie-chart-1"></i> Assignments

                                        </div>
                                    </div>
                                    <div id="collapseOne6" class="collapse show" data-parent="#accordionExample6">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-vertical-center">

                                                    <thead>
                                                        <tr>
                                                            <th class="p-0 w-50px"></th>
                                                            <th class="p-0 w-100 min-w-100px"></th>
                                                            <th class="p-0 w-100 min-w-100px"></th>
                                                            {{-- <th class="p-0 w-100 min-w-100px"></th> --}}
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($assignments as $assignment)
                                                            <tr>
                                                                <td class="m-0 p-0">
                                                                    <div
                                                                        class="symbol symbol-45 symbol-light-warning mr-2">
                                                                        <span
                                                                            class="symbol-label font-size-h5 font-weight-bolder text-warning">
                                                                            {{ strtoupper(substr(explode(' ', $assignment->ass_title)[0] ?? '', 0, 1)) }}{{ strtoupper(substr(explode(' ', $assignment->ass_title)[1] ?? '', 0, 1)) }}
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td class="pl-0">
                                                                    <a href=""
                                                                        class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $assignment->ass_title }}
                                                                    </a>
                                                                    <span class="text-muted font-weight-bold d-block">by
                                                                        {{ $assignment->instructor->instr_name }}</span>
                                                                    in {{ $assignment->course_title }}
                                                                </td>
                                                                <td>
                                                                    @isset($assignment->a_l_id)
                                                                        <a
                                                                            href="{{ route('instructor_view_assignment_submission', [$assignment->cat_no, $assignment->ass_no, $assignment->a_l_id]) }}">
                                                                            <div
                                                                                class="btn btn-{{ $assignment->status == 0 ? 'warning' : ($assignment->status == 1 ? 'success' : 'danger') }}">
                                                                                {{ $assignment->status == 0 ? 'Awaiting Assesment' : ($assignment->status == 1 ? 'Correct' : 'Wrong') }}


                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <div class="text-primary border p-2">
                                                                            No Submission
                                                                        </div>
                                                                    @endisset
                                                                </td>
                                                                <td class="text-left">
                                                                    <span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $assignment->end_date->diffForHumans() }}</span>
                                                                    <span
                                                                        class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                                </td>

                                                            </tr>
                                                        @endforeach



                                                    </tbody>

                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo6">
                                        <div class="card-title collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo6">
                                            <i class="flaticon2-chart"></i> Quizzes
                                        </div>
                                    </div>
                                    <div id="collapseTwo6" class="collapse" data-parent="#accordionExample6">
                                        <div class="card-body">
                                            <div class="card-body pt-2 pb-0 mt-n3">
                                                <div class="tab-content mt-5" id="myTabTables10">

                                                    <div class="tab-pane fade  show active" id="kt_tab_pane_10_1"
                                                        role="tabpanel" aria-labelledby="kt_tab_pane_10_1">

                                                        <div class="table-responsive">
                                                            <table class="table table-borderless table-vertical-center">

                                                                <thead>
                                                                    <tr>
                                                                        <th class="p-0 w-50px"></th>
                                                                        <th class="p-0 w-100 min-w-100px"></th>
                                                                        <th class="p-0 w-100 min-w-100px"></th>
                                                                        <th class="p-0"></th>

                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    @foreach ($quizzes as $quiz)
                                                                        <tr>
                                                                            <td class="m-0 p-0">
                                                                                <div
                                                                                    class="symbol symbol-45 symbol-light-primary mr-2">
                                                                                    <span
                                                                                        class="symbol-label font-size-h5 font-weight-bolder text-primary">
                                                                                        {{ strtoupper(substr(explode(' ', $quiz->quiz_title)[0] ?? '', 0, 1)) }}{{ strtoupper(substr(explode(' ', $quiz->quiz_title)[1] ?? '', 0, 1)) }}
                                                                                    </span>
                                                                                </div>
                                                                            </td>
                                                                            <td class="pl-0">
                                                                                @isset($quiz->learner_no)
                                                                                    <a href="{{ route('instructor_view_quiz_submission', [$quiz->cat_no, $quiz->quiz_id, $quiz->learner_no]) }}"
                                                                                        class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                                                    @else
                                                                                        <a
                                                                                            class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                                                        @endisset
                                                                                        {{ $quiz->quiz_title }}</a>
                                                                                    <span
                                                                                        class="text-muted font-weight-bold d-block">by
                                                                                        {{ $quiz->instr_name }}</span>
                                                                            </td>
                                                                            <td>
                                                                                @isset($quiz->learner_no)
                                                                                    <label style="border-radius:0;"
                                                                                        class="w-100 label label-lg label-light-success">
                                                                                        {{ round(($quiz->correct_option / $quiz->questions->count()) * 100, 2) . '%' }}
                                                                                        {{ $quiz->unattented_option > 0 ? '(' . $quiz->unattented_option . ' unattented)' : '' }}

                                                                                    </label>
                                                                                @else
                                                                                    <div class="text-primary border p-2">
                                                                                        No Submission
                                                                                    </div>
                                                                                @endisset

                                                                                {{-- {{+'% '+ ( ($quiz->unattented_option>0)?'('+$quiz->unattented_option+' unattented)' : '')}} --}}
                                                                            </td>
                                                                            <td class="text-left">
                                                                                <span
                                                                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $quiz->start_date }}</span>
                                                                                <span
                                                                                    class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach


                                                                </tbody>

                                                            </table>
                                                        </div>


                                                    </div>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne6">
                                        <div class="card-title" data-toggle="collapse" data-target="#collapseOne7">
                                            <i class="flaticon-pie-chart-1"></i> Polls

                                        </div>
                                    </div>
                                    <div id="collapseOne7" class="collapse" data-parent="#accordionExample6">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-vertical-center">

                                                    <thead>
                                                        <tr>
                                                            <th class="p-0 w-50px"></th>
                                                            <th class="p-0 w-100 min-w-100px"></th>
                                                            <th class="p-0 w-100 min-w-100px"></th>
                                                            {{-- <th class="p-0 w-100 min-w-100px"></th> --}}
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($polls as $poll)
                                                            {{-- @dd($poll) --}}
                                                            <tr>
                                                                <td class="m-0 p-0">
                                                                    <div
                                                                        class="symbol symbol-45 symbol-light-warning mr-2">
                                                                        <span
                                                                            class="symbol-label font-size-h5 font-weight-bolder text-warning">
                                                                            {{ strtoupper(substr(explode(' ', $poll->poll_title)[0] ?? '', 0, 1)) }}{{ strtoupper(substr(explode(' ', $poll->poll_title)[1] ?? '', 0, 1)) }}
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td class="pl-0">
                                                                    <a href=""
                                                                        class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $poll->poll_title }}
                                                                    </a>
                                                                    <span class="text-muted font-weight-bold d-block">by
                                                                        {{ $poll->instructor->instr_name }}</span>
                                                                </td>

                                                                <td class="text-left">
                                                                    <span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $poll->end_date->diffForHumans() }}</span>
                                                                    <span
                                                                        class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                                </td>

                                                            </tr>
                                                        @endforeach



                                                    </tbody>

                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

</div>





@include('instructor.footer')
