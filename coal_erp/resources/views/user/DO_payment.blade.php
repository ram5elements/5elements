@extends('user.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
        DO Payment
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
        <li><a href="{{asset('user/DO_Payment')}}">DO Payment</a></li>
    </ul>
    @endsection
            <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTENT-->
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>DO Inword Payment</h4>

                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->@if(Session::has('message'))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <form action="{{asset('user/DO_Payment_insert')}}" id="form_sample_2" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="alert alert-error hide">
                            <button class="close" data-dismiss="alert"></button>
                            You have some form errors. Please check below.
                        </div>
                        <div class="alert alert-success hide">
                            <button class="close" data-dismiss="alert"></button>
                            Your form validation is successful!
                        </div>

                        <div class="row-fluid">
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Receipt Number</label>
                                    <div class="controls">
                                        <select class="span12 chosen" name="inward_entry_id" onchange="Get_Receipt_Data(this.value)">
                                            <option value="">Select...</option>
                                            @foreach($inward_entry as $item)
                                                <option value="{{$item->inward_entry_id}}">{{$item->inward_entry_id}}</option>
                                                @endforeach
                                        </select>
                                        <input type="hidden" name="inserted_by" value="{{$user_id}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th>DO Number</th>
                                        <th>Receipt Number</th>
                                        <th>Vehicle Number</th>
                                        <th>Gross Weight</th>
                                        <th>Tare Weight</th>
                                        <th>Net Weight</th>
                                        <th>Freight Charge</th>
                                        <th>Advanced</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="receipt_Data" id="receipt_Data">

                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row-fluid">
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Payment Amount</label>
                                    <div class="controls">
                                        <input type="text" name="amount" class="m-wrap span12" required >

                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Remark</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="remark" size="16" type="text"  required />

                                    </div>
                                </div>
                            </div>

                            <!--/span-->
                        </div>




                        <div class="form-actions">
                            <button type="submit" class="btn green">Submit</button>
                            <button type="button" class="btn">Cancel</button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script>
        function Get_Receipt_Data(id) {


            $.ajax({
                type: "get",
                url:   "{{url('get/receipt_Data')}}",
                data : {'inward_entry_id': id },
                success: function(re){
                    obj = JSON.parse(re);

                    var return_data = "";

                    var do_data = obj.inward_data.length;



                    return_data +=" <td>"+obj.inward_data.do_entry_id+"</td>";
                    return_data +=" <td>"+obj.inward_data.inward_entry_id+"</td>";
                    return_data +=" <td>"+obj.inward_data.vehicle_number+"</td>";
                    return_data +=" <td>"+obj.inward_data.g_weight +"</td>";
                    return_data +=" <td>"+obj.inward_data.t_weight +"</td>";
                    return_data +=" <td>"+obj.inward_data.net_weight +"</td>";
                    return_data +=" <td>"+obj.inward_data.freight_charge +"</td>";
                    return_data +=" <td>"+obj.inward_data.advanced +"</td>";



                    $("#receipt_Data").html(return_data);
                },
                error: function(result) {
                    alert(result + token);
                }
            });
        }


    </script>
    @endsection