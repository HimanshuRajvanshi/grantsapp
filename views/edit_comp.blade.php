@extends('layout.mainlayout')

@section('content')


<?php 
$urlhome = URL::to("/");
?>
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">
				Add Company
		    </h3>
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
												<h3 class="kt-portlet__head-title"> <small></small></h3>
											</div>
											<div class="kt-portlet__head-toolbar">
												<a href="{{$urlhome}}/companies_list" class="btn btn-brand kt-margin-r-10">
													<i class="la la-arrow-left"></i>
													<span class="kt-hidden-mobile">Back</span>
												</a>
												
											</div>
										</div>
				<div class="kt-portlet__body">
					<form class="kt-form" method="post" action="{{ url('add_update',$contact->id)}}">
						 @method('PATCH') 
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
										<input class="form-control" type="text" value="{{ $contact->name }}" name="name" required>
										</div>
										</div>
												
								       </div>
									   <div class="form-group row">
										<label class="col-3 col-form-label">Status</label>
																
											<div class="col-9">
												<div class="kt-radio-inline">
												<label class="kt-radio">
												<input type="radio" value="1" {{ ($contact->is_active=="1")? "checked" : "" }} name="isactive" checked> Yes
												<span></span>
												</label>
												<label class="kt-radio">
												<input type="radio" value="0" {{ ($contact->is_active=="0")? "checked" : "" }} name="isactive"> No
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
					
				</form>
			</div>
		</div>

<!--end::Portlet-->
				
    </div>
</div>

                       
<!-- end:: Content -->
</div>

@endsection






<b></b>