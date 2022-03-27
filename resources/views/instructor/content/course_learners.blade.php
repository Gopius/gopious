					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="container">
							<!--begin::Education-->
							<div class="card card-custom gutter-b">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label font-weight-bolder text-dark">{{$m_course->course_title}}</span>

										<span class="text-muted mt-3 font-weight-bold font-size-sm">Total Learners
										<span class="text-primary">{{$learners->count()}}</span></span>
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

															<th class="p-0 w-50 min-w-50px"></th>
															<th></th>


														</tr>
													</thead>
													<!--end::Thead-->
													<!--begin::Tbody-->
													<tbody>
														@foreach ($learners as $learner)
															<tr>
																<td>
																	{{$learner->learner_name}}
																</td>


																<td class="pl-0">
																	<div class="mt-10">
																		<span class="text-muted font-weight-bold">{{ $learner->block_count > 0 ? round( ($learner->block_count_viewed/$learner->block_count ) *100 ):0 }}%</span>
																		<span class="text-muted font-weight-bold float-right">{{$learner->block_count_viewed}} / {{$learner->block_count}} </span>
																	</div>
																	<div class="progress w-100">
																	    <div class="progress-bar " role="progressbar" style="background-color: green !important; width: {{ $learner->block_count > 0 ? ( ($learner->block_count_viewed/$learner->block_count ) *100 ):0 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>

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
								<!--end::Body-->
							</div>
							<!--end::Education-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
