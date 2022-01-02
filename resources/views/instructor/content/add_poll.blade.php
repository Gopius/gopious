
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
										<div class="card card-custom col-md-6 offset-md-3 px-md-20 py-md-10">
											<!--begin::Header-->
											
											<!--end::Header-->
											<!--begin::Form-->
											<form method="post" onsubmit="return submitFormBack();">
												@csrf
												
											<div class="card-body">
												<div class="card-title align-items-start flex-column">
													@if ($errors->any())
													    <div class="alert alert-danger">
													        <ul>
													            @foreach ($errors->all() as $error)
													                <li>{{ $error }}</li>
													            @endforeach
													        </ul>
													    </div>
													@endif
													<h3 class="card-label font-weight-bolder ">New Poll</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1">Enter poll details and fill other sections</span>
												</div>
												<div class="form-group">
												   <label>Add New Poll</label>
												   <input type="text" class="form-control form-control-solid" required  name="poll_title" />
												   <span class="form-text text-muted">Please enter your Poll Title/Question</span>
												</div>
												<div class="form-group d-flex flex-wrap">
													<label class="input-group w-100 ">Option</label>
													<div class="input-group w-75 ">
													    <input type="text" placeholder ="Add Option" class="form-control form-control-solid" name="new_option" />
													    
													</div>
												   	<span class="svg-icon svg-icon-success text-center w-25 svg-icon-3x add_new_option" ><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Code\Plus.svg-->
												   			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															        <rect x="0" y="0" width="24" height="24"/>
															        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
															        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
															    </g>
															</svg><!--end::Svg Icon-->
													</span>
												   	
												</div>

												<span id="option-list">
													
												</span>
												
											

												<div class="form-group">
												   <label>Deadline</label>
												   <input required type="date" name="end_date" min="{{date('Y-m-d')}}" class="form-control form-control-solid"/>
												</div>

												<div>
													<button type="submit"  class="btn btn-primary px-6 font-weight-bolder " data-wizard-type="action-submit">Submit</button>
													
												</div>

																	
																
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
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--end::Content-->
					<!--end::Content-->
					