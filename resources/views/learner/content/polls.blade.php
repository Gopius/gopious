					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="container">
							<!--begin::Education-->
							<div class="card card-custom gutter-b col-lg-6 offset-lg-3">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label font-weight-bolder text-dark">Polls from all Class</span>
										<span class="text-muted mt-3 font-weight-bold font-size-sm">Total Polls
										<span class="text-primary">{{count($polls)}}</span></span>
									</h3>

								</div>
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
															<th class="p-0"></th>
														</tr>
													</thead>
													<!--end::Thead-->
													<!--begin::Tbody-->
													<tbody>
														@foreach ($polls as $poll)
															<tr>
																<td class="pl-0 pt-0 py-5">
																	<div class="symbol symbol-45 symbol-light-success mr-2">
																		<span class="symbol-label">
																			<span class="svg-icon svg-icon-2x svg-icon-success">
																				<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Playlist1.svg-->
																				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																						<rect x="0" y="0" width="24" height="24" />
																						<path d="M8.97852058,18.8007059 C8.80029331,20.0396328 7.53473012,21 6,21 C4.34314575,21 3,19.8807119 3,18.5 C3,17.1192881 4.34314575,16 6,16 C6.35063542,16 6.68722107,16.0501285 7,16.1422548 L7,5.93171093 C7,5.41893942 7.31978104,4.96566617 7.78944063,4.81271925 L13.5394406,3.05418311 C14.2638626,2.81827161 15,3.38225531 15,4.1731748 C15,4.95474642 15,5.54092513 15,5.93171093 C15,6.51788965 14.4511634,6.89225606 14,7 C13.3508668,7.15502181 11.6842001,7.48835515 9,8 L9,18.5512168 C9,18.6409956 8.9927193,18.7241187 8.97852058,18.8007059 Z" fill="#000000" fill-rule="nonzero" />
																						<path d="M16,9 L20,9 C20.5522847,9 21,9.44771525 21,10 C21,10.5522847 20.5522847,11 20,11 L16,11 C15.4477153,11 15,10.5522847 15,10 C15,9.44771525 15.4477153,9 16,9 Z M14,13 L20,13 C20.5522847,13 21,13.4477153 21,14 C21,14.5522847 20.5522847,15 20,15 L14,15 C13.4477153,15 13,14.5522847 13,14 C13,13.4477153 13.4477153,13 14,13 Z M14,17 L20,17 C20.5522847,17 21,17.4477153 21,18 C21,18.5522847 20.5522847,19 20,19 L14,19 C13.4477153,19 13,18.5522847 13,18 C13,17.4477153 13.4477153,17 14,17 Z" fill="#000000" opacity="0.3" />
																					</g>
																				</svg>
																				<!--end::Svg Icon-->
																			</span>
																		</span>
																	</div>
																</td>
																<td class="pl-0">
																	<a class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$poll->poll_title}}</a>
																	
																</td>
																
																
																<td class="text-left">
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$poll->end_date->diffForHumans()}}</span>
																	<span class="text-muted font-weight-bold d-block font-size-sm">Deadline</span>
																</td>
																<td class="text-right pr-0">
																	<a href="{{ route('learner_class_poll', [$poll->category->cat_id, $poll->poll_id]) }}" class="btn btn-icon btn-light btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-success">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
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