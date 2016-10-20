@extends('user.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
        View DO Payment
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{asset('user/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="#">Payment module</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{asset('user/view_DO_Payment')}}">View DO Payment</a></li>
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
                    <h4><i class="icon-edit"></i>DO List</h4>

                </div>
                <div class="portlet-body">
                    <div class="clearfix">

                        <div class="btn-group pull-right">
                            <a href="{{asset('user/insert_delivery')}}" > class="btn green">
                                Add New <i class="icon-plus"></i>
                            </a>

                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Receipt Number</th>
                            <th>Amount</th>
                            <th>Payment date</th>

                        </tr>
                        </thead>
                        <tbody>  @foreach ($Do_payment as $data)
                            <?php $i=1;?>
                            <tr class="">
                                <th><?php echo $i;?></th>
                                <th>{{$data->inward_entry_id}}</th>
                                <th>{{$data->amount}}</th>
                                <th>{{$data->created_at}}</th>
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
