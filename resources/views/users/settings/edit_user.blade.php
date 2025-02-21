	<style>
	.error
	{
		color:red;
		font-size:12px;
	}
	</style>
	<form id="formUpdateUser">
			@csrf
			
		<input type="hidden" name="user_id" value="{{$usr->id}}">
			
							
		<div class="row mb-2" >
			<div class="col-12 col-lg-11 col-xl-11 col-xxl-11">
				<label for="user_name" class="form-label mb-2">Name<span class="required">*</span></label>
				<input type="text" class="form-control"  name="user_name_edit" id="user_name_edit" value="{{$usr->user_name}}" placeholder="Name" required>
			</div>
		</div>

		<div class="row mb-2" >
			<div class="col-12 col-lg-11 col-xl-11 col-xxl-11">
				<label for="mobile" class="form-label mb-2">Mobile<span class="required">*</span></label>
				<input type="hidden" class="form-control" name="countrycode_edit" id="countrycode_edit">
				<br>
				<input type="tel" class="form-control" name="mobile_edit" id="mobile_edit"  value="+{{$usr->countrycode.$usr->mobile}}" minlength=6 maxlength=15 required>
			</div>
		</div>

		<div class="row mb-2" >
			<div class="col-12 col-lg-11 col-xl-11 col-xxl-11">
				<label for="email" class="form-label mb-2">Email<span class="required">*</span></label>
				<input type="text" class="form-control"  name="email_edit" id="email_edit" value="{{$usr->email}}" placeholder="Email" required>
			</div>
		</div>
				
		<div class="row mb-2" >
			<div class="col-12 col-lg-11 col-xl-11 col-xxl-11">
				<label for="email" class="form-label mb-2">Designation<span class="required">*</span></label>
				<select class="form-select"  name="designation_edit" id="designation_edit" required>
				<option value="">-select-</option>
				<option value="1">Accountant</option>
				</select>
			</div>
		</div>
		
		<div class="row mb-2 mt-3">
			<div class="col-lg-11 col-xl-11 col-xxl-11 text-end">
			<button class="btn btn-primary" id="btn-submit" type="submit"> Submit </button>
			</div>
		</div>
		</form>
		
<script>
var phone_number = window.intlTelInput(document.querySelector("#mobile_edit"), {
	  separateDialCode: true,
	  preferredCountries:["in"],
	  hiddenInput: "full_number",
	  utilsScript:"{{url('assets/intl-tel-input17.0.3/utils.js')}}"
	});
var addValidator=$('#formUpdateUser').validate({ 
	
	rules: {
		user_name_edit: {required: true,},
		email_edit: {required: true,},
		mobile_edit: {required: true,},
	},

	submitHandler: function(form) 
	{
		//$("#btn-submit").attr('disabled',true).html('Saving <i class="fa fa-spinner fa-spin"></i>')
		
		var code=phone_number.getSelectedCountryData()['dialCode'];
		$("#countrycode_edit").val(code);
		
		$.ajax({
		url: "{{ url('users/update-staff-user') }}",
		method: 'post',
		data: $('#formUpdateUser').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$('#datatable').DataTable().ajax.reload(null,false);
				toastr.success(result.msg);
				$('#formUpdateUser')[0].reset();
				$('#mobile_edit').val('');
				$("#btnClose").trigger('click');
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
