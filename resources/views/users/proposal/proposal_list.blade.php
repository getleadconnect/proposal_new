@extends('layouts.master')
@section('title','Dashboard')
@section('contents')

<!-- for message -------------->
		<input type="hidden" id="view_message" value="{{ Session::get('message') }}">
<!-- for message end-------------->	


<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Proposals</div>
 
             <div class="ms-auto">
				  <a href="{{url('users/proposal/create')}}" type="button" class="btn btn-primary" ><i class="fa fa-plus"></i> New Proposal</a>
              </div>
            </div>
            <!--end breadcrumb-->

              <div class="card">
			  
                <!--<div class="card-header p-y-3">
				<div class="row">
				<div class="col-lg-9 col-xl-9 col-xxl-9 col-9">
                  <h6 class="mb-0 pt5">List</h6>
				  </div>
				  <div class="col-lg-3 col-xl-3 col-xxl-3 col-3 text-right">
	
				  </div>

				  </div>
                </div> -->
				
                <div class="card-body">
					<div class="accordion-item accordion-item-bm" >
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" >
                          <div class="accordion-body">
						   <div class="row" style="padding:3px 10px 0px 10px;" >
							<div class="col-3 col-lg-3">
								<label>Center</label>
								<select class="form-control mb-3" id="flt_center" placeholder="center" required>
								<option value="">select</option>

								</select>
							</div>
							
							<div class="col-3 col-lg-3">
								<label>District</label>
								<select class="form-control mb-3" id="flt_district" placeholder="district" required>
								<option value="">select</option>

								</select>
							</div>
						   </div>
						</div>
					  </div>
					  
					</div>
				
                   <div class="row mt-2">
                     <div class="col-12 col-lg-12 d-flex">
                      <div class="card  shadow-none w-100">
                        <!--<div class="card-body">-->
                          <div class="table-responsive">
	
                             <table id="datatable" class="table align-middle" style="width:100% !important;" >
                               <thead class="table-semi-dark">
                                 <tr>
									<th>#</th>
									<th>Ref.No</th>
									<th>Proposal Name</th>
									<th>Customer</th>
									<th>Activity</th>
									<th>Juridiction</th>
									<th>Visa/Share</th>
									<th>Created On</th>
									<th class="no-content" style="width:50px;">Actions</th>
								</tr>

                               </thead>
                               <tbody>
                                  
                               </tbody>
                             </table>
                          </div>

                       <!-- </div>-->
                      </div> 
                    </div>
                   </div><!--end row-->
                </div>
              </div>
			  
			  
	<div class="offcanvas offcanvas-end shadow border-start-0 p-2" id="add-campaign" style="width:25% !important" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" aria-modal="true" role="dialog">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add Campaign</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
			<div class="offcanvas-body">
  
            </div>
    </div>
			
	<div class="offcanvas offcanvas-end shadow border-start-0 p-2" id="edit-campaign" style="width:25% !important" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" aria-modal="true" role="dialog">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Edit Campaign</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
			<div class="offcanvas-body">
  
            </div>
    </div>


<div class="modal fade" id="new-proposal-modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
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
		scrollX: true,
		
		'pagingType':"simple_numbers",
        'lengthChange': true,
			
		ajax:
		{
			url:BASE_URL+"/users/view-proposals",
			data: function (data) 
		    {
               //data.search = $('input[type="search"]').val();
		    },
        },

        columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
                {data: 'ref_no', name: 'ref_no'},
                {data: 'proposal_name', name: 'proposal_company',className:'t-left'},
                {data: 'cname', name: 'cname'},
                {data: 'activity', name: 'activity'},
				{data: 'juridiction', name: 'juridiction'},
				{data: 'visa', name: 'visa'},
				{data: 'created_on', name: 'created_on'},
                {data: 'action', name: 'action'},
                ]

});


$('#datatable tbody').on('click','.btn-delete',function()
{
	Swal.fire({
	  //title: "Are you sure?",
	  text: "Are you sure, You want to delete this proposal?",
	  icon: "question",
	  showCancelButton: true,
	  confirmButtonColor: "#3085d6",
	  cancelButtonColor: "#d33",
	  confirmButtonText: "Yes, Delete it!"
	}).then((result) => {
	  if (result.isConfirmed) {
		
		var pid=$(this).attr('id');
		
		  $.ajax({
          url: "{{url('users/delete-proposal')}}"+'/'+pid,
          type: 'get',
		  dataType: 'json',
          //data:{'track_id':tid},
          success: function (res) 
		  {
			if(res.status==1)
			{
				 toastr.success(res.msg);
				 $('#datatable').DataTable().ajax.reload(null,false);
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
 

$('#datatable tbody').on('click','.offer-edit',function()
{

	var id=$(this).attr('id');
	var Result=$("#edit-campaign .offcanvas-body");

			jQuery.ajax({
			type: "GET",
			url: "{{url('users/edit-campaign')}}"+"/"+id,
			dataType: 'html',
			//data: {vid: vid},
			success: function(res)
			{
			   Result.html(res);
			}
		});

});


$(document).on('click','#btn-add-campaign',function()
{

	var id=$(this).attr('id');
	var Result=$("#add-campaign .offcanvas-body");

			jQuery.ajax({
			type: "GET",
			url: "{{url('users/add-campaign')}}",
			dataType: 'html',
			//data: {vid: vid},
			success: function(res)
			{
			   Result.html(res);
			}
		});

});


$("#datatable tbody").on('click','.btn-act-deact',function()
{
	var opt=$(this).data('option');
	var id=$(this).attr('id');
	
	var opt_text=(opt==1)?"activate":"deactivate";
	optText=opt_text.charAt(0).toUpperCase()+opt_text.slice(1);
	
	Swal.fire({
	  title: optText+"?",
	  text: "You want to "+opt_text+" this campaign?",
	  icon: "question",
	  showCancelButton: true,
	  confirmButtonColor: "#3085d6",
	  cancelButtonColor: "#d33",
	  confirmButtonText: "Yes, "+opt_text+" it!"
	}).then((result) => {
	  if (result.isConfirmed) {
		
		
		  jQuery.ajax({
			type: "get",
			url: BASE_URL+"/users/offer-activate-deactivate/"+opt+"/"+id,
			dataType: 'json',
			//data: {vid: vid},
			success: function(res)
			{
			   if(res.status==true)
			   {
				   toastr.success(res.msg);
				   $('#datatable').DataTable().ajax.reload(null, false);
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


function fileValidation()
{
	var fileInput = document.getElementById('class_icon'); 
	 var allowedExtensions="";
	 
		allowedExtensions = /(\.jpg|\.jpeg|\.jpe|\.png)$/i; 
		var filePath = fileInput.value; 
			
		if (!allowedExtensions.exec(filePath)) { 
			alert('Invalid file type, Try again.'); 
			fileInput.value = ''; 
			return false; 
		}
		else
		{
			return true;
		}
}


// add gifts --------------------------------------------------------------------------------------


</script>
@endpush
@endsection
