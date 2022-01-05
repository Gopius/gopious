
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
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
													{{-- <h3 class="card-label font-weight-bolder text-success">Add Users</h3> --}}

												</div>
												<div class="card-toolbar">
													<a href="{{ route('organization_add_bulk_user') }}">
														<button type="reset" class="btn btn-success mr-2">+ Multiple Users</button>
													</a>


												</div>
											</div>
											<!--end::Header-->
											<!--begin::Form-->

											@if ($errors->any())
											    <div class="alert alert-danger">
											        <ul>
											            @foreach ($errors->all() as $error)
											                <li>{{ $error }}</li>
											            @endforeach
											        </ul>
											    </div>
											@endif
											<form class="form" method="POST" id="kt_form">
												@csrf

												<div class="card card-custom">
													<!--begin::Header-->
													<div class="card-header py-3">
														<div class="card-title align-items-start flex-column">
															<h3 class="card-label font-weight-bolder ">Add New User</h3>
															<span class="text-muted font-weight-bold font-size-sm mt-1">Enter User details and save</span>
														</div>
														<div class="card-toolbar">
															<button type="submit" id="m_submit" class="btn btn-success mr-2">
																Save
															</button>
															<button type="reset" class="btn mr-2">
																Clear
															</button>
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
																   <label>Full name: <span class="text-danger">*</span></label>
																   <input maxlength="255" type="text" class="form-control form-control-solid" name="name" required />
																   <span class="form-text text-muted">Please enter Learner's Fullname</span>
																</div>

																<div class="form-group">
																   <label>Email: <span class="text-danger">*</span></label>
																   <input maxlength="255" type="email" class="form-control form-control-solid" name="email" required />
																   <span class="form-text text-muted">Please enter Learner's Email</span>
																</div>




															</div>
															<div class="col-sm-6 float-left">
																<div class="form-group">
																   <label>Phone:</label>
																   <input maxlength="255" type="phone" class="form-control form-control-solid" name="phone"  required/>
																   <span class="form-text text-muted">Please enter Learner's Phone Number</span>
																</div>

																<div class="form-group">
																	<label for="exampleSelectd">Classes <span class="text-danger">*</span></label>
																	<select class="form-control select2" id="kt_select2_3" name="classes[]" multiple="multiple" required>
																		@foreach ($categories as $category)
																			<option value="{{$category->cat_id}}" >{{$category->cat_title}}</option>
																		@endforeach

																     </select>
																</div>
																<div class="form-group col-sm-6">
																   <label>User Type: <span class="text-danger">*</span></label>
																   <select name="type" required class="form-control form-control-solid">
																   	<option disabled="" selected="" value="">-- Select User Type --</option>
																   	<option value="learner">Learner</option>
																   	<option value="instructor">Instructor</option>
																   </select>

																</div>

															</div>






														</div>
														<!--end::Body-->
													{{-- </form> --}}
													<!--end::Form-->
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Profile Account Information-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--end::Content-->
