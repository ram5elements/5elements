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
            <a href="#">View Stock</a>
            <i class="icon-angle-right"></i>
        </li>

    </ul>
    @endsection
            <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTENT-->
@section('content')
        <div class="row-fluid ">

            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <div class="span12">
                    <!-- BEGIN ACCORDION PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <h4><i class="icon-reorder"></i>Stock  List</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>

                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="accordion" id="accordion1">

                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
                                            <i class="icon-angle-left"></i>
                                            E-Grade Coal
                                        </a>
                                    </div>
                                    <div id="collapse_1" class="accordion-body collapse ">
                                        <div class="accordion-inner">
                                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                <thead><a href="{{asset('admin/add_product_item')}}" class="btn green"><i class="icon-plus"></i> Add</a>
                                                <tr>
                                                    <th>S. No</th>
                                                    <th>Product Name</th>
                                                    <th>Bhilai</th>
                                                    <th>Bilaspur</th>
                                                    <th>Total Quantity</th>

                                                </tr>
                                                </thead>
                                                <tbody><?php $i=1; ?>
                                                @foreach ($category1 as $data)

                                                    <tr class="">
                                                        <td>{{ $i }} </td>
                                                        <td>{{ $data->product_name }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                    </tr> <?php $i++; ?>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
                                            <i class="icon-angle-left"></i>
                                            B-Grade Coal
                                        </a>

                                    </div>
                                    <div id="collapse_2" class="accordion-body collapse ">
                                        <div class="accordion-inner">
                                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                <thead><a href="{{asset('admin/add_product_item')}}" class="btn green"><i class="icon-plus"></i> Add</a>
                                                <tr>
                                                    <th>S. No</th>
                                                    <th>Product Name</th>
                                                    <th>Bhilai</th>
                                                    <th>Bilaspur</th>
                                                    <th>Total Quantity</th>

                                                </tr>
                                                </thead>
                                                <tbody><?php $i=1; ?>
                                                @foreach ($category2 as $data)

                                                    <tr class="">
                                                        <td>{{ $i }} </td>
                                                        <td>{{ $data->product_name }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                    </tr> <?php $i++; ?>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">
                                            <i class="icon-angle-left"></i>
                                            Coal Mill Rejected
                                        </a>

                                    </div>
                                    <div id="collapse_3" class="accordion-body collapse ">
                                        <div class="accordion-inner">
                                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                <thead><a href="{{asset('admin/add_product_item')}}" class="btn green"><i class="icon-plus"></i> Add</a>
                                                <tr>
                                                    <th>S. No</th>
                                                    <th>Product Name</th>
                                                    <th>Bhilai</th>
                                                    <th>Bilaspur</th>
                                                    <th>Total Quantity</th>

                                                </tr>
                                                </thead>
                                                <tbody><?php $i=1; ?>
                                                @foreach ($category3 as $data)

                                                    <tr class="">
                                                        <td>{{ $i }} </td>
                                                        <td>{{ $data->product_name }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                    </tr> <?php $i++; ?>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4">
                                            <i class="icon-angle-left"></i>
                                            Imported
                                        </a>

                                    </div>
                                    <div id="collapse_4" class="accordion-body collapse ">
                                        <div class="accordion-inner">
                                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                <thead><a href="{{asset('admin/add_product_item')}}" class="btn green"><i class="icon-plus"></i> Add</a>
                                                <tr>
                                                    <th>S. No</th>
                                                    <th>Product Name</th>
                                                    <th>Bhilai</th>
                                                    <th>Bilaspur</th>
                                                    <th>Total Quantity</th>

                                                </tr>
                                                </thead>
                                                <tbody><?php $i=1; ?>
                                                @foreach ($category4 as $data)

                                                    <tr class="">
                                                        <td>{{ $i }} </td>
                                                        <td>{{ $data->product_name }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                    </tr> <?php $i++; ?>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5">
                                            <i class="icon-angle-left"></i>
                                            Others
                                        </a>

                                    </div>
                                    <div id="collapse_5" class="accordion-body collapse ">
                                        <div class="accordion-inner">
                                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                <thead><a href="{{asset('admin/add_product_item')}}" class="btn green"><i class="icon-plus"></i> Add</a>
                                                <tr>
                                                    <th>S. No</th>
                                                    <th>Product Name</th>
                                                    <th>Bhilai</th>
                                                    <th>Bilaspur</th>
                                                    <th>Total Quantity</th>

                                                </tr>
                                                </thead>
                                                <tbody><?php $i=1; ?>
                                                @foreach ($category5 as $data)

                                                    <tr class="">
                                                        <td>{{ $i }} </td>
                                                        <td>{{ $data->product_name }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                    </tr> <?php $i++; ?>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- END ACCORDION PORTLET-->
                </div>
                <!-- END FORM-->
            </div>
        </div>

@endsection