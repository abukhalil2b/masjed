<!DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/box-style.css')}}" rel="stylesheet">

    </head>
	<body id="page-top">

	    <!-- Page Wrapper -->
	    <div id="wrapper" >

	        <!-- Sidebar -->
	        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="direction: ltr;">

	            <!-- Sidebar - Brand -->
	            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
	                <div class="sidebar-brand-icon rotate-n-15">
	                    <i class="fas fa-moon"></i>
	                </div>
	                <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
	            </a>

	            <!-- Divider -->
	            <hr class="sidebar-divider my-0">

	           

	           

	            <!-- Nav Item - Pages Collapse Menu -->
	            @if(auth()->user()->canPermission('masjeds'))
	            <li class="nav-item" >
	                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masjeds"
	                    aria-expanded="true" aria-controls="masjeds">
	                    <span>{{__('masjeds')}}</span>
	                    <i class="fas fa-fw fa-users"></i>
	                </a>
	                <div id="masjeds" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">إدارة {{__('masjeds')}}</h6>
	                        <a class="collapse-item" href="{{route('user.masjed.index')}}">{{__('masjeds')}}</a>
	                        <a class="collapse-item" href="{{route('user.masjed.create')}}">اضافة {{__('masjed')}} جديد</a>
	                    </div>
	                </div>
	            </li>
	            @endif

	            <!-- Divider -->
	            <hr class="sidebar-divider">

	            <!-- Nav Item - Pages Collapse Menu -->
	            @if(auth()->user()->canPermission('program_create_edit'))
	            <li class="nav-item">
	                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#programs"
	                    aria-expanded="true" aria-controls="programs">
	                    <span>{{__('programs')}}</span>
	                    <i class="fas fa-fw fa-users"></i>
	                </a>
	                <div id="programs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">إدارة {{__('programs')}}</h6>
	                        <a class="collapse-item" href="{{route('program.index')}}">{{__('programs')}}</a>
	                        <a class="collapse-item" href="{{route('program.create')}}">اضافة {{__('program')}} جديد</a>
	                    </div>
	                </div>
	            </li>
	            @endif

	            <!-- Nav Item - Pages Collapse Menu -->
	            @if(auth()->user()->canPermission('student_create_edit'))
	            <li class="nav-item">
	                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#students"
	                    aria-expanded="true" aria-controls="students">
	                    <span>{{__('students')}}</span>
	                    <i class="fas fa-fw fa-users"></i>
	                </a>
	                <div id="students" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">إدارة {{__('students')}}</h6>
	                        <a class="collapse-item" href="{{route('student.male_index')}}">
	                        	{{__('students')}} {{__('males')}}
	                    	</a>
	                        <a class="collapse-item" href="{{route('student.female_index')}}">
	                        	{{__('students')}} {{__('females')}}
	                    	</a>
	                        <a class="collapse-item" href="{{route('student.create')}}">
	                        	اضافة {{__('student')}} جديد
	                    	</a>
	                    </div>
	                </div>
	            </li>
	            @endif

	            <!-- Nav Item - Pages Collapse Menu -->
	            @if(auth()->user()->canPermission('task_create_edit'))
	            <li class="nav-item">
	                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#tasks"
	                    aria-expanded="true" aria-controls="tasks">
	                    <span>{{__('tasks')}}</span>
	                    <i class="fas fa-fw fa-users"></i>
	                </a>
	                <div id="tasks" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">إدارة {{__('tasks')}}</h6>
	                        <a class="collapse-item" href="{{route('task.index')}}">
	                        	{{__('tasks')}} 
	                    	</a>
	                        <a class="collapse-item" href="{{route('task.create')}}">
	                        	اضافة {{__('task')}} جديد
	                    	</a>
	                    </div>
	                </div>
	            </li>
	            @endif


	            <!-- Nav Item - Pages Collapse Menu -->
	            @if(auth()->user()->canPermission('manage_user_account'))
	            <li class="nav-item">
	                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#msjedstatement"
	                    aria-expanded="true" aria-controls="msjedstatement">
	                    <small class="">حسابات مستخدمين النظام</small>
	                    <i class="fas fa-fw fa-users"></i>
	                </a>
	                <div id="msjedstatement" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">

	                    	<a class="collapse-item" href="{{route('user.index')}}">
	                        	القائمة 
	                    	</a>

	                    	<a class="collapse-item" href="{{route('user.teacher.create')}}">
	                        	إضافة حساب {{__('teacher')}} 
	                    	</a>
	                    	<a class="collapse-item" href="{{route('user.wakeel.create')}}">
	                        	إضافة حساب {{__('wakeel')}} 
	                    	</a>

	                    </div>
	                </div>
	            </li>
	            @endif


	            <!-- Nav Item - statement -->
	            @if(auth()->user()->canPermission('manage_msjedstatement'))
	            <li class="nav-item active">
	                <a class="nav-link" href="{{route('msjedstatement.index')}}">
	                    <span>{{__('msjedstatement')}}</span>
	                    <i class="fas fa-fw fa-tachometer-alt"></i>
	                </a>
	            </li>
	            @endif

	            @if(auth()->user()->canPermission('manage_studentstatement'))
	            <li class="nav-item active">
	                <a class="nav-link" href="{{route('studentstatement.index')}}">
	                    <span>{{__('studentstatement')}}</span>
	                    <i class="fas fa-fw fa-tachometer-alt"></i>
	                </a>
	            </li>
	            @endif

	            <!-- Divider -->
	            <hr class="sidebar-divider d-none d-md-block">

	            <!-- Sidebar Toggler (Sidebar) -->
	            <div class="text-center d-none d-md-inline">
	                <button class="rounded-circle border-0" id="sidebarToggle"></button>
	            </div>

	        </ul>
	        <!-- End of Sidebar -->

	        <!-- Content Wrapper -->
	        <div id="content-wrapper" class="d-flex flex-column">

	            <!-- Main Content -->
	            <div id="content">

	                <!-- Topbar -->
	                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	                    <!-- Sidebar Toggle (Topbar) -->
	                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
	                        <i class="fa fa-bars"></i>
	                    </button>

	                    <!-- Topbar Search -->
	                    <form
	                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
	                        <div class="input-group">
	                            <input type="text" class="form-control bg-light border-0 small" placeholder="البحث"
	                                aria-label="Search" aria-describedby="basic-addon2">
	                            <div class="input-group-append">
	                                <button class="btn btn-primary" type="button">
	                                    <i class="fas fa-search fa-sm"></i>
	                                </button>
	                            </div>
	                        </div>
	                    </form>

	                    <!-- Topbar Navbar -->
	                    <ul class="navbar-nav ml-auto">

	                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
	                        <li class="nav-item dropdown no-arrow d-sm-none">
	                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
	                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <i class="fas fa-search fa-fw"></i>
	                            </a>
	                            <!-- Dropdown - Messages -->
	                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
	                                aria-labelledby="searchDropdown">
	                                <form class="form-inline mr-auto w-100 navbar-search">
	                                    <div class="input-group">
	                                        <input type="text" class="form-control bg-light border-0 small"
	                                            placeholder="Search for..." aria-label="Search"
	                                            aria-describedby="basic-addon2">
	                                        <div class="input-group-append">
	                                            <button class="btn btn-primary" type="button">
	                                                <i class="fas fa-search fa-sm"></i>
	                                            </button>
	                                        </div>
	                                    </div>
	                                </form>
	                            </div>
	                        </li>

	                        <!-- Nav Item - Alerts -->
	                        <li class="nav-item dropdown no-arrow mx-1">
	                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
	                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <i class="fas fa-bell fa-fw"></i>
	                                <!-- Counter - Alerts -->
	                                <span class="badge badge-danger badge-counter">0</span>
	                            </a>
	                            <!-- Dropdown - Alerts -->
	                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
	                                aria-labelledby="alertsDropdown">
	                                <h6 class="dropdown-header">
	                                    ...
	                                </h6>
	                                <a class="dropdown-item d-flex align-items-center" href="#">
	                                    <div class="mr-3">
	                                        <div class="icon-circle bg-primary">
	                                            <i class="fas fa-file-alt text-white"></i>
	                                        </div>
	                                    </div>
	                                    <div>
	                                        <div class="small text-gray-500">...</div>
	                                        <span class="font-weight-bold">...</span>
	                                    </div>
	                                </a>
	
	                                <a class="dropdown-item text-center small text-gray-500" href="#">..</a>
	                            </div>
	                        </li>

	                        

	                        <div class="topbar-divider d-none d-sm-block"></div>

	                        <!-- Nav Item - User Information -->
	                        <li class="nav-item dropdown no-arrow">
	                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
	                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                
	                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
	                                
	                            </a>
	                            <!-- Dropdown - User Information -->
	                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
	                                aria-labelledby="userDropdown">
	                                <a class="dropdown-item" href="{{route('user.profile')}}">
	                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
	                                    {{__('profile')}}
	                                </a>
	                                
	                                <div class="dropdown-divider"></div>
	                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
	                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
	                                    {{__('Logout')}}
	                                </a>
	                            </div>
	                        </li>

	                    </ul>

	                </nav>
	                <!-- End of Topbar -->

	                <!-- Begin Page Content -->
	                <div class="p-2">

	                	@if($errors->any())
			                <center class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
			                @foreach($errors->all() as $error)
			                    <li class="text-danger">{{$error}}</li>
			                @endforeach
			                </center>
			             @endif

	                	@if(session('status'))
	                	<div class="alert alert-{{session('status')}}">
	                		{{session('message')}}
	                	</div>
	                	@endif

	            	@yield('content')

	                </div>
	                <!-- /.container-fluid -->

	            </div>
	            <!-- End of Main Content -->

	            <!-- Footer -->
	            <footer class="sticky-footer bg-white">
	                <div class="container my-auto">
	                    <div class="copyright text-center my-auto">
	                        <span>{{ config('app.name', 'Laravel') }}</span>
	                    </div>
	                </div>
	            </footer>
	            <!-- End of Footer -->

	        </div>
	        <!-- End of Content Wrapper -->

	    </div>
	    <!-- End of Page Wrapper -->

	    <!-- Scroll to Top Button-->
	    <a class="scroll-to-top rounded" href="#page-top">
	        <i class="fas fa-angle-up"></i>
	    </a>

	    <!-- Logout Modal-->
	    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	        aria-hidden="true">
	        <div class="modal-dialog" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="exampleModalLabel">متأكد</h5>
	                </div>
	                <div class="modal-footer">
	                    <button class="btn btn-sm text-secondary m-1 float-left" type="button" data-dismiss="modal">{{__('Cancel')}}</button>
	                    <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="btn btn-sm text-danger m-1 float-left">{{__('Logout')}}</button>
                        </form>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- Bootstrap core JavaScript-->
	    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
	    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

	    <!-- Core plugin JavaScript-->
	    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

	    <!-- Custom scripts for all pages-->
	    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

	</body>

</html>