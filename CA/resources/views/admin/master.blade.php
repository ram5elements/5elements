<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset ("/public/bootstrap/css/bootstrap.min.css") }}">	
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset ("/public/plugins/jvectormap/jquery-jvectormap-1.2.2.css") }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("/public/plugins/datatables/dataTables.bootstrap.css") }}">
    <!-- Modals -->
    <link rel="stylesheet" href="{{ asset("/public/build/less/modal.less") }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset("/public/plugins/daterangepicker/daterangepicker-bs3.css") }}">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{ asset("/public/plugins/datepicker/datepicker3.css") }}">
	
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset ("/public/dist/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset ("/public/dist/css/skins/_all-skins.min.css") }}">

    <link href="{{ asset("/public/assets/css/metro.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/bootstrap/css/bootstrap-responsive.min.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/font-awesome/css/font-awesome.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/css/style.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/css/style_responsive.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/css/style_default.css") }}" rel="stylesheet" id="style_color" />
    <link rel="stylesheet" type="text/css" href="{{ asset("/public/bootstrap/chosen-bootstrap/chosen/chosen.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("/public/bootstrap/uniform/css/uniform.default.css") }}" />
    <link rel="shortcut icon" href="favicon.ico" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="brand">
            <h3>CA Portal</h3>
        </a> 
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset ("/public/dist/img/user1-128x128.jpg")}}" class="user-image" alt="User Image">							 
                            <span class="hidden-xs">{{App\Roleable::getLoggedInUser()}}</span>
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset ("/public/dist/img/user1-128x128.jpg")}}" class="img-circle" alt="User Image">
                                <p>{{App\Roleable::getLoggedInUser()}}</p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>                        
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar"> 

        <!-- sidebar: style can be found in sidebar.less -->
       <section class="sidebar">
	   
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset ("/public/dist/img/user1-128x128.jpg")}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <h3>{{App\Roleable::getLoggedInUser()}}</h3>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
			    
				<!-- If logged-in user is Admin, show Dashboard page, else hide -->
                @if(App\Roleable::hasRole(1))
                  <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{asset('admin/dashboard')}}">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                  </li>
				@endif  
				
				<!-- If logged-in user is Employee, show Work Dashboard page, else hide -->
                @if(App\Roleable::hasRole(3))
                  <li class="{{ Request::is('employee/work_dashboard') ? 'active' : '' }}">
                    <a href="{{asset('employee/work_dashboard')}}">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                  </li>				
				@endif
				
				<!-- If logged-in user is Admin, show registration links, else hide -->
				@if(App\Roleable::hasRole(1))
                  <li class="treeview {{ Request::is('admin/registration/*') ? 'active' : '' }}">					
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Registration</span>                      
						<i class="fa fa-angle-left pull-right"></i>
                    </a>
					
                    <ul class="treeview-menu"> 					
						<li class="{{ Request::is('admin/registration/add_client') ? 'active' : '' }}"><a href="{{asset('admin/registration/add_client')}}">Client</a></li>                        
						<li class="{{ Request::is('admin/registration/add_employee') ? 'active' : '' }}"><a href="{{asset('admin/registration/add_employee')}}">Employee</a></li>						
                        <li class="{{ Request::is('admin/registration/work_master') ? 'active' : '' }}"><a href="{{asset('admin/registration/work_master')}}">Work Master</a></li>
                      <!--  <li><a href="#">Fees</a></li>
                        <li><a href="#">Payment</a></li> -->
                    </ul>
                  </li>
				@endif 				
				
				<!-- If logged-in user is Admin, show WorkAssignment page, else hide -->
                @if(App\Roleable::hasRole(1))
				   <li class="treeview {{ Request::is('admin/work/*') ? 'active' : '' }}">					
                    <a href="#">
                        <i class="icon-bar-chart"></i>
                        <span>Work</span>                      
						<i class="fa fa-angle-left pull-right"></i>
                    </a>
					<ul class="treeview-menu"> 
						<li class="{{ Request::is('admin/work/assign_work') ? 'active' : '' }}"><a href="{{asset('admin/work/assign_work')}}">Assign Work</a></li>
						<li class="{{ Request::is('admin/work/verify_work') ? 'active' : '' }}"><a href="{{asset('admin/work/verify_work')}}">Verify Work</a></li>
					</ul>
				   </li>		
				 
                 <!-- <li class="{{ Request::is('admin/assign_work') ? 'active' : '' }}">
                    <a href="{{asset('admin/assign_work')}}">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Assign Work</span>
                        <span class="selected"></span>
                    </a>
                  </li>	-->			
				@endif
				
				<!-- If logged-in user is Employee, show Assigned Work List page, else hide -->
                @if(App\Roleable::hasRole(3))
                  <li class="{{ Request::is('employee/work_list') ? 'active' : '' }}">
                    <a href="{{asset('employee/work_list')}}">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Assigned Work List</span>
                        <span class="selected"></span>
                    </a>
                  </li>				
				@endif	

				<!-- If logged-in user is Employee, show Work Master page only, else hide -->
                @if(App\Roleable::hasRole(3))
                  <li class="{{ Request::is('admin/registration/work_master') ? 'active' : '' }}">
                    <a href="{{asset('admin/registration/work_master')}}">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Work Master</span>
                        <span class="selected"></span>
                    </a>
                  </li>				
				@endif	
				
                <li class="treeview {{ Request::is('admin/bill/*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span class="title">Bills</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('admin/bill/pending_bills') ? 'active' : '' }}"><a href="{{asset('admin/bill/pending_bills')}}">Pending Bills</a></li>
                        <li><a href="#">Completed Bills</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span class="title">Payment</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span class="title">Report</span>
                        <span class="selected"></span>
                    </a>
                </li>
            </ul>
       </section>
        <!-- /.sidebar -->
		
    </aside> 


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">       
        <div class="row-fluid">
            <div class="span12">
                @yield('pagetitle')
            </div>
        </div>
        <!-- Main content -->

        @yield('content')

      </div>
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2015 </strong> All rights reserved.
    </footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="{{asset ("/public/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset ("/public/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- FastClick -->
<script src="{{asset ("/public/plugins/fastclick/fastclick.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{asset ("/public/dist/js/app.min.js") }}"></script>
<!-- Sparkline -->
<script src="{{asset ("/public/plugins/sparkline/jquery.sparkline.min.js") }}"></script>
<!-- jvectormap -->
<script src="{{asset ("/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
<script src="{{asset ("/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset ("/public/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{asset ("/public/plugins/chartjs/Chart.min.js") }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset ("/public/dist/js/pages/dashboard2.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset ("/public/dist/js/demo.js") }}"></script>
<!-- DataTables -->
<script src="{{asset ("/public/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{asset ("/public/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<!-- InputMask -->
<script src="{{asset ("/public/plugins/input-mask/jquery.inputmask.js") }}"></script>
<script src="{{asset ("/public/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"></script>
<script src="{{asset ("/public/plugins/input-mask/jquery.inputmask.extensions.js") }}"></script>
<!-- date-range-picker -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') }}"></script>

<script src="{{asset ("/public/plugins/daterangepicker/daterangepicker.js") }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset("/public/plugins/datepicker/bootstrap-datepicker.js") }}"></script>


<!-- page script -->
 @yield('javascript');

</body>
</html>
