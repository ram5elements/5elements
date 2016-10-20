@extends('admin.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
        Add Liftner/Agent Details
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
        <li><a href="{{asset('admin/add_mines')}}">Add Liftner/Agent Details</a></li>
    </ul>
    @endsection
            <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTENT-->
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert"></button>
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="portlet box green">
        <div class="portlet-title">
            <h4><i class="icon-reorder"></i>Add Liftner/Agent Details</h4>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ asset ("admin/add_new_liftner") }}" class="horizontal-form" method="post">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" name="created_by" value="{{$user_id}}"/>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="control-group">
                                <a href="{{ asset ("admin/view_liftner") }}" class="btn green">View <i class="icon-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span1">
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Liftner/Agent Name</label>
                            <div class="controls">
                                <input type="text" name="liftner_name" class="m-wrap span12" required>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Contact Person Name</label>
                            <div class="controls">
                                <input type="text" name="person_name" class="m-wrap span12" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row-fluid">
                    <div class="span1">
                    </div>
                    <div class="span4 ">
                        <div class="control-group">
                            <label class="control-label">Address</label>
                            <div class="controls">
                                <input type="text" name="address" class="m-wrap span12" required>
                            </div>
                        </div>
                    </div>
                    <div class="span4 ">
                        <div class="control-group">
                            <label class="control-label">Email Id</label>
                            <div class="controls">
                                <input type="text" name="email_id" class="m-wrap span12">
                            </div>
                        </div>
                    </div>
                </div>

                <!--/row-->
                <div class="row-fluid">
                    <div class="span1">
                    </div>
                    <div class="span4 ">
                        <div class="control-group">
                            <label class="control-label">Mobile No</label>
                            <div class="controls">
                                <input type="text" name="mobile_no" class="m-wrap span12" onkeypress="return onKeyValidate(event,numeric);" required>
                            </div>
                        </div>
                    </div>
                    <div class="span4 ">
                        <div class="control-group">
                            <label class="control-label">Alternate Mobile No</label>
                            <div class="controls">
                                <input type="text" name="alt_mobile_no" class="m-wrap span12" onkeypress="return onKeyValidate(event,numeric);" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                    <button type="button" class="btn">Cancel</button>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>

@endsection