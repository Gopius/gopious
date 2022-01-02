					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<!--begin::Container-->
							<!--begin::Entry-->
							<div class="container">
								<!--begin::Education-->
								<div class="card card-custom gutter-b col-md-6 offset-md-3">
									<div class="card-body ">
										<a href="javascript:window.history.back()">
											<span class="svg-icon svg-icon-primary svg-icon-5x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Navigation\Arrow-left.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <polygon points="0 0 24 0 24 24 0 24"/>
												        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
												        <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
												    </g>
												</svg><!--end::Svg Icon-->
											</span>
										</a>
										<!--begin::Top-->
										<div class="row">
											<h1 class="col-sm-12 text-dark-75 text-hover-primary mb-5 pl-0 font-size-lg font-weight-bolder" style="font-size: 18px;">Assignment Submission: {{$assignment->ass_title}}</h1>
											<div class="d-flex align-items-center mb-12">
												<!--begin::Symbol-->
												<div class="symbol symbol-40 symbol-light-success mr-5">
													<span class="symbol-label">
														<img src="/assets/media/svg/avatars/009-boy-4.svg" class="h-75 align-self-end" alt="" />
													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Info-->
												<div class="d-flex flex-column flex-grow-1">
													
													<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$assignment_learner->learner->learner_name}}</a>
													
													<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$assignment->course->category->cat_title}} Class </a>
													
													
													<span class="text-muted font-weight-bold">{{$assignment_learner->created_at->diffForHumans()}}</span>
												</div>
												<!--end::Info-->
												
											</div>
											<h1 class="col-sm-12 text-dark-75 text-hover-primary mb-5 pl-0 font-size-lg font-weight-bolder" style="font-size: 18px;">Answer:</h1>
											<!--begin::Symbol-->
											
											<!--end::Symbol-->
											<div class="col-sm-12 text-dark-75 mt-2 mb-5" style="font-family: Poppins;font-size: 14px;line-height: 30px;letter-spacing: 0em; "><?=$assignment_learner->ass_answer?></div>
											<div class="col-sm-12 text-dark-75 mt-2 mb-5">
												@foreach ($assignment_learner->attachments as $attachment)
													
													<a href="{{asset('storage/'.$attachment->url)}}" class="d-inline-block m-2">
														@if (in_array($attachment->type, ['jpeg', 'jpg', 'gif', 'JPG', 'tiff', 'tif', 'png']))
															<i class="far fa-file-image icon-3x"></i>
														@elseif (in_array($attachment->type, ['doc', 'docx']))
															<i class="far fa-file-word icon-3x"></i>
														@elseif (in_array($attachment->type, ['mp4', '3gp']))
															<i class="far fa-file-video icon-3x"></i>
														@elseif (in_array($attachment->type, ['pdf']))
															<i class="far fa-file-pdf icon-3x"></i>
														@elseif (in_array($attachment->type, ['ppt', 'pptx']))
															<i class="far fa-file-powerpoint icon-3x"></i>
														@else
															<i class="far fa-file-alt icon-2x"></i>
														@endif
														{{$attachment->type}}
													</a>
												@endforeach
												
												
											</div>
											<div class="col-sm-6 text-center {{($assignment_learner->status==1)? 'bg-secondary':''}}">
												<a href="{{ route('instructor_submission_status', [$class->cat_id, $assignment->ass_id, $assignment_learner->id, 1]) }}">
														<span class="svg-icon svg-icon-success svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Navigation\Check.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														        <polygon points="0 0 24 0 24 24 0 24"/>
														        <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
														    </g>
														</svg>
													<!--end::Svg Icon-->
													</span>
												</a>
											</div>
											<div class="col-sm-6 text-center {{($assignment_learner->status==2)? 'bg-secondary':'' }}">
												<a href="{{ route('instructor_submission_status', [$class->cat_id, $assignment->ass_id, $assignment_learner->id, 2]) }}">
													<span class="svg-icon svg-icon-danger svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Navigation\Close.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
														            <rect x="0" y="7" width="16" height="2" rx="1"/>
														            <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
														        </g>
														    </g>
														</svg><!--end::Svg Icon-->
													</span>
												</a>
											</div>


											<!--begin::Info-->
											
											<!--end::Info-->
											
										</div>

										<!--end::Top-->
										
										
									</div>
								</div>
								<!--end::Education-->
							</div>
							<!--end::Entry-->
							<!--end::Container-->
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->