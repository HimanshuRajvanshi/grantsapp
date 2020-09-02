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
											Users View
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
												<div class="kt-portlet__head-toolbar">
												<a href="users" class="btn btn-brand kt-margin-r-10">
													<i class="la la-arrow-left"></i>
													<span class="kt-hidden-mobile">Back</span>
												</a>
											</div>
											</div>
										</div>
									</div>
								    </div>		
										<div class="kt-portlet__body">
										
										<ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#kt_apps_user_edit_tab_1" role="tab">
													Basic
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_2" role="tab">
													Subscription
												</a>
											</li>
											
										</ul>
									<div class="tab-content">
								<div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
								  <div class="kt-portlet__body">

									<!--begin: Datatable -->
									<div class="kt-section__body">
                                    <div class="row">
                                        
                                        <div class="col-lg-9 col-xl-6">
                                            <h3 class="kt-section__title kt-section__title-sm">Your Basic Details : </h3>
                                        </div>
                                    </div>
									
									<div class="form-group form-group-sm row">
									     <label class="col-xl-3 col-lg-3 col-form-label">
                                        <div class="kt-widget__media">
														<img class="kt-widget__img kt-hidden-" src="./assets/media/users/300_21.jpg " height="100" width="100" alt="image">
														<div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
															ChS
														</div>
													</div>
													</label>
                                    </div>
									
									
                                    <div class="form-group form-group-sm row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">First Name :</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <span class="kt-switch">
                                                <label class="col-form-label">Devid</label>
                                            </span>
                                        </div>
                                    </div>
									<div class="form-group form-group-sm row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Last Name :</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <span class="kt-switch">
                                                <label class="col-form-label">Carlo</label>
                                            </span>
                                        </div>
                                    </div>
									<div class="form-group form-group-last row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">City :</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <span class="kt-switch">
                                                <label class="col-form-label">Niagara Falls</label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">State :</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <span class="kt-switch">
                                                <label class="col-form-label">New York</label>
                                            </span>
                                        </div>
                                    </div>
                                     <div class="form-group form-group-last row">
                                       <label class="col-xl-3 col-lg-3 col-form-label">Country :</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <span class="kt-switch">
                                                <label class="col-form-label">USA</label>
                                            </span>
                                        </div>
                                    </div>
                                     
                                    </div>

									<!--end: Datatable -->
								</div>
							</div>
							
							<div class="tab-pane" id="kt_apps_user_edit_tab_2" role="tabpanel">
								  <div class="kt-portlet__body">

									<!--begin: Datatable -->
									<div class="kt-section__body">
                                    <div class="row">
                                        
                                        <div class="col-lg-9 col-xl-6">
                                            <h3 class="kt-section__title kt-section__title-sm">Your Subscription Details:</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-sm row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Subscription Name:</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <span class="kt-switch">
                                                            <label>
                                            </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Amount</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <span class="kt-switch">
                                                            <label>
                                                            	
                                            </label>
                                            </span>
                                        </div>
                                    </div>
                                    
                                     
                                    </div>
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