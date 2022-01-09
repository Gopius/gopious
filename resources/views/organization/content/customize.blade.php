
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
										<form class="form" method="post">
										<div class="card card-custom">
											<!--begin::Header-->
											<div class="card-header py-3">
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder text-success">Customize</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1">Change how your Site looks</span>
												</div>
												<div class="card-toolbar">

													<button type="submit" class="btn btn-success mr-2">Save changes</button>

													<button type="reset" class="btn btn-secondary">Reset</button>


												</div>

											</div>
                                            <div class="row">
                                                @csrf

												<!--begin::Body-->
												<div class="card-body col-lg-6 col-md-6 col-sm-12">

														<!--begin::Form Group-->

														{{-- <div class="col-sm-6"> --}}
															<!--begin::Form Group-->
															{{-- <div class="form-group">
															   <label>Theme</label>
															   <select name="theme" class="form-control form-control-solid">
																   	<option value="0">GoPius Green (Active)</option>
																   	<option value="1">GoPius Dark</option>
															   </select>
															</div> --}}

															<div class="form-group">
															   <label>Color/Background:</label>
															    <input id="textColor" name="color" type="color" value="{{Auth::guard('organization')->user()->setting->color??''}}" class="form-control" />
            													<span class="form-text text-muted">Please choose a color</span>
															</div>
															<div class="form-group">
															   <label>Custom CSS:</label>
															   <textarea maxlength="65535" type="text" name="css" rows="10" class="form-control form-control-solid">{{Auth::guard('organization')->user()->setting->css??''}}</textarea>

															</div>
															<div class="form-group">
															   <label>Custom JS:</label>
															   <textarea maxlength="65535" name="js" type="text" rows="10" class="form-control form-control-solid">{{Auth::guard('organization')->user()->setting->js??''}}</textarea>

															</div>
                                            </div>

                                              <!--begin::User-->
											<div class="card-body float-right col-lg-6 col-md-6 col-sm-12">
                                                <label for="" class="favicon_label" >Enter your logo</label>

												<div class="d-flex align-items-center " >
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
                                                <label for="" class="favicon_label mt-8">Enter your favicon</label><br>

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
                                            </div>
											<!--end::Header-->
											<!--begin::Form-->


                                                            {{-- <div class="card-body pt-4">

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
                                                                <!--end::User--> --}}

														</div>
												</div>
                                                 <!--begin::User-->

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
