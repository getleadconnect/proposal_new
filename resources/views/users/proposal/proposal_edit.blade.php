@extends('layouts.master')
@section('title','Proposal')
@section('contents')
<style>
.card-body{
	padding-top:2px !important;
}

.nav button
{
	line-height:30px;
	font-size:15px;
}

table th,td
{
	font-size:13px;
	font-weight:400;
}
.error
{
	color:red;
	font-size:13px;
}
.mr-1
{
	margin-right:1rem;
}
</style>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Edit Proposal</div>
 
             <!-- <div class="ms-auto">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Settings</button>
                  <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                  </div>
                </div>
              </div>  -->
            </div>
            <!--end breadcrumb-->
			
			
			
			
			<div class="row">
			<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
			
              <div class="card">
                <div class="card-header p-y-3">
				<div class="row">
				<div class="col-lg-9 col-xl-9 col-xxl-9 col-9">
				   <h6 class="mb-0 pt5 mt-2"><i class="fa fa-file"></i>&nbsp;&nbsp;Edit Proposal Details</h6>
				  </div>
				  <div class="col-lg-3 col-xl-3 col-xxl-3 col-3 text-right">
				     <!-- <a href="javascript:;" class="btn btn-primary btn-sm add-user" data-bs-toggle="offcanvas" data-bs-target="#add_user"><i class="lni lni-plus"></i>&nbsp;Add User</a> -->
					 <a href="{{route('users.generate-pdf',$id)}}" class="btn btn-primary btn-sm" ><i class="fa fa-file"></i>&nbsp; Generate Proposal PDF</a>
				  </div>
				  </div>
                </div>

                <div class="card-body">
				
				<input type="hidden" name="proposal_id" id="proposal_id" value="{{$id}}">
				
				<div class="row mt-3">
					<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
						
								<ul class="nav nav-tabs nav-danger" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="tab" href="#dangerhome" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
												</div>
												<div class="tab-title">Proposal Item Values</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" id="customer-details-edit" href="#dangerprofile" role="tab" aria-selected="false" tabindex="-1">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
												</div>
												<div class="tab-title">Customer Details</div>
											</div>
										</a>
									</li>
									
								</ul>
								<div class="tab-content py-3">
									<div class="tab-pane fade show active px-3" id="dangerhome" role="tabpanel">
										
										
										<div class="row pb-2 pt-2" >
											<div class="col-6 col-lg-6 col-xl-6 col-xxl-6">
												<label class="mt-2"><b>List of proposal item values</b></label>
											</div>
											<div class="col-6 col-lg-6 col-xl-6 col-xxl-6 text-right">
												<button type="button" class="btn btn-primary btn-sm" id="btn-add" title="Add Items" data-bs-toggle="modal" data-bs-target="#add-value-modal"><i class="lni lni-plus"></i></button>
											</div>
										</div>
										
										
									    <div class="row pb-2 pt-2" >
											<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
													<div class="row mt-2 pt-2" style="background:#f7f7f7;">
														<div class="col-1 col-lg-1 col-xl-1 col-xxl-1 text-right">
															<label for="Designation" class="form-label mb-2 col-form-label">Filter By</label>
														</div>
														<div class="col-4 col-lg-4 col-xl-4 col-xxl-4">
															<select class="form-control" name="flt_item_section" id="flt_item_section">
															<option value="">All</option>
															@foreach($data['phases'] as $row)
															<option value="{{$row->id}}">{{$row->value_heading}}</option>
															@endforeach
															</select>
														</div>
													</div>
												
												<div class="mt-3" >
												<!--<div class="table-responsive mt-3">-->
												
												 <table id="datatable" class="table align-middle" style="width:100% !important;" >
												   <thead class="thead-semi-dark">
													 <tr style="font-size:13px;font-weight:400;">
														<th>SlNo</th>
														<th>Section Title</th>
														<th>Section Items</th>
														<th>Option</th>
														<th>Amount(AED)</th>
														<th class="no-content" style="width:70px;">Action</th>
													</tr>
												   </thead>
												   <tbody id="table-body">
													  
												   </tbody>
												 </table>
												 
												<!--</div>-->
												
												</div>
											</div>
										</div>

									</div>	

									<!-- TAB 2- CUSTOMER DETAILS -------------------------------------------------->
									<div class="tab-pane fade px-3" id="dangerprofile" role="tabpanel">

									<form id="formUpdateCustomer" enctype="multipart/form-data" >
									@csrf
										
										<input type="hidden" name="old_customer_name" id="old_customer_name" value="{{$prop->customer_name}}" >
										<input type="hidden" name="old_country_code" id="old_country_code"  value="{{$prop->country_code}}" >
										<input type="hidden" name="old_phone_number" id="old_phone_number"  value="{{$prop->phone_number}}" >
										<input type="hidden" name="prop_id" id="prop_id"  value="{{$prop->id}}" >
										
										
										<div class="row">
										<div class="col-12 col-lg-2 col-xl-2 col-xxl-2 col-form-label">
										<h5>Total Amount</h5>
										</div>
										<div class="col-12 col-lg-2 col-xl-2 col-xxl-2">
										<input type="text" class="form-control"  name="total_amount" id="total_amount"  placeholder="Total Amount" value="{{$prop->total_amount}}" required readonly>
										</div>
										</div>
										
										<div class="row">
										<div class="col-12 col-lg-2 col-xl-2 col-xxl-2 col-form-label">
										<h5 >Discount</h5>
										</div>
										<div class="col-2 col-lg-2 col-xl-2 col-xxl-2">
										<input type="text" class="form-control"  name="discount" id="discount" value="{{$prop->discount}}" placeholder="discount" required>
										</div>
										</div>
										
										
										<div class="row">
										<div class="col-12 col-lg-10 col-xl-10 col-xxl-10">
										
											<h5 class="mt-3">Proposal Name </h5>
											<div class="row mt-3">
											<div class="col-11 col-lg-11 col-xl-11 col-xxl-11">
												<input type="text" class="form-control"  name="proposal_name" id="proposal_name"  placeholder="Name of proposal"  value="{{$prop->proposal_name}}" required>
												</div>
											</div>
											
											<h5 class="mt-3">Customer Details </h5>
											
											<div class="row mt-3 mb-3">
											<div class="col-3 col-lg-3 col-xl-3 col-xxl-3">
												<input class="form-check-input cust_option" type="radio" name="flexRadioDefault" value="1" style="width:25px;height:25px;margin:auto 0;" checked> New Customer
											</div>
											
											<div class="col-3 col-lg-3 col-xl-3 col-xxl-3">
												<input class="form-check-input cust_option" type="radio" name="flexRadioDefault" value="2" style="width:25px;height:25px;margin:auto 0;"> Existing Customer
											</div> 
											</div>
											
											<div class="row mt-3 mb-3 hide" id="cust-existing" style="background:#f7f7f7;">
											<div class="col-8 col-lg-8 col-xl-8 col-xxl-8 pb-2 pt-2">

												<label for="Designation" class="form-label mb-2">Select Customer<span class="required">*</span></label>
												<select class="form-control" name="ex_customer" id="ex_customer">
												<option value="">--select--</option>
												@foreach($data['customers'] as $row)
												<option value="{{$row->id}}">{{$row->customer_name}}</option>
												@endforeach
												</select>
											</div>
											</div>
										

													<div class="row mt-2" >
														<div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
															<label for="Designation" class="form-label mb-2 col-form-label">Customer Name<span class="required">*</span></label>
														
															<input type="text" class="form-control"  name="customer_name" id="customer_name"  placeholder="Customer Name" value="{{$prop->customer_name}}" required>
														</div>
													
														<div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
															<label for="Designation" class="form-label mb-2 col-form-label">Phone Number<span class="required">*</span></label>
														<input type="hidden" name="country_code" id="country_code">
															<input type="text" class="form-control"  name="phone_number" id="phone_number"  placeholder="phone number" value="+{{$prop->country_code.$prop->phone_number}}" required>
														</div>
													
													<div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
														<label for="Designation" class="form-label mb-2 col-form-label">Email<span class="required">*</span></label>
															<input type="email" class="form-control"  name="email" id="email"  placeholder="email" value="{{$prop->email}}" required>
														</div>
													</div>

													<div class="row mt-2" >
													<div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
													<label for="Designation" class="form-label mb-2 col-form-label">Business Activity<span class="required">*</span></label>
															<input type="text" class="form-control"  name="activity" id="activity"  placeholder="Activity" value="{{$prop->activity}}" required>
														</div>
													
													<div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
													<label for="amount" class="form-label mb-2 col-form-label">Activity Code<span class="required">*</span></label>
													
															<input type="text" class="form-control"  name="activity_code" id="activity_code"  placeholder="Activity code" value="{{$prop->activity_code}}" required>
														</div>
													
													<div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
													<label for="amount" class="form-label mb-2 col-form-label">Juridiction<span class="required">*</span></label>
															<input type="text" class="form-control"  name="juridiction" id="juridiction"  placeholder="juridication" value="{{$prop->juridiction}}" required>
														</div>
													</div>
													<div class="row mt-2" >
													<div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
													<label for="amount" class="form-label mb-2 col-form-label">Number of Visa<span class="required">*</span></label>
														<input type="number" class="form-control"  name="no_of_visa" id="no_of_visa"  placeholder="no of visa" value="{{$prop->no_of_visa}}" required>
														</div>

													<div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
													<label for="amount" class="form-label mb-2 col-form-label">No of shareholders<span class="required">*</span></label>
															<input type="number" class="form-control"  name="shareholders" id="shareholders"  placeholder="no of shareholders" value="{{$prop->shareholders}}" required>
														</div>
													</div>
	
													<div class="row " >
														<div class="col-11 col-lg-11 col-xl-11 col-xxl-11">
															<label  class="form-label mb-2" style="width:100%;">&nbsp;</label>
															<button type="submit" class="btn btn-primary mr-1" id="btn-add"  style="width:170px;"> Update Customer </button>
															<a href="{{url('users/proposals')}}" class="btn btn-secondary mr-1" id="btn-close" style="width:100px;"> Close </a>
														</div>
														
														
													</div>

										</div>

										</div>
										</form>

								</div>
			
						</div>
					</div>

                </div>
              </div>
		</div>
	</div>	  

<!-- add new item details ---------------------->

	 <div class="modal fade" id="add-value-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
					<form  id="addNewProposalItem"  enctype="multipart/form-data">
						@csrf
		
						<input type="hidden" name="propo_id" id="propo_id" value="{{$id}}">
								
							<div class="row mt-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Proposal Section<span class="required">*</span></label>
									<select class="form-control" name="item_section" id="item_section">
									<option value="">--select--</option>
									@foreach($data['phases'] as $row)
									<option value="{{$row->id.','.$row->value_heading}}">{{$row->value_heading}}</option>
									@endforeach
									</select>
								</div>
							</div>

							<div class="row mt-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Select Item<span class="required">*</span></label>
									<select class="form-select" name="item_name" id="item_name">
									<option value="">--select--</option>
									@foreach($data['items'] as $row)
									<option value="{{$row->item_name}}">{{$row->item_name}}</option>
									@endforeach
									</select>
								</div>
							</div>

							<div class="row mt-2" >													
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Select Option<span class="required">*</span></label>
									<select class="form-select" name="item_option" id="item_option">
									<option value="">--select--</option>
									<option value="Included"> Included</option>
									<option value="Not Included"> Not Included</option>
									<option value="Upto The Client"> Upto The Client</option>
									</select>
								</div>
							</div>
							
							
							<div class="row mt-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="amount" class="form-label mb-2">Amount<span class="required">*</span></label>
									<input type="number" class="form-control"  name="item_amount" id="item_amount"  placeholder="amount" required>
								</div>
							</div>
							
							
							<div class="row " >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12 text-right">
									<label  class="form-label mb-2" style="width:100%;">&nbsp;</label>
									<button type="submit" class="btn btn-primary" id="btn-add" type="submit" style="width:100px;"> Submit </button>
								</div>
							</div>
					</form>	

					<!--<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div> -->
				</div>
			</div>
		</div>
	</div>



<!--- edit proposal headings------------------->
	 
	 <div class="modal fade" id="edit-value-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
					<form  id="updateItemData" >
						@csrf
						<input type="hidden" name="item_id" id="item_id" >
							
							<div class="row mt-2" >													
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Select Option<span class="required">*</span></label>
									<select class="form-select" name="item_option_edit" id="item_option_edit">
									<option value="">--select--</option>
									<option value="Included"> Included</option>
									<option value="Not Included"> Not Included</option>
									<option value="Upto The Client"> Upto The Client</option>
									</select>
								</div>
							</div>
							
							<div class="row mt-2" >
							<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
								<label for="amount" class="form-label mb-2">Amount<span class="required">*</span></label>
								<input type="number" class="form-control"  name="item_amount_edit" id="item_amount_edit"  placeholder="amount" required>
							</div>
							</div>
							
							<div class="row mt-2" >
							<div class="col-12 col-lg-12 col-xl-12 col-xxl-12 text-right">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							</div>
					</form>

					<!--<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div> -->
				</div>
			</div>
		</div>
	</div>






@push('scripts')


@if(Session::get('success'))
	<script>
		toastr.success("{{Session::get('success')}}");
	</script>
@endif

@if (Session::get('fail'))
	<script>
		toastr.error("{{Session::get('fail')}}");
	</script>
@endif

<script>


var phoneNumber = window.intlTelInput(document.querySelector("#phone_number"), {
	  separateDialCode: true,
	  preferredCountries:['AE',"IN"],
	  hiddenInput: "full_number",
	  utilsScript:"{{url('assets/intl-tel-input17.0.3/utils.js')}}"
	});


BASE_URL ={!! json_encode(url('/')) !!}


//to manage proposal headings -------------------------------

var id=$("#proposal_id").val();

var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
		stateSave:true,
		paging     : true,
        pageLength :50,
		
		'pagingType':"simple_numbers",
        'lengthChange': true,
			
		ajax:
		{
			url:BASE_URL+"/users/view-proposal-values-for-edit"+"/"+id,
			data: function (data) 
		    {
               data.heading_id = $('#flt_item_section').val();
		    },
        },

        columns: [
            {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
			{"data": "val_sec" },
			{"data": "item" },
			{"data": "inc_option" },
			{"data": "amount" },
			{"data": "action" ,name: 'Action',orderable: false, searchable: false },
        ],

});


$(".cust_option").change(function()
{
	clearData();
	if($(this).val()==2)
	{
		$("#cust-existing").removeClass('hide');
		$("#cust-existing").addClass('show');
	}
	else
	{
		$("#cust-existing").removeClass('show');
		$("#cust-existing").addClass('hide');
	}
});

function clearData()
{
	$("#customer_name").val('');
	$("#phone_number").val('');
	$("#email").val('');
	$("#activity").val('');
	$("#activity_code").val('');
	$("#juridiction").val('');
	$("#no_of_visa").val('');
	$("#shareholders").val('');
}

$("#ex_customer").change(function()
{
	var id=$(this).val();
	if(id!='')
	{
		$.ajax({
		url: "{{ url('users/get-customer')}}"+"/"+id,
		method: 'get',
		dataType:'json',
		success: function(result){
			if(result.status == 1)
			{
				$("#customer_name").val(result.data.customer_name);
				$("#phone_number").val(result.data.phone_number);
				$("#email").val(result.data.email);
				$("#activity").val(result.data.activity);
				$("#activity_code").val(result.data.activity_code);
				$("#juridiction").val(result.data.juridiction);
				$("#no_of_visa").val(result.data.no_of_visa);
				$("#shareholders").val(result.data.shareholders);
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	}

});

//to get total amount and discount

$(document).on('click',"#customer-details-edit",function()
{
	var id=$("#proposal_id").val();
	 $.ajax({
          url: "{{url('users/get-proposal-item-total-amount-edit')}}"+'/'+id,
          type: 'get',
		  dataType: 'json',
          //data:{'track_id':tid},
          success: function (res) 
		  {
			if(res.status==1)
			{
			   $("#total_amount").val(res.amount);
			   toastr.success(res.msg);
			   $("#proposal_name").focus();
			}
			else
			{
			   toastr.error(res.msg);
			}
          }
		});
});


$("#datatable tbody").on('click','.edit-item',function()
{
	var inc=$(this).data('includeoption');
	var amt=$(this).data('amount');
	$("#item_id").val($(this).attr('id'));
	$("#item_amount_edit").val(amt);
	$("#item_option_edit").val(inc);
});


$("#flt_item_section").change(function()
{
	$('#datatable').DataTable().ajax.reload(null,false);
});


var addValidate=$('#formUpdateCustomer').validate({ 
	
	rules: {
		proposal_name: {required: true,},
		customer_name: {required: true,},
		phone_number: {required: true,},
		email: {required: true,},
		activity: {required: true,},
		activity_code: {required: true,},
		no_of_visa: {required: true,},
		shareholders: {required: true,},
	},

	submitHandler: function(form) 
	{

		var code=phoneNumber.getSelectedCountryData()['dialCode'];
		$("#country_code").val(code);

		$.ajax({
		url: "{{ url('users/update-proposal-customer') }}",
		method: 'post',
		data: $('#formUpdateCustomer').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				//toastr.success(result.msg);
				$("#old_customer_name").val(result.data.cname);
				$("#old_country_code").val(result.data.ccode);
				$("#old_phone_number").val(result.data.mobile);
				
				Swal.fire({
					title:'SUCCESS!!!',
					text: result.msg,
				});
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }

});

var validate1=$('#updateItemData').validate({ 
	
	rules: {
		item_option_edit: {required: true,},
		item_amount_edit: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/update-proposal-item-value') }}",
		method: 'post',
		data: $('#updateItemData').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable').DataTable().ajax.reload(null,false);
				$('#updateItemData')[0].reset();
				$("#edit-value-modal").modal('hide');
				toastr.success(result.msg);
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }

});


var validate1=$('#addNewProposalItem').validate({ 
	
	rules: {
		item_section: {required: true,},
		item_name: {required: true,},
		item_option: {required: true,},
		item_amount: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/save-new-proposal-item') }}",
		method: 'post',
		data: $('#addNewProposalItem').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable').DataTable().ajax.reload(null,false);
				$('#addNewProposalItem')[0].reset();
				$("#add-value-modal").modal('hide');
				toastr.success(result.msg);
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }

});





$('#datatable tbody').on('click','.edit-banner',function()
{

	var id=$(this).attr('id');
	var data=$(this).data('bannertext');
	$("#banner_id").val(id);
	$("#banner_text").val(data);
});


$('#datatable tbody').on('click','.del-item',function()
{
	Swal.fire({
	  //title: "Are you sure?",
	  text: "Are you sure, You want to delete this item?",
	  icon: "question",
	  showCancelButton: true,
	  confirmButtonColor: "#3085d6",
	  cancelButtonColor: "#d33",
	  confirmButtonText: "Yes, Delete it!"
	}).then((result) => {
	  if (result.isConfirmed) {
		
		var tid=$(this).attr('id');
		
		  $.ajax({
          url: "{{url('users/delete-proposal-value')}}"+'/'+tid,
          type: 'get',
		  dataType: 'json',
          //data:{'track_id':tid},
          success: function (res) 
		  {
			if(res.status==1)
			{
				 toastr.success(res.msg);
				 $("#datatable").DataTable().ajax.reload(null,false);
			}
			else
			{
				 toastr.error(res.msg);
			}
          }
		});

	  }
	});

});


</script>
@endpush
@endsection
