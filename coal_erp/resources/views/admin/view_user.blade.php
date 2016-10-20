@extends('admin.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
        View User
        <!--<small>statistics and more</small>-->
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="#">Master</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{asset('admin/view_user')}}">View User Details</a></li>
    </ul>
    @endsection
            <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTENT-->
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4><i class="icon-globe"></i>View User Details</h4>
                </div>
                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="btn-group">
                            <div class="control-group">
                                <a href="{{ asset ("admin/create_user") }}"  class="btn green">Add New <i class="icon-plus"></i></a>
                            </div>
                        </div>
                        <div class="btn-group pull-right">
                            <button class="btn red" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Print</a></li>
                                <li><a href="#">Save as PDF</a></li>
                                <li><a href="#">Export to Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <!--<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>-->
                            <th>User Id</th>
                            <th>Name</th>
                            <th>Email Id</th>
                            <th>Address</th>
                            <th>Mobile No</th>
                            <th>Zone</th>
                            <th>User Type</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($userDetail) > 0)
                            @foreach ($userDetail as $detail)
                                <tr class="odd gradeX">
                                    <!--<td><input type="checkbox" class="checkboxes" value="1" /></td>-->
                                    <td>{{ $detail->user_id }}</td>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ $detail->email }}</td>
                                    <td>{{ $detail->address }}</td>
                                    <td>{{ $detail->mobile_no }}, {{ $detail->alt_mobile_no }}</td>
                                    <td>{{ $detail->zone }}</td>
                                    <td>{{ $detail->user_type }}</td>
                                    <td>{{ $detail->status }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection