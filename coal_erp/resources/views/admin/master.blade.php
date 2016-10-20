<!DOCTYPE html>

<html>

<head>
    @if (Session::has('user_data'))
    <meta charset="utf-8" />
    <title>Admin  Portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="{{ asset("/public/assets/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/css/metro.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/bootstrap/css/bootstrap-responsive.min.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/font-awesome/css/font-awesome.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/css/style.css") }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset("/public/assets/bootstrap-datepicker/css/datepicker.css") }}" />
    <link href="{{ asset("/public/assets/css/style_responsive.css") }}" rel="stylesheet" />
    <link href="{{ asset("/public/assets/css/style_default.css") }}" rel="stylesheet" id="style_color" />
    <link rel="stylesheet" type="text/css" href="{{ asset("/public/assets/chosen-bootstrap/chosen/chosen.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("/public/assets/uniform/css/uniform.default.css") }}" />
    <link rel="stylesheet" href="{{ asset("/public/assets/data-tables/DT_bootstrap.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("/public/assets/uniform/css/uniform.default.css") }}" />
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="#">
                <h4>Agrawal Trades</h4>
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <img src="{{ asset("/public/assets/img/menu-toggler.png") }}" alt="" />
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <ul class="nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->

                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="" src="{{ asset("/public/assets/img/avatar1_small.jpg") }}" />
                        <span class="username">{{Session::get('user_data')->name}}</span>
                        <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('user/logout') }}"><i class="icon-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar nav-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul>
            <li>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search">
                    <div class="input-box">
                        <a href="javascript:;" class="remove"></a>
                        <input type="text" placeholder="Search..." />
                        <input type="button" class="submit" value=" " />
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{asset('admin/dashboard')}}">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <i class="icon-bookmark-empty"></i>
                    <span class="title">Master</span>
                    <span class="selected"></span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                    <li ><a href="{{asset('admin/add_party')}}">Add Party Details</a></li>
                    <li ><a href="{{asset('admin/add_mines')}}">Add Mines Details</a></li>
                    <li ><a href="{{asset('admin/add_liftner')}}">Add Liftner/Agent</a></li>
                    <li ><a href="{{asset('admin/create_user')}}">Create user</a></li>
                    <li ><a href="{{asset('admin/add_product')}}">Add Product</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/view_purchase') ? 'active' : '' }}">
                <a href="{{asset('admin/view_purchase')}}">
                    <i class="icon-bar-chart"></i>
                    <span class="title">View Purchase Details </span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="{{ Request::is('admin/view_stock') ? 'active' : '' }}">
                <a href="{{asset('admin/view_stock')}}">
                    <i class="icon-calendar"></i>
                    <span class="title">View Stock Details</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="{{ Request::is('admin/view_sales') ? 'active' : '' }}">
                <a href="{{asset('admin/view_sales')}}">
                    <i class="icon-camera"></i>
                    <span class="title">View Sales Details </span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="{{ Request::is('admin/view_payments') ? 'active' : '' }}">
                <a href="{{asset('admin/view_payments')}}">
                    <i class="icon-user"></i>
                    <span class="title">View Payment</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="{{ Request::is('admin/report_section') ? 'active' : '' }}">
                <a href="{{asset('admin/report_section')}}">
                    <i class="icon-user"></i>
                    <span class="title">Report Section </span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>portlet Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here will be a configuration form</p>
            </div>
        </div>
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN STYLE CUSTOMIZER -->
                    <!--<div class="color-panel hidden-phone">
                        <div class="color-mode-icons icon-color"></div>
                        <div class="color-mode-icons icon-color-close"></div>
                        <div class="color-mode">
                            <p>THEME COLOR</p>
                            <ul class="inline">
                                <li class="color-black current color-default" data-style="default"></li>
                                <li class="color-blue" data-style="blue"></li>
                                <li class="color-brown" data-style="brown"></li>
                                <li class="color-purple" data-style="purple"></li>
                                <li class="color-white color-light" data-style="light"></li>
                            </ul>
                            <label class="hidden-phone">
                                <input type="checkbox" class="header" checked value="" />
                                <span class="color-mode-label">Fixed Header</span>
                            </label>
                        </div>
                    </div>-->
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    @yield('pagetitle')
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- BEGIN PAGE CONTENT-->
            @yield('content')
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    2013 &copy; Metronic by keenthemes.
    <div class="span pull-right">
        <span class="go-top"><i class="icon-angle-up"></i></span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="{{ asset ("/public/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<script src="{{ asset ("/public/assets/js/jquery-1.8.3.min.js") }}"></script>
<script src="{{ asset ("/public/assets/breakpoints/breakpoints.js") }}"></script>
<script src="{{ asset ("/public/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js") }}"></script>
<script src="{{ asset ("/public/assets/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset ("/public/assets/js/jquery.blockui.js") }}"></script>
<script src="{{ asset ("/public/assets/js/jquery.cookie.js") }}"></script>
<script src="{{ asset ("/public/assets/fullcalendar/fullcalendar/fullcalendar.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/public/assets/uniform/jquery.uniform.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/public/assets/chosen-bootstrap/chosen/chosen.jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/public/assets/bootstrap-datepicker/js/bootstrap-datepicker.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/public/assets/data-tables/jquery.dataTables.js") }}" ></script>
<script type="text/javascript" src="{{ asset ("/public/assets/data-tables/DT_bootstrap.js") }}"></script>
<script src="{{ asset ("/public/assets/user-define/alert-message.js") }}"></script>
<script src="{{ asset ("/public/assets/user-define/key-validation.js") }}"></script>
<!-- ie8 fixes -->
<script src="{{ asset ("/public/assets/js/excanvas.js") }}"></script>
<script src="{{ asset ("/public/assets/js/respond.js") }}"></script>
<script src="{{ asset ("/public/assets/js/app.js") }}"></script>

<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.setPage('calendar');
        App.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
@else
    <div class="alert"> Session expired Please Login to Continue...</div>
@endif

