@extends('user.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
        Dashboard
        <small>statistics and more</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{asset('admin/dashboard')}}">Dashboard</a></li>
        <li class="pull-right no-text-shadow">
            <div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>
                <span></span>
                <i class="icon-angle-down"></i>
            </div>
        </li>
    </ul>
    @endsection
            <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTENT-->
@section('content')
    <div class="row-fluid">
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="icon-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        1349
                    </div>
                    <div class="desc">
                        Coal Stock
                    </div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="icon-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">549</div>
                    <div class="desc">New Orders</div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="icon-globe"></i>
                </div>
                <div class="details">
                    <div class="number">+89%</div>
                    <div class="desc">Stock Availability</div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
            <div class="dashboard-stat yellow">
                <div class="visual">
                    <i class="icon-bar-chart"></i>
                </div>
                <div class="details">
                    <div class="number">12,5M</div>
                    <div class="desc">Total Profit</div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>
    @endsection
            <!-- END PAGE CONTENT-->
