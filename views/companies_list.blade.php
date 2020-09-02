@extends('layout.mainlayout')

@section('content')
            
 @if ($message = Session::get('success'))
     <div class="alert alert-success">
       <p>{{ $message }}</p>
        </div>
  @endif

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
									Companies  </h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									

									<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
								</div>
							</div>
							
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
							
                         <div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											Company List
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												<!--div class="dropdown dropdown-inline">
													<button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="la la-download"></i> Export
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<ul class="kt-nav">
															<li class="kt-nav__section kt-nav__section--first">
																<span class="kt-nav__section-text">Choose an option</span>
															</li>
															<li class="kt-nav__item">
																<a href="companies_list.html" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-print"></i>
																	<span class="kt-nav__link-text">Print</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="companies_list.html" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-copy"></i>
																	<span class="kt-nav__link-text">Copy</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="companies_list.html" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-file-excel-o"></i>
																	<span class="kt-nav__link-text">Excel</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="companies_list.html" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-file-text-o"></i>
																	<span class="kt-nav__link-text">CSV</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="companies_list.html" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-file-pdf-o"></i>
																	<span class="kt-nav__link-text">PDF</span>
																</a>
															</li>
														</ul>
													</div>
												</div-->
												&nbsp;
												<a href="./add_comp" class="btn btn-brand btn-elevate btn-icon-sm">
													<i class="la la-plus"></i>
													Add New
												</a>
											</div>
										</div>
									</div>
								</div>
								
								<div class="kt-portlet__body">

									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>Sr.</th>
												<th>Name</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
			                            @foreach($contacts as $contact)
											<tr>
												<td><?php $i++;
												echo $i;?></td>
												<td>{{$contact->name}}</td>
												<td><?php $abc = $contact->is_active;
												   if($abc == "1"){
													echo "Active";
													}else{
													echo "Not Active";
												   } ?></td>
												<td>
													<a href="{{ url('edit_comp',$contact->id)}}"><button class="edit_button" title="Edit"><i class="fas fa-edit" aria-hidden="true"></i></button></a>
													<button class="delete_button" data-toggle="modal" data-target="#kt_modal_<?php echo $i; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
													   <div class="modal fade" id="kt_modal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	</button>
																</div>
																<div class="modal-body">
																	
																	 <form action="{{ url('com_del',$contact->id)}}" method="post">
																		@csrf
																		@method('DELETE')

																	   <button class="btn btn-success" type="submit">Delete</button>
																		<button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
																		</form>
																</div>
																
															</div>
														</div>
													</div>  
												</td>
											</tr>
											@endforeach
											
										</tbody>
									</table>

									<!--end: Datatable -->
								</div>
							</div>
						</div>


						<!-- end:: Content -->
					</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>			
<script>
    $(function(){
        setTimeout(function() {
            $('.alert-success').slideUp();
        }, 4000);
    });
</script>					

@endsection






<b></b>