@extends('layouts.master')
@section('title','New Proposal')
@section('contents')
<style>
.text-right
{
	text-align:right;
}

.text-center
{
	text-align:center;
}

.pl-2
{
	padding-left:2rem;
}

.pr-2
{
	padding-right:2rem;
}
.error
{
	font-size:13px;
	color:red;
}

</style>

		<div class="row mt-3 mb-3">	
		<div class="col-lg-6 col-xl-6 col-xxl-6 col-6">

		<div class="page-breadcrumb d-none d-lg-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">New Proposal</div>
		</div>
		</div>
		<div class="col-lg-6 col-xl-6 col-xxl-6 col-6 text-right">
                  <a href="{{url()->previous()}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>&nbsp;&nbsp;
		</div>
        </div>
		
		
					<div class="card">
					<div class="card-body">
							
						<div class="row">
							<div class="col-10 col-lg-10 col-xl-8 col-xxl-8">
							
							<h6 class="">AddProposal Items:</h6>
							
							<div style="margin-top:20px;">
							<form id="formProposalItems"  enctype="multipart/form-data">
							@csrf
												
								<div class="table-responsive">
										<table id="giftTable" class="table mb-0">
											<thead class="thead-light">
											<tr>
												<th width="400px">Description</th>
												<th>Qty</th>
												<th>Price</th>
												<th>Total</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											
											<tr>
												<td class="td-count"><input type="text"  class="form-control" id="description" name="description" id="description" required  /></td>
												<td class="td-desc"><input type="number" pattern="[0-9]*" class="form-control" name="qty" id="qty"  required ></td>
												<td><input type="number" pattern="[0-9]*" class="form-control" name="price" id="price" required ></td>
												<td><input type="number" pattern="[0-9]*" class="form-control" name="total_price" id="total_price" required ></td>
																				
												<td>
												
												<button class="btn btn-primary btn-xs " id="btn_save_gift"  type="submit" > Add </button>
												&nbsp;</td>
											</tr>
																				
											</tbody>
										</table><!--end /table-->
									</div>
									
							</form>
							
							</div>

								  <div class="card  shadow-none w-100">
										<div class="table-responsive mt-2">
											<table class="table" id="datatable" style="width:100% !important;">
												<thead class="thead-semi-dark">
												  <tr>
													<th>SlNo</th>
													<th>Description</th>
													<th>Qty</th>
													<th>Price</th>
													<th>Total Price</th>
													<th style="width:60px;">Action</th>
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
  
				<div class="card">
					<div class="card-body">
							
							<div class="row">
							  <div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
							 
							 <h6 class="mb-2 mt-2">Add Customer Details:</h6>
							 
							 
								<form id="formCustomer" method="Post" action="{{url('users/save-proposal')}}" enctype="multipart/form-data">
								@csrf
										<div class="mb-2 row">
											<div class="col-3 col-lg-3 col-xl-3 col-xxl-3">
												<label for="example-text-input" class="col-form-label">Company Name</label>
												<input class="form-control" type="text" name="company_name" id="company_name"  required>
											</div>

											<div class="col-3 col-lg-3 col-xl-3 col-xxl-3">
											<label for="example-text-input" class="col-form-label">Address</label>
											<textarea class="form-control"  name="address" id="address"  required></textarea>
											</div>
				
											<div class="col-3 col-lg-3 col-xl-3 col-xxl-3">
											<label for="example-text-input" class="col-form-label">Location</label>
											<input class="form-control" type="text" name="location" id="location"  required>
											</div>

											<div class="col-2 col-lg-2 col-xl-2 col-xxl-2">
											<label for="example-text-input" class="col-form-label">Country</label>
											<input class="form-control" type="text" name="country" id="country"  required>
											</div>
											
											<div class="col-1 col-lg-1 col-xl-1 col-xxl-1">
											<label for="example-text-input" class="col-form-label">Pin-Code</label>
											<input class="form-control" type="number" name="pin_code" id="pin_code" maxlength=6>
											</div>
				
										</div>
										
										
								<div class="row" style="border-top:1px solid #e4e4e4;">
										  <div class="col-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
										<button type="submit" class="mt-3 btn btn-primary pl-2 pr-2"> Submit Proposal </button>

									</div>
								</div>
							</form>
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

   $(document).on('click','#imgUpload',function(e){
        $('#picField').trigger('click');
        scrId = $(this).data('id')
        $('#scrId').val(scrId);
    })

BASE_URL ={!! json_encode(url('/')) !!}


var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
		stateSave:true,
		paging : true,
        pageLength :50,
		scrollX: true,
		
		'pagingType':"simple_numbers",
        'lengthChange': true,

		ajax:
		{
			url:BASE_URL+"/users/get-proposal-temp-items",
        },

        columns: [
            {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
			{"data": "description" },
			{"data": "qty" },
			{"data": "price" },
			{"data": "total_price" },
			{"data": "action" ,name: 'Action',orderable: false, searchable: false },
        ],
			
    });



$('#datatable tbody').on('click','.delete-pro-item',function()
{

		var id=$(this).attr('id');
			jQuery.ajax({
			type: "GET",
			url: "{{url('users/delete-proposal-temp-item')}}"+"/"+id,
			dataType: 'json',
			//data: {vid: vid},
			success: function(res)
			{
			   if(res.status==1)
			   {
					toastr.error(res.msg); 
					table.draw();
			   }
			}
		});

});

var addValidator=$('#formProposalItems').validate({ 
	
	rules: {
		
		description: {required: true},
		qty:{required:true},
		price:{required:true},
		total_price: {required: true}
	},
	
	messages: {
        description: "Required",
		qty: "Required",
		price: "Required",
		total_price: "Required",
    }
});


$('#formProposalItems').submit(function(e) 
{

	e.preventDefault();
	
	var formData = new FormData(this);

		var inputDesc=$('#description').val();
		var inputPr=$('#price').val();
		var inputTpr=$('#total_price').val();
		var inputQty=$('#qty').val();

		if(inputDesc!="" && inputPr!="" && inputTpr!="" && inputQty!="") 
		{
			$.ajax({
			url: "{{ url('users/save-proposal-temp-item')}}",
			method: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(result){
				if(result.status == 1)
				{
					$('#datatable').DataTable().ajax.reload(null,false);
					$("#formProposalItems")[0].reset();
				}
				else
				{
					toastr.error(result.msg);
				}
			}
			
			});
		}
		else
		{	
			alert('Proposal Item details missing');
		}

});


var addValidator=$('#formCustomer').validate({ 
	
	rules: {
		
		Company_name: {required: true},
		address:{required:true},
		location:{required:true},
		country: {required: true}
	},
});


$('#datatable tbody').on('click','.delete-gift',function()
{
	Swal.fire({
	  //title: "Are you sure?",
	  text: "Are you sure, You want to delete this gift details?",
	  icon: "question",
	  showCancelButton: true,
	  confirmButtonColor: "#3085d6",
	  cancelButtonColor: "#d33",
	  confirmButtonText: "Yes, Delete it!"
	}).then((result) => {
	  if (result.isConfirmed) {
		
		var tid=$(this).attr('id');
		
		  $.ajax({
          url: "{{url('users/delete-gift')}}"+'/'+tid,
          type: 'get',
		  dataType: 'json',
          //data:{'track_id':tid},
          success: function (res) 
		  {
			if(res.status==1)
			{
				 toastr.success(res.msg);
				 $('#datatable').DataTable().ajax.reload(null,false);
				 
				 var sbal=parseInt($("#scratch_balance").val());
				 var cnt=sbal+res.offer_count;
				 $("#scratch_balance").val(cnt);
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
 

$("#giftTable tbody").on('change','#gift_image',function()
{
	var size=$("#gift_image")[0].files[0].size;
	if(size>524288)
	{
		alert("Image size too large. Maximum 500Kb only");
		$(this).val('');
	}
	else
	{
		var img=$(this).closest('tr').find('img.gift-image-output');
		
		var file=this.files[0];
			var allowedExtensions="";
			allowedExtensions = /(\.jpg|\.jpeg|\.jpe|\.png)$/i; 
			var filePath = file.name;
			console.log(file);
		
			if (!allowedExtensions.exec(filePath)) { 
				alert('Invalid file type, Try again.'); 
				$(this).val('');
				img.attr('src','');
			}
			else
			{
				if (file) {
					var reader = new FileReader();
						reader.onload = function (e) {
							img.attr('src',e.target.result);
						}
						reader.readAsDataURL(file);
				  }
			}  
	}
});



</script>
@endpush
@endsection
