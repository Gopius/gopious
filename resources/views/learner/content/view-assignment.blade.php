					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="container">
							<!--begin::Education-->
							<div class="card card-custom gutter-b">
								<div class="card-body ">
									<span class="svg-icon svg-icon-primary svg-icon-5x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Navigation\Arrow-left.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <polygon points="0 0 24 0 24 24 0 24"/>
										        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
										        <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
										    </g>
										</svg><!--end::Svg Icon-->
									</span>
									<!--begin::Top-->
									@if ($errors->any())
									    <div class="alert alert-danger">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									@endif
									<form method="post" onsubmit="return submitFormBack();" enctype="multipart/form-data">
										@csrf
										
										<div class="row ml-md-30">
											<span class="d-block text-muted" style="font: bolder;">
												{{$assignment->course->course_title}} 
											</span>
											<h1 class="col-sm-12 text-dark-75 text-hover-primary mb-5 pl-0 font-size-lg font-weight-bolder" style="font-size: 18px;">{{$assignment->ass_title}}
												
											</h1>
											<!--begin::Symbol-->

											<div class=" col-sm-6 bgi-no-repeat bgi-size-cover rounded min-h-265px" style="background-image: url({{asset('storage/'.$assignment->course->course_cover_img_url)}})"></div>
											<!--end::Symbol-->
											<div class="col-sm-6 text-dark pr-20 mt-2" style="font-family: Poppins;font-size: 14px;line-height: 30px;letter-spacing: 0em; font-weight: 500;		">
												
												<?= htmlspecialchars_decode(stripslashes($assignment->ass_content)) ?>
											</div>
											<div class="col-sm-10 mt-10 pl-0">
												<div class="form-group">
												   <label>Your Answer</label>
												   <input type="text" name="ass_answer" class="form-control form-control-solid d-none" />
												   <div class="card card-custom ">
													    
													    <div class="card-body m-0 p-0 text-muted">
													        <div id="kt_quil_1" style="height: 325px"></div>
													    </div>
													</div>
												   
												</div>
											</div>
											<div class="col-sm-6 pr-10">
												<!--begin::Form Group-->
												<div class="form-group d-flex flex-wrap">
												   <label class="w-100 font-weight-bolder">Attachments</label>
												   <input type="text" style="visibility: hidden;" class="form-control w-75 form-control-solid" name="new_attachment" />
												   <span class="svg-icon svg-icon-success text-center w-25 svg-icon-3x" id="add_new_attachment"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Code\Plus.svg-->
												   			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															        <rect x="0" y="0" width="24" height="24"/>
															        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
															        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
															    </g>
															</svg><!--end::Svg Icon-->
														</span>
												</div>
												<span id="attachments-list">
													
												</span>
												
											</div>

											<!--begin::Info-->
											
											<!--end::Info-->
											<div class="col-sm-12">
												<button  class="btn btn-success mr-2 px-5">Submit</button>	
											</div>
										</div>
									</form>

									<!--end::Top-->
									
									
								</div>
							</div>
							<!--end::Education-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->