@extends('admin.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
       Create user
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
        <li><a href="{{asset('admin/create_user')}}">Create user</a></li>
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
            <h4><i class="icon-reorder"></i>user Details</h4>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ asset ("admin/add_new_user") }}" class="horizontal-form" method="post">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" name="Create_by" value="{{$user_id}}"/>
                <input type="hidden" name="status" value="ACTIVE"/>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="control-group">
                                <a href="{{ asset ("admin/view_user") }}" class="btn green">View <i class="icon-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span1">
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                                <input type="text" name="name" class="m-wrap span12" >
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Address</label>
                            <div class="controls">
                                <input type="text" name="address" class="m-wrap span12" >
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
                            <label class="control-label">Email Id</label>
                            <div class="controls">
                                <input type="text" name="email" class="m-wrap span12" >
                            </div>
                        </div>
                    </div>
                    <div class="span4 ">
                        <div class="control-group">
                            <label class="control-label">User Type</label>
                            <div class="controls">
                                <select class="m-wrap span12" tabindex="1" name="user_type" >
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                </select>
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
                                <input type="text" name="mobile_no" class="m-wrap span12" onkeypress="return onKeyValidate(event,numeric);" >
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
                <div class="row-fluid">
                    <div class="span1">
                    </div>
                    <div class="span4 ">
                        <div class="control-group">
                            <label class="control-label">Zone</label>
                            <div class="controls">
                                <select class="m-wrap span12" tabindex="1" name="zone" >
                                    <option value="bhilai">bhilai</option>
                                    <option value="bilaspur">bilaspur</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="span4 ">
                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" name="password" class="m-wrap span12" >
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