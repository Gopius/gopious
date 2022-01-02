		
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
									<div class="w-75">
										<h4>{{$quiz->quiz_title}}</h4>
									</div>
									<div class="w-25 card-toolbar">
										<button onclick="uploadQuiz()" class=" w-100 btn btn-primary mr-2 add_question" >
											Submit Quiz
										</button>
		                                        
									</div>
								</div>
								<!--begin::Profile Overview-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-lg-12 draggable-zone">
										
									</div>
									
								</div>
								<!--end:: Row-->
								<button type="button" class="btn btn-primary btn-lg  "   data-toggle="modal" data-target="#new_question_modal" > <i class="fas fa-plus-circle text-white"></i> Add A New Question</button>
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
					<div class="modal fade" id="new_question_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
		                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		                        <div class="modal-content">
		                            <div class="modal-header">
		                                <h5 class="modal-title" id="exampleModalLabel">Add New Questions</h5>
		                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                    <i aria-hidden="true" class="mdi mdi-close"></i>
		                                </button>
		                            </div>
		                            <div class="modal-body">
		                            		<div class="form-group">
												<label>Quiz type</label>
												<select class="form-control" id="quiz_type">
													<option value="0">Multiple Choice</option>
													<option value="1">True / False</option>
													<option value="2">Fill in the Blanks</option>
													<option value="3">Multiple Answers</option>
													<option value="4">Short Answers</option>
													
												</select>
											</div>
		                                {{-- <form class="mt-4" action="" method="post"> --}}
		                                    @csrf
		                                    <input type="hidden" name="_ulink" value="{{$upload_link}}">
		                                    <ul class="nav nav-success nav-pills m_option_list d-none" id="myTab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="multi_choice-tab" data-toggle="tab" href="#multi_choice">
														<span class="nav-text">Multiple Choice</span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link " id="fill_in-tab" data-toggle="tab" href="#fill_in" aria-controls="profile">
														<span class="nav-text">Fill in</span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="short_answer-tab" data-toggle="tab" href="#short_answer" aria-controls="contact">
														
														<span class="nav-text">Short Answer</span>
													</a>
												</li>
											</ul>
	                                   		<div class="tab-content mt-5" id="myTabContent">

	                                   			<div class="tab-pane fade active show" id="multi_choice" role="tabpanel" aria-labelledby="home-tab-2">
	                                   				<div class="card-body p-0">
		                                        
		                                        
				                                        <div class="form-group">
				                                            <label for="exampleTextarea">Question</label>
				                                            <div class="col-sm-12 p-0">
																<!--begin::List Widget 14-->
																<div class="card card-custom m-0 p-0">
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
				                                        <div class="form-group" style="visibility: hidden;">
														   <label>Multiple options selection</label>
														   <input type="checkbox" disabled="" name="multi_options" class="form-control-solid">
														  
														</div>
				                                        <label>Options</label>
				                                        <label class="btn btn-primary float-right" onclick="addNewOption()" ><i class="fas fa-plus text-white"></i> Add Option</label>
				                                        <div class="all-options">
				                                            
				                                        </div>
				                                        
				                                    </div>
	                                   			</div>

	                                   			<div class="tab-pane fade" id="fill_in" role="tabpanel" aria-labelledby="home-tab-2">
	                                   				<div class="form-group">
													   <label>Question</label>
													   <textarea class="form-control form-control-solid fill_in_textarea" rows="5"></textarea>
													   <span class="form-text text-muted">Use '__' underscores to specify where you would like a blank to appear in the text below</span>
														<h1 class="text-dark-75 text-hover-primary my-5 pl-0 font-size-lg font-weight-bolder fill_in_textarea_output" ></h1>
													</div>
													<label>Possible answer</label>
			                                        <label class="btn btn-primary float-right" onclick="addPossibleOption()" ><i class="fas fa-plus text-white"></i>  Add Possible Answer</label>
			                                        <div class="all-fill_options">
			                                            
			                                        </div>

	                                   			</div>

	                                   			<div class="tab-pane fade" id="short_answer" role="tabpanel" aria-labelledby="home-tab-2">
	                                   				<div class="form-group">
													   <label>Question</label>
													   <textarea class="form-control form-control short_answer_textarea" rows="5"></textarea>
													   
													</div>
													

	                                   			</div>


											    
											</div>
		                                    
		                                    
		                                    <div class="card-footer">
		                                    	<div>
		                                    		<div class="form-group w-50">
													   <label>Question Score</label>
													   <input type="number" name="score" required="" value="1" min="1" class="form-control">
													  
													</div>
		                                    	</div>
		                                        <button  onclick="addNewQuestion()" class="btn btn-primary mr-2 add_question" > <i class="fas fa-plus-circle text-white"></i>  Add Question</button>
		                                        <button class="d-none" data-dismiss="modal" id="close_modal"></button>
		                                        
		                                    </div>
		                                {{-- </form> --}}
		                            </div>
		                        </div>
		                    </div>
		            </div>
					