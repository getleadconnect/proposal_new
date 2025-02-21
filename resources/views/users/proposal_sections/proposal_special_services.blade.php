@extends('layouts.master')
@section('title','Proposal')
@section('contents')
<style>
.card-body{
	padding-top:2px !important;
}
.td-count
{
	width:10%;
}
.td-desc
{
	width:30%;
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
						
						@include('users.proposal_section.proposal_options');

						</div>
						
						
						<div class="col-9 col-lg-9 col-xl-9 col-xxl-9 " style="border-left:1px solid #e4e4e4;">
						  
						  
						  <div class="align-items-start ps-3 px-3" >
								
								<div class="row">
									<div class="col-6 col-lg-6 col-xl-6 col-xxl-6">
										<h6>Special Services</h6>
									</div>
									<div class="col-6 col-lg-6 col-xl-6 col-xxl-6 text-right">
										<!--<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Add</button>-->
									</div>
								</div>
							
								<hr style="margin:0px;">
								
								<div class="row mt-3 pb-2 pt-2" style="background:#e4e4e4;">
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<form  id="addSpecialService" >
											@csrf
											<div class="row" >
				
												<div class="col-2 col-lg-2 col-xl-2 col-xxl-2 col-form-label">
													<label for="item_name" class="form-label mb-2">Special service<span class="required">*</span></label>
												</div>
												<div class="col-7 col-lg-7 col-xl-7 col-xxl-7">
													<textarea class="form-control"  name="service_data" id="service_data"  placeholder="service data" required></textarea>
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
								 <table id="datatable2" class="table align-middle" style="width:100% !important;" >
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

	<div class="modal fade" id="edit-special-service-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
					<form  id="formUpdateSpecialService" >
						@csrf
						<input type="hidden" name="service_id" id="service_id" >
							
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="item_name" class="form-label mb-2">Special Service <span class="required">*</span></label>
									<textarea class="form-control" rows=4 name="service_data_edit" id="service_data_edit"  placeholder="Service data" required></textarea>
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
	
	<div class="modal fade" id="edit-process-timeline-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
					<form  id="formUpdateProcessTimeline" >
						@csrf
						<input type="hidden" name="timeline_id" id="timeline_id" >
							
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="item_name" class="form-label mb-2">Timeline Details <span class="required">*</span></label>
									<textarea class="form-control" rows=4 name="timeline_edit" id="timeline_edit"  placeholder="Timeline" required></textarea>
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
			url:BASE_URL+"/users/view-proposal-headings",
			data: function (data) 
		    {
               //data.search = $('input[type="search"]').val();
		    },
        },

        columns: [
            {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
			{"data": "heading" },
			{"data": "action" ,name: 'Action',orderable: false, searchable: false },
        ],

});

				
var addValidator=$('#addHeading').validate({ 
	
	rules: {
		heading: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/save-heading') }}",
		method: 'post',
		data: $('#addHeading').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable').DataTable().ajax.reload(null,false);
				toastr.success(result.msg);
				$('#addHeading')[0].reset();
				
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});

$('#datatable tbody').on('click','.edit-head',function()
{

	var id=$(this).attr('id');
	var data=$(this).data('heading');
	$("#head_id").val(id);
	$("#heading_edit").val(data);
});


var addValidator=$('#formUpdateHeading').validate({ 
	
	rules: {
		heading_edit: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/update-heading') }}",
		method: 'post',
		data: $('#formUpdateHeading').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				toastr.success(result.msg);
				$('#datatable').DataTable().ajax.reload(null,false);
				$('#formUpdateHeading')[0].reset();
				$('#edit-heading-modal').modal('hide');
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});


$('#datatable tbody').on('click','.delete-head',function()
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
          url: "{{url('users/delete-heading')}}"+'/'+tid,
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


//to manage proposal heading items -------------------------------


var table = $('#datatable1').DataTable({
        processing: true,
        serverSide: true,
		stateSave:true,
		paging     : true,
        pageLength :50,
		
		'pagingType':"simple_numbers",
        'lengthChange': true,
			
		ajax:
		{
			url:BASE_URL+"/users/view-heading-items",
			data: function (data) 
		    {
               //data.search = $('input[type="search"]').val();
		    },
        },
		
        columns: [
            {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
			{"data": "item_name" },
			{"data": "action" ,name: 'Action',orderable: false, searchable: false },
        ],

});

var addValidator=$('#addHeadingItem').validate({ 
	
	rules: {
		heading: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/save-heading-item') }}",
		method: 'post',
		data: $('#addHeadingItem').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable1').DataTable().ajax.reload(null,false);
				toastr.success(result.msg);
				$('#addHeadingItem')[0].reset();
				
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});

$('#datatable1 tbody').on('click','.edit-item',function()
{

	var id=$(this).attr('id');
	var data=$(this).data('itemname');
	$("#item_id").val(id);
	$("#item_name_edit").val(data);
});


var addValidator=$('#formUpdateHeadingItem').validate({ 
	
	rules: {
		item_name_edit: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/update-heading-item') }}",
		method: 'post',
		data: $('#formUpdateHeadingItem').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				toastr.success(result.msg);
				$('#datatable1').DataTable().ajax.reload(null,false);
				$('#formUpdateHeadingItem')[0].reset();
				$('#edit-item-modal').modal('hide');
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});


$('#datatable1 tbody').on('click','.delete-item',function()
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
          url: "{{url('users/delete-heading-item')}}"+'/'+tid,
          type: 'get',
		  dataType: 'json',
          //data:{'track_id':tid},
          success: function (res) 
		  {
			if(res.status==1)
			{
				 toastr.success(res.msg);
				 $("#datatable1").DataTable().ajax.reload(null,false);
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


// Special service details ----------------------------------------------------------


var table = $('#datatable2').DataTable({
        processing: true,
        serverSide: true,
		stateSave:true,
		paging     : true,
        pageLength :50,
		
		'pagingType':"simple_numbers",
        'lengthChange': true,
			
		ajax:
		{
			url:BASE_URL+"/users/view-special-services",
			data: function (data) 
		    {
               //data.search = $('input[type="search"]').val();
		    },
        },
		
			
        columns: [
            {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
			{"data": "service_data" },
			{"data": "action" ,name: 'Action',orderable: false, searchable: false },
        ],

});

var addValidator=$('#addSpecialService').validate({ 
	
	rules: {
		service_data: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/save-special-service') }}",
		method: 'post',
		data: $('#addSpecialService').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable2').DataTable().ajax.reload(null,false);
				toastr.success(result.msg);
				$('#addSpecialService')[0].reset();
				
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});

$('#datatable2 tbody').on('click','.edit-sp-service',function()
{

	var id=$(this).attr('id');
	var data=$(this).data('servicedata');
	$("#service_id").val(id);
	$("#service_data_edit").val(data);
});


var addValidator=$('#formUpdateSpecialService').validate({ 
	
	rules: {
		service_data_edit: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/update-special-service') }}",
		method: 'post',
		data: $('#formUpdateSpecialService').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				toastr.success(result.msg);
				$('#datatable2').DataTable().ajax.reload(null,false);
				$('#formUpdateSpecialService')[0].reset();
				$('#edit-special-service-modal').modal('hide');
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});


$('#datatable2 tbody').on('click','.delete-sp-service',function()
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
          url: "{{url('users/delete-special-service')}}"+'/'+tid,
          type: 'get',
		  dataType: 'json',
          //data:{'track_id':tid},
          success: function (res) 
		  {
			if(res.status==1)
			{
				 toastr.success(res.msg);
				 $("#datatable2").DataTable().ajax.reload(null,false);
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



// Other service details ----------------------------------------------------------


var table = $('#datatable3').DataTable({
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
				$('#datatable3').DataTable().ajax.reload(null,false);
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

$('#datatable3 tbody').on('click','.edit-other-service',function()
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
				$('#datatable3').DataTable().ajax.reload(null,false);
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


$('#datatable3 tbody').on('click','.delete-other-service',function()
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
				 $("#datatable3").DataTable().ajax.reload(null,false);
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

// Process Time lines ----------------------------------------------------------


var table = $('#datatable4').DataTable({
        processing: true,
        serverSide: true,
		stateSave:true,
		paging     : true,
        pageLength :50,
		
		'pagingType':"simple_numbers",
        'lengthChange': true,
			
		ajax:
		{
			url:BASE_URL+"/users/view-process-timelines",
			data: function (data) 
		    {
               //data.search = $('input[type="search"]').val();
		    },
        },
		
			
        columns: [
            {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
			{"data": "timeline" },
			{"data": "action" ,name: 'Action',orderable: false, searchable: false },
        ],

});


var addValidator=$('#addProcessTimeline').validate({ 
	
	rules: {
		timeline: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/save-process-timeline') }}",
		method: 'post',
		data: $('#addProcessTimeline').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable4').DataTable().ajax.reload(null,false);
				toastr.success(result.msg);
				$('#addProcessTimeline')[0].reset();
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});

$('#datatable4 tbody').on('click','.edit-timeline',function()
{

	var id=$(this).attr('id');
	var data=$(this).data('timeline');
	$("#timeline_id").val(id);
	$("#timeline_edit").val(data);
});


var addValidator=$('#formUpdateProcessTimeline').validate({ 
	
	rules: {
		timeline_edit: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/update-process-timeline') }}",
		method: 'post',
		data: $('#formUpdateProcessTimeline').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				toastr.success(result.msg);
				$('#datatable4').DataTable().ajax.reload(null,false);
				$('#formUpdateProcessTimeline')[0].reset();
				$('#edit-process-timeline-modal').modal('hide');
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});


$('#datatable4 tbody').on('click','.delete-timeline',function()
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
          url: "{{url('users/delete-process-timeline')}}"+'/'+tid,
          type: 'get',
		  dataType: 'json',
          //data:{'track_id':tid},
          success: function (res) 
		  {
			if(res.status==1)
			{
				 toastr.success(res.msg);
				 $("#datatable4").DataTable().ajax.reload(null,false);
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
