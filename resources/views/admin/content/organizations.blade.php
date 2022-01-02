
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
											<h3 class="card-label">All {{$organizations->total()}} Organizations
											<span class="d-block text-muted pt-2 font-size-sm">light head and row separator</span></h3>
                                            <form class="flex-grow-1 ml-5" action="">
                                                <div class="form-group">
                                                    <div class="input-icon input-icon-right">
                                                     <input type="text" name="s" value="{{ request()->query('s') }} " class="form-control" placeholder="Search..."/>
                                                     <span><i class="flaticon2-search-1 icon-md"></i></span>
                                                    </div>
                                                </div>

                                            </form>
										</div>
										<div class="card-toolbar">

									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable_2">
											<thead>
												<tr>
													<th>Organization Name</th>
													<th>Organization Email</th>
													<th>Organization Type</th>
													<th>Organization Admins</th>
													<th>Organization Instructors</th>
													<th>Organization Learners</th>
													<th>Organization Added</th>
													<th>Organization Status</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												@foreach ($organizations as $organization)
                                                    <tr>
                                                        <td>{{$organization->org_name}}</td>
                                                        <td>{{$organization->email}}</td>
                                                        <td>{{$organization->org_type->org_type_name}}</td>
                                                        <td>{{$organization->instructors->count()}}</td>
                                                        <td>{{$organization->learners->count()}}</td>
                                                        <td>{{\Carbon\Carbon::parse($organization->created_at)->format('d F Y')}}</td>
                                                        <td>
                                                            @if ($organization->approved)
                                                                <a href="{{ route('admin.organization.update', ['organization'=>$organization->org_id]) }}?approved=0">
                                                                    <span class="alert alert-success">approved</span>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('admin.organization.update', ['organization'=>$organization->org_id]) }}?approved=1">
                                                                    <span class="alert alert-danger">unapproved</span>
                                                                </a>

                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.organization.view', ['organization'=>$organization->org_id]) }}?approved=0">
                                                                <span class="p-1 text-success">View Details</span>
                                                            </a>
                                                        </td>
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
                                    {{ $organizations->links() }}
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
                            $('#kt_datatable_2').DataTable( {
                                "paging":   false,
                                "ordering": false,
                                "searching": false,
                                "info":     false
                            } );
                        })
                    </script>
