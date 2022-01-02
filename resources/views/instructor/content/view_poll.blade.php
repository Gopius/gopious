
					<!--begin::Content-->
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<!--begin::Container-->
							<!--begin::Entry-->
							<div class="container">
								<!--begin::Education-->
								<div class="card card-custom gutter-b col-md-6 offset-md-3">
									<div class="card-body ">
										
										<!--begin::Top-->
										<div class="row mt-5">
											<h1 class="col-sm-12 text-dark-75 text-hover-primary mb-5 pl-0 font-size-lg font-weight-bolder" style="font-size: 32px;">{{$poll->poll_title}}</h1>
											
											<h1 class="col-sm-12 text-muted text-hover-primary mb-5 pl-0 font-size-lg font-weight-bolder" style="font-size: 18px;">Answer:</h1>
											<!--begin::Symbol-->
											
											<!--end::Symbol-->
											<table class="col-sm-12 text-center">
												<tbody>
													@foreach ($poll->options as $option)
														<tr>
															<td class="">
																<div class="text-left mb-3">
																	<span class="text-muted font-weight-bold">{{round(($option->votes/($poll->total_votes==0?1:$poll->total_votes))*100)}}%</span>
																	<span class="text-muted font-weight-bold float-right">{{$option->poll_option_title}}</span>
																</div>
																<div class="progress mb-5">
																    <div class="progress-bar bg-success" role="progressbar" style="width: {{($option->votes/($poll->total_votes==0?1:$poll->total_votes))*100}}%" aria-valuenow="{{($option->votes/($poll->total_votes==0?1:$poll->total_votes))*100}}" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
															</td>
														</tr>
													@endforeach
													
													
												</tbody>
											</table>



											<!--begin::Info-->
											
											<!--end::Info-->
											
										</div>

										<!--end::Top-->
										
										
									</div>
								</div>
								<!--end::Education-->
							</div>
							<!--end::Entry-->
							<!--end::Container-->
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--end::Content-->
					<!--end::Content-->
					