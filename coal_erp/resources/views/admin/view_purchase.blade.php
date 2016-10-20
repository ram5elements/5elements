@extends('admin.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
       View Purchase Details
        <!--<small>statistics and more</small>-->
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{asset('admin/view_purchase')}}">View Purchase Details</a></li>
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
                    <h4><i class="icon-globe"></i>View Purchase Details</h4>
                </div>
                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="btn-group">
                            <div class="control-group">

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
                            <th>DO Number</th>
                            <th>Date</th>
                            <th>Valid Date</th>
                            <th>Quantity</th>
                            <th>Mines ID</th>
                            <th>Rate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($do_data) > 0)
                            @foreach ($do_data as $detail)
                                <tr class="odd gradeX">
                                    <!--<td><input type="checkbox" class="checkboxes" value="1" /></td>-->
                                    <td>{{ $detail->do_number }}</td>
                                    <td>{{ $detail->do_date }}</td>
                                    <td>{{ $detail->valid_date }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->mines_id }}</td>
                                    <td>{{ $detail->rate }}</td>
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