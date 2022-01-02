		
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile Overview-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
										<!--begin::Profile Card-->
										<div class="card card-custom card-stretch">
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::Toolbar-->
												<div class="d-flex justify-content-end">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover py-5">
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-plus"></i>
																		</span>
																		<span class="navi-text">New Chapter</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
												<!--end::Toolbar-->
												<!--begin::User-->
												<div class="d-flex align-items-center">
													
													<div class="col-12">
														<a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{$course->course_title}}</a>
														<div class="text-muted">{{$course->course_desc}}</div>
														
													</div>
												</div>
												<!--end::User-->
												<!--begin::Contact-->
												<h4 class="card-title font-weight-bolder text-dark my-3 px-3">Chapters</h4>

												<div class="form-group">
													
													<div class="input-group">
														<input type="text" name="new_chapter" class="form-control" placeholder="Chapter Name"/>
														<div class="input-group-append">
														<button class="btn btn-primary" type="button" onclick="createNewChatper()">
															<i class="flaticon2-plus"  id="chapter_add"></i>
															<i class="flaticon2-hourglass-1 d-none" id="chapter_hourglass"></i>
														</button>
														</div>
													</div>
												</div>
												<!--end::Contact-->
												<!--begin::Nav-->
												<div id="chapter_container" class="navi navi-bold navi-hover navi-active navi-link-rounded">
													
													
												</div>
												<!--end::Nav-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Profile Card-->
									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-8">
										<!--begin::Row-->
										<div class="row">
											<div class="col-sm-12">
												<!--begin::List Widget 14-->
												<div class="card card-custom">
												 <div class="card-header">
												  <h3 class="card-title block-title">
												   Summernote Examples
												  </h3>
												 </div>
												 <!--begin::Form-->
												 
												  <div class="card-body col-12 m-0 p-0 mb-2">
												   <div class="col-12">
												     <div class="summernote" id="kt_summernote_1"></div>
												    </div>
												   
												  </div>
												  
												
												 <!--end::Form-->
												</div>
												<!--end::List Widget 14-->
											</div>
											
										</div>
										<!--end::Row-->
										<!--begin::Advance Table: Widget 7-->
										
										<!--end::Advance Table Widget 7-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Profile Overview-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--end::Content-->
					@csrf
					