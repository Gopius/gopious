
					<!--begin::Content-->
                    @include('forms.instructor.assignments.update')
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
													<h3 class="card-label font-weight-bolder ">View Assignments</h3>

												</div>
												<div class="card-toolbar">
													<a href="{{ route('instructor_assignment_create') }}"><button type="reset" class="btn btn-success mr-2">
													<i class="fa fa-plus"></i>	Create Assignment
													</button></a>
												</div>

											</div>
											<!--end::Header-->
                                            <div class="input-icon w-25 m-9">
                                                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
											<!--begin::Form-->
											<div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-4 my-2 my-md-0">

                                                    </div>
                                                </div>
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
