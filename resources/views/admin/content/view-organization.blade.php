
					<!--begin::Content-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">


                                <!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap border-0 pt-6 pb-0 d-block">
										<div class="card-title">
											<h3 class="card-label">Organizations Details

										</div>
										<div class="card-toolbar">

									</div>
									<div class="card-body pt-4 d-flex flex-column justify-content-between">

                                        <!--begin::User-->
                                        <div class="d-flex align-items-center mb-7">
                                            <!--begin::Pic-->
                                            <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                                <div class="symbol symbol-lg-75">
                                                    <img alt="Pic" src="{{asset($organization->org_square_icon_url?'storage/'.$organization->org_square_icon_url:'/assets/media/logos/favicon.png')}}">
                                                </div>
                                                <div class="symbol symbol-lg-75 symbol-primary d-none">
                                                    <span class="font-size-h3 font-weight-boldest">JM</span>
                                                </div>
                                            </div>
                                            <!--end::Pic-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{$organization->org_name}}</a>
                                                <span class="text-muted font-weight-bold">{{$organization->org_type->org_type_name}}</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Desc-->
                                        <p class="mb-7">{{$organization->about_org}}</p>
                                        <!--end::Desc-->
                                        <!--begin::Info-->
                                        <div class="mb-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                                                <a href="#" class="text-muted text-hover-primary">{{$organization->email}}</a>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-cente my-1">
                                                <span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>
                                                <a href="#" class="text-muted text-hover-primary">{{$organization->org_phone}}</a>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-cente my-1">
                                                <span class="text-dark-75 font-weight-bolder mr-2">Size:</span>
                                                <a href="#" class="text-muted text-hover-primary">{{$organization->org_size}}</a>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-cente my-1">
                                                <span class="text-dark-75 font-weight-bolder mr-2">Priority:</span>
                                                <a href="#" class="text-muted text-hover-primary">{{$organization->org_priority}}</a>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-cente my-1">
                                                <span class="text-dark-75 font-weight-bolder mr-2">Pitch:</span>
                                                <a href="#" class="text-muted text-hover-primary">{{$organization->org_why}}</a>
                                            </div>



                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
                                                <span class="text-muted font-weight-bold">{{$organization->org_address}}  ({{$organization->state->name}}) </span>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 font-weight-bolder mr-2">owner Name:</span>
                                                <span class="text-muted font-weight-bold">{{$organization->firstname}} {{$organization->lastname}}</span>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 font-weight-bolder mr-2">owner Phone:</span>
                                                <span class="text-muted font-weight-bold">{{$organization->phone}}</span>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 font-weight-bolder mr-2">owner Email:</span>
                                                <span class="text-muted font-weight-bold">{{$organization->email}}</span>
                                            </div>
                                        </div>
                                        <!--end::Info-->
                                    </div>

								</div>
								<!--end::Card-->


								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap border-0 pt-6 pb-0 d-block">
										<div class="card-title">
											<h3 class="card-label">All {{$instructors->total()}} Instructor</h3>
                                            <form class="flex-grow-1 ml-5" action="">
                                                <div class="form-group">
                                                    <div class="input-icon input-icon-right">
                                                     <input type="text" name="s" value="{{ request()->query('s') }} " class="form-control" placeholder="Search..."/>
                                                     <span><i class="flaticon2-search-1 icon-md"></i></span>
                                                    </div>
                                                </div>

                                            </form>

										</div>

									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable_learner">
											<thead>
												<tr>
													<th> Name</th>
													<th> Email</th>
													<th> Added</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($instructors as $instructor)
                                                    <tr>
                                                        <td>{{$instructor->instr_name}}</td>
                                                        <td>{{$instructor->instr_email}}</td>
                                                        <td>{{\Carbon\Carbon::parse($instructor->created_at)->format('d F Y')}}</td>
                                                    </tr>
                                                @endforeach

												</tr>
											</tbody>
										</table>
										<!--end: Datatable-->

									</div>

								</div>
								<!--end::Card-->

                                <div class="d-flex justify-content-around mt-4">
                                    {{ $instructors->links() }}
                                </div>

                                <!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap border-0 pt-6 pb-0 d-block">
										<div class="card-title">
											<h3 class="card-label">All {{$learners->total()}} learners</h3>
                                            <form class="flex-grow-1 ml-5" action="">
                                                <div class="form-group">
                                                    <div class="input-icon input-icon-right">
                                                     <input type="text" name="s" value="{{ request()->query('s') }} " class="form-control" placeholder="Search..."/>
                                                     <span><i class="flaticon2-search-1 icon-md"></i></span>
                                                    </div>
                                                </div>

                                            </form>

										</div>

									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable_learner">
											<thead>
												<tr>
													<th> Name</th>
													<th> Email</th>
													<th> Added</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($learners as $learner)
                                                    <tr>
                                                        <td>{{$learner->learner_name}}</td>
                                                        <td>{{$learner->learner_email}}</td>
                                                        <td>{{\Carbon\Carbon::parse($learner->created_at)->format('d F Y')}}</td>
                                                    </tr>
                                                @endforeach

												</tr>
											</tbody>
										</table>
										<!--end: Datatable-->

									</div>

								</div>
								<!--end::Card-->

                                <div class="d-flex justify-content-around mt-4">
                                    {{ $learners->links() }}
                                </div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--end::Content-->

                    <script>
                        window.addEventListener('load', ()=>{
                            $('#kt_datatable_learner').DataTable( {
                                "paging":   false,
                                "ordering": false,
                                "searching": false,
                                "info":     false
                            } );
                        })
                    </script>
