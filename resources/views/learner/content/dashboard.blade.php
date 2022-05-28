					@csrf


					<!--begin::Content-->
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
												<div class="d-flex justify-content-between flex-column pt-4 h-100">
													<!--begin::Container-->
													<div class="pb-5">
														<!--begin::Header-->
														<div class="d-flex flex-column flex-center">
															<!--begin::Symbol-->
															<div class="image-input image-input-outline symbol symbol-circle" >
																<div class="image-input-wrapper symbol symbol-circle " style="background-image: url({{ asset('storage/'.Auth::guard('learner')->user()->learner_avatar_url) }}), url('/assets/media/users/blank.png')"></div>
															</div>
															<!--end::Symbol-->
															<!--begin::Username-->
															<a  class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{Auth::guard('learner')->user()->learner_name}}</a>
															<!--end::Username-->
															<!--begin::Info-->
															<div class="font-weight-bold text-dark-50 font-size-sm pb-6">Learner</div>
															<!--end::Info-->
														</div>
														<!--end::Header-->
														<!--begin::Body-->

														<!--end::Body-->
													</div>
													<!--eng::Container-->
													<!--begin::Footer-->
													<a href="{{ route('learner_profile') }}" class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Edit Profile">
														<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Edit Profile</button>
													</a>
													<!--end::Footer-->
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
													<span class="card-label font-weight-bolder text-dark">Classes</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">{{count($classes)}} Classes</span>
												</h3>

											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::Container-->
												<div>
													@foreach ($classes as $class)
														<!--begin::Item-->
													<div class="d-flex align-items-center mb-8">
														<!--begin::Symbol-->
														<div class="symbol symbol-45 symbol-light-primary mr-2">
															<span class="symbol-label font-size-h5 font-weight-bolder text-primary ">
																{{strtoupper(substr(explode(' ', $class->class->cat_title)[0]??'', 0,1))}}{{strtoupper(substr(explode(' ', $class->class->cat_title)[1]??'', 0,1))}}
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Info-->
														<div class="d-flex flex-column">
															<!--begin::Title-->
															<a href="{{ route('learner_class',[$class->class->cat_id]) }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$class->class->cat_title}}</a>
															<!--end::Title-->
															<!--begin::Text-->
															<span class="text-muted font-weight-bold font-size-sm pb-4">{{$class->class->cat_desc}}</span>
															<!--end::Text-->
															<!--begin::Action-->
															<div>
																<a href="{{ route('learner_class',[$class->class->cat_id]) }}" type="button" class="btn btn-light font-weight-bolder font-size-sm py-2">Enter Class</a>
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
										<!--begin::List Widget 9-->

										<!--end: List Widget 9-->


									</div>
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

														<div class="card-body">
															<!--begin::Top-->
															<div class="d-flex align-items-center">
																<!--begin::Symbol-->
																<div class="symbol symbol-40 symbol-light-success mr-5">
																	<div class="image-input image-input-outline symbol symbol-circle" >
																		<div class="image-input-wrapper symbol " style="background-image: url({{ asset('storage/'.Auth::guard('learner')->user()->learner_avatar_url) }}), url('/assets/media/users/blank.png'); width: 50px; height: 50px;"></div>
																	</div>
																</div>
																<!--end::Symbol-->
																<!--begin::Description-->
																<span class="text-muted font-weight-bold font-size-lg">Please share your thoughts, {{Auth::guard('learner')->user()->learner_name}}?</span>
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
                                                                <div class="form-group">
                                                                    <label for="select_a_class">Post to class
                                                                    <span class="text-danger">*</span></label>
                                                                    <select name="route" class="form-control" id="select_a_class" required>
                                                                        <option value selected disabled>--select a class --</option>
                                                                        @foreach ($classes as $class)
                                                                            <option value="{{route('learner_class_upload_post', [$class->class->cat_id])}}">{{$class->class->cat_title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
																{{-- <div class="mt-10 attachment_list">
																	<div class="row w-100">
																		<input onchange="validateFile(this)" type="file" name="post_attachment[]" required  accept="image/*,video/*"  class="form-control col-sm-11">
																		<i  onclick="removeAttachment(this)" class="la la-trash text-danger text-hover-primary icon-xl m-0 col-sm-1 btn"></i>
																	</div>
																</div> --}}
																<!--end::Toolbar-->
															{{-- </form> --}}
															<!--end::Form-->
														</div>
													</form>
													<!--end::Body-->
												</div>
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
																				<a href="{{ route('learner_class_course', [$course->category->cat_id, $course->course_id]) }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$course->course_title}}</a>
																				<!--end::Title-->
																				<!--begin::Text-->
																				<span class="text-muted font-weight-bold font-size-sm pb-4">{{$course->course_desc}}</span>
																				<!--end::Text-->
																				<!--begin::Action-->
																				<div>
																					<a href="{{ route('learner_class_course', [$course->category->cat_id, $course->course_id]) }}"><button type="button" class="btn btn-light font-weight-bolder font-size-sm py-2">Enter Course</button></a>
																				</div>
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
																			<a class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$poll->poll_title}}</a>
																			<span class="text-muted font-weight-bold d-block">by {{$poll->instructor->instr_name}}</span>
																		</div>
																		<div class="col-2">
																			@if (!$poll->end_date->isPast())
																			<a href="{{ route('learner_class_poll', [$poll->category->cat_id, $poll->poll_id]) }}" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<i class="fas fa-angle-double-right"></i>
																				</span>
																			</a>
																			@endif
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

																			<a href="{{ route('learner_class_assignment', [$assignment->course->category->cat_id, $assignment->ass_id]) }}" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<i class="fas fa-angle-double-right"></i>
																				</span>
																			</a>


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
																			<a href="{{ route('learner_class_quiz', [$quiz->course->category->cat_id, $quiz->quiz_id]) }}" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<i class="fas fa-angle-double-right"></i>
																				</span>
																			</a>


																		</div>
																	</div>
																	@endif
																	<!--end::Text-->
																	<!--begin::Action-->
																	<div class="d-flex align-items-center">

																		<input type="hidden" name="_clink" value="{{route('learner_class_upload_post_comment', [$post->class->cat_id])}}">
																		<input type="hidden" name="_llink" value="{{route('learner_class_upload_post_like', [$post->class->cat_id])}}">
																		<a onclick="displayComment(this)" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2
																		mr-2">
																		<i class="fas fa-comments"></i>
																		<span class="comment_post_count">{{$post->comments->count()}}</span></a>
																		<a onclick="likePost(this)" class="btn btn-sm btn-text-dark-50 btn-hover-icon-danger btn-hover-text-danger
																		{{isset($post->learner_like)?'bg-light-danger btn-icon-danger':''}}
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
																						<a class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">{{$comment->instructor->instr_name??$comment->learner->learner_name??''}}</a>
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

												<!--begin::Base Table Widget 10-->
												<!--begin::Base Table Widget 10-->

					                            <!--begin::Base Table Widget 10-->

												<!--begin::Base Table Widget 10-->
												<div class="card card-custom gutter-b">
													<!--begin::Header-->
													<div class="card-header border-0 pt-5">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label font-weight-bolder text-dark">Quizzes in the Class</span>
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
																							<span class="symbol-label font-size-h5 font-weight-bolder text-primary ">
																								{{strtoupper(substr(explode(' ', $quiz->quiz_title)[0]??'', 0,1))}}{{strtoupper(substr(explode(' ', $quiz->quiz_title)[1]??'', 0,1))}}
																							</span>
																						</div>
																					</td>
																					<td class="pl-0">
																						<a href="{{ route('learner_class_quiz', [$quiz->course->category->cat_id, $quiz->quiz_id]) }}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$quiz->quiz_title}}</a>
																						<span class="text-muted font-weight-bold d-block">by {{$quiz->instructor->instr_name}}</span>
																					</td>
																					<td></td>
																					<td class="text-left">
																						<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$quiz->start_date->diffForHumans()}}</span>
																						<span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
																					</td>
																					<td class="text-right pr-0">
																						<a href="{{ route('learner_class_quiz', [$quiz->course->category->cat_id, $quiz->quiz_id]) }}" class="btn btn-icon btn-light btn-sm">
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
																<div class="d-flex flex-center mb-12" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" >

																</div>
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
												<div class="card card-custom gutter-b">
													<!--begin::Header-->
													<div class="card-header border-0 pt-5">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label font-weight-bolder text-dark">Courses</span>
															<span class="text-muted mt-3 font-weight-bold font-size-sm">{{count($courses)}} total courses</span>
														</h3>

													</div>
													<!--end::Header-->
													<!--begin::Body-->
													<div class="card-body pt-2 pb-0 mt-3">
														<div class="tab-content mt-5" id="myTabTables2">
															<!--begin::Tap pane-->

															<!--end::Tap pane-->
															<!--begin::Tap pane-->

															<!--end::Tap pane-->
															<!--begin::Tap pane-->
															<div class="tab-pane fade active show" id="kt_tab_pane_2_3" role="tabpanel" aria-labelledby="kt_tab_pane_2_3">
																<!--begin::Table-->
																<div class="table-responsive">
																	<table class="table table-borderless table-vertical-center">
																		<thead>
																			<tr>
																				<th class="p-0" ></th>
																				<th class="p-0" ></th>
																				<th class="p-0" ></th>
																				<th class="p-0" ></th>
																			</tr>
																		</thead>
																		<tbody>
																			@foreach ($courses as $course)
																				<tr>
																					<td class="m-0 p-0">
																						<div class="symbol symbol-50 symbol-light mr-2">
																							<span class="symbol-label font-size-h5 font-weight-bolder text-primary bg-light-primary">

																								{{strtoupper(substr(explode(' ', $course->course_title)[0]??'', 0,1))}}{{strtoupper(substr(explode(' ', $course->course_title)[1]??'', 0,1))}}
																							</span>
																						</div>
																					</td>
																					<td class="pl-0">
																						<a href="{{ $course->block_count_viewed == 0 ? route('learner_class_course', [$course->category->cat_id, $course->course_id]): route('learner_class_course_learn', [$course->category->cat_id, $course->course_id])}}" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$course->course_title}}</a>
																						<span class="text-muted font-weight-bold d-block">in {{$course->category->cat_title}}</span>
																					</td>
																					<td class="">
																						<div>
																							<span class="text-muted font-weight-bold">{{ $course->block_count > 0 ? round( ($course->block_count_viewed/$course->block_count ) *100 ):0 }}%</span>
																							<span class="text-muted font-weight-bold float-right">Progress</span>
																						</div>
																						<div class="progress w-100">
																						    <div class="progress-bar bg-success" role="progressbar" style="width:  {{ $course->block_count > 0 ? ( ($course->block_count_viewed/$course->block_count ) *100 ):0 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
																						</div>
																					</td>

																					<td class="text-right pr-0">
																						<a href="{{ $course->block_count_viewed == 0 ? route('learner_class_course', [$course->category->cat_id, $course->course_id]): route('learner_class_course_learn', [$course->category->cat_id, $course->course_id])}}" class="btn btn-icon btn-light btn-sm">
																							<span class="svg-icon svg-icon-md svg-icon-success">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																										<polygon points="0 0 24 0 24 24 0 24"></polygon>
																										<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
																										<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
																									</g>
																								</svg>
																								<!--end::Svg Icon-->
																							</span>
																						</a>
																					</td>
																				</tr>
																			@endforeach


																		</tbody>
																	</table>
																	<a href="{{ route('learner_courses') }}" class="d-flex flex-center mb-12" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="View All Courses">
																		<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">View All</button>
																	</a>
																</div>
																<!--end::Table-->
															</div>
															<!--end::Tap pane-->
														</div>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Base Table Widget 2-->

												{{-- <div class="card card-custom gutter-b">
													<!--begin::Header-->
													<div class="card-header border-0 pt-5">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label font-weight-bolder text-dark">Assignments</span>
															<span class="text-muted mt-3 font-weight-bold font-size-sm">Total Assignment
															<span class="text-primary">{{count($assignments)}}</span></span>
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
																						<a href="{{ route('learner_class_assignment', [$assignment->course->category->cat_id, $assignment->ass_id]) }}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$assignment->ass_title}} </a>
																						<span class="text-muted font-weight-bold d-block">by {{$assignment->instructor->instr_name}} in {{$assignment->course_title}} </span>
																					</td>
																					<td></td>
																					<td class="text-left">
																						<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$assignment->end_date->diffForHumans()}}</span>
																						<span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
																					</td>
																					<td class="text-right pr-0">
																						<a href="{{ route('learner_class_assignment', [$assignment->course->category->cat_id, $assignment->ass_id]) }}" class="btn btn-icon btn-light btn-sm">
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
																	<div class="d-flex flex-center mb-12" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" >

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
												</div> --}}

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
					<!--end::Content-->
					<script type="text/javascript">
						var user_img_path = '{{ asset('storage/'.Auth::guard('learner')->user()->learner_avatar_url) }}';
					</script>
