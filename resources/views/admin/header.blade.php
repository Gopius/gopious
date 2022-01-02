<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<meta charset="utf-8" />
		<title>GoPius Admin</title>
		<meta name="description" content="Updates and statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			.hidden_hover_child {

			  display: none!important;
			}
			.only_on_hover:hover > .hidden_hover_child {
			  display: inline-block!important;
			}
		</style>

		<!--end::Page Vendors Styles-->
		@switch($view)
		    @case('add_course')
		        <link href="/assets/css/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css" />
		        @break

            @case('organizations')
		         <!--begin::Page Vendors Styles(used by this page)-->
                <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Page Vendors Styles-->
		        @break

		    @default
		            {{-- Default case... --}}
		@endswitch

		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="/assets/media/logos/favicon.png" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
		<!-- begin::User Panel-->
		<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">

				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="offcanvas-content pr-5 mr-n5">
				<!--begin::Header-->
				<div class="d-flex align-items-center mt-5">
					<div class="symbol symbol-100 mr-5">

						<i class="symbol-badge bg-success"></i>
					</div>
					<div class="d-flex flex-column">
						<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{Auth::guard('admin')->user()->name}} </a>
						{{-- <div class="text-muted mt-1">Application Developer</div> --}}
						<div class="navi mt-2">
							<a class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary">{{Auth::guard('admin')->user()->email}}</span>
								</span>
							</a>
							<a href="{{ route('admin.logout') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Logout</a>
						</div>
					</div>
				</div>


			</div>
			<!--end::Content-->
		</div>
		<!-- end::User Panel-->
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
			<!--begin::Logo-->
			<a href="{{ route('admin.dashboard') }}">
				<img alt="Logo" src="/assets/media/logos/logo-letter-9.png" class="max-h-35px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header flex-column header-fixed">
						<!--begin::Top-->
						<div class="header-top">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Left-->
								<div class="d-none d-lg-flex align-items-center mr-3">
									<!--begin::Logo-->
									<a href="{{ route('admin.dashboard') }}" class="mr-20">
										<img alt="Logo" src="/assets/media/logos/logo-letter-9.png" class="max-h-35px" />
									</a>
									<!--end::Logo-->
									<!--begin::Tab Navs(for desktop mode)-->
									<ul class="header-tabs nav align-self-end font-size-lg" role="tablist">
										<!--begin::Item-->
										<li class="nav-item">
											<a href="{{ route('admin.dashboard') }}" class="nav-link py-4 px-6 {{$header=='home'?'active':''}}" >Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="nav-item mr-3">
											<a href="{{ route('admin.organizations') }}" class="nav-link py-4 px-6  {{$header=='organizations'?'active':''}}" role="tab">Organizations</a>
										</li>
										<!--end::Item-->


									</ul>
									<!--begin::Tab Navs-->
								</div>
								<!--end::Left-->
								<!--begin::Topbar-->
								<div class="topbar bg-primary">



									<!--begin::User-->
									<div class="topbar-item">
										<div class="btn btn-icon btn-hover-transparent-white w-sm-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
											<div class="d-flex flex-column text-right pr-sm-3">
												<span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-sm-inline">{{Auth::guard('admin')->user()->name}}</span>
											</div>
											<span class="symbol symbol-35">

											</span>
										</div>
									</div>
									<!--end::User-->
								</div>
								<!--end::Topbar-->
							</div>
							<!--end::Container-->
						</div>
						<!--begin::Bottom-->
						<div class="header-bottom">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Header Menu Wrapper-->
								<div class="header-navs header-navs-left" id="kt_header_navs">
									<!--begin::Tab Navs(for tablet and mobile modes)-->
									<ul class="header-tabs p-5 p-lg-0 d-flex d-lg-none nav nav-bold nav-tabs" role="tablist">
										<!--begin::Item-->
										<li class="nav-item mr-2">
											<a href="{{ route('admin.organizations') }}" class="nav-link btn btn-clean {{$header=='home'?'active':''}}"  role="tab">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="nav-item mr-2">
											<a href="{{ route('admin.organizations') }}" class="nav-link btn btn-clean {{$header=='organizations'?'active':''}}"  role="tab">Organizations</a>
										</li>
										<!--end::Item-->

									</ul>
						<!--end::Top-->
						@if (session()->has('message'))
							<script type="text/javascript">
								window.addEventListener('load', (e)=>{
									toastr.success("{{session()->get('message')}}");
								});

							</script>
						@endif
						@if ($errors->any())

						            @foreach ($errors->all() as $error)
						            	<script type="text/javascript">
											window.addEventListener('load', (e)=>{
												swal.fire({
								                text: "{{ $error }}",
								                icon: "error",
								                buttonsStyling: false,
								                confirmButtonText: "Ok, got it!",
						                        customClass: {
						    						confirmButton: "btn font-weight-bold btn-light-primary"
							    					}
									            }).then(function() {
													// KTUtil.scrollTop();
												});
											})

										</script>

						            @endforeach

						@endif
