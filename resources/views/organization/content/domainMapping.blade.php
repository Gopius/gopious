
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile Account Information-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-8">
										<!--begin::Card-->
										<form method="post">
										<div class="card card-custom">
											<!--begin::Header-->
											
												@csrf
												
												<div class="card-header py-3">
													<div class="card-title align-items-start flex-column">
														<h3 class="card-label font-weight-bolder text-success">Domain Mapping</h3>
														<span class="text-muted font-weight-bold font-size-sm mt-1">Choose or add Domain name</span>
													</div>
													<div class="card-toolbar">
														
														<button type="submit" class="btn btn-success mr-2">Save changes</button>
														
														<button type="reset" class="btn btn-secondary">Cancel</button>

														
													</div>
												</div>
											<!--end::Header-->
											<!--begin::Form-->
											
												<!--begin::Body-->
												<div class="card-body">
													
														<!--begin::Form Group-->
														
														<div class="col-sm-8">
															<!--begin::Form Group-->
															<div class="form-group mb-2">
																<label>Domain Name</label>
																<div class="input-group">
																	<input type="text" name="domain_name" value="{{Auth::guard('organization')->user()->setting->domain_name??''}}" class="form-control" placeholder="greenedu">
																	<div class="input-group-append">
																		<span class="input-group-text">.gopius.com</span>
																	</div>
																</div>
															</div>

															<hr class="bg-primary my-25">
															<h4 class="my-5">Or add your own domain name</h4>
															<div class="form-group mb-5">
																<label>Domain Name</label>
																<div class="input-group">
																	<input disabled="" type="text" class="form-control" value="{{Auth::guard('organization')->user()->setting->domain_name??''}}.gopius.com">
																	
																</div>
															</div>
															{{-- <p class="text-muted">Important:<br>
																Once you enter a domain here, it will be used immediately. 
																Still, you must create a proper CNAME DNS record on your own domain for the mapping to work. 
																A CNAME, or Canonical Name, record is an entry within the Domain Name System (DNS) 
																that specifies where a user can find your web pages, or any other URL. 
																You'll use the CNAME to associate your custom domain with your Gopius domain. 
																Each hosting service has slightly different ways to create CNAME records. 
																You need to have access to administer your domain; 
																otherwise you need the help of your administrator to complete this task. 
																When creating the CNAME, use your domain name on the NAME field and 'yourdomain.gopius.com' on DATA field.

																We strongly recommend you activate SSL for your custom domain. 
																Without SSL, credit card transactions and pages with financial info won't work. </p> --}}
															
															
														</div>
												</div>
												<!--end::Body-->
											
											<!--end::Form-->
										</div>
										</form>
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
					