
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<!--begin::Entry-->
						<div class="container">
								<!--begin::Education-->
								<div class="d-flex flex-column flex-md-row">
									<!--begin::Aside-->
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
															<div class="d-flex align-items-center">
																<div class="image-input image-input-outline symbol " id="kt_user_avatar" style="background-image: url(assets/media/stock-600x400/img-70.jpg); width: 300px;height: 160px;">
																	<div class="image-input-wrapper symbol " style=" width: 300px;height: 160px;background-position: center; background-image: url({{ asset('storage/'.$class->cat_cover_image) }});"></div>

																</div>
															</div>
                                                            {{-- <form method="POST" enctype="multipart/form-data" action="{{ route('update_instructor_class', ['class'=>$class->cat_id]) }}">
                                                                @csrf
                                                                <div class="row">
                                                                    <input name="cat_cover_image" type="file" accept="image/*" class="form-control col-sm-8" required title="change class image">
                                                                    <button class="btn btn-primary col-sm-4"><i class="fas fa-upload"></i>upload</button>
                                                                </div>
                                                            </form> --}}
															<!--end::Image-->
															<!--begin::Title-->
															<a  class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{$class->cat_title}}</a>
															<!--end::Title-->
															<span class="font-weight-bolder label label-xl label-secondary label-inline px-3 py-5 min-w-45px mb-2">Class Code: {{$class->cat_code}}</span>
															<!--begin::Text-->
															<div class="font-weight-bold text-dark-50 font-size-sm pb-7">
																Teacher
															</div>
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
																			<!--begin::Svg Icon | path:/assets/media/svg/icons/Media/Equalizer.svg-->
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
																	<a  class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Total members</a>

																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-success label-inline px-3 py-5 min-w-45px">{{count($learners)}}</span>
																<!--end::label-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center pb-9">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light mr-4">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																			<!--begin::Svg Icon | path:/assets/media/svg/icons/Communication/Group.svg-->
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
																	<a  class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Instructors</a>

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
																			<!--begin::Svg Icon | path:/assets/media/svg/icons/Home/Globe.svg-->
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
																	<a class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Courses</a>

																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-primary label-inline py-5 min-w-45px">{{count($courses)}}</span>
																<!--end::label-->
															</div>
															<!--end::Item-->

														</div>
														<!--end::Body-->
													</div>
													<!--eng::Container-->

												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Nav Panel Widget 3-->
										<!--begin::List Widget 17-->
										<div class="card card-custom gutter-b">
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
													@foreach ($courses as $course)
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-8">
															<!--begin::Symbol-->
															<div class="symbol mr-5 pt-1">
																<div class="symbol-label min-w-65px min-h-100px" style="background-image: url({{ asset('storage/'.$course->course_cover_img_url) }})"></div>
															</div>
															<!--end::Symbol-->
															<!--begin::Info-->
															<div class="d-flex flex-column">
																<!--begin::Title-->
																<a class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$course->course_title}}</a>
																<!--end::Title-->
																<!--begin::Text-->
																<span class="text-muted font-weight-bold font-size-sm pb-4">{{$course->course_desc}}</span>
																<!--end::Text-->
																<!--begin::Action-->

																<!--end::Action-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Item-->
													@endforeach

												</div>
												<!--end::Container-->
												<div class="d-flex flex-center mr-5" id="kt_sticky_toolbar_chat_toggler_2" data-toggle="tooltip" title="" data-placement="right" >
													{{-- <a href="{{ route('instructor_course_new', [$class->cat_id]) }}">
														<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal">Create Course</button>
													</a> --}}
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 17-->
										<!--begin::List Widget 9-->
                                        <?php /* ?>

										<div class="card card-custom gutter-b">
											<!--begin::Header-->
											{{-- <div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Polls in Class</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">Total Polls
													<span class="text-primary">{{count($polls)}}</span></span>
												</h3>

											</div> --}}
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2 pb-0 mt-3">
												<div class="tab-content mt-5" id="myTabTables10">
													<!--begin::Tap pane-->
													<div class="tab-pane fade show active" id="kt_tab_pane_10_2" role="tabpanel" aria-labelledby="kt_tab_pane_10_2">
														<!--begin::Table-->
														<div class="table-responsive">
															<table class="table table-borderless table-vertical-center">
																<!--begin::Thead-->
																<thead>
																	<tr>
																		<th class="p-0 w-50px"></th>
																		<th class="p-0"></th>

																		<th class="p-0"></th>
																	</tr>
																</thead>
																<!--end::Thead-->
																<!--begin::Tbody-->
																<tbody>

																	@foreach ($polls as $poll)
																		<tr>
																			<td class="m-0 p-0">
																				<div class="symbol symbol-45 symbol-light-danger mr-2">
																					<span class="symbol-label font-size-h5 font-weight-bolder text-danger ">
																						{{strtoupper(substr(explode(' ', $poll->poll_title)[0]??'', 0,1))}}{{strtoupper(substr(explode(' ', $poll->poll_title)[1]??'', 0,1))}}
																					</span>
																				</div>
																			</td>
																			<td class="pl-0">
																				<a href="{{ route('instructor_poll_view', [$class->cat_id, $poll->poll_id]) }}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$poll->poll_title}}</a>
																				<span class="text-muted font-weight-bold d-block">by {{$poll->instructor->instr_name}}</span>
																			</td>


																			<td class="text-right pr-0">
																				<a href="{{ route('instructor_poll_view', [$class->cat_id, $poll->poll_id]) }}" class="btn btn-icon btn-light btn-sm">
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
															<div class="d-flex flex-center mr-5" id="kt_sticky_toolbar_chat_toggler_2" data-toggle="tooltip" title="" data-placement="right" >
																{{-- <a href="{{ route('instructor_poll_new', [$class->cat_id]) }}">
																	<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Create Poll</button>
																</a> --}}
															</div>
														</div>
														<!--end::Table-->
													</div>
													<!--end::Tap pane-->
													<!--begin::Tap pane-->

													<!--end::Tap pane-->
												</div>
											</div>
											<!--end::Body-->
										</div>
                                        <?php */ ?>

										<!--end: List Widget 9-->
									</div>
									<!--end::Aside-->
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-md-row-fluid ml-md-6 ml-lg-8">
										<div class="row">
											<div class="col-xxl-8">
												<!--begin::Forms Widget 2-->
												<div class="card card-custom gutter-b">
													<!--begin::Body-->
													<form id="kt_forms_widget_2_form" class=" ql-quil ql-quil-plain" onsubmit="return sendTimeLinePost(this);" method="post" enctype="multipart/form-data">
														@csrf
														<input type="hidden" name="_plink" value="{{route('instructor_class_upload_post', [$class->cat_id])}}">
														<input type="hidden" name="_clink" value="{{route('instructor_class_upload_post_comment', [$class->cat_id])}}">
														<input type="hidden" name="_llink" value="{{route('instructor_class_upload_post_like', [$class->cat_id])}}">
														<div class="card-body">
															<!--begin::Top-->
															<div class="d-flex align-items-center">
																<!--begin::Symbol-->
																<div class="image-input image-input-outline symbol symbol-circle" >
																	<div class="image-input-wrapper symbol " style="background-image: url({{ asset('storage/'.Auth::guard('instructor')->user()->instr_avatar_url) }}), url('/assets/media/users/blank.png'); width: 50px; height: 50px;"></div>
																</div>
																<!--end::Symbol-->
																<!--begin::Description-->
																<span class="text-muted font-weight-bold font-size-lg">&nbsp; Please share your thoughts, {{Auth::guard('instructor')->user()->instr_name}}?</span>
																<!--end::Description-->
															</div>
															<!--end::Top-->
															<!--begin::Form-->
															{{-- <form id="kt_forms_widget_2_form" class="pt-10 ql-quil ql-quil-plain"> --}}
																<!--begin::Editor-->
																<div id="kt_forms_widget_2_editor" class="pt-10"></div>
																<!--end::Editor-->
																<div class="border-top my-5"></div>
																<!--begin::Toolbar-->
																<div id="kt_forms_widget_2_editor_toolbar" class="ql-toolbar d-flex align-items-center justify-content-between">
																	<div class="mr-2">
																		<span class="ql-formats ml-0">
																			<select class="ql-size w-75px">
																				<option value="10px">Small</option>
																				<option selected="selected">Normal</option>
																				<option value="18px">Large</option>
																				<option value="32px">Huge</option>
																			</select>
																		</span>
																		<span class="ql-formats">
																			<button class="ql-bold"></button>
																			<button class="ql-italic"></button>
																			<button class="ql-underline"></button>
																			<button class="ql-strike"></button>
																			<button class="ql-image"></button>
																			<button class="ql-link"></button>
																			<button class="ql-clean"></button>
																		</span>
																	</div>
																	<div class="row mr-5">
																		<span class="btn btn-icon btn-sm btn-hover-icon-primary" onclick="addAttachment(this);">
																			<i class="flaticon2-clip-symbol icon-ms"></i>
																		</span>
																		<button type="submit" class="btn btn-icon btn-md btn-hover-icon-primary">
																			<i class="la la-send-o icon-3x"></i>
																		</button>
																	</div>
																</div>
																<div class="mt-10 attachment_list">
																	{{-- <div class="row w-100">
																		<input onchange="validateFile(this)" type="file" name="post_attachment[]" required  accept="image/*,video/*"  class="form-control col-sm-11">
																		<i  onclick="removeAttachment(this)" class="la la-trash text-danger text-hover-primary icon-xl m-0 col-sm-1 btn"></i>
																	</div> --}}
																</div>
																<!--end::Toolbar-->
															{{-- </form> --}}
															<!--end::Form-->
														</div>
													</form>
													<!--end::Body-->
												</div>
												<!--end::Forms Widget 2-->
												<!--begin::Forms Widget 3-->

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
																			<a class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$post->post_instructor->instructor->instr_name??$post->post_learner->learner->learner_name??''}}</a>
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
																		<div class=" mt-2 bgi-no-repeat bgi-size-cover rounded min-h-265px" style="background-image: url({{ asset('storage/'.$attachment->url) }})"></div>
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
																				<div class="symbol-label min-w-65px min-h-100px" style="background-image: url({{ asset('storage/'.$course->course_cover_img_url) }})"></div>
																			</div>
																			<!--end::Symbol-->
																			<!--begin::Info-->
																			<div class="d-flex flex-column">
																				<!--begin::Title-->
																				<a class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$course->course_title}}</a>
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
																			<a  class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$poll->poll_title}}</a>
																			<span class="text-muted font-weight-bold d-block">by {{$poll->instructor->instr_name}}</span>
																		</div>
																		<div class="col-2">
																			<a href="{{ route('instructor_poll_view', [$class->cat_id, $poll->poll_id]) }}" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<i class="fas fa-angle-double-right"></i>
																				</span>
																			</a>
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
																			<a  class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$assignment->ass_title}}</a>
																			<span class="text-muted font-weight-bold d-block">by {{$assignment->instructor->instr_name}}</span>

																		</div>
																		<div class="col-3" >
																			<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$assignment->end_date->diffForHumans()}}</span>
																			<span class="text-muted font-weight-bold d-block font-size-sm">Deadline</span>
																		</div>
																		<div class="col-2">
																			@if ($assignment->instr_no == Auth::guard('instructor')->user()->instr_id)
																				<a href="{{ route('instructor_assignment_submissions', [$class->cat_id, $assignment->ass_id]) }}" class="btn btn-icon btn-light btn-sm">
																					<span class="svg-icon svg-icon-md svg-icon-success">
																						<i class="fas fa-angle-double-right"></i>
																					</span>
																				</a>
																			@endif

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
																			<a class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$quiz->quiz_title}}</a>
																			<span class="text-muted font-weight-bold d-block">by {{$quiz->instructor->instr_name}}</span>

																		</div>
																		<div class="col-3" >
																			<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$quiz->start_date->diffForHumans()}}</span>
																			<span class="text-muted font-weight-bold d-block font-size-sm">Starts</span>
																		</div>
																		<div class="col-2">
																			@if ($quiz->instr_no == Auth::guard('instructor')->user()->instr_id)
																				<a href="{{ route('instructor_quiz_submissions', [$class->cat_id, $quiz->quiz_id]) }}" class="btn btn-icon btn-light btn-sm">
																					<span class="svg-icon svg-icon-md svg-icon-success">
																						<i class="fas fa-angle-double-right"></i>
																					</span>
																				</a>
																			@endif

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
																		{{isset($post->instructor_like)?'bg-light-danger btn-icon-danger':''}}
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
																						<a  class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">{{$comment->instructor->instr_name??$comment->learner->learner_name??''}}</a>
																						<span class="text-muted font-weight-normal flex-grow-1 font-size-sm">{{$comment->created_at->diffForHumans()}}</span>

																					</div>
																					<span class="text-dark-75 font-size-sm font-weight-normal pt-1">{{$comment->content}}
                                                                                        <a href="" class="delete float-right"><i class="fas fa-trash" style="color: red; margin-left:15px"></i></a>&nbsp;
                                                                                        <a href="" class="edit float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pen " style="color: #1bc5bd;"></i></a>

                                                                                    </span>
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
																<!--begin::Editor-->
																<form class="position-relative" method="post" onsubmit="return sendPostComment(this)">
																	<input type="hidden" name="post_no" value="{{$post->id}}">
																	<textarea id="kt_forms_widget_3_input" class="form-control border-0 p-0 pr-10 resize-none" rows="1" placeholder="Reply..." maxlength="255" name="content" required></textarea>
																	<div class="position-absolute top-0 right-0 mt-n1 mr-n2">

																		<button type="submit" class="btn btn-icon btn-md btn-hover-icon-primary">
																			<i class="la la-send-o icon-2x"></i>
																		</button>
																	</div>
																</form>
																<!--edit::Editor-->
															</div>
															<!--end::Body-->
														</div>
													@endforeach

												</span>
												{{ $posts->links('pagination.button') }}

											</div>
											<div class="col-xxl-4">

												<div class="card card-custom gutter-b pt-10">
					                                	<div class="col-sm-12 px-2 m-0 month-changer">
						                                    <i class="fa fas fa-chevron-circle-left float-left main-text-color  icon-xl text-primary" onclick="(()=>{document.querySelector('#previous-month').click()})()"> </i>
						                                    <i class="fa fas fa-chevron-circle-right float-right main-text-color  icon-xl text-primary" onclick="(()=>{document.querySelector('#next-month').click()})()"> </i>
					                                 	</div>
					                                <div id="myCalendarWrapper"></div>
					                            </div>

                                                <?php /* ?>

												<div class="card card-custom gutter-b">
													<!--begin::Header-->
													<div class="card-header border-0 pt-5">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label font-weight-bolder text-dark">Assignments</span>
															<span class="text-muted mt-3 font-weight-bold font-size-sm">Total Assignment
															<span class="text-primary">{{$assignments->count()}}</span></span>
														</h3>

													</div>
													<!--end::Header-->
													<!--begin::Body-->
													<div class="card-body pt-2 pb-0 mt-n3">
														<div class="tab-content mt-5" id="myTabTables10">
															<!--begin::Tap pane-->
															<div class="tab-pane fade show active" id="kt_tab_pane_10_2" role="tabpanel" aria-labelledby="kt_tab_pane_10_2">
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
																			@foreach ($assignments as $assignment)
																				<tr>
																					<td class="m-0 p-0">
																						<div class="symbol symbol-45 symbol-light-warning mr-2">
																							<span class="symbol-label font-size-h5 font-weight-bolder text-warning">
																								{{strtoupper(substr(explode(' ', $assignment->ass_title)[0]??'', 0,1))}}{{strtoupper(substr(explode(' ', $assignment->ass_title)[1]??'', 0,1))}}
																							</span>
																						</div>
																					</td>
																					<td class="pl-0">
																						<a class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$assignment->ass_title}} </a>
																						<span class="text-muted font-weight-bold d-block">by {{$assignment->instructor->instr_name}}</span> in {{$assignment->course_title}}
																					</td>
																					<td></td>
																					<td class="text-left">
																						<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$assignment->end_date->diffForHumans()}}</span>
																						<span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
																					</td>
																					<td class="text-right pr-0">
																						@if ($assignment->instr_no == Auth::guard('instructor')->user()->instr_id)
																							{{-- expr --}}

																						<a href="{{ route('instructor_assignment_submissions', [$class->cat_id, $assignment->ass_id]) }}" class="btn btn-icon btn-light btn-sm">
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
																						@endif
																					</td>
																				</tr>
																			@endforeach



																		</tbody>
																		<!--end::Tbody-->
																	</table>
																	<div class="d-flex flex-center mb-12" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" >
																		{{-- <a href="{{ route('instructor_assignment_new', [$class->cat_id]) }}">
																			<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Create Assignment</button>
																		</a> --}}
																	</div>
																</div>
																<!--end::Table-->
															</div>
															<!--end::Tap pane-->
															<!--begin::Tap pane-->

															<!--end::Tap pane-->
														</div>
													</div>
													<!--end::Body-->
												</div>
                                                <?php  */?>


												<!--end::List Widget 18-->

												<!--begin::Base Table Widget 10-->
                                                <?php /* ?>

												<div class="card card-custom gutter-b">
													<!--begin::Header-->
													<div class="card-header border-0 pt-5">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label font-weight-bolder text-dark">Quizzes in Class</span>
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
																			@foreach ($quizzes as $quiz)
																				<tr>
																					<td class="m-0 p-0">
																						<div class="symbol symbol-45 symbol-light-primary mr-2">
																							<span class="symbol-label font-size-h5 font-weight-bolder text-primary">
																								{{strtoupper(substr(explode(' ', $quiz->quiz_title)[0]??'', 0,1))}}{{strtoupper(substr(explode(' ', $quiz->quiz_title)[1]??'', 0,1))}}
																							</span>
																						</div>
																					</td>
																					<td class="pl-0">
																						<a class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$quiz->quiz_title}}</a>
																						<span class="text-muted font-weight-bold d-block">by {{$quiz->instructor->instr_name}}</span>
																					</td>
																					<td></td>
																					<td class="text-left">
																						<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$quiz->start_date->diffForHumans()}}</span>
																						<span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
																					</td>
																					<td class="text-right pr-0">
																						@if ($quiz->instr_no == Auth::guard('instructor')->user()->instr_id)
																							{{-- expr --}}

																						<a href="{{ route('instructor_quiz_submissions', [$class->cat_id, $quiz->quiz_id]) }}" class="btn btn-icon btn-light btn-sm">
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
																						@endif
																					</td>
																				</tr>
																			@endforeach


																		</tbody>
																		<!--end::Tbody-->
																	</table>
																</div>
																<!--end::Table-->
																<div class="d-flex flex-center mb-12" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" >
																	{{-- <a href="{{ route('instructor_quiz_new', [$class->cat_id]) }}">
																		<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal">Create Quiz</button>
																	</a> --}}
																</div>
															</div>
															<!--end::Tap pane-->
															<!--begin::Tap pane-->

															<!--end::Tap pane-->
														</div>
													</div>
													<!--end::Body-->
												</div>

                                                <?php  */?>

												<!--end::Base Table Widget 10-->
												<!--begin::Forms Widget 7-->




											</div>
										</div>
									</div>

									<!--end::Content-->
								</div>
								<!--end::Education-->
							</div>
						<!--end::Entry-->
						<!--end::Entry-->
					</div>
					<!--end::Content-->

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST">
                                  @csrf
                                  <input type="text" class="form-control" id="exampleFormControlInput1" >
                                </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>


					<script type="text/javascript">
						var user_img_path = '{{ asset('storage/'.Auth::guard('instructor')->user()->instr_avatar_url) }}';
					</script>
