
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{url('assets/images/favicon-32x32.png')}}" type="image/png" />
  <!--plugins-->
  <link href="{{url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
  <link href="{{url('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <link href="{{url('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
  
  <link href="{{url('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
  
  <!-- Bootstrap CSS -->
  <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/style.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  
  <link href="{{url('assets/fontawesome-free-5.15-web/css/all.css')}}" rel="stylesheet" />
  <link href="{{url('assets/plugins/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" />
  <link href="{{url('assets/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet" />

  <link href="{{url('assets/flaticon2/flaticon.css')}}" rel="stylesheet">
  <!-- loader-->
  <link href="{{url('assets/css/pace.min.css')}}" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="{{url('assets/css/dark-theme.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/light-theme.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/semi-dark.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/header-colors.css')}}" rel="stylesheet" />
  <link href="{{url('assets/intl-tel-input17.0.3/intlTelInput.min.css')}}" rel="stylesheet"/>
  
  <title>GETLEAD</title>
</head>

<style>
.pro-head > a
{
	line-height:32px;
}
.pro-head > a:hover
{
	background-color:#f1f1f1;
	border-radius:5px;
}


</style>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">        
        <nav class="navbar navbar-expand gap-3">
          <div class="mobile-toggle-icon fs-3 d-flex d-lg-none">
              <i class="bi bi-list"></i>
            </div>
            <!--<form class="searchbar">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                <input class="form-control" type="text" placeholder="Type here to search">
                <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
            </form> -->
            <div class="top-navbar-right ms-auto">
              <ul class="navbar-nav align-items-center gap-1">
              <li class="nav-item search-toggle-icon d-flex d-lg-none">
                  <a class="nav-link" href="javascript:;">
                    <div class="">
                      <i class="bi bi-search"></i>
                    </div>
                  </a>
               </li>

              <!--<li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="notifications">
                    <span class="notify-badge">8</span>
                    <i class="bi bi-bell-fill"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0">
                  <div class="p-2 border-bottom m-2">
                      <h5 class="h5 mb-0">Notifications</h5>
                  </div>
                  <div class="header-notifications-list p-2">
                      <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                           <div class="notification-box bg-light-primary text-primary"><i class="bi bi-basket2-fill"></i></div>
                           <div class="ms-3 flex-grow-1">
                             <h6 class="mb-0 dropdown-msg-user">New Orders <span class="msg-time float-end text-secondary">1 m</span></h6>
                             <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">You have recived new orders</small>
                           </div>
                        </div>
                      </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-purple text-purple"><i class="bi bi-people-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">New Customers <span class="msg-time float-end text-secondary">7 m</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5 new user registered</small>
                          </div>
                       </div>
                     </a>

                 </div>
                 <div class="p-2">
                   <div><hr class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">
                       <div class="text-center">&nbsp;</div>
                     </a>
                 </div>
                </div>
              </li>-->
              </ul>
              </div>
              <div class="dropdown dropdown-user-setting">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="user-setting d-flex align-items-center gap-3">
                    <img src="{{url('assets/images/avatars/avatar-1.png')}}" class="user-img" alt="">
                    <div class="d-none d-sm-block">
                       <p class="user-name mb-0">{{Auth::user()->user_name}}</p>
                      <!--<small class="mb-0 dropdown-user-designation">HR Manager</small>-->
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                   <li>
                      <a class="dropdown-item" href="javascript:;">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-person-fill"></i></div>
                           <div class="ms-3"><span>Profile</span></div>
                         </div>
                       </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <a class="dropdown-item" href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form2').submit();">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-lock-fill"></i></div>
                           <div class="ms-3"><span>Logout</span></div>
                         </div>
                       </a>
                    </li>
					
					<form id="logout-form2" action="{{url('logout')}}" method="post" class="d-none">
						@csrf
					</form>
						
                </ul>
              </div>
        </nav>
      </header>
       <!--end top header-->

        <!--start sidebar -->
        
		@if(Auth::user()->role_id==1)
			@include('layouts.sidebar');
		@elseif(Auth::user()->role_id==2)
			@include('layouts.user_sidebar');
		@else
			@include('layouts.staff_sidebar');
		@endif
		
       <!--end sidebar -->

       <!--start content-->
		<main class="page-content">
              
			  @yield('contents')

        </main>
       <!--end page main-->

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--start footer-->
       <footer class="footer" style="bottom:0px;position:fixed;">
        <div class="footer-text">
            Copyright ©Getlead Analytics Pvt Ltd, 2024. All right reserved.
        </div>
        </footer>
        <!--end footer-->


		<div class="modal fade" id="CPassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>

						<div class="modal-body">
						
						<form id="changePass" enctype="multipart/form-data">
						@csrf
						
						<div class="form-group">
							<label>New Password</label>
							<input class="form-control mb-3" type="password" name="new_pass" id="new_pass" placeholder="new password" required>
						</div>
						
						<div class="form-group">
							<label>Confirm Password</label>
							<input class="form-control mb-3" type="password" name="confirm_pass" id="confirm_pass" placeholder="confirm password" required>
						</div>
												
						<label id="cp_err" style="color:red;margin-left:35px;">&nbsp;</label>

						<div class="modal-footer mt-2">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Change</button>
						</div>
						</form>
						
						</div>
						
					</div>
				</div>
			</div>




  </div>
  <!--end wrapper-->
  <script src="{{url('assets/js/jquery.min.js')}}"></script>

  <!-- Bootstrap bundle JS -->
  <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
  <!--plugins-->

  <script src="{{url('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{url('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{url('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{url('assets/js/pace.min.js')}}"></script>
  
  <!--<script src="{{url('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
  <script src="{{url('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
  <script src="{{url('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>-->
  <!--app-->
  <script src="{{url('assets/js/app.js')}}"></script>
  <script src="{{url('assets/js/index.js')}}"></script>
  
  <script src="{{url('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{url('assets/plugins/toastr/js/toastr.min.js')}}"></script>

  <script src="{{url('assets/plugins/jquery-form/jquery.form.min.js')}}"></script>
    
  <script src="{{url('assets/js/jquery.validation.min.js')}}"></script>
  
  <script src="{{url('assets/intl-tel-input17.0.3/intlTelInput.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
   
  <script src="{{url('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
  <script src="{{url('assets/js/table-datatable.js')}}"></script>
  
  
  
@stack('scripts')

  <script>
   //new PerfectScrollbar(".best-product")
   
$("form#changePass").submit(function(e)
{
   e.preventDefault(); 
   
   var npas=$("#new_pass").val();
   var cpas=$("#confirm_pass").val();
   if(npas!=cpas)
   {
	   $("#cp_err").html("Password does not match!");
   }
   else
   {
	   $("#cp_err").html("&nbsp;");
	  var formData = new FormData(this);
		
       $.ajax({
          url: "{{url('users/change-password')}}",
          type: 'post',
          data: formData,
		  dataType:'json',
          success: function (res) 
		  {
			 if(res.status==true)
			 {
				$('#CPassModal').modal('hide');
				toastr.success(res.msg);
				$('#changePass')[0].reset();
			 }
			 else
			 {
				toastr.error(res.msg); 
				$('#changePass')[0].reset();
		     }
			  			  
          },
			cache: false,
			contentType: false,
			processData: false
		});
   }
});

   
   
 </script>


</body>

</html>