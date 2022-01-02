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
														<span class="text-muted font-weight-bold font-size-sm mt-1">Change your profile details <code>hit enter to save changes </code></span>
													</div>
													<div class="card-toolbar">


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
                                                            <form method="post"  enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                <label>Full Name:</label>
                                                                <input name="instr_name" type="text" class="form-control form-control-solid"
                                                                value="{{Auth::guard('instructor')->user()->instr_name}}" required maxlength="255" />
                                                                <span class="form-text text-muted">Please enter your Full name</span>
                                                                </div>
                                                            </form>

															<div class="row">
																<div class="form-group col-sm-6">
                                                                    <form method="post"  enctype="multipart/form-data">
                                                                        @csrf
                                                                        <label>Phone:</label>
                                                                        <input name="instr_phone" type="text" class="form-control form-control-solid"
                                                                        value="{{Auth::guard('instructor')->user()->instr_phone}}" required maxlength="255" />
                                                                        <span class="form-text text-muted">Please enter your Phone number</span>
                                                                    </form>
																</div>
																<div class="form-group col-sm-6">
                                                                    <form method="post"  enctype="multipart/form-data">
                                                                        @csrf
                                                                        <label>Email:</label>
                                                                        <input name="instr_email" type="text" class="form-control form-control-solid" value="{{Auth::guard('instructor')->user()->instr_email}}" required maxlength="255" />
                                                                        <span class="form-text text-muted">Please enter your new email</span>
                                                                    </form>
																</div>
                                                                <div class="form-group col-sm-6">
                                                                    <form method="post"  enctype="multipart/form-data">
                                                                        @csrf
                                                                        <label>Password:</label>
                                                                        <input name="password" type="password" class="form-control form-control-solid"  required maxlength="255" />
                                                                        <span class="form-text text-muted">Please enter your new password</span>
                                                                    </form>
																</div>
															</div>

														</div>
														<div class="col-sm-4 float-left">
															<div class="form-group row">
                                                                <form method="post" class="row col-12"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    <span class="col-sm-12 col-form-label text-center">Upload Profile Picture</span>
                                                                    <div class="col-lg-9 offset-lg-3 col-xl-6 offset-xl-6">
                                                                        <div class="image-input image-input-outline symbol symbol-circle" id="kt_user_avatar" >
                                                                            <div class="image-input-wrapper symbol symbol-circle " style="background-image: url({{ asset('storage/'.Auth::guard('instructor')->user()->instr_avatar_url) }})"></div>
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
                                                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-success m-2 ml-auto">upload image</button>
                                                                </form>
															</div>
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
