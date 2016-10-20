@extends('admin.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
       Category List
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
        <li>Product Category</li>
    </ul>
    @endsection
            <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTENT-->
@section('content')
        <div class="portlet box green">

            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Product Category List</h4>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                    <tr>
                        <th>S. No</th>
                        <th>Product Category Name</th>
                        <th>Option</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($category as $data)
                    <tr class="">
                        <td>{{ $data->category_id }}</td>
                        <td>{{ $data->category_name }}</td>
                        <td><a class="edit" href="{{asset('admin/add_product_item')}}">Add Product</a></td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- END FORM-->
            </div>
        </div>

@endsection