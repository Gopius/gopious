
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
											<!--end::Header-->
											<!--begin::Form-->
											
												@csrf
												
												<!--begin::Body-->
												<div class="card-body">
													
														<!--begin::Form Group-->
														
														<div class="col-sm-6">
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

														<div class="col-sm-6">
															
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
					