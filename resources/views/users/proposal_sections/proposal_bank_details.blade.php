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

</style>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Proposal Sections</div>
 
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
				   <h6 class="mb-0 pt5 mt-2"><i class="fa fa-user-plus"></i>Bank Details</h6>
				  </div>
				  <div class="col-lg-3 col-xl-3 col-xxl-3 col-3 text-right">
				     <!-- <a href="javascript:;" class="btn btn-primary btn-sm add-user" data-bs-toggle="offcanvas" data-bs-target="#add_user"><i class="lni lni-plus"></i>&nbsp;Add User</a> -->
				  </div>
				  </div>
                </div>

                <div class="card-body">

					   <div class="row mt-3">
						<div class="col-2 col-lg-2 col-xl-2 col-xxl-2">
						
						@include('users.proposal_sections.proposal_options');

						</div>
												
						<div class="col-10 col-lg-10 col-xl-10 col-xxl-10 " style="border-left:1px solid #e4e4e4;">
						 						  
						  <div class="align-items-start ps-3 px-3" >

								<div class="row">
									<div class="col-6 col-lg-6 col-xl-6 col-xxl-6">
										<h6>Bank Details</h6>
									</div>
									<div class="col-6 col-lg-6 col-xl-6 col-xxl-6 text-right">
										<!--<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Add</button>-->
									</div>
								</div>
								<hr style="margin:0px;">
								
								<div class="row mt-3 pb-2 pt-2" style="background:#e4e4e4;">
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
								<form  id="addBankDetail" >
										@csrf
										<div class="row" >
											<div class="col-4 col-lg-4 col-xl-4 col-xxl-4">
												<label for="Designation" class="form-label mb-2">Bank Name <span class="required">*</span></label>
												<input type="text" class="form-control"  name="bank_name" id="bank_name"  placeholder="bank_name" required>
											</div>
											<div class="col-4 col-lg-4 col-xl-4 col-xxl-4">
												<label for="Designation" class="form-label mb-2">Account Name <span class="required">*</span></label>
												<input type="text" class="form-control"  name="account_name" id="account_name"  placeholder="bank_name" required>
											</div>
											<div class="col-4 col-lg-4 col-xl-4 col-xxl-4">
												<label for="Designation" class="form-label mb-2">IBAN Number <span class="required">*</span></label>
												<input type="text" class="form-control"  name="iban_number" id="iban_number"  placeholder="bank_name" required>
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-3 col-lg-3 col-xl-3 col-xxl-3">
												<label for="Designation" class="form-label mb-2">Swift Code <span class="required">*</span></label>
												<input type="text" class="form-control"  name="swift_code" id="swift_code"  placeholder="bank_name" required>
											</div>
											<div class="col-3 col-lg-3 col-xl-3 col-xxl-3">
												<label for="Designation" class="form-label mb-2">Account Number <span class="required">*</span></label>
												<input type="text" class="form-control"  name="account_no" id="account_no"  placeholder="bank_name" required>
											</div>
											<div class="col-2 col-lg-2 col-xl-2 col-xxl-2">
												<label for="Designation" class="form-label mb-2">Currency <span class="required">*</span></label>
												<select class="form-control"  name="currency" id="currency" required>
												<option value="">--select--</option>
												<option value="AED">AED</option>
												<option value="USD">USD</option>
												</select>
											</div>
											
											<div class="col-4 col-lg-4 col-xl-4 col-xxl-4">
												<label for="Designation" class="form-label mb-2">Branch <span class="required">*</span></label>
												<input type="text" class="form-control"  name="branch_name" id="branch_name"  placeholder="bank_name" required>
											</div>
										</div>
										
										<div class="row mt-2" >
											<div class="col-12 col-lg-12 col-xl-12 col-xxl-12 text-right">
												<button class="btn btn-primary"  type="submit"> Submit </button>
											</div>
											
										</div>
										</div>
								</form>
								</div>

								<div class="row pb-2 pt-2">
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
								<div class="table-responsive mt-3">
								 <table id="datatable" class="table align-middle" style="width:100% !important;" >
								   <thead class="thead-semi-dark">
									 <tr>
										<th>SlNo</th>
										<th>Bank Name</th>
										<th>Account Name</th>
										<th>IBAN No</th>
										<th>Swift Code</th>
										<th>Account No</th>
										<th>Currency</th>
										<th>Branch</th>
										<th class="no-content" style="width:50px;">Action</th>
									</tr>
								   </thead>
								   <tbody>
									  
								   </tbody>
								 </table>
							    </div>
							    </div>
								</div>
								
							</div>
						<!-- end -------------------->	
						

						</div>
						</div>
					
					</div>
				

                </div>
              </div>
		
		
		</div>

		
		<div class="offcanvas offcanvas-end shadow border-start-0 p-2" id="add_user" style="width:25% !important" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" aria-modal="true" role="dialog">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add User</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
			<div class="offcanvas-body">
  


  
            </div>
		</div>

	
	
	<div class="modal fade" id="edit-bank-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
					<form  id="formUpdateBankDetail">
						@csrf
						<input type="hidden" name="bank_id_edit" id="bank_id_edit" >
							
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Bank Name <span class="required">*</span></label>
									<input type="text" class="form-control"  name="bank_name_edit" id="bank_name_edit"  placeholder="Bank_name" required>
								</div>
							</div>
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Account Name <span class="required">*</span></label>
									<input type="text" class="form-control"  name="account_name_edit" id="account_name_edit"  placeholder="Account Name" required>
								</div>
							</div>
							
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">IBAN Number <span class="required">*</span></label>
									<input type="text" class="form-control"  name="iban_number_edit" id="iban_number_edit"  placeholder="IBAN Number" required>
								</div>
							</div>
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Swift Code <span class="required">*</span></label>
									<input type="text" class="form-control"  name="swift_code_edit" id="swift_code_edit"  placeholder="Swift code" required>
								</div>
							</div>
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Account Number <span class="required">*</span></label>
									<input type="text" class="form-control"  name="account_no_edit" id="account_no_edit"  placeholder="Account Number" required>
								</div>
							</div>
							
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Currency <span class="required">*</span></label>
										<select class="form-control"  name="currency_edit" id="currency_edit" required>
										<option value="">--select--</option>
										<option value="AED">AED</option>
										<option value="USD">USD</option>
										</select>
								</div>
							</div>
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="Designation" class="form-label mb-2">Branch <span class="required">*</span></label>
									<input type="text" class="form-control"  name="branch_name_edit" id="branch_name_edit"  placeholder="bank_name" required>
								</div>
							</div>
						
							<div class="row mb-2 mt-3">
								<div class="col-lg-12 col-xl-12 col-xxl-12 text-end">
								<button class="btn btn-primary" type="submit"> Update </button>
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

BASE_URL ={!! json_encode(url('/')) !!}

//to manage proposal headings -------------------------------

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
			url:BASE_URL+"/users/view-bank-details",
			data: function (data) 
		    {
               //data.search = $('input[type="search"]').val();
		    },
        },

        columns: [
            {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
			{"data": "bnk_name" },
			{"data": "ac_name" },
			{"data": "iban" },
			{"data": "scode" },
			{"data": "ac_number" },
			{"data": "currency" },
			{"data": "branch" },
			{"data": "action" ,name: 'Action',orderable: false, searchable: false },
        ],

});

				
var addValidator=$('#addBankDetail').validate({ 
	
	rules: {
		heading: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/save-bank-details') }}",
		method: 'post',
		data: $('#addBankDetail').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable').DataTable().ajax.reload(null,false);
				toastr.success(result.msg);
				$('#addBankDetail')[0].reset();
				
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});


$('#datatable tbody').on( 'click', '.edit-bank', function ()
  {
	var id=$(this).attr('id');
	
	//var Result=$("#BasicModal2 .modal-body");
	
		//$(this).attr('data-bs-target','#BasicModal2');
	
			jQuery.ajax({
			type: "GET",
			url: "{{url('users/edit-bank-detail')}}"+"/"+id,
			dataType: 'json',
			//data: {vid: vid},
			success: function(res)
			{
			   if(res.status==1)
			   {
				   $("#bank_id_edit").val(res.data.id);
				   $("#bank_name_edit").val(res.data.bank_name);
				   $("#account_name_edit").val(res.data.account_name);
				   $("#iban_number_edit").val(res.data.iban_number);
				   $("#swift_code_edit").val(res.data.swift_code);
				   $("#account_no_edit").val(res.data.account_number);
				   $("#currency_edit").val(res.data.currency);
				   $("#branch_name_edit").val(res.data.branch_name);
				}

			}
		});
  });
 


var addValidator=$('#formUpdateBankDetail').validate({ 
	
	rules: {
		bank_name_edit: {required: true,},
		account_name_edit: {required: true,},
		iban_number_edit: {required: true,},
		swift_code_edit: {required: true,},
		account_no_edit: {required: true,},
		currency_edit: {required: true,},
		branch_name_edit: {required: true,},
		
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/update-bank-details') }}",
		method: 'post',
		data: $('#formUpdateBankDetail').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				toastr.success(result.msg);
				$('#datatable').DataTable().ajax.reload(null,false);
				$('#formUpdateBankDetail')[0].reset();
				$('#edit-bank-modal').modal('hide');
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});


$('#datatable tbody').on('click','.delete-bank',function()
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
          url: "{{url('users/delete-bank-details')}}"+'/'+tid,
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
