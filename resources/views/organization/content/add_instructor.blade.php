
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
										<form class="form" method="POST" novalidate="novalidate" id="kt_form">
											@csrf
											
											<div class="card card-custom">
												<!--begin::Header-->
												<div class="card-header py-3">
													<div class="card-title align-items-start flex-column">
														<h3 class="card-label font-weight-bolder ">Add New Instructor</h3>
														<span class="text-muted font-weight-bold font-size-sm mt-1">Enter Instructor details and submit</span>
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
															   <input maxlength="255" type="text" class="form-control form-control-solid" name="instr_name" required />
															   <span class="form-text text-muted">Please enter Instructor's Fullname</span>
															</div>

															<div class="form-group">
															   <label>Email: <span class="text-danger">*</span></label>
															   <input maxlength="255" type="email" class="form-control form-control-solid" name="instr_email" required />
															   <span class="form-text text-muted">Please enter Instructor's Email</span>
															</div>
															
															
															
															
														</div>
														<div class="col-sm-6 float-left">
															<div class="form-group">
															   <label>Phone:</label>
															   <input maxlength="255" type="phone" class="form-control form-control-solid" name="instr_phone"  required/>
															   <span class="form-text text-muted">Please enter Instructor's Phone Number</span>
															</div>
															
															<div class="form-group">
																<label for="exampleSelectd">Classes <span class="text-danger">*</span></label>
																<select class="form-control select2" id="kt_select2_3" name="instr_classes[]" multiple="multiple" required>
																	@foreach ($categories as $category)
																		<option value="{{$category->cat_id}}" >{{$category->cat_title}}</option>
																	@endforeach
															      
															     </select>
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
					