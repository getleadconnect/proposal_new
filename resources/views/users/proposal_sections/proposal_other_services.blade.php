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
				   <h6 class="mb-0 pt5 mt-2"><i class="fa fa-user-plus"></i>Proposal Headings</h6>
				  </div>
				  <div class="col-lg-3 col-xl-3 col-xxl-3 col-3 text-right">
				     <!-- <a href="javascript:;" class="btn btn-primary btn-sm add-user" data-bs-toggle="offcanvas" data-bs-target="#add_user"><i class="lni lni-plus"></i>&nbsp;Add User</a> -->
				  </div>
				  </div>
                </div>

                <div class="card-body">

					   <div class="row mt-3">
						<div class="col-3 col-lg-3 col-xl-3 col-xxl-3">
						
						@include('users.proposal_sections.proposal_options');
						
						</div>
						
						
						<div class="col-9 col-lg-9 col-xl-9 col-xxl-9 " style="border-left:1px solid #e4e4e4;">
						  
						  
						  <div class="align-items-start ps-3 px-3" >
							
							<!-- OTHER SERVICES----------------------------------------------->
							
							    <div class="row">
									<div class="col-6 col-lg-6 col-xl-6 col-xxl-6">
										<h6>Other Services</h6>
									</div>
									<div class="col-6 col-lg-6 col-xl-6 col-xxl-6 text-right">
										<!--<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Add</button>-->
									</div>
								</div>
							
								<hr style="margin:0px;">
								
								<div class="row mt-3 pb-2 pt-2" style="background:#e4e4e4;">
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<form  id="addOtherService" >
											@csrf
											<div class="row" >
				
												<div class="col-2 col-lg-2 col-xl-2 col-xxl-2 col-form-label">
													<label for="item_name" class="form-label mb-2">Service<span class="required">*</span></label>
												</div>
												<div class="col-7 col-lg-7 col-xl-7 col-xxl-7">
													<textarea class="form-control"  name="other_service" id="other_service"  placeholder="service data" required></textarea>
												</div>
											
												<div class="col-lg-2 col-xl-2 col-xxl-2">
												<button class="btn btn-primary"  type="submit"> Add </button>
												</div>
											</div>
									</form>
								</div>
								</div>
							
							<div class="row pb-2 pt-2">
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
								<div class="table-responsive mt-3">
								 <table id="datatable" class="table align-middle" style="width:100% !important;" >
								   <thead class="thead-semi-dark">
									 <tr>
										<th> SlNo</th>
										<th >Service</th>
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

	<div class="modal fade" id="edit-other-service-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
					<form  id="formUpdateOtherService" >
						@csrf
						<input type="hidden" name="other_service_id" id="other_service_id" >
							
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="item_name" class="form-label mb-2">Service <span class="required">*</span></label>
									<textarea class="form-control" rows=4 name="other_service_edit" id="other_service_edit"  placeholder="Service data" required></textarea>
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

// Other service details ----------------------------------------------------------

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
			url:BASE_URL+"/users/view-other-services",
			data: function (data) 
		    {
               //data.search = $('input[type="search"]').val();
		    },
        },
		
			
        columns: [
            {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
			{"data": "other_service" },
			{"data": "action" ,name: 'Action',orderable: false, searchable: false },
        ],

});

var addValidator=$('#addOtherService').validate({ 
	
	rules: {
		other_service: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/save-other-service') }}",
		method: 'post',
		data: $('#addOtherService').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable').DataTable().ajax.reload(null,false);
				toastr.success(result.msg);
				$('#addOtherService')[0].reset();
				
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});

$('#datatable tbody').on('click','.edit-other-service',function()
{

	var id=$(this).attr('id');
	var data=$(this).data('otherservice');
	$("#other_service_id").val(id);
	$("#other_service_edit").val(data);
});


var addValidator=$('#formUpdateOtherService').validate({ 
	
	rules: {
		other_service_edit: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/update-other-service') }}",
		method: 'post',
		data: $('#formUpdateOtherService').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				toastr.success(result.msg);
				$('#datatable').DataTable().ajax.reload(null,false);
				$('#formUpdateOtherService')[0].reset();
				$('#edit-other-service-modal').modal('hide');
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});


$('#datatable tbody').on('click','.delete-other-service',function()
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
          url: "{{url('users/delete-other-service')}}"+'/'+tid,
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
