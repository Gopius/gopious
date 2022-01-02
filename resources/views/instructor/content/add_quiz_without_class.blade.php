
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
													<h3 class="card-label font-weight-bolder ">Add New Quiz</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1">Enter Quiz details and fill other sections</span>
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
											<form class="form" method="post" onsubmit=" return appendQuizs();">
												@csrf
												
												<!--begin::Body-->
												<div class="card-body">
													<div class="col-sm-6 float-left pr-15">
														<!--begin::Form Group-->
														<div class="form-group">
														   <label>Quiz Title:</label>
														   <input required type="text" class="form-control form-control-solid" name="quiz_title" />
														   <span class="form-text text-muted">Please your Quiz Title</span>
														</div>

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
															<label for="exampleSelectd">Duration (mins)</label>
															<input required type="number" name="duration" min="1" class="form-control form-control-solid"  />
														</div>

														
														
														
														
													</div>
													
													<div class="col-sm-6 float-left pl-15">
														
														<div class="form-group">
														   <label>Class</label>
														   <select class="form-control form-control-solid" required  name="cat_no" >
														   		<option disabled="" value="" selected="">--Select A Class--</option>
														   		@foreach ($classes as $class)
													                <option value="{{$class->class->cat_id}}">{{$class->class->cat_title}}</option>
													            @endforeach
														   </select>
														   <span class="form-text text-muted">Please Select A class</span>
														</div>
														<div class="form-group">
															<label class="col-form-label">Always Open</label>
															<div class="col-12">
															<span class="switch">
															<label>
															<input type="checkbox" name="alway_open"/>
															<span></span>
															</label>
															</span>
															</div>
														</div>
														<span class="m_dates">
															<div class="form-group">
																<label for="exampleSelectd">Starts</label>
																<input type="datetime-local" name="start_date" min="{{date('Y-m-d\TH:i')}}" class="form-control form-control-solid" placeholder ="Submission Deadline" />
															</div>

															<div class="form-group">
																<label for="exampleSelectd">Ends</label>
																<input type="datetime-local" name="end_date" min="{{date('Y-m-d\TH:i')}}" class="form-control form-control-solid" placeholder ="Submission Deadline" />
															</div>
														</span>
														
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
					<script type="text/javascript">
						document.querySelector('input[name=alway_open]').addEventListener('change', (e)=>{
							if(e.target.checked){
								$('.m_dates').hide();
							}else{
								$('.m_dates').show();
							}
						});
					</script>