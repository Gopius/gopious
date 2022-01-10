
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile Account Information-->
								<form method="post" enctype="multipart/form-data" >
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-400px" id="kt_profile_aside">
										<!--begin::Profile Card-->
										<div class="card card-custom card-stretch">
											<!--begin::Body-->
											<div class="card-body pt-4">

												<!--begin::User-->
												<div class="d-flex align-items-center">
													<div class="image-input image-input-outline symbol " id="kt_user_avatar" style="background-image: url({{asset(!Auth::guard('organization')->user()->org_avatar_url?'assets/media/stock-600x400/img-70.jpg':'')}}); width: 100%;height: 160px;">
														<div class="image-input-wrapper symbol " style="background-image: url({{ asset('storage/'.Auth::guard('organization')->user()->org_avatar_url) }}); width: 100%;height: 160px;background-position: center"></div>
                                                        <!-- <--"background-size: contain;"-->
														<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
															<i class="fa fa-pen icon-sm text-muted"></i>
															<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
															<input type="hidden" name="profile_avatar_remove">
														</label>
														<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
														<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
													</div>
												</div>
												<div class="form-text text-muted ">Allowed file types: png, jpg, jpeg.</div>
												<!--end::User-->
												<!--begin::Contact-->
												<div class="py-3">
													<div class="d-flex align-items-center justify-content-between mb-2">


													</div>

												</div>
												<!--end::Contact-->
												<!--begin::Nav-->
												<div class="navi navi-bold navi-hover navi-active navi-link-rounded">

													<div class="d-flex align-items-center">
														<!--begin::Symbol-->
														<div class="symbol  symbol-40 symbol-light mr-3 mb-3 flex-shrink-0">
															<div class="symbol-label">

																<span class="navi-icon">
																	<i class="flaticon2-phone"></i>
																</span>


															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->

														<div>
															<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">{{Auth::guard('organization')->user()->phone}} </a>
															<div class="font-size-sm text-muted font-weight-bold mt-1">Phone Number</div>
														</div>
														<!--end::Title-->
													</div>
													<div class="d-flex align-items-center">
														<!--begin::Symbol-->
														<div class="symbol  symbol-40 symbol-light mr-3 mb-3 flex-shrink-0">
															<div class="symbol-label">

																<span class="navi-icon">
																	<i class="flaticon-email"></i>
																</span>


															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">{{Auth::guard('organization')->user()->user_email}} </a>
															<div class="font-size-sm text-muted font-weight-bold mt-1">Email Address</div>
														</div>
														<!--end::Title-->
													</div>
													<div class="d-flex align-items-center">
														<!--begin::Symbol-->
														<div class="symbol  symbol-40 symbol-light mr-3 mb-3 flex-shrink-0">
															<div class="symbol-label">

																<span class="navi-icon">
																	<i class="flaticon-location"></i>
																</span>


															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">{{Auth::guard('organization')->user()->state->name}}, {{Auth::guard('organization')->user()->state->country->name}} </a>
															<div class="font-size-sm text-muted font-weight-bold mt-1">Location</div>
														</div>
														<!--end::Title-->
													</div>

												</div>
												<!--end::Nav-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Profile Card-->
									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-8">
										<!--begin::Card-->

										<div class="card card-custom">
											<!--begin::Header-->

											<div class="card-header py-3">
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder text-success">Account Information</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1">Change your account settings</span>
												</div>
												<div class="card-toolbar">
													<button type="submit" class="btn btn-success mr-2">Save Changes</button>

												</div>
											</div>
											<!--end::Header-->
											<!--begin::Form-->

												<div class="card-body">
													<!--begin::Heading-->

													<!--begin::Form Group-->
													<div class="form-group">
													   <label>Organization Name:</label>
													   <input maxlength="255" type="text" class="form-control form-control-solid" value="{{Auth::guard('organization')->user()->org_name}}" disabled />
													   <span class="form-text text-muted">Please enter your Orgnization name</span>
													 </div>
													<!--begin::Form Group-->
													<div class="form-group">
													   <label>Organization Email:</label>
													   <input maxlength="255" type="email" disabled value="{{Auth::guard('organization')->user()->email}}" class="form-control form-control-solid" />
													   <span class="form-text text-muted">Please enter your Orgnization Email</span>
													</div>
													<div class="row mb-5">
														<div class="col-sm-6">
															<div class="form-group">
															   <label>Site Description</label>
															   <textarea maxlength="255" name="about_org" style="height: 150px" class="form-control form-control-solid" >{{Auth::guard('organization')->user()->about_org}}</textarea>

															   <span class="form-text text-muted">Please enter your Orgnization Description ( maximum limit 100 words )</span>
															</div>

															<div class="image-input image-input-outline mr-5" id="kt_long_logo" style=" width: 100%; height: 60px;">
																<div class="image-input-wrapper" id="kt_user_avatar_logo" style="background-image: url({{ asset('storage/'.Auth::guard('organization')->user()->org_long_icon_url) }}); width: 100%; height: 60px;background-position: center; background-size: contain;">

																</div>
																<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
																	<i class="fa fa-pen icon-sm text-muted"></i>
																	<input type="file" name="profile_avatar_logo" accept=".png, .jpg, .jpeg">
																	<input type="hidden" name="profile_avatar_remove_logo">
																</label>
																<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
																<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
															</div><br>
															<div class="image-input image-input-outline ml-10 mt-5" id="kt_square_logo" style="width: 60px; height: 60px;">
																<div class="image-input-wrapper" style="background-image: url({{ asset('storage/'.Auth::guard('organization')->user()->org_square_icon_url) }}); width: 60px; height: 60px;background-position: center; background-size: contain;">

                                                                 <img src="https://gopius.com/wp-content/uploads/2021/07/cropped-Gopius-LOGO-Blue.png"  style="width: 46px; height: 42px; opacity: 0.1; margin:5px,0,0,5px" alt="">
                                                            </div>
																<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
																	<i class="fa fa-pen icon-sm text-muted"></i>
																	<input type="file" name="profile_avatar_icon" accept=".png, .jpg, .jpeg">
																	<input type="hidden" name="profile_avatar_remove_icon">
																</label>
																<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
																<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
															   <label>Organization Address:</label>
															   <input maxlength="255" type="email" class="form-control form-control-solid" disabled value="{{Auth::guard('organization')->user()->org_address}}" />
															   <span class="form-text text-muted">Please enter your Orgnization Address</span>
															</div>
															<div class="form-group">
															   <label>Company Phone number:</label>
															   <input maxlength="255" type="text" name="org_phone" class="form-control form-control-solid" value="{{Auth::guard('organization')->user()->org_phone}}" />
															   <span class="form-text text-muted">Please enter your company phone number</span>
															</div>
															<div class="form-group">
															   <label>Homepage View:</label>
															   <input maxlength="255" type="text" name="homepage" class="form-control form-control-solid" value="{{Auth::guard('organization')->user()->homepage}}" />
															   <span class="form-text text-muted">Please enter your Homepage View</span>
															</div>
															<div class="form-group">
															   <label>Website:</label>
															   <input maxlength="255" type="text" name="website" class="form-control form-control-solid" value="{{Auth::guard('organization')->user()->website}}" />
															   <span class="form-text text-muted">Please enter your website</span>
															</div>
														</div>
													</div>
													<div class="col-sm-6 my-20">

															<label class="mb-10">Social Media Links</label>
														<div class="input-group input-group-solid mb-4">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="socicon-facebook"></i>
																</span>
															</div>
															<input maxlength="255" type="text" name="fb" class="form-control form-control-solid" value="{{Auth::guard('organization')->user()->fb}}" placeholder="Facebook Link">
														</div>
														<div class="input-group input-group-solid mb-4">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="socicon-twitter"></i>
																</span>
															</div>
															<input maxlength="255" type="text" name="twitter" class="form-control form-control-solid" value="{{Auth::guard('organization')->user()->twitter}}" placeholder="@twitter username">
														</div>
														<div class="input-group input-group-solid mb-4">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="socicon-linkedin"></i>
																</span>
															</div>
															<input maxlength="255" type="text" name="linkedin" class="form-control form-control-solid" value="{{Auth::guard('organization')->user()->linkedin}}" placeholder="LinkedIn Link">
														</div>
													</div>
													@csrf

													<!--begin::Form Group-->

													<!--begin::Form Group-->

													<!--begin::Form Group-->
													<div class="form-group text-center">

															<button type="button" class="btn btn-light-danger font-weight-bold btn-sm">Deactivate your account ?</button>
														</div>
													</div>
												</div>

											<!--end::Form-->
										</div>

										<!--end::Card-->
									</div>
									<!--end::Content-->
								</div>
								</form>
								<!--end::Profile Account Information-->
							</div>
							<!--end::Container-->
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--end::Content-->
