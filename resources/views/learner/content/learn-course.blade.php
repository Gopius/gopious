					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid p-0" id="kt_content">
						<!--begin::Entry-->
						<div class="row w-100 p-0 m-0">
							<div class="tab-content m-0 p-0 col-sm-9" id="myTabContent">
								@foreach ($course->chapters as $key => $chapter)
									@foreach ($chapter->blocks as $mk => $block)
										<div class="card card-custom tab-pane fade  {{$key + $mk == 0 ? 'show active':''}}" id="block_{{$block->block_id}}" >
											<!--begin::Body-->
											<!--begin::Dropdown-->
											 <div class="card-header ">
									            <div class="card-title w-100 text-dark-75" >
									                <span class="col-sm-8">{{$block->block_title}} </span>
									            </div>
									        </div>
											<!--end::Dropdown-->
											<div class="card-body p-4" style="overflow-x: scroll;">
												
												<?= htmlspecialchars_decode(stripslashes($block->block_content)) ?>
												
											</div>
											<div class="card-footer p-4 text">
												
												<h4>Quizes</h4>
												@foreach ($chapter->quizzes as $quiz)
													<a href="{{ route('learner_class_quiz', [$quiz->course->cat_no, $quiz->quiz_id]) }}" target="_blank" class="btn btn-link px-auto d-block text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$quiz->quiz_title}}</a>
												@endforeach
											</div>
											<!--end::Body-->
										</div>
										
									@endforeach
									
								@endforeach
								
								
							</div>
							<div class="col-sm-3 p-0">
													
								<!--begin::Forms Widget 3-->
								<div class="card card-custom gutter-b p-0">

									<!--begin::Body-->
									<div class="card-body p-0">
										
										<div class="accordion accordion-toggle-arrow" id="accordionExample1"  role="tablist">
											@foreach ($course->chapters as $key => $chapter)
												<div class="card">
											        <div class="card-header p-1">
											            <div class="card-title text-dark-75" data-toggle="collapse" data-target="#collapseOne{{$key}}">
											                <span class="col-sm-8">{{ $chapter->chapter_title}} </span>
											                
											            </div>
											        </div>

											        <div id="collapseOne{{$key}}" class="collapse {{$key==0?'show':''}}" data-parent="#accordionExample1">
											            <div class="card-body p-0 m_active row w-100 m-0">
											            	@foreach ($chapter->blocks as $mk => $block)
											            		<div class="row p-3 tab col-10 nav_tab m-0 {{$key + $mk == 0 ? 'active':''}}" data-toggle="tab" onclick="removeAllActive();"  href="#block_{{$block->block_id}}"  style="cursor: pointer;">
												                	
												                	
												                	<div class="col-sm-12">	
												                		{{$block->block_title}}
												                	</div>
												                	
												                </div>
											            		<label  class=" col-2 checkbox checkbox-outline checkbox-success">
												                    <input type="checkbox" {{isset($block->blockLearner[0])?$block->blockLearner[0]->viewed?'checked':'':''}}  id="block_ckeckbox_{{$block->block_id}}" onchange="handleTickFor({{$block->block_id}})" />
												                    <span></span>
												                    
												                </label>
													        	
													        @endforeach
											              
											            </div>
											        </div>
											    </div>
											@endforeach
										</div>
									</div>
									<!--end::Body-->
								</div>
								<!--end::Forms Widget 3-->
								
							</div>
						</div>
						<div class="container">
							<!--begin::Education-->
							
							<!--end::Education-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->