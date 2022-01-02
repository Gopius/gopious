					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="container">
							<!--begin::Education-->
							<div class="">
								<!--begin::Aside-->
								<h1 class="text-dark-75  text-center m-20">
									Courses
								</h1>
								<!--end::Aside-->
								<!--begin::Content-->
								<div class="d-flex flex-wrap justify-content-between">
									
										
										
										<!--end::Forms Widget 3-->
										<!--begin::Forms Widget 4-->
										@foreach ($courses as $course)
											<div class="card card-custom gutter-b col-sm-4" style="margin-right:-2%;" >
												<!--begin::Body-->
												<div class="card-body ">
													<!--begin::Top-->
													<div class="d-flex align-items-center">
														<!--begin::Symbol-->
														
														<!--end::Symbol-->
														<!--begin::Info-->
														<div class="d-flex flex-column flex-grow-1">
															<span>
																<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$course->course_title}}</a>
																
															</span>
															<span class="text-muted font-weight-bold">in {{$course->cat_title}}</span>
															<span class="text-muted font-weight-bold">{{$course->block_count_viewed}} / {{$course->block_count}} </span>

														</div>
														<!--end::Info-->
														
													</div>
													<!--end::Top-->
													<!--begin::Bottom-->
													<div class="pt-4">
														<!--begin::Image-->
														<div class="bgi-no-repeat bgi-size-cover rounded min-h-120px" style="background-image: url({{asset('storage/'.$course->course_cover_img_url)}})"></div>
														<!--end::Image-->
														
														<div class="mt-10">
															<span class="text-muted font-weight-bold">{{ $course->block_count > 0 ? round( ($course->block_count_viewed/$course->block_count ) *100 ):0 }}%</span>
															<span class="text-muted font-weight-bold float-right">Progress</span>
														</div>
														<div class="progress w-100">
														    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $course->block_count > 0 ? ( ($course->block_count_viewed/$course->block_count ) *100 ):0 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
														<!--begin::Action-->
														<a href="{{ $course->block_count_viewed == 0 ? route('learner_class_course', [$course->category->cat_id, $course->course_id]): route('learner_class_course_learn', [$course->category->cat_id, $course->course_id])}}" class="my-5 float-right">
															<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">{{$course->block_count_viewed > 0 ? 'Continue': 'Start'}}</button>
														</a>
														
														<!--end::Action-->
													</div>
													<!--end::Bottom-->
													
												</div>
												<!--end::Body-->
											</div>
										@endforeach
										
										<!--end::Forms Widget 4-->
										<!--begin::Forms Widget 5-->
										
										
									
								</div>

								<!--end::Content-->
							</div>
							<!--end::Education-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->