	<style>
	.error
	{
		color:red;
		font-size:12px;
	}
	</style>
	<form id="formAddStaffUser">
				@csrf
				
				<div class="row mb-2" >
					<div class="col-12 col-lg-11 col-xl-11 col-xxl-11">
						<label for="user_name" class="form-label mb-2">Name<span class="required">*</span></label>
						<input type="text" class="form-control"  name="user_name" id="user_name"  placeholder="Name" required>
					</div>
				</div>

				<div class="row mb-2" >
					<div class="col-12 col-lg-11 col-xl-11 col-xxl-11">
						<label for="mobile" class="form-label mb-2">Mobile<span class="required">*</span></label>
						<input type="hidden" class="form-control" name="country_code" id="country_code">
						<br>
						<input type="tel" class="form-control" name="mobile" id="mobile"  minlength=6 maxlength=15 required>
					</div>
				</div>

				<div class="row mb-2" >
					<div class="col-12 col-lg-11 col-xl-11 col-xxl-11">
						<label for="email" class="form-label mb-2">Email<span class="required">*</span></label>
						<input type="text" class="form-control"  name="email" id="email"  placeholder="Email" required>
					</div>
				</div>
				
				
				<div class="row mb-2" >
					<div class="col-12 col-lg-11 col-xl-11 col-xxl-11">
						<label for="email" class="form-label mb-2">Designation<span class="required">*</span></label>
						<select class="form-select"  name="designation" id="designation" required>
						<option value="">-select-</option>
						<option value="1">Accountant</option>
						<option value="2">Office Assistant</option>
						<option value="3">Supervisor</option>
						<option value="4">Cashier</option>
						<option value="5">Manager</option>
						<option value="6">Sales Manager</option>
						</select>
					</div>
				</div>
											
				
				<div class="row mb-2" >
					<div class="col-12 col-lg-11 col-xl-11 col-xxl-11">
						<label for="password" class="form-label mb-2">Password<span class="required">*</span></label>
						<input type="text" class="form-control"  name="password" id="password"  placeholder="password" required>
					</div>
				</div>
			
				
				<div class="row mb-2 mt-3">
					<div class="col-lg-11 col-xl-11 col-xxl-11 text-end">
					<button class="btn btn-primary" id="btn-submit" type="submit"> Submit </button>
					</div>
				</div>
	</form>
		
<script>
var phone_number = window.intlTelInput(document.querySelector("#mobile"), {
	  separateDialCode: true,
	  preferredCountries:["in"],
	  hiddenInput: "full_number",
	  utilsScript:"{{url('assets/intl-tel-input17.0.3/utils.js')}}"
	});
				
var addValidator=$('#formAddStaffUser').validate({ 
	
	rules: {
		user_name: {required: true,},
		email: {required: true,},
		password: {required: true,minlength:6, maxlength:15},
		mobile: {required: true,},
	},

	submitHandler: function(form) 
	{
		var code=phone_number.getSelectedCountryData()['dialCode'];
		$("#country_code").val(code);
		
		$.ajax({
		url: "{{ url('users/save-staff-user') }}",
		method: 'post',
		data: $('#formAddStaffUser').serialize(),
		success: function(result){
			if(result.status == 1)
			{
				$("#btn-submit").attr('disabled',false).html('Submit')
				$('#datatable').DataTable().ajax.reload(null,false);
				toastr.success(result.msg);
				$('#formAddStaffUser')[0].reset();
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
