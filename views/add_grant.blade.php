@extends('layout.mainlayout')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>

@if ($message = Session::get('error'))
<div class="alert alert-danger">
  <p>{{ $message }}</p>
</div>
@endif

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
									Add Grant </h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">


									<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
								</div>
							</div>

						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

                          <div class="row">


									<!--begin::Portlet-->
									<div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
										<div class="kt-portlet__head kt-portlet__head--lg">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title"> <small></small>Grant</h3>
											</div>
											<div class="kt-portlet__head-toolbar">
												<a href="./grants" class="btn btn-brand kt-margin-r-10">
													<i class="la la-arrow-left"></i>
													<span class="kt-hidden-mobile">Back</span>
												</a>

											</div>
										</div>
										<div class="kt-portlet__body">
											<form class="kt-form" method="post" action="{{url('./add_grant') }}">
											 @csrf
												<div class="row">
													<div class="col-xl-2"></div>
													<div class="col-xl-8">
														<div class="kt-section kt-section--first">
															<div class="kt-section__body">
																<h3 class="kt-section__title kt-section__title-lg"></h3>
																<div class="form-group row">
																	<label class="col-3 col-form-label">Name</label>
																	<div class="col-9">
																		<input class="form-control" type="text" name="name" value="" required>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-3 col-form-label">Amount</label>
																	<div class="col-9">
																		<input class="form-control" step="0.01" type="number" name="amount" value="" required>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-3 col-form-label">Start date</label>
																	<div class="col-9">

																		<input class="form-control" data-date-format="yyyy-mm-dd" name="start_date" type="text" placehoder="Start Date" id="startdate" required/>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-3 col-form-label">End date</label>
																	<div class="col-9">
																		<input class="form-control" data-date-format="yyyy-mm-dd" name="end_date" type="text" placehoder="End Date" id="enddate"/ required>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-3 col-form-label">Eligibility requirements</label>
																	<div class="col-9">
																		<textarea rows="5" cols="104" name="elibility_req" class="form-control" required=""></textarea>
																	</div>
                                                                </div>

                                                                <div class="form-group row">
																	<label class="col-3 col-form-label">Web Link</label>
																	<div class="col-9">
																		<input class="form-control"  type="text" name="web_link" required>
																	</div>
                                                                </div>


																<div class="form-group row">
																	<label class="col-3 col-form-label">Company</label>
																	<div class="col-9">
																	<?php $company = DB::table('app_organization')->get(); ?>
																		<select class="form-control" name="com_name" required>
																			<option>Select ...</option>
																			 @foreach($company as $contact)
																			<option value="{{$contact->name}}">{{$contact->name}}</option>
																			@endforeach

																		</select>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-3 col-form-label">Status</label>

																	<div class="col-9">
																		<div class="kt-radio-inline">
																			<label class="kt-radio">
																				<input type="radio" value="1" name="isactive" required> Yes
																				<span></span>
																			</label>
																			<label class="kt-radio">
																				<input type="radio" value="0" name="isactive" required> No
																				<span></span>
																			</label>

																		</div>
																	</div>

															</div>

															</div>
														</div>



												    </div>
													<div class="col-xl-2">
													<div class="kt-portlet__foot">
														<div class="kt-form__actions">
															<button type="submit" class="btn btn-primary">Submit</button>
															<button type="reset" class="btn btn-secondary">Cancel</button>
														</div>
											        </div>
													</div>
												</div>
											</form>
										</div>
									</div>

									<!--end::Portlet-->

							</div>
						</div>


						<!-- end:: Content -->
					</div>

<script>
$(document).ready(function(){

    $("#startdate").datepicker({
        todayBtn:  1,
        autoclose: true,
		startDate: '-0d',
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#enddate').datepicker('setStartDate', minDate);
    });

    $("#enddate").datepicker()
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#startdate').datepicker('setEndDate', minDate);
        });

});
</script>
@endsection






<b></b>
