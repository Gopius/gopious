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

<!--begin::Content-->
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
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder ">View Class Report</h3>

                            </div>

                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">quize</th>
                                                <th scope="col">Polls</th>
                                                <th scope="col">Assignments</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                              </tr>
                                              <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                              </tr>
                                              <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
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

@include('instructor.footer')
