@extends('admin.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
       Add Product
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
        <li><a href="">Add Product</a></li>
    </ul>
    @endsection
            <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTENT-->
@section('content')
    @if(Session::has('message'))
        <p class="alert alert-success"> {{ Session::get('message') }}</p>
    @endif
        <div class="portlet box green">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Add Product</h4>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{asset('product/add')}}" class="horizontal-form" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3 class="form-section">Add Product</h3>
                    <div class="row-fluid">
                        <div class="span1">
                            </div>
                        <div class="span4">
                            <div class="control-group">
                                <label class="control-label" for="firstName">Product Name</label>
                                <div class="controls">
                                    <input type="text" name="product_name" id="firstName" class="m-wrap span12">
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span4 ">
                            <div class="control-group">
                                <label class="control-label"  for="lastName">Select Category</label>
                                <div class="controls">
                                    <select class="span12 chosen" name="category_id" data-placeholder="Choose a Category" tabindex="1">

                                        <option value=""></option>
                                        @foreach ($category as $data)
                                        <option value="{{$data->category_id}}">{{ $data->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->

                    <div class="form-actions">
                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

@endsection