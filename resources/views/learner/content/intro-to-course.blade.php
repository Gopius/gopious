					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="container">
							<!--begin::Education-->
							<div class="">
								<!--begin::Aside-->
								
								<!--end::Aside-->
								<!--begin::Content-->
								<div class="card card-custom gutter-b ">
									<!--begin::Body-->
									<!--begin::Dropdown-->
									
									<!--end::Dropdown-->
									<div class="card-body row">
										<!--begin::Top-->
										
										<!--end::Top-->
										<!--begin::Bottom-->
										<div class="pt-4 col-sm-5">
											<!--begin::Image-->
											<div class="bgi-no-repeat bgi-size-cover rounded min-h-235px" style="background-image: url({{asset('storage/'.$course->course_cover_img_url)}})"></div>
											<!--end::Image-->
											<!--begin::Symbol-->
											
										
											
											<!--end::Action-->
										</div>
										<div class="row col-sm-7">
											<!--begin::Symbol-->
											
											<!--end::Symbol-->
											<!--begin::Info-->
											<div class="d-flex flex-column flex-grow-1">
												<span>
													<h1 class="text-dark-75 text-hover-primary my-1 font-size-lg font-weight-bolder" style="font-size: 48px;">{{$course->course_title}}</h1>
													
												</span>
												<span class="text-muted font-weight-bold">in {{$class->cat_title}}</span>
												<div class="d-flex align-items-center  py-5">
												<div class="symbol symbol-60 symbol-circle symbol-success overflow-hidden mr-5">
														<span class="symbol-label">
															<img src="{{ asset('storage/'.$course->instructor->instr_avatar_url) }}" class=" w-100 align-self-end" alt="">
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Info-->
													<div class="d-flex flex-column flex-grow-1">
														<a class="text-dark-75 text-hover-primary mb-1 font-size-24 font-weight-bolder" style="font-size: 24px;">by {{$course->instructor->instr_name}}</a>
														<span class="text-dark-75 font-weight-bold mr-25">{{$course->course_desc}}</span>
													</div>
													<!--end::Info-->
												</div>
											</div>
											<!--end::Info-->
											
										</div>
										<!--end::Bottom-->
										
									</div>
									<!--end::Body-->
								</div>
								<div class="d-flex flex-column flex-md-row">
									<!--begin::Aside-->
									
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-md-row-fluid ">
										<div class="row">
											<div class="col-sm-8">
												
												<!--begin::Forms Widget 3-->
												<div class="card card-custom gutter-b">

													<!--begin::Body-->
													<div class="card-body">
														<h3 class="card-title align-items-start flex-row">
															<span class="card-label font-weight-bolder text-dark d-block">Courses Content</span>
															<span class="text-muted mt-3 font-weight-bold font-size-sm">{{count($course->chapters)}} sections</span>

															
														</h3>
														<div class="accordion accordion-toggle-arrow" id="accordionExample1">
														@foreach ($course->chapters as $key => $chapter)
															<div class="card">
														        <div class="card-header">
														            <div class="card-title text-dark-75" data-toggle="collapse" data-target="#collapseOne{{$key}}">
														                <span class="col-sm-8">{{$chapter->chapter_title}} </span>
														               
														            </div>
														        </div>

														        <div id="collapseOne{{$key}}" class="collapse {{$key==0?'show':''}}" data-parent="#accordionExample1">
														            <div class="card-body">
														            	@foreach ($chapter->blocks as $block)
																        	<div class="row m-2">
															                	<div class="col-sm-1">	
															                		<i class="fa far fa-play-circle">	</i>
															                	</div>
															                	<div class="col-sm-8">	
															                		{{$block->block_title}}
															                	</div>
															                	
															                </div>
																        @endforeach
														              
														            </div>
														        </div>
														    </div>
														@endforeach
														<a href="{{ route('learner_class_course_learn', [$class->cat_id, $course->course_id]) }}">
														    <button class="btn btn-primary font-weight-bolder font-size-sm py-3 mt-10 px-14 w-100 mx-auto">
														    	Start
															</button>
													    </a>
													</div>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Forms Widget 3-->
												
											</div>
											<div class="col-sm-4">
												
												<!--begin::Forms Widget 7-->
												
												

												<!--begin::Base Table Widget 2-->
												<div class="card card-custom gutter-b">
													<!--begin::Header-->
													<div class="card-header border-0 pt-5">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label font-weight-bolder text-dark">Similar Courses</span>
															<span class="text-muted mt-3 font-weight-bold font-size-sm">{{$courses->count()}} total courses</span>
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
																				
																				
																			</tr>
																		</thead>
																		<tbody>
																			@foreach ($courses as $m_course)
																				@continue($m_course->course_id == $course->course_id)
																				<tr>
																				<td class="m-0 p-0">
																					<div class="symbol symbol-50 symbol-light mr-2">
																						<span class="symbol-label">
																							<img src="{{asset('storage/'.$m_course->course_cover_img_url)}}" class="w-100 align-self-center" alt="">
																						</span>
																					</div>
																				</td>
																				<td class="pl-0">
																					<a href="{{route('learner_class_course_learn', [$m_course->cat_id, $m_course->course_id])}}" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$m_course->course_title}}</a>
																					<span class="text-muted font-weight-bold d-block">in {{$m_course->cat_title}}</span>
																				</td>
																				
																				
																				
																			</tr>
																			@endforeach
																			
																			
																		</tbody>
																	</table>
																	
																</div>
																<!--end::Table-->
															</div>
															<!--end::Tap pane-->
														</div>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Base Table Widget 2-->
												
												
												<!--end::List Widget 18-->
											</div>
										</div>
									</div>

									<!--end::Content-->
								</div>

								<!--end::Content-->
							</div>
							<!--end::Education-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->