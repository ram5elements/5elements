@extends('admin.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
        View Party
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
        <li><a href="{{asset('admin/view_party')}}">View Party Details</a></li>
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
                    <h4><i class="icon-globe"></i>View Party Details</h4>
                </div>
                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="btn-group">
                            <div class="control-group">
                                <a href="{{ asset ("admin/add_party") }}"  class="btn green">Add New <i class="icon-plus"></i></a>
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
                            <th>Party Id</th>
                            <th>Company Name</th>
                            <th>Person Name</th>
                            <th>Address</th>
                            <th>Email Id</th>
                            <th>Mobile No</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($partyDetail) > 0)
                            @foreach ($partyDetail as $detail)
                        <tr class="odd gradeX">
                            <!--<td><input type="checkbox" class="checkboxes" value="1" /></td>-->
                            <td>{{ $detail->party_id }}</td>
                            <td>{{ $detail->company_name }}</td>
                            <td>{{ $detail->person_name }}</td>
                            <td>{{ $detail->address }}</td>
                            <td>{{ $detail->email_id }}</td>
                            <td>{{ $detail->mobile_no }}, {{ $detail->alt_mobile_no }}</td>
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