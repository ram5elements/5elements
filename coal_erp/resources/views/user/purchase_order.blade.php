@extends('user.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
        Purchase Order 				<small>Entry Purchase Order </small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="admin/dashboard">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="">Sales Module</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>Purchase Order Entry</li>
    </ul>

    @endsection
            <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTENT-->
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN VALIDATION STATES-->
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert"></button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>Purchase Order Entry</h4>

                </div>
                <div class="portlet-body form">

                    <form action="{{asset('user/PO_Entry')}}" id="form_sample_2" method="post">
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
                                    <label class="control-label">Purchase Order Number</label>
                                    <div class="controls">
                                        <input type="text" name="po_number" class="m-wrap span12" placeholder="Purchase Order Number" required>
                                        <input type="hidden" name="inserted_by" value="{{$user_id}}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">P.O.Date</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" name="po_date" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">P.O.Valid Up To</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium date-picker" name="valid_date" size="16" type="text"  />
                                    </div>
                                </div>
                            </div>
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">P.O.Quantity (in MT)</label>
                                    <div class="controls">
                                        <input type="text" name="quantity" class="m-wrap span12" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>

                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">Select Mines<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="m-wrap span12" name="mines_id">
                                            <option value="">Select...</option>
                                            @foreach($minesDetail as $value)
                                                <option value="{{ $value->mines_id }}">{{ $value->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">Coal Grade<span class="required">*</span></label>
                                    <div class="controls chzn-controls">
                                        <div class="controls">
                                            <select class="m-wrap span12" name="category_id" id="category_id" onChange="Product_list(this.value);">
                                                <option value="">Select...</option>
                                                @foreach($category as $value)
                                                    <option value="{{ $value->category_id }}">{{ $value->category_name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">Product<span class="required">*</span></label>
                                    <div class="controls chzn-controls">
                                        <div class="controls">
                                            <select class="m-wrap span12" name="category_product_id" id="category_product_id">
                                                <option value="">Select...</option>
                                                <div class="category_product_id" id="category_product_id"></div>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Rate Per Tonnage</label>
                                    <div class="controls">
                                        <input type="text" name="rate" class="m-wrap span12" >

                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Advanced</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="advanced" size="16" type="text"  />

                                    </div>
                                </div>
                            </div>
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Freight Charges</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="freight_charges" size="16" type="text"  />

                                    </div>
                                </div>
                            </div>
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Remark</label>
                                    <div class="controls">
                                        <input type="text" class="m-wrap span12" placeholder="" name="remark">

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
        function Product_list(id) {


            $.ajax({
                type: "get",
                url:   "{{url('get/product_list')}}",
                data : {'category_id': id },
                success: function(re){
                    obj = JSON.parse(re);

                    var return_data = "";
                    return_data +=" <option>Select product</option>";
                    var driver_count = obj.product_list.length;
                    if (driver_count > 0) {
                        var a = 1;
                        for (var i = 0; i < obj.product_list.length; i++) {

                            return_data +=" <option value = '"+obj.product_list[i].category_product_id +"'>"+obj.product_list[i].product_name +"</option> ";

                        }
                    }

                    $("#category_product_id").html(return_data);
                },
                error: function(result) {
                    alert(result + token);
                }
            });
        }


    </script>
    @endsection
            <!-- END PAGE CONTENT-->
@section('javascript')
    <script>
        jQuery(document).ready(function() {
            // initiate layout and plugins
            App.setPage("table_editable");
            App.init();
        });
    </script>

@stop

