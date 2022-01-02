
					<!--begin::Content-->
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
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
										<div class="card card-custom p-md-20">
											<!--begin::Header-->
											<div class="card-header py-3" style="border: 0;">
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder ">Add New Assignment</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1">Enter assignment details and fill other sections</span>
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
											<form class="form" method="post" onsubmit=" return appendAssignments();">
												@csrf

												<!--begin::Body-->
												<div class="card-body">
													<div class="col-sm-6 float-left pr-15">
														<!--begin::Form Group-->
														<div class="form-group">
														   <label>Assignment Title:</label>
														   <input required type="text" class="form-control form-control-solid" name="ass_title" />
														   <span class="form-text text-muted">Please your Assignment Title</span>
														</div>


														<div class="form-group">
														   <label>Assignment Description</label>
														   <input type="hidden" class="form-control form-control-solid" name="ass_content"  style="height: 325px">
														   <div class="card card-custom ">

															    <div class="card-body m-0 p-0">
															        <div id="kt_quil_1" style="height: 325px"></div>
															    </div>
															</div>


														</div>


													</div>
													<div class="col-sm-6 float-left pl-15">
														<div class="form-group">
														   	<label>Choose Course:</label>
														   	<select required type="text" class="form-control form-control-solid" name="course_no">
														   		<option disabled="">--select a class --</option>
														   		@foreach ($courses as $course)
														   			<option value="{{$course->course_id}}">{{$course->course_title}}</option>
														   		@endforeach
														   	</select>
														</div>

														<div class="form-group">
															<label for="exampleSelectd">Submission Deadline</label>
															<input required type="datetime-local" name="end_date" min="{{date('Y-m-d\TH:i')}}" class="form-control form-control-solid" placeholder ="Submission Deadline" />
														</div>

													</div>
													<div class="card-toolbar col-12 float-left mb-15">
														<button type="Submit" class="btn btn-success mr-2">
															Submit
														</button>
														<button type="reset" class="btn mr-2">
															Clear
														</button>
													</div>





												</div>
												<!--end::Body-->
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
							<!--end::Container-->
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--end::Content-->
					<!--end::Content-->
