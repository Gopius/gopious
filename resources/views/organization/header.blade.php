<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<meta charset="utf-8" />
		<title>GoPius</title>
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
		@if (Auth::guard('organization')->user()->org_square_icon_url !== null && Auth::guard('organization')->user()->org_square_icon_url !==  '' )
			<link rel="shortcut icon" href="{{ asset('storage/'.Auth::guard('organization')->user()->org_square_icon_url) }}" />
		@else
			<link rel="shortcut icon" href="/assets/media/logos/favicon.png" />
		@endif
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">




@php
	$instructors=auth('organization')->user()->instructors->pluck('instr_id')->toArray()??[];
    $quizes= App\Models\Quiz::whereIn('instr_no',$instructors)->get();
    $assignment= App\Models\Assignment::whereIn('instr_no',$instructors)->get();
    $courses= App\Models\Course::whereIn('instr_no',$instructors)->get();

    $collection=collect($quizes);
    $notifications=$collection->merge($assignment)->merge($courses)->sortBy('created_at');

    // dd($notifications);
@endphp

		<!-- begin::User Panel-->
		<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">User Profile
				{{-- <small class="text-muted font-size-sm ml-2">12 messages</small> --}}
				</h3>
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
						<div class="symbol-label" style="background-image:url({{ asset('storage/'.Auth::guard('organization')->user()->user_avatar_url) }});"></div>
						<i class="symbol-badge bg-success"></i>
					</div>
					<div class="d-flex flex-column">
						<a href="{{ route('organization_appearance') }}" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{Auth::guard('organization')->user()->firstname}} {{Auth::guard('organization')->user()->lastname}}</a>
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
									<span class="navi-text text-muted text-hover-primary">{{Auth::guard('organization')->user()->email}}</span>
								</span>
							</a>
							<a href="{{ route('organization_logout') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Logout</a>
						</div>
					</div>
				</div>
				<!--end::Header-->
				<div class="separator separator-dashed mt-8 mb-5"></div>

				<div class="navi navi-spacer-x-0 p-0">
					<!--begin::Item-->
					<a href="{{ route('organization_user_profile') }}" class="navi-item">
						<div class="navi-link">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-success">
										<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"></rect>
												<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"></path>
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"></circle>
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">My Profile</div>
								<div class="text-muted">Personal Information
								</div>
							</div>
						</div>
					</a>
					<!--end:Item-->

				</div>

			</div>
			<!--end::Content-->
		</div>
		<!-- end::User Panel-->
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
			<!--begin::Logo-->
			<a href="{{ route('organization_dashboard') }}">
				@if ( Auth::guard('organization')->user()->org_long_icon_url !== null && Auth::guard('organization')->user()->org_long_icon_url !==  '' )
					<img alt="Logo" src="{{ asset('storage/'.Auth::guard('organization')->user()->org_long_icon_url) }}" class="max-h-35px" />

				@else
					<img alt="Logo" src="/assets/media/logos/logo-letter-9.png" class="max-h-35px" />
				@endif
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
									<a href="{{ route('organization_dashboard') }}" class="mr-20">
										@if ( Auth::guard('organization')->user()->org_long_icon_url !== null && Auth::guard('organization')->user()->org_long_icon_url !==  '' )
											<img alt="Logo" src="{{ asset('storage/'.Auth::guard('organization')->user()->org_long_icon_url) }}" class="max-h-35px" />

										@else
											<img alt="Logo" src="/assets/media/logos/logo-letter-9.png" class="max-h-35px" />
										@endif
									</a>
									<!--end::Logo-->
									<!--begin::Tab Navs(for desktop mode)-->
									<ul class="header-tabs nav align-self-end font-size-lg" role="tablist">
										<!--begin::Item-->
										<li class="nav-item">
											<a href="{{ route('organization_dashboard') }}" class="nav-link py-4 px-6 {{$header=='home'?'active':''}}" >Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="nav-item mr-3">
											<a href="{{ route('organization_appearance') }}" class="nav-link py-4 px-6  {{$header=='appearance'?'active':''}}" role="tab">Settings</a>
										</li>
										<!--end::Item-->

										<!--begin::Item-->
										<li class="nav-item mr-3">
											<a href="{{ route('organization_classes') }}" class="nav-link py-4 px-6  {{$header=='class'?'active':''}}" role="tab">Classes</a>
										</li>

										<li class="nav-item mr-3">
											<a href="{{ route('organization_users') }}" class="nav-link py-4 px-6  {{$header=='user'?'active':''}}" role="tab">Users</a>
										</li>
										<!--end::Item-->
										{{-- <!--begin::Item-->
										<li class="nav-item mr-3">
											<a href="{{ route('organization_instuctors') }}" class="nav-link py-4 px-6 {{$header=='instructor'?'active':''}}" >Instructors</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="nav-item mr-3">
											<a href="{{ route('organization_learners') }}" class="nav-link py-4 px-6 {{$header=='learner'?'active':''}}" >Learners</a> --}}
										</li>
										<!--end::Item-->
									</ul>
									<!--begin::Tab Navs-->
								</div>
								<!--end::Left-->
								<!--begin::Topbar-->
								<div class="topbar bg-primary">

									<!--begin::Notifications-->
									<div class="dropdown">
										<!--begin::Toggle-->
										<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
											<div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-white">
												<span class="svg-icon svg-icon-xl">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
															<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<span class="pulse-ring"></span>
											</div>
										</div>
										<!--end::Toggle-->
										<!--begin::Dropdown-->
										<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
											<form>
												<!--begin::Header-->
												<div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(assets/media/misc/bg-1.jpg)">
													<!--begin::Title-->
													<h4 class="d-flex flex-center rounded-top">
														<span class="text-white">User Notifications</span>
														<span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{$notifications->count()}} total</span>
													</h4>
													<!--end::Title-->
													<!--begin::Tabs-->
													<ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
														{{-- <li class="nav-item">
															<a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">Alerts</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" data-toggle="tab" href="#topbar_notifications_events">Events</a>
														</li> --}}
														{{-- <li class="nav-item">
															<a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs">Logs</a>
														</li> --}}
													</ul>
													<!--end::Tabs-->
												</div>
												<!--end::Header-->
												<!--begin::Content-->
												<div class="tab-content">
													<!--begin::Tabpane-->
													<div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
														<!--begin::Scroll-->
														<div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
															<!--begin::Item-->
                                                         @foreach ($notifications as $notification)
                                                            @if (isset($notification->course_title))

															<div class="d-flex align-items-center mb-6">
																<!--begin::Symbol-->
																<div class="symbol symbol-40 symbol-light-primary mr-5">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
																					<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column font-weight-bold">
																	<a class="text-dark text-hover-primary mb-1 font-size-lg">New Course Alert</a>
																	<span class="text-muted">{{$notification->course_title}}</span>
																</div>
																<!--end::Text-->
															</div>
                                                            @endif
                                                        @if (isset($notification->quiz_title))

															<div class="d-flex align-items-center mb-6">
																<!--begin::Symbol-->
																<div class="symbol symbol-40 symbol-light-warning mr-5">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-warning">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column font-weight-bold">
																	<a  class="text-dark-75 text-hover-primary mb-1 font-size-lg">New Quiz Alert</a>
                                                                    <span class="text-muted">{{$notification->quiz_title}}</span>

																</div>
																<!--end::Text-->
															</div>
                                                          @endif

                                                            @if (isset($notification->ass_title))
															<div class="d-flex align-items-center mb-6">
																<!--begin::Symbol-->
																<div class="symbol symbol-40 symbol-light-success mr-5">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-lg svg-icon-success">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
																					<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column font-weight-bold">
																	<a class="text-dark text-hover-primary mb-1 font-size-lg">New assignment lert</a>
                                                                    <span class="text-muted">{{$notification->ass_title}}</span>
																</div>
																<!--end::Text-->
															</div>
                                                            @endif
                                                            @endforeach
														</div>

														{{-- <div class="d-flex flex-center pt-7">
															<a href="#" class="btn btn-light-primary font-weight-bold text-center">See All</a>
														</div> --}}
														<!--end::Action-->
													</div>
													<!--end::Tabpane-->
													<!--begin::Tabpane-->
													<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
														<!--begin::Nav-->
														<div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-line-chart text-success"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">New report has been received</div>
																		<div class="text-muted">23 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-paper-plane text-danger"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">Finance report has been generated</div>
																		<div class="text-muted">25 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-user flaticon2-line- text-success"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">New order has been received</div>
																		<div class="text-muted">2 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-pin text-primary"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">New customer is registered</div>
																		<div class="text-muted">3 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-sms text-danger"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">Application has been approved</div>
																		<div class="text-muted">3 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-pie-chart-3 text-warning"></i>
																	</div>
																	<div class="navinavinavi-text">
																		<div class="font-weight-bold">New file has been uploaded</div>
																		<div class="text-muted">5 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon-pie-chart-1 text-info"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">New user feedback received</div>
																		<div class="text-muted">8 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-settings text-success"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">System reboot has been successfully completed</div>
																		<div class="text-muted">12 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon-safe-shield-protection text-primary"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">New order has been placed</div>
																		<div class="text-muted">15 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-notification text-primary"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">Company meeting canceled</div>
																		<div class="text-muted">19 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-fax text-success"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">New report has been received</div>
																		<div class="text-muted">23 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon-download-1 text-danger"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">Finance report has been generated</div>
																		<div class="text-muted">25 hrs ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon-security text-warning"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">New customer comment recieved</div>
																		<div class="text-muted">2 days ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
															<!--begin::Item-->
															<a href="#" class="navi-item">
																<div class="navi-link">
																	<div class="navi-icon mr-2">
																		<i class="flaticon2-analytics-1 text-success"></i>
																	</div>
																	<div class="navi-text">
																		<div class="font-weight-bold">New customer is registered</div>
																		<div class="text-muted">3 days ago</div>
																	</div>
																</div>
															</a>
															<!--end::Item-->
														</div>
														<!--end::Nav-->
													</div>
													<!--end::Tabpane-->
													<!--begin::Tabpane-->
													<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
														<!--begin::Nav-->
														<div class="d-flex flex-center text-center text-muted min-h-200px">
														<br />No new notifications.</div>
														<!--end::Nav-->
													</div>
													<!--end::Tabpane-->
												</div>
												<!--end::Content-->
											</form>
										</div>
										<!--end::Dropdown-->
									</div>
									<!--end::Notifications-->

									<!--begin::User-->
									<div class="topbar-item">
										<div class="btn btn-icon btn-hover-transparent-white w-sm-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
											<div class="d-flex flex-column text-right pr-sm-3">
												<span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-sm-inline">{{Auth::guard('organization')->user()->firstname}}</span>
												<span class="text-white font-weight-bolder font-size-sm d-none d-sm-inline">{{Auth::guard('organization')->user()->org_name}}</span>
											</div>
											<span class="symbol symbol-35">
												<span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30">{{strtoupper(substr(Auth::guard('organization')->user()->org_name, 0,1))}}</span>
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
											<a href="{{ route('organization_dashboard') }}" class="nav-link btn btn-clean {{$header=='home'?'active':''}}"  role="tab">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="nav-item mr-2">
											<a href="{{ route('organization_appearance') }}" class="nav-link btn btn-clean {{$header=='appearance'?'active':''}}"  role="tab">Settings</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="nav-item mr-2">
											<a href="{{ route('organization_classes') }}" class="nav-link btn btn-clean {{$header=='class'?'active':''}}"  role="tab">Classes</a>
										</li>
										<!--end::Item-->

										<li class="nav-item mr-3">
											<a href="{{ route('organization_users') }}" class="nav-link py-4 px-6  {{$header=='user'?'active':''}}" role="tab">Users</a>
										</li>
										{{-- <!--begin::Item-->
										<li class="nav-item mr-2">
											<a href="{{ route('organization_instuctors') }}" class="nav-link btn btn-clean {{$header=='instructor'?'active':''}}"  role="tab">Instructors</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="nav-item mr-2">
											<a href="{{ route('organization_learners') }}" class="nav-link btn btn-clean {{$header=='learner'?'active':''}}"  role="tab">Learners</a>
										</li>
										<!--end::Item--> --}}
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
