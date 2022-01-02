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


											<div class="card card-custom">
												<!--begin::Header-->
												<div class="card-header py-3">
													<div class="card-title align-items-start flex-column">
														<h3 class="card-label font-weight-bolder text-success">Edit Profile</h3>
														<span class="text-muted font-weight-bold font-size-sm mt-1">Change your profile details</span>
													</div>
													<div class="card-toolbar">
														<button type="submit" class="btn btn-success mr-2">Save Changes</button>

													</div>
												</div>
												<!--end::Header-->
												<!--begin::Form-->

													<!--begin::Body-->
													<div class="card-body">
														<div class="col-sm-8 float-left">
															@if ($errors->any())
															    <div class="alert alert-danger">
															        <ul>
															            @foreach ($errors->all() as $error)
															                <li>{{ $error }}</li>
															            @endforeach
															        </ul>
															    </div>
															@endif
															<!--begin::Form Group-->
                                                            <form method="post" enctype="multipart/form-data" >
                                                                @csrf
                                                                <div class="form-group">
                                                                <label>First Name:</label>
                                                                <input name="firstname" type="text" class="form-control form-control-solid"
                                                                value="{{Auth::guard('organization')->user()->firstname}}" maxlength="255" required />
                                                                <span class="form-text text-muted">Please enter your first name</span>
                                                                </div>
                                                            </form>
                                                            <form method="post" enctype="multipart/form-data" >
                                                                @csrf
                                                                <div class="form-group">
                                                                <label>Last Name:</label>
                                                                <input name="lastname" type="text" class="form-control form-control-solid"
                                                                value="{{Auth::guard('organization')->user()->lastname}}" maxlength="255" required />
                                                                <span class="form-text text-muted">Please enter your last name</span>
                                                                </div>
                                                            </form>

															<div class="row">
                                                                <form method="post" class="col-sm-6" enctype="multipart/form-data" >
                                                                    @csrf
                                                                    <div class="form-group ">
                                                                    <label>Phone:</label>
                                                                    <input name="phone" type="text" class="form-control form-control-solid"
                                                                    value="{{Auth::guard('organization')->user()->phone}}" maxlength="255" required />
                                                                    <span class="form-text text-muted">Please enter your Phone number</span>
                                                                    </div>
                                                                </form>
                                                                <form method="post" class="col-sm-6" enctype="multipart/form-data" >
                                                                    @csrf
                                                                    <div class="form-group ">
                                                                    <label>Email:</label>
                                                                    <input disabled type="email" class="form-control form-control-solid" value="{{Auth::guard('organization')->user()->user_email}}" maxlength="255" required />
                                                                    <span class="form-text text-muted">Please enter your email</span>
                                                                    </div>
                                                                </form>
                                                                <form method="post" class="col-sm-6" enctype="multipart/form-data" >
                                                                    @csrf
                                                                    <div class="form-group ">
                                                                        <label>New Password:</label>
                                                                        <input name="password" type="password" class="form-control form-control-solid" value="{{Auth::guard('organization')->user()->user_email}}" maxlength="255" required />
                                                                        <i class="fa fa-lock" onclick=""></i>
                                                                        <span class="form-text text-muted">Please enter a password</span>
                                                                    </div>
                                                                </form>
															</div>

														</div>
														<div class="col-sm-4 float-left">
                                                            <form method="post" enctype="multipart/form-data" >
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <span class="col-sm-12 col-form-label">Upload Profile Picture</span>
                                                                    <div class="col-lg-9 offset-lg-3 col-xl-6 offset-xl-6">
                                                                        <div class="image-input image-input-outline symbol symbol-circle" id="kt_user_avatar" >
                                                                            <div class="image-input-wrapper symbol symbol-circle " style="background-image: url({{ asset('storage/'.Auth::guard('organization')->user()->user_avatar_url) }}),  url('/assets/media/users/blank.png'); background-position: center;"></div>
                                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                                <input type="file" name="user_avatar_url" accept=".png, .jpg, .jpeg">
                                                                                <input type="hidden" name="profile_avatar_remove">
                                                                            </label>
                                                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                            </span>
                                                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                                        <div class="card-toolbar">
                                                                            <button type="submit" class="btn btn-success mr-2">Upload</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
														</div>






													</div>
													<!--end::Body-->

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
