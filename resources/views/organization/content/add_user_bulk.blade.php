
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
											<div class="card-header py-3 border-0 d-flex">
												<div class="card-title align-items-start flex-column">

													<h3 class="card-label font-weight-bolder text-dark">Add Users</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1">Copy and paste from a spreadsheet to add multiple students.<br>
													This will generate accounts with each student’s login information.</span>
													<code>* columns include: First Name, Last Name, Email, Phone Number. </code>
													<!-- <code>* User Type: Learner or Instructor </code> -->

												</div>
												<div class="card-toolbar">


															<button type="submit" class="btn btn-success mr-2"data-toggle="modal" data-target="#exampleModalCenter">Upload Users</button>
															<button type="reset" class="btn btn-secondary">Clear</button>
														</div>
											</div>

											<!-- <div class="form-group row">

												<div class="col-lg-4 col-md-9 col-sm-12 mx-auto">
													<div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
														<div class="dropzone-msg dz-message needsclick">
															<h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
															<span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
														</div>
													</div>
												</div>
											</div> -->
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

												<!--begin::Body-->

												<div class="card-body">

														<!--begin::Form Group-->
														<!--begin::Form-->
<!--
											<table class="table table-separate table-head-custom table-checkable" id="kt_datatable_2">
												<thead>
													<tr>
														{{-- <th></th> --}}
														<th>First Name</th>
														<th>Last Name</th>
														<th>Email Address</th>
														{{-- <th>Phone Number</th>
														<th>Class</th> --}}
														<th>User Type</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody id="m_tbody">
													<tr class="init_row">
														{{-- <td>1</td> --}}
														<td>
															 <input type="text" class="form-control f_name"  placeholder="First Name" name="f_name[]" required maxlength="125" />
														</td>
														<td>
															 <input type="text" class="form-control l_name"  placeholder="Last Name" name="l_name[]" required maxlength="125" />
														</td>
														<td>
															<input type="email" class="form-control email"  placeholder="Email Address" name="email[]" required maxlength="255" />
														</td>
														{{-- <td>
															<input maxlength="255" type="tel" class="form-control form-control-solid phone" name="phone[]"  required/>
														</td>
														<td class="select_class">
															<select class="form-control" name="classes[shd_%%%_][]" multiple="multiple" required>
																<option disabled=""   value=""> Select Classes option>
																@foreach ($categories as $category)
																	<option value="{{$category->cat_id}}" >{{$category->cat_title}}</option>
																@endforeach

														     </select>
														</td> --}}
														<td>
															<select name="type[]" required class="form-control form-control-solid user_type">
															   	<option disabled="" selected="" value="">-- Select User Type --</option>
															   	<option value="learner">Learner</option>
															   	<option value="instructor">Instructor</option>
														   	</select>
														</td>
														<td>
															<button class="btn btn-danger" onclick="removeRow(this);">Remove</button>
														</td>
													</tr>



												</tbody>
											</table> -->

											<!--end::Form-->

														<!-- <div class="card-toolbar">
															<button type="submit" class="btn btn-success mr-2">Add Users</button>
															<button type="reset" class="btn btn-secondary">Clear</button>
														</div> -->

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
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--end::Content-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Multiple User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i>
          <!-- <span aria-hidden="False">&times;asdfgds</span> -->
        </button>
      </div>

        <!-- Tabs -->
        <div class="container">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Learner</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Instructor</a>
      </li>
    </ul>
        </div>
      <!-- Tabs end -->
      <div class="modal-body">
      <div class="tab-content" id="pills-tabContent">
          <!-- Learner -->
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

      <form action="{{route('importCsv')}}" method="post">
          @csrf
  <div class="form-group">
  <input type="hidden" value="learner" name="type">

    <label for="exampleFormControlFile1">Upload your CSV</label>
    <a href="{{asset('test.csv')}}" download><i class="fas fa-download float-right" style=" color: #0BB7AF"> CSV Template</i></a>

    <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
  </div>
  <button type="submit" class="btn btn-primary float-right">Save changes</button>
</form>

  </div>
<!-- Learner End -->

<!-- Intstrutor -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

  <input type="hidden" value="instructor" name="type">

  <form action="{{route('importCsv')}}" method="post">
          @csrf
<div class="form-group">
<label for="exampleFormControlFile1">Upload your CSV</label>
<a href="{{asset('test.csv')}}" download><i class="fas fa-download float-right" style=" color: #0BB7AF"> CSV Template</i></a>

<input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
</div>
<button type="submit" class="btn btn-primary float-right">Save changes</button>
</form>
  </div>
</div>

      </div>
      <!-- Instructor End -->

    </div>
  </div>
</div>







