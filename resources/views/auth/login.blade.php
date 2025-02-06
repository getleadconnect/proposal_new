<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
  <!-- Bootstrap CSS -->
  <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/style.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <link href="{{ url('assets/intl-tel-input17.0.3/intlTelInput.min.css')}}" rel="stylesheet"/>
  
  <!-- loader-->
 <link href="{{url('assets/css/pace.min.css')}}" rel="stylesheet" />
  <title>Get-Lead Proposal</title>
</head>
<style>
.iti .iti--separate-dial-code
{
	width:100% !important;
}
</style>
<body>

  <!--start wrapper-->
  <div class="wrapper">
    
       <!--start content-->
       <main class="authentication-content">
        <div class="container-fluid">
          <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                  <img src="{{asset('assets/images/logos/login-img.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title">Sign In</h5>
                    <p class="card-text mb-5">See your growth and get consulting support!</p>
					
					
                    <form class="form-body" method="POST" action="{{ url('login')}}" autocomplete=off>
                     @csrf
                         <div class="row g-3">
                         
							<div class="col-12">
								<label for="mobile" class="form-label">Mobile<span class="required">*</span></label>
								<br>
								<input type="hidden" class="form-control" name="country_code" id="country_code" value="91"  required>
								<input type="tel" class="form-control" pattern="[0-9]*" name="mobile" id="mobile"  onkeypress="return /[0-9]/i.test(event.key)" minlength=8 maxlength=15 required autocomplete="off">
							</div>
						
                          <div class="col-12">
                            <label for="password" class="form-label">Enter Password</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" class="form-control ps-5" id="password" name="password" placeholder="Enter Password" autocomplete="off">
                            </div>
                          </div>
						  
						  <div class="col-12">
							@if($errors->has('error'))
								<label id="lbl-err" style="font-size:13px;color:red;width:100%;text-align:center;">{{ $errors->first('error')}}</label>
							@else
								<label id="lbl-err1" style="font-size:13px;color:red;width:100%;text-align:center;">{{ Session::get('error')}}</label>
							@endif
                          </div>

                          <div class="col-12">
                            <div class="d-grid">
                              <button type="submit" class="btn btn-gl-primary radius-30">Sign In</button>
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
       </main>
        
       <!--end page main-->

  </div>
  <!--end wrapper-->


  <!--plugins-->
  <script src="{{url('assets/js/jquery.min.js')}}"></script>
  
  

  <script src="{{url('assets/js/pace.min.js')}}"></script>
  <script src="{{url('assets/intl-tel-input17.0.3/intlTelInput.min.js')}}"></script>
	
	@if(Session::get('success'))
		<script>
			toastr.success("{{Session::get('success')}}");
		</script>
	@endif

	@if (Session::get('error'))
		<script>
			toastr.error("{{Session::get('error')}}");
		</script>
	@endif

<script>

$(document).ready(function()
{
	$("#mobile").val('');
});

var phone_number = window.intlTelInput(document.querySelector("#mobile"), {
	  separateDialCode: true,
	  preferredCountries:["IN","AE"],
	  hiddenInput: "full_number",
	  utilsScript:"{{url('assets/intl-tel-input17.0.3/utils.js')}}"
	});

</script>

</body>

</html>