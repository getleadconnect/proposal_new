@extends('layouts.master')
@section('title','Dashboard')
@section('contents')
			  
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-6">
              <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                      <div class="w-50">
                        <p>Total Users</p>
                        <h4 class="">{{$data['user_count']}}</h4>
                      </div>
                      <!--<div class="w-50">
                         <p class="mb-3 float-end text-success">+ 16% <i class="bi bi-arrow-up"></i></p>
                         <div id="chart1"></div>
                      </div> -->
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                      <div class="w-100">
                        <p>This Week(<small>Users</small>)</p>
                        <h4 class="">{{$data['week_count']}}</h4>
                      </div>
                      <!--<div class="w-50">
                         <p class="mb-3 float-end text-danger">- 3.4% <i class="bi bi-arrow-down"></i></p>
                         <div id="chart2"></div>
                      </div>-->
					  
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                      <div class="w-100">
                        <p>This Month(<small>Users</small>)</p>
                        <h4 class="">{{$data['month_count']}}</h4>
                      </div>
                      <!--<div class="w-50">
                         <p class="mb-3 float-end text-success">+ 24% <i class="bi bi-arrow-up"></i></p>
                         <div id="chart3"></div>
                      </div>-->
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                      <div class="w-50">
                        <p>Options</p>
                        <h4 class="">0.0</h4>
                      </div>
                      <!--<div class="w-50">
                         <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                         <div id="chart4"></div>
                      </div>-->
                    </div>
                  </div>
                </div>
               </div>
			   
			   <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                      <div class="w-50">
                        <p>Options</p>
                        <h4 class="">0.0</h4>
                      </div>
                      <!--<div class="w-50">
                         <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                         <div id="chart4"></div>
                      </div>-->
                    </div>
                  </div>
                </div>
               </div>
			   
			   <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                      <div class="w-50">
                        <p>Options</p>
                        <h4 class="">0.0</h4>
                      </div>
                      <!--<div class="w-50">
                         <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                         <div id="chart4"></div>
                      </div>-->
                    </div>
                  </div>
                </div>
               </div>
            </div><!--end row-->

            <div class="row">
              <div class="col-12 col-lg-6 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <h6 class="mb-0">Revenue</h6>
                      <div class="fs-5 ms-auto dropdown">
                         <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="#">Action</a></li>
                             <li><a class="dropdown-item" href="#">Another action</a></li>
                             <li><hr class="dropdown-divider"></li>
                             <li><a class="dropdown-item" href="#">Something else here</a></li>
                           </ul>
                       </div>
                     </div>
                    <div id="chart5"></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                       <h6 class="mb-0">By Device</h6>
                       <div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>

                  </div>
                </div>
              </div>
            </div><!--end row-->

@push('scripts')
<script>

</script>

@endpush
@endsection
