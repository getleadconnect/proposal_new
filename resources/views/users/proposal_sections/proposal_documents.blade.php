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
				   <h6 class="mb-0 pt5 mt-2"><i class="fa fa-user-plus"></i>Proposal Documents</h6>
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
						  <div class="tab-content" id="v-pills-tabContent">
						  
							<!-- Proposal PHASE headings --------->
							  
							<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
								
								<div class="row">
									<div class="col-6 col-lg-6 col-xl-6 col-xxl-6">
										<h6>Documents Required</h6>
									</div>
									<div class="col-6 col-lg-6 col-xl-6 col-xxl-6 text-right">
										<!--<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Add</button>-->
									</div>
								</div>
								<hr style="margin:0px;">
								
								<div class="row mt-3 pb-2 pt-2" style="background:#e4e4e4;">
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
								<form  id="addDocument" >
									@csrf
									<div class="row" >
										<div class="col-2 col-lg-2 col-xl-2 col-xxl-2 col-form-label">
											<label for="Designation" class="form-label mb-2">Documents Required <span class="required">*</span></label>
										</div>
										<div class="col-7 col-lg-7 col-xl-7 col-xxl-7">
											<textarea class="form-control"  name="document" id="document"  placeholder="heading" required> </textarea>
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
								<!--<div class="table-responsive mt-3"> -->
								 <table id="datatable" class="table align-middle" style="width:100% !important;" >
								   <thead class="thead-semi-dark">
									 <tr>
										<th>SlNo</th>
										<th>Document Required</th>
										<th class="no-content" style="width:50px;">Action</th>
									</tr>
								   </thead>
								   <tbody>
									  
								   </tbody>
								 </table>
							    <!--</div>-->
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


<!--- edit proposal headings------------------->
	 
	 <div class="modal fade" id="edit-document-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
					<form  id="formUpdateDocument" >
						@csrf
						<input type="hidden" name="document_id" id="document_id" >
							
							<div class="row mb-2" >
								<div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
									<label for="heading" class="form-label mb-2">Document Required <span class="required">*</span></label>
									<textarea rows=4 class="form-control"  name="document_edit" id="document_edit"  placeholder="heading" required></textarea>
								</div>
							</div>
							
							<div class="row mb-2 mt-3">
								<div class="col-lg-12 col-xl-12 col-xxl-12 text-end">
								<button class="btn btn-primary"  type="submit"> Update </button>
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
			url:BASE_URL+"/users/view-documents",
			data: function (data) 
		    {
               //data.search = $('input[type="search"]').val();
		    },
        },

        columns: [
            {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
			{"data": "document" },
			{"data": "action" ,name: 'Action',orderable: false, searchable: false },
        ],

});

				
var addValidator=$('#addDocument').validate({ 
	
	rules: {
		document: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/save-document') }}",
		method: 'post',
		data: $('#addDocument').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable').DataTable().ajax.reload(null,false);
				toastr.success(result.msg);
				$('#addDocument')[0].reset();
				
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});


$('#datatable tbody').on('click','.edit-doc',function()
{

	var id=$(this).attr('id');
	var data=$(this).data('document');
	$("#document_id").val(id);
	$("#document_edit").val(data);
});


var addValidator=$('#formUpdateDocument').validate({ 
	
	rules: {
		document_edit: {required: true,},
	},

	submitHandler: function(form) 
	{

		$.ajax({
		url: "{{ url('users/update-document') }}",
		method: 'post',
		data: $('#formUpdateDocument').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				toastr.success(result.msg);
				$('#datatable').DataTable().ajax.reload(null,false);
				$('#formUpdateDocument')[0].reset();
				$('#edit-document-modal').modal('hide');
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});


$('#datatable tbody').on('click','.delete-doc',function()
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
          url: "{{url('users/delete-document')}}"+'/'+tid,
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
