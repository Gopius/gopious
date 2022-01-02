
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<!--begin::Container-->
							<div class="container">
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								    <div class="modal-dialog" role="document">
								        <div class="modal-content">
								            <div class="modal-header">

								                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                    <i aria-hidden="true" class="ki ki-close"></i>
								                </button>
								            </div>
								            <div class="modal-body">
								                <div class="form-group">
												    <label>Course Title <span class="text-danger">*</span></label>
												    <input type="text" name="course_title" class="form-control"  />

												</div>
												<div class="form-group">
												    <label>Course Description <span class="text-danger">*</span></label>
												    <textarea class="form-control" name="course_desc" style="height: 150px;"></textarea>

												</div>
                                                <div class="form-group">
                                                    <label for="select_a_class"> Classes
                                                    <span class="text-danger">*</span></label>
                                                    <select name="cat_no" class="form-control" id="select_a_class" required>
                                                        <option value selected disabled>--select a class --</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{$class->class->cat_id}}">{{$class->class->cat_title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
												<div class="form-group">
												    <label>Open <span class="text-danger">*</span></label>
												    <input type="radio" value="1" name="course_status" class="form-control open" />
												</div>
												<div class="form-group">
												    <label>Closed <span class="text-danger">*</span></label>
												    <input type="radio" value="0" name="course_status" class="form-control closed" />
												</div>
												<input type="hidden" name="course_id">
												@csrf

								            </div>
								            <div class="modal-footer">
								                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
								                <button type="button" onclick="updateChange()" class="btn btn-primary font-weight-bold" data-dismiss="modal">Save changes</button>
								            </div>

								        </div>
								    </div>
								</div>
								<button type="button" class="btn btn-primary d-none" id="form_button" data-toggle="modal" data-target="#exampleModal">
								    Launch form
								</button>
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
													<h3 class="card-label font-weight-bolder ">View Courses</h3>

												</div>
												<div class="card-toolbar">
													<a href="{{ route('instructor_course_create') }}"><button type="reset" class="btn btn-success mr-2">
														Create Course
													</button></a>
												</div>


											</div>
											<!--end::Header-->
											<!--begin::Form-->
											<div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-4 my-2 my-md-0">
                                                        <div class="input-icon">
                                                            <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                                            <span>
                                                                <i class="flaticon2-search-1 text-muted"></i>
                                                            </span>
                                                        </div>
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
