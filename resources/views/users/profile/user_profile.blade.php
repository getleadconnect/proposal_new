@extends('layouts.master')
@section('title','Dashboard')
@section('contents')

<style>
.card-body{
	padding-top:2px !important;
}

.c-width
{
	width:23%;
}
.pro-table tr
{
	line-height:35px;
	font-size:16px;
}
</style>


<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Profile Details</div>
 
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
			  
			 <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 overflow-hidden">
                  <div class="card-body pt-3">
                      <div class="profile-avatar text-center mt-5">
						<img src="{{url('uploads'.'/'.$udt->logo)}}" class="shadow" width="150" height="100%" data-id="{{$udt->id}}" id="imgUpload" style="cursor:pointer" title="Click to change image">
						<label id="msg_image_upload" class="mt-2" style="display:none;color:red;">Please Wait...!</label>			
					  </div>
					  
					  <form id='foto' method="post" action="{{url('users/update-profile-image')}}" method="POST" enctype="multipart/form-data" >
						@csrf
							<div style="height:0px;overflow:hidden"> 
							<input type="file" id="picField" name="picField" onchange="$('#msg_image_upload').css('display','block'); this.form.submit()" class="d-none"/> 
							<input type="hidden" id="userDtId" name="userDtId" /> 
							</div>
					  </form> 

					  
                      <div class="text-center mt-5 mb-3">
                        <h4 class="mb-1">{{ucfirst($udt->company_name)}}</h4>
                        <p class="mb-0 text-secondary">{{$udt->location}}</p>
						
											
                        <div class="mt-4"></div>
						
                        <p class="mb-2 text-secondary">{{$udt->address}}</p>
						<p class="mb-0 text-secondary">{{"+".$udt->country_code." ".$udt->mobile_number}}</p>
						<p class="mb-0 text-secondary">{{$udt->email}}</p>
						<p class="mb-0 text-secondary">{{$udt->website}}</p>
						
                      </div>
					  
					  
                      <!--<hr>
					  
                    <!--<div class="text-start">
                        <h5 class="">About</h5>
                        <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem.
                      </div> -->
                  </div>
                  <!--<ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                      Followers
                      <span class="badge bg-primary rounded-pill">95</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                      Following
                      <span class="badge bg-primary rounded-pill">75</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                      Templates
                      <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                  </ul> -->
                </div>
								
              </div>
			  
			  
              <div class="col-12 col-lg-8">
			  
                <div class="card shadow-sm border-0">
                  <div class="card-body">
						<div class="row">
							<h5 class="col-8 col-lg-8 col-xl-8 col-xxl-8 mb-2 mt-2">My Account</h5>
							<div class="col-4 col-lg-4 col-xl-4 col-xxl-4 mb-2 mt-2 text-right"><a class="btn btn-primary btn-sm" href="{{url('users/dashboard')}}">
							<i class="fa fa-arrow-left"></i> Back</a></div>
					  </div>
					  <hr>
                      
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">My Profile</h6>
                        </div>
						
                        <div class="card-body">
						
						
						<div class="row mb-2 mt-2" >
							<div class="col-12 col-lg-12 col-xl-12 col-xxl-12 text-end">
								<button id="btn_edit" class="btn-outline-none" style="display:inline-block"  title="Edit"><i class="fa fa-edit fs-6"></i></button>
								<button id="btn_close" class="btn-outline-none" style="display:none" title="Cancel"><i class="fa fa-times fs-5"></i></button>
							</div>
							
							
						</div>
						<style>
						
						</style>
						
						<div id="show_profile"  class="show ps-5" >
				
							<table class="pro-table" style="width:100%;">
							<tr><td class="c-width">Company Name </td><td>:&nbsp;<span>{{$udt->company_name}}</span></td></tr>
							<tr><td>Mobile </td><td>:&nbsp;<span> {{"+".$udt->country_code." ".$udt->mobile_number}}</span></td></tr>
							<tr><td>Email </td><td>:&nbsp;<span>{{$udt->email}}</span></td></tr>
							<tr><td>Address </td><td>:&nbsp;<span>{{ $udt->address }}</span></td></tr>
							<tr><td>Location </td><td>:&nbsp;<span>{{$udt->location}}</span></td></tr>
							<tr><td>Country </td><td>:&nbsp;<span>{{$udt->country}}</span></td></tr>
							<tr><td>Website </td><td>:&nbsp;<span>{{$udt->website}}</span></td></tr>
							<tr><td>Currency </td><td>:&nbsp;<span>{{$udt->currency}}</span></td></tr>
							</table>
						
						</div>
						
						<div id="edit_profile" class="hide ps-5">
						
						<label> <span class="required">*: All Fields are required</span></label>
						
						<form id="formUpdateProfile">
						@csrf
						
						<input type="hidden" name="user_dt_id" id="user_dt_id" value="{{$udt->id}}">
						
								<div class="row mb-2 mt-2" >
									<div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
										<label for="user_name" class="form-label" >Company Name<span class="required">*</span></label>
										<input type="text" class="form-control"  name="company_name" id="company_name"  value="{{$udt->company_name}}" placeholder="Name" required>
									</div>
								</div>
								
								<div class="row mb-2" >
									<div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
										<label for="mobile" class="form-label">Mobile<span class="required">*</span></label>
										<input type="hidden" class="form-control" name="country_code" id="country_code" value="{{$udt->country_code}}"  required>
										<br>
										<input type="tel" class="form-control" name="mobile" id="mobile" value="+{{$udt->country_code.$udt->mobile_number}}" minlength=6 maxlength=15 required>
									</div>
								</div>

								<div class="row mb-2" >
									<div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
										<label for="email" class="form-label">Email<span class="required">*</span></label>
										<input type="text" class="form-control"  name="email" id="email" value="{{$udt->email}}" placeholder="Email" required>
									</div>
								</div>
								
								<div class="row mb-2" >
									<div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
										<label for="address" class="form-label">Address<span class="required">*</span></label>
										<textarea rows=3  class="form-control"  name="address" id="address" placeholder="Address" required> {{$udt->address }}</textarea>
									</div>
								</div>
								
								<div class="row mb-2" >
									<div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
										<label for="location" class="form-label">Location<span class="required">*</span></label>
										<input type="text" class="form-control"  name="location" id="location" value="{{$udt->location}}" placeholder="Location" required>
									</div>
								</div>
								
								<div class="row mb-2" >
									<div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
										<label for="company" class="form-label">Country<span class="required">*</span></label>
										<input type="text" class="form-control"  name="country" id="country" value="{{$udt->country}}" placeholder="Country" required>
									</div>
								</div>
								
								<div class="row mb-2" >
									<div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
										<label for="designation" class="form-label">Website<span class="required">*</span></label>
										<input type="text" class="form-control"  name="website" id="website" value="{{$udt->website}}" placeholder="website" required>
									</div>
								</div>
								
								<div class="row mb-2" >
									<div class="col-3 col-lg-3 col-xl-3 col-xxl-3">
										<label for="designation" class="form-label">Currency<span class="required">*</span></label>
										<select class="form-select"  name="currency" id="currency"  required >
										<option value=''>--select--</option>
										<option value="AED" @if($udt->currency=='AED'){{ 'selected' }} @endif >AED</option>
										<option value="₹" @if($udt->currency=='₹'){{ 'selected' }} @endif>Rs(₹)</option>
										<option value="$" @if($udt->currency=='$'){{ 'selected' }} @endif>Dolar($)</option>
										</select>
									</div>
								</div>

								<div class="row mb-2">
									<div class="col-lg-12 col-xl-6 col-xxl-6 text-start">
									<button class="btn btn-primary" id="btn-submit" type="submit"> Update </button>
									</div>
								</div>
								</form>
						</div>
						
						
                        </div>
                      </div>

                     
                  </div>
                </div>
              </div>
              
            </div><!--end row-->
			



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

   var phone_number = window.intlTelInput(document.querySelector("#mobile"), {
	  separateDialCode: true,
	  preferredCountries:["AE","IN"],
	  hiddenInput: "full_number",
	  utilsScript:"{{url('assets/intl-tel-input17.0.3/utils.js')}}"
	});

   $(document).on('click','#imgUpload',function(e){
        $('#picField').trigger('click');
        usrId = $(this).data('id')
        $('#userDtId').val(usrId);
    })


$(document).on('click',"#btn_edit",function()
{
	$("#btn_edit").css('display','none');
	$("#btn_close").css('display','inline-block');
		
	$("#show_profile").removeClass('show');
	$("#show_profile").addClass('hide');
	
	$("#edit_profile").removeClass('hide');
	$("#edit_profile").addClass('show');
});


$(document).on('click',"#btn_close",function()
{
	$("#btn_edit").css('display','inline-block');
	$("#btn_close").css('display','none');
		
	$("#show_profile").removeClass('hide');
	$("#show_profile").addClass('show');
	
	$("#edit_profile").removeClass('show');
	$("#edit_profile").addClass('hide');
});



BASE_URL ={!! json_encode(url('/')) !!}


$('#datatable tbody').on('click','.edit-user',function()
{

	var id=$(this).attr('id');
	var Result=$("#edit-user .offcanvas-body");

			jQuery.ajax({
			type: "GET",
			url: "{{url('admin/edit-user')}}"+"/"+id,
			dataType: 'html',
			//data: {vid: vid},
			success: function(res)
			{
			   Result.html(res);
			}
		});
});



var addValidator=$('#formUpdateProfile').validate({ 
	
	rules: {
		
		company_name: {required: true,},
		email: {required: true,},
		mobile: {required: true,},
		address: {required: true,},
		location: {required: true,},
		country: {required: true,},
		currency: {required: true,},
	},

	submitHandler: function(form) 
	{

	   var code=phone_number.getSelectedCountryData()['dialCode'];
	   $("#country_code").val(code);	


		$.ajax({
		url: "{{ url('users/update-user-profile') }}",
		method: 'post',
		data: $('#formUpdateProfile').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				toastr.success(result.msg);
				location.reload();
			}
			else
			{
				toastr.error(result.msg);
			}
		}
		});
	  }
	});









</script>
@endpush
@endsection
