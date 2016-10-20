@extends('user.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
        View Purchase Order
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{asset('user/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="#">Purchase module</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{asset('user/view_sales')}}">View Purchase Order</a></li>
    </ul>
    @endsection
            <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTENT-->
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <h4><i class="icon-edit"></i>Purchase Order List</h4>
                </div>
                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="btn-group pull-right">
                            <a href="{{asset('user/purchase_order')}}" > class="btn green">
                                Add New <i class="icon-plus"></i>
                            </a>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th>S No.</th>
                            <th>PO Number</th>
                            <th>PO Date</th>
                            <th>Valid Up To</th>
                            <th>Quanitity</th>
                            <th>Rate Pet Tonnage</th>
                        </tr>
                        </thead>
                        <tbody>  @foreach ($PO_Entry as $data)
                            <?php $i=1;?>
                            <tr class="">
                                <td><?php echo $i;?></td>
                                <td>{{$data->po_number}}</td>
                                <td>{{$data->po_date}}</td>
                                <td class="center">{{$data->valid_date}}</td>
                                <td><a class="edit" >{{$data->quantity}}</a></td>
                                <td><a class="delete" >{{$data->rate}}</a></td>
                            </tr> <?php $i++;?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection