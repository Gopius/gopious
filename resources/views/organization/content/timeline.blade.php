
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="container">
								<!--begin::Education-->
								<div class="d-flex flex-column flex-md-row">
									<!--begin::Aside-->
									<div class="flex-md-row-auto w-md-275px w-xl-325px">
										<!--begin::Nav Panel Widget 3-->
										<div class="card card-custom gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Wrapper-->
												<div class="d-flex justify-content-between flex-column h-100">
													<!--begin::Container-->
													<div class="h-100">
														<!--begin::Header-->
														<div class="d-flex flex-column flex-center">
															<!--begin::Image-->
															<div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100" style="background-image: url(assets/media/stock-600x400/img-70.jpg)"></div>
															<!--end::Image-->
															<!--begin::Title-->
															<a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{Auth::guard('organization')->user()->org_name}}</a>
															<!--end::Title-->
															<!--begin::Text-->
															<div class="font-weight-bold text-dark-50 font-size-sm pb-7">{{Auth::guard('organization')->user()->org_address}}</div>
															<!--end::Text-->
														</div>
														<!--end::Header-->
														<!--begin::Body-->
														<div class="pt-1">
															<!--begin::Item-->
															<div class="d-flex align-items-center pb-9">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light mr-4">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
																					<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
																					<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
																					<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column flex-grow-1">
																	<a href="{{ route('organization_classes') }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Classes</a>
																	<span class="text-muted font-weight-bold"> All classes</span>
																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-success label-inline px-3 py-5 min-w-45px">{{count($classes)}}</span>
																<!--end::label-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center pb-9">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light mr-4">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																					<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column flex-grow-1">
																	<a href="{{ route('organization_learners') }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Leaners</a>
																	<span class="text-muted font-weight-bold">All Learners</span>
																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-warning label-inline px-3 py-5 min-w-45px">{{count($learners)}}</span>
																<!--end::label-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center pb-9">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light mr-4">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																					<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column flex-grow-1">
																	<a href="{{ route('organization_instuctors') }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Instructors</a>
																	<span class="text-muted font-weight-bold">All Instructors</span>
																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-danger label-inline px-3 py-5 min-w-45px">{{count($instructors)}}</span>
																<!--end::label-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center pb-9">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light mr-4">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
																					<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column flex-grow-1">
																	<a href="{{ route('organization_timeline') }}#m_courses" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Courses</a>
																	<span class="text-muted font-weight-bold">All Courses</span>
																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-primary label-inline py-5 min-w-45px">{{count($courses)}}</span>
																<!--end::label-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															{{-- <div class="d-flex align-items-center pb-9">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light mr-4">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
																					<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column flex-grow-1">
																	<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Winners</a>
																	<span class="text-muted font-weight-bold">Achievements</span>
																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-info label-inline px-3 py-5 min-w-45px">209</span>
																<!--end::label-->
															</div> --}}
															<!--end::Item-->
														</div>
														<!--end::Body-->
													</div>
													<!--eng::Container-->
													<!--begin::Footer-->
													{{-- <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_2" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
														<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Contact School</button>
													</div> --}}
													<!--end::Footer-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Nav Panel Widget 3-->
										<!--begin::List Widget 17-->
										<div class="card card-custom gutter-b" id="m_courses">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Courses</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">{{count($courses)}} Total Courses</span>
												</h3>

											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::Container-->
												<div>
													@foreach ($courses as $k => $course)
														@break($k>=5)
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-8">
															<!--begin::Symbol-->

															<div class="symbol symbol-50 symbol-light mr-2">
																<span class="symbol-label font-size-h5 font-weight-bolder text-primary bg-light-primary">
																	{{strtoupper(substr(explode(' ', $course->course_title)[0]??'', 0,1))}}{{strtoupper(substr(explode(' ', $course->course_title)[1]??'', 0,1))}}
																</span>
															</div>

															<!--end::Symbol-->
															<!--begin::Info-->
															<div class="d-flex flex-column">
																<!--begin::Title-->
																<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$course->course_title}}</a>
																<!--end::Title-->
																<!--begin::Text-->
																<span class="text-muted font-weight-bold font-size-sm pb-4">{{$course->course_desc}}</span>
																<!--end::Text-->
																<!--begin::Action-->
																<div>
																	<button type="button" class="btn btn-light font-weight-bolder font-size-sm py-2">View More</button>
																</div>
																<!--end::Action-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Item-->
													@endforeach

												</div>
												<!--end::Container-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 17-->

									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-md-row-fluid ml-md-6 ml-lg-8">
										<div class="row">
											<div class="col-xxl-8">
												@if (count($posts) == 0)
													<span class="d-block w-100 mt-20 p-4 bg-light-primary text-primary font-weight-bold text-center"> No Post</span>
												@endif
												<span class="posts_list">
													@foreach ($posts as $post)
														<div class="card card-custom gutter-b">
															<!--begin::Body-->
															<div class="card-body">
																<!--begin::Header-->
																<div class="d-flex align-items-center">
																	<!--begin::Symbol-->
																	<div class="image-input image-input-outline " style="background-image: url('/assets/media/users/blank.png'); width: 40px; height: 40px;">
																		@php
																			$user_img_path = $post->post_instructor->instructor->instr_avatar_url??$post->post_learner->learner->learner_avatar_url??'';
																		@endphp
																		<div class="image-input-wrapper" style="background-image: url({{ asset('storage/'.$user_img_path) }}); width: 40px; height: 40px;"></div>
																	</div>
																	<!--end::Symbol-->
																	<!--begin::Info-->
																	<div class="d-flex flex-column flex-grow-1">
																		<span>
																			<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$post->post_instructor->instructor->instr_name??$post->post_learner->learner->learner_name??''}}</a>
																			posted in
																			<a class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder"> {{$post->class->cat_title}} </a>
																			class
																		</span>
																		<span class="text-muted font-weight-bold">{{$post->created_at->diffForHumans()}}</span>
																	</div>
																	<!--end::Info-->

																</div>
																<!--end::Header-->
																<!--begin::Body-->
																<div class="pt-5">
																	@foreach ($post->attachments as $attachment)
																		<div class=" mt-2 bgi-no-repeat bgi-size-cover rounded min-h-265px" style="background-image: url({{ asset('files/'.$attachment->url) }})"></div>
																	@endforeach
																	<!--begin::Text-->
																	<p class="text-dark-75 font-size-lg font-weight-normal mb-2"><?=$post->content?></p>
																	@if ($post->type == 1 && $post->coursePost !== null && $post->coursePost->course !== null)
																	<div class="row mx-4 p-4 my-5 bg-light-info rounded">
																		@php
																			$course = $post->coursePost->course;
																		@endphp
																		<div class="d-flex align-items-center mb-8">
																			<!--begin::Symbol-->
																			<div class="symbol mr-5 pt-1">
																				<div class="symbol-label min-w-65px min-h-100px" style="background-image: url({{ asset('files/'.$course->course_cover_img_url) }})"></div>
																			</div>
																			<!--end::Symbol-->
																			<!--begin::Info-->
																			<div class="d-flex flex-column">
																				<!--begin::Title-->
																				<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$course->course_title}}</a>
																				<!--end::Title-->
																				<!--begin::Text-->
																				<span class="text-muted font-weight-bold font-size-sm pb-4">{{$course->course_desc}}</span>
																				<!--end::Text-->
																				<!--begin::Action-->

																				<!--end::Action-->
																			</div>
																			<!--end::Info-->
																		</div>
																	</div>
																	@endif
																	@if ($post->type == 2 && $post->pollPost !== null && $post->pollPost->poll !== null)
																	<div class="row mx-4 p-4 my-5 bg-light-info rounded">
																		@php
																			$poll = $post->pollPost->poll;
																		@endphp
																		<div class=" col-2 symbol symbol-45 symbol-light-danger mr-2">
																			<span class="symbol-label font-size-h5 font-weight-bolder text-danger ">
																				{{strtoupper(substr($poll->poll_title, 0,1))}}
																			</span>
																		</div>
																		<div class="col-7">
																			<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$poll->poll_title}}</a>
																			<span class="text-muted font-weight-bold d-block">by {{$poll->instructor->instr_name}}</span>
																		</div>
																		<div class="col-2">

																		</div>
																	</div>
																	@endif
																	@if ($post->type == 3 && $post->assignmentPost !== null && $post->assignmentPost->assignment !== null)
																	<div class="row mx-4 p-4 my-5 bg-light-info rounded">
																		@php
																			$assignment = $post->assignmentPost->assignment;

																		@endphp
																		<div class=" col-2 symbol symbol-45 symbol-light-danger mr-2">
																			<span class="symbol-label font-size-h5 font-weight-bolder text-danger ">
																				{{strtoupper(substr($assignment->ass_title, 0,1))}}
																			</span>
																		</div>
																		<div class="col-4">
																			<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$assignment->ass_title}}</a>
																			<span class="text-muted font-weight-bold d-block">by {{$assignment->instructor->instr_name}}</span>

																		</div>
																		<div class="col-3" >
																			<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$assignment->end_date->diffForHumans()}}</span>
																			<span class="text-muted font-weight-bold d-block font-size-sm">Deadline</span>
																		</div>
																		<div class="col-2">




																		</div>
																	</div>
																	@endif
																	@if ($post->type == 4 && $post->quizPost !== null && $post->quizPost->quiz !== null)
																	<div class="row mx-4 p-4 my-5 bg-light-info rounded">
																		@php
																			$quiz = $post->quizPost->quiz;

																		@endphp
																		<div class="col-2 symbol symbol-45 symbol-light-primary mr-2">
																			<span class="symbol-label font-size-h5 font-weight-bolder text-primary">
																				{{strtoupper(substr($quiz->quiz_title, 0,1))}}
																			</span>
																		</div>
																		<div class="col-4">
																			<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$quiz->quiz_title}}</a>
																			<span class="text-muted font-weight-bold d-block">by {{$quiz->instructor->instr_name}}</span>

																		</div>
																		<div class="col-3" >
																			<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$quiz->start_date->diffForHumans()}}</span>
																			<span class="text-muted font-weight-bold d-block font-size-sm">Starts</span>
																		</div>
																		<div class="col-2">




																		</div>
																	</div>
																	@endif
																	<!--end::Text-->
																	<!--begin::Action-->
																	<div class="d-flex align-items-center">


																		<a onclick="displayComment(this)" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2
																		mr-2">
																		<i class="fas fa-comments"></i>
																		<span class="comment_post_count">{{$post->comments->count()}}</span></a>
																		<a onclick="likePost(this)" class="btn btn-sm btn-text-dark-50 btn-hover-icon-danger btn-hover-text-danger

																		bg-hover-light-danger font-weight-bolder rounded font-size-sm p-2">
																		<i class="fas fa-heart"></i>
																		<span>{{$post->likes->count()}}</span></a>
																	</div>
																	<!--end::Action-->
																	<span class="comment_list" style="display: none;">
																		@foreach ($post->comments->sortDesc() as $comment)
																			<!--begin::Item-->
																			<div class="d-flex py-5">
																				<!--begin::Symbol-->
																				<div class="image-input image-input-outline " style="background-image: url('/assets/media/users/blank.png'); width: 40px; height: 40px;">
																					@php
																						$user_img_path = $comment->instructor->instr_avatar_url??$comment->learner->learner_avatar_url??'';
																					@endphp
																					<div class="image-input-wrapper" style="background-image: url({{ asset('storage/'.$user_img_path) }}); width: 40px; height: 40px;"></div>
																				</div>
																				<!--end::Symbol-->
																				<!--begin::Info-->
																				<div class="d-flex flex-column flex-row-fluid">
																					<!--begin::Info-->
																					<div class="d-flex align-items-center flex-wrap">
																						<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">{{$comment->instructor->instr_name??$comment->learner->learner_name??''}}</a>
																						<span class="text-muted font-weight-normal flex-grow-1 font-size-sm">{{$comment->created_at->diffForHumans()}}</span>

																					</div>
																					<span class="text-dark-75 font-size-sm font-weight-normal pt-1">{{$comment->content}}</span>
																					<!--end::Info-->
																				</div>
																				<!--end::Info-->
																			</div>
																			<!--end::Item-->
																		@endforeach


																	</span>
																</div>
																<!--end::Body-->
																<!--begin::Separator-->
																<div class="separator separator-solid mt-2 mb-4"></div>
																<!--end::Separator-->

															</div>
															<!--end::Body-->
														</div>
													@endforeach

												</span>
												{{ $posts->links('pagination.button') }}
											</div>

											<div class="col-xxl-4">
												<!--begin::Base Table Widget 10-->
												<div class="card card-custom gutter-b">
													<!--begin::Header-->
													<div class="card-header border-0 pt-5">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label font-weight-bolder text-dark">Quizzes</span>
															@isset ($quizzes[0])
															 	<span class="text-muted mt-3 font-weight-bold font-size-sm">{{$quizzes[0]->quiz_title}} is starting
																<span class="text-primary">{{$quizzes[0]->start_date->diffForHumans()}} minutes</span></span>
															@endisset
														</h3>

													</div>
													<!--end::Header-->
													<!--begin::Body-->
													<div class="card-body pt-2 pb-0 mt-n3">
														<div class="tab-content mt-5" id="myTabTables10">
															<!--begin::Tap pane-->
															<div class="tab-pane fade  show active" id="kt_tab_pane_10_1" role="tabpanel" aria-labelledby="kt_tab_pane_10_1">
																<!--begin::Table-->
																<div class="table-responsive">
																	<table class="table table-borderless table-vertical-center">
																		<!--begin::Thead-->
																		<thead>
																			<tr>
																				<th class="p-0 w-50px"></th>
																				<th class="p-0 w-100 min-w-100px"></th>
																				<th class="p-0"></th>
																				<th class="p-0 min-w-130px w-100"></th>
																			</tr>
																		</thead>
																		<!--end::Thead-->
																		<!--begin::Tbody-->
																		<tbody>
																			@foreach ($quizzes as $k => $quiz)
																			@break($k>=5)
																				<tr>
																					<td class="m-0 p-0">
																						<div class="symbol symbol-45 symbol-light-primary mr-2">
																							<span class="symbol-label font-size-h5 font-weight-bolder text-primary ">
																								{{strtoupper(substr(explode(' ', $quiz->quiz_title)[0]??'', 0,1))}}{{strtoupper(substr(explode(' ', $quiz->quiz_title)[1]??'', 0,1))}}
																							</span>
																						</div>
																					</td>
																					<td class="pl-0">
																						<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$quiz->quiz_title}}</a>
																						<span class="text-muted font-weight-bold d-block">from {{$quiz->cat_title}}</span>
																					</td>
																					<td></td>
																					<td class="text-left">
																						<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$quiz->created_at->diffForHumans()}}</span>
																						<span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
																					</td>
																					<td class="text-right pr-0">

																						<a class="btn btn-icon btn-light btn-sm">
																							<span class="svg-icon svg-icon-md svg-icon-success">
																								<!--begin::Svg Icon | path:/assets/media/svg/icons/Navigation/Arrow-right.svg-->
																								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																										<polygon points="0 0 24 0 24 24 0 24" />
																										<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																										<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																									</g>
																								</svg>
																								<!--end::Svg Icon-->
																							</span>
																						</a>

																					</td>
																				</tr>
																			@endforeach


																		</tbody>
																		<!--end::Tbody-->
																	</table>
																</div>
																<!--end::Table-->
																{{-- <div class="d-flex flex-center mb-12" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" >
																	<a href="{{ route('instructor_quiz_new', [$class->cat_id]) }}">
																		<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal">Create Quiz</button>
																	</a>
																</div> --}}
															</div>
															<!--end::Tap pane-->
															<!--begin::Tap pane-->

															<!--end::Tap pane-->
														</div>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Base Table Widget 10-->
												<!--begin::Forms Widget 7-->



												<!--begin::Base Table Widget 2-->

												<!--end::Base Table Widget 2-->



												<!--end::List Widget 18-->
											</div>
										</div>
									</div>

									<!--end::Content-->
								</div>
								<!--end::Education-->
							</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--end::Content-->
					<script type="text/javascript">
						const displayComment = (target)=>{
						    var comment_list = target.parentElement.parentElement.querySelector('.comment_list');
						    if (comment_list.style.display == 'block') {
						        comment_list.style.display = 'none';
						        target.classList.remove('bg-light-primary');
						    }else{
						        comment_list.style.display = 'block'
						        target.classList.add('bg-light-primary');
						    }
						}
					</script>
