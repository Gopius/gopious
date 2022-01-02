
					<!--begin::Content-->
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
										@if ($errors->any())
										    <div class="alert alert-danger">
										        <ul>
										            @foreach ($errors->all() as $error)
										                <li>{{ $error }}</li>
										            @endforeach
										        </ul>
										    </div>
										@endif
										<form class="form" method="POST" enctype="multipart/form-data"  novalidate="novalidate" id="kt_form">
											@csrf

											<div class="card card-custom">
												<!--begin::Header-->
												<div class="card-header py-3">
													<div class="card-title align-items-start flex-column">
														<h3 class="card-label font-weight-bolder ">Add New Class</h3>
														<span class="text-muted font-weight-bold font-size-sm mt-1">Enter class details and save</span>
													</div>
													<div class="card-toolbar">
														<button type="submit" id="m_submit" class="btn btn-success mr-2">
															Save Changes
														</button>
														{{-- <button type="reset" class="btn mr-2">
															Clear
														</button> --}}
													</div>
												</div>
												<!--end::Header-->
												<!--begin::Form-->
												{{-- <form class="form"> --}}
													<!--begin::Body-->
													<div class="card-body">
														<div class="col-sm-6 float-left">
															<!--begin::Form Group-->
															<div class="form-group">
															   <label>Class Title:</label>
															   <input maxlength="255" type="text" class="form-control form-control-solid" name="cat_title" />
															   <span class="form-text text-muted">Please your Class Title</span>
															</div>

															<div class="form-group">
															   <label>Class Description</label>
															   <textarea maxlength="255" class="form-control form-control-solid" name="cat_desc" style="height: 200px;"></textarea>


															</div>


														</div>
														<div class="col-sm-6 float-left">
															<div class="d-flex align-items-center">
																<div class="image-input image-input-outline symbol " id="kt_user_avatar" style="background-image: url(assets/media/stock-600x400/img-70.jpg); width: 300px;height: 160px;">
																	<div class="image-input-wrapper symbol " style=" width: 300px;height: 160px;background-position: center;"></div>
																	<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
																		<i class="fa fa-pen icon-sm text-muted"></i>
																		<input type="file" name="cover_image" accept=".png, .jpg, .jpeg">
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
															{{-- <div class="form-group">
															   <label>Class Code:</label>
															   <input maxlength="255" type="text" class="form-control form-control-solid" name="cat_code" maxlength="6" minlength="6" />
															   <span class="form-text text-muted">Please your Class Code</span>
															</div> --}}
															<div class="form-group">
																<label for="exampleSelectd">Status</label>
																<select class="form-control" id="exampleSelectd" name="cat_status">
																	<option value="1">Open</option>
																	<option value="0">Closed</option>

																</select>
															</div>
															<div class="form-group">
															   <label>Maximum Students:</label>
															   <input type="number" class="form-control form-control-solid" name="cat_max_student" />

															</div>
														</div>






													</div>
													<!--end::Body-->
												{{-- </form> --}}
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
					<!--end::Content-->
