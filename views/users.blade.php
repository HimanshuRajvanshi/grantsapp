@extends('layout.mainlayout')

@section('content')

@if(session('success'))
    {{session('success')}}
@endif


<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
									Users  </h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
								</div>
							</div>
						</div>
						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
							<div class="kt-portlet">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											User List
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												&nbsp;<!--
												<a href="add_grant.html" class="btn btn-brand btn-elevate btn-icon-sm">
													<i class="la la-plus"></i>
													Add New
												</a> -->
											</div>
										</div>
									</div>
								    </div>
										<div class="kt-portlet__body">
										<ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#kt_apps_user_edit_tab_1" role="tab">
													Free
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_2" role="tab">
													Paid
												</a>
											</li>

										</ul>
									<div class="tab-content">
								<div class="tab-pane active" id="kt_apps_user_edit_tab_1"  role="tabpanel">
								  <div class="kt-portlet__body">

									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>Sr.</th>
												<th>Photo</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>City</th>
												<th>State</th>
												<th>Country</th>
												<th>Last Login</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach ($users_list as $user)
										    <tr>
												<td>1</td>
												<td><img src="./assets/media/users/300_21.jpg" height="42" width="42"></td>
                                                <td>{{$user->first_name}}</td>
												<td>{{$user->last_name}}</td>
												<td>{{$user->city}}</td>
												<td>{{$user->state}}</td>
												<td>{{$user->country}}</td>
												<td>2020-04-30</td>
												<td>
												    <a href="user_view"><button class="view_button" title="Edit"><i class="fas fa-eye"></i></button></a>
												</td>
                                            </tr>
                                            @endforeach
										</tbody>
									</table>

									<!--end: Datatable -->
								</div>
							</div>

							<div class="tab-pane" id="kt_apps_user_edit_tab_2" role="tabpanel">
								  <div class="kt-portlet__body">

									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>Sr.</th>
												<th>Photo</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>City</th>
												<th>State</th>
												<th>Country</th>
												<th>Last Login</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										    <tr>
												<td>1</td>
												<td><img src="./assets/media/users/300_21.jpg" height="42" width="42"></td>
												<td>Beda</td>
												<td>Temp</td>
												<td>Niagara Falls</td>
												<td>New York</td>
												<td>New USA</td>
												<td>2020-04-30</td>
												<td>
												    <a href="user_view"><button class="view_button" title="Edit"><i class="fas fa-eye"></i></button></a>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td><img src="./assets/media/users/300_22.jpg" height="42" width="42"></td>
												<td>Meddy</td>
												<td>Til</td>
												<td>Niagara Falls</td>
												<td>New York</td>
												<td>New USA</td>
												<td>2020-04-30</td>
												<td>
												    <a href="user_view"><button class="view_button" title="Edit"><i class="fas fa-eye"></i></button></a>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td><img src="./assets/media/users/300_20.jpg" height="42" width="42"></td>
												<td>Zedo</td>
												<td>Test</td>
												<td>Niagara Falls</td>
												<td>New York</td>
												<td>New USA</td>
												<td>2020-04-30</td>
												<td>
												    <a href="user_view"><button class="view_button" title="Edit"><i class="fas fa-eye"></i></button></a>
												</td>
											</tr>



										</tbody>
									</table>

									<!--end: Datatable -->
								</div>
							</div>


											</div>
										</div>
									</div>

						</div>


						<!-- end:: Content -->
					</div>
@endsection






<b></b>
