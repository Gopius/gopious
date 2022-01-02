
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile Account Information-->
								<div class="row">
									<!--begin::Aside-->
									<div class="flex-md-row-auto col-sm-4">
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
																<div class="image-input-wrapper symbol symbol-circle " style="background-image: url({{ asset('storage/'.$user->learner_avatar_url) }}), url('/assets/media/users/blank.png')"></div>
															</div>
															<!--end::Symbol-->
															<!--begin::Username-->
															<a  class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{$user->learner_name}}</a>
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
													<span class="text-muted mt-3 font-weight-bold font-size-sm">{{$user->classes->count()}} Classes</span>
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::Container-->
												<div>
													@foreach ($user->classes as $class)
														<!--begin::Item-->
													<div class="d-flex align-items-center mb-8">
														<!--begin::Symbol-->
														<div class="symbol symbol-45 symbol-light-primary mr-2">
															<span class="symbol-label font-size-h5 font-weight-bolder text-primary ">
																{{strtoupper(substr(explode(' ', $class->cat_title)[0]??'', 0,1))}}{{strtoupper(substr(explode(' ', $class->cat_title)[1]??'', 0,1))}}
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Info-->
														<div class="d-flex flex-column">
															<!--begin::Title-->
															<a class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$class->cat_title}}</a>
															<!--end::Title-->
															<!--begin::Text-->
															
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
									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid col-sm-8">
										<!--begin::Card-->
										<div class="card card-custom">
											<!--begin::Header-->
											<div class="card-header py-3">
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder ">View Learners</h3>
													
												</div>
												
											</div>
											<!--end::Header-->
											<!--begin::Form-->
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
																		<!--begin::Thead-->
																		<thead>
																			<tr>
																				<th class="p-0 w-50px"></th>
																				<th class="p-0 w-100 min-w-100px"></th>
																				<th class="p-0 w-100 min-w-100px"></th>
																				<th class="p-0 w-100 min-w-100px"></th>

																				
																				
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
																						<a href="{{ route('instructor_assignment_submissions', [$assignment->cat_no, $assignment->ass_id]) }}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$assignment->ass_title}} </a>
																						<span class="text-muted font-weight-bold d-block">by {{$assignment->instructor->instr_name}}</span> in {{$assignment->course_title}}
																					</td>
																					<td>
																						@isset ($assignment->a_l_id)
																						    <a href="{{ route('instructor_view_assignment_submission', [$assignment->cat_no, $assignment->ass_no, $assignment->a_l_id]) }}">
																						    	<div class="btn btn-{{$assignment->status==0?'warning':($assignment->status==1 ? 'success':'danger') }}">
																						    		{{$assignment->status==0?'Awaiting Assesment':($assignment->status==1 ? 'Correct':'Wrong') }}
																							    	 
																							    	
																							    </div>
																						    </a>
																						@else
																							<div class="text-primary border p-2">
																								No Submission
																							</div>
																						@endisset
																					</td>
																					<td class="text-left">
																						<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$assignment->end_date->diffForHumans()}}</span>
																						<span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
																					</td>
																					
																				</tr>
																			@endforeach
																			
																			
																			
																		</tbody>
																		<!--end::Tbody-->
																	</table>
																	
																</div>
															</div>
														</div>
													</div>
													<div class="card">
														<div class="card-header" id="headingTwo6">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo6">
																<i class="flaticon2-chart"></i> Quizzes
															</div>
														</div>
														<div id="collapseTwo6" class="collapse" data-parent="#accordionExample6">
															<div class="card-body">
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
																				<th class="p-0 w-100 min-w-100px"></th>
																				<th class="p-0"></th>
																				
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
																						@isset ($quiz->learner_no)
																						 	<a href="{{ route('instructor_view_quiz_submission', [$quiz->cat_no, $quiz->quiz_id, $quiz->learner_no])}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
																						@else
																							<a class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
																						@endisset
																						{{$quiz->quiz_title}}</a>
																						<span class="text-muted font-weight-bold d-block">by {{$quiz->instr_name}}</span>
																					</td>
																					<td>
																						@isset ($quiz->learner_no)
																						    <label style="border-radius:0;" class="w-100 label label-lg label-light-success" >
																								{{
																									round(($quiz->correct_option/$quiz->questions->count())*100, 2) .'%'
																								}}
																								{{($quiz->unattented_option>0)?'('.$quiz->unattented_option.' unattented)' : ''}}
																								
																							</label>
																						@else
																							<div class="text-primary border p-2">
																								No Submission
																							</div>
																						@endisset
																						
																						{{-- {{+'% '+ ( ($quiz->unattented_option>0)?'('+$quiz->unattented_option+' unattented)' : '')}} --}}
																					</td>
																					<td class="text-left">
																						<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$quiz->start_date}}</span>
																						<span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
																					</td>
																					
																				</tr>
																			@endforeach
																			
																			
																		</tbody>
																		<!--end::Tbody-->
																	</table>
																</div>
																<!--end::Table-->
																
															</div>
															<!--end::Tap pane-->
															<!--begin::Tap pane-->
															
															<!--end::Tap pane-->
														</div>
													</div>
															</div>
														</div>
													</div>
													
												</div>
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
					