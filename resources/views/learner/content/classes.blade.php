
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
										<div class="card card-custom">
											<!--begin::Header-->
											<div class="card-header py-3">
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder ">View classes</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1">4 classes</span>
												</div>
												<div class="card-toolbar">
													<button type="button" class="btn btn-primary"
													data-toggle="modal" data-target="#joinclassmodal">
														+ Join Class
													</button>
												</div>

											</div>
											<!--end::Header-->
											<!--begin::Form-->
											<div class="card-body">
												<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
											</div>
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
					<!--end::Content-->
					<!-- Modal-->
					<div class="modal fade" id="joinclassmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
					    <div class="modal-dialog" role="document">
					        <div class="modal-content">
					        	<form class="form" method="POST" action="{{ route('learner_classes_join') }}">
									@csrf
						            <div class="modal-header">
						                <h5 class="modal-title" id="exampleModalLabel">Join Class</h5>
						                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                    <i aria-hidden="true" class="ki ki-close"></i>
						                </button>
						            </div>
						            <div class="modal-body">

						                	<div class="form-group">
											    <label>Class Code <span class="text-danger">*</span></label>
											    <input type="text" name="class_code" required class="form-control"  placeholder="Enter Class Code"/>

										   </div>


						            </div>
						            <div class="modal-footer">
						                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
						                <button type="submit" class="btn btn-primary font-weight-bold">Join class</button>
						            </div>
					            </form>
					        </div>
					    </div>
					</div>
