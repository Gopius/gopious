
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
											<form method="post" class="w-100">
												@csrf
												
												<div class="row w-100">
													@foreach ($poll->options as $option)
														<div class="col-sm-12">
															<label class="option">
															<span class="option-control">
															<span class="radio">
															<input type="radio" name="option" value="{{$option->poll_option_id}}" required />
															<span></span>
															</span>
															</span>
																<span class="option-label">
																	<span class="option-head">
																		<span class="option-title">
																		 {{$option->poll_option_title}}
																		</span>
																		
																	</span>
																	
																</span>
															</label>
														</div>
													@endforeach
												</div>
												<div class="text-right w-100 py-7 py-xxl-1">
													<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-9" id="kt_app_education_more_feeds_btn">Submit</button>
												</div>
											</form>
											<!--end::Symbol-->
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
					