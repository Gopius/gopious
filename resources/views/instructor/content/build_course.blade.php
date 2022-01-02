		
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile Overview-->
								<div class="row">
									<!--begin::Aside-->
									<div class="col-md-4" id="kt_profile_aside">
										<!--begin::Profile Card-->
										<div class="card card-custom card-stretch">
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::Toolbar-->
												
												<!--end::Toolbar-->
												<!--begin::User-->
												<div class="d-flex align-items-center">
													
													<div class="col-12">
														<a class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{$course->course_title}}</a>
														<div class="text-muted">{{$course->course_desc}}</div>
														
													</div>
												</div>
												<!--end::User-->
												<!--begin::Contact-->
												<h4 class="card-title font-weight-bolder text-dark my-3 px-3">Sections</h4>

												<div class="form-group">
													
													<div class="input-group">
														<input type="text" name="new_chapter" class="form-control" placeholder="Section Name"/>
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
												<div class="mt-2">
													<a onclick="return pushLastChange(this);" href="{{ route('instructor_activities') }}" class="btn btn-sm btn-success w-100 mt-5 font-weight-bold py-2 px-3  my-1">Done</a>
													
												</div>
												<!--end::Nav-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Profile Card-->
									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="col-md-8 col-sm-12">
										<!--begin::Row-->
										<div class="row">
											<div class="col-sm-12">
												<!--begin::List Widget 14-->
												<div class="card card-custom">
													<div class="card-header">
														<h3 class="card-title block-title">
															<code>Create and click on block to Start</code>
														</h3>
														
													</div>
													<div class="form-group w-100 d-block">
													    @php
													    	$m_classes = Auth::guard('instructor')->user()->classes;

													    @endphp
													    <div class="  col-sm-12">
													     <select class="form-control select2" id="select_quiz" name="param" multiple="multiple">
													     	@foreach ($m_classes as $class)
													     		<optgroup label="{{$class->cat_title}}">
													     			@foreach ($class->quizzes as $quiz)
													     				<option value="{{$quiz->quiz_id}}">{{$quiz->quiz_title}}</option>
													     			@endforeach
													     			
													     		</optgroup>
													     	@endforeach
													     </select>
													    </div>
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
					