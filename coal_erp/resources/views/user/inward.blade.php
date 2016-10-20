@extends('user.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
        Delivery Order 				<small>Entry delivery Order </small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="admin/dashboard">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="">Master</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>Delivery Order Entry</li>
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
                    <h4><i class="icon-reorder"></i>Delivery Order Entry</h4>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <form action="{{asset('user/Inward_submit')}}" id="form_sample_2" method="post">
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
                                    <label class="control-label">Delivery Order Number</label>
                                    <div class="controls">

                                        <select class="span12 chosen" name="do_entry_id" onchange="Get_DO_Data(this.value)">
                                            <option value="">Select...</option>
                                           @foreach($DO_Entry as $value)
                                                <option value="{{ $value->do_entry_id }}">{{ $value->do_number }}-{{ $value->do_date }}</option>
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
                                    <th>Mines Detail</th>
                                    <th>Valid Up To</th>
                                    <th>Total Quanitity</th>
                                    <th>Balance Qty. To be Lifted</th>
                                    <th>Rate Pet Tonnage</th>
                                    <th>Coal Category</th>
                                    <th>Product</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="DO_Data" id="DO_Data">

                                </tr>
                                </tbody>
                            </table>
                                    </div>
                        </div>

                        <div class="row-fluid">
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Transporting Vehicle Number</label>
                                    <div class="controls">
                                        <input type="text" name="vehicle_number" class="m-wrap span12" required >
                                    </div>
                                </div>
                            </div>
                              <div class="span3">
                                  <div class="control-group">
                                      <label class="control-label">Date Of Recieving</label>
                                  <div class="controls">
                                      <input type="text" name="recieve_date" class="m-wrap m-ctrl-medium date-picker" size="16" required />
                                  </div>
                                  </div>
                              </div>
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Gate Pass number</label>
                                    <div class="controls">
                                        <input type="text" name="gatepass_number" class="m-wrap span12" required />

                                    </div>
                                </div>
                            </div>
							 <div class="span3">
                                  <div class="control-group">
                                      <label class="control-label">Get Pass Date</label>
                                      <div class="controls">
                                          <input class="m-wrap m-ctrl-medium date-picker" name="get_pass_date" size="16" type="text" required />
                                      </div>
                                  </div>
                              </div>
                          </div>
                            <!--/span-->
							<div class="row-fluid">
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Gross Weight</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="g_weight" size="16" type="text"  required />
                                    </div>
                                </div>
                            </div>

                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Tare Weight</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="t_weight" size="16" type="text"  required />

                                    </div>
                                </div>
                            </div>
                        
						<!--/span-->

                        
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Net Weight</label>
                                    <div class="controls">
                                        <input type="text" name="net_weight" class="m-wrap span12" placeholder="" required>

                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Freight Charges</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="freight_charge" size="16" type="text"  required />

                                    </div>
                                </div>
                            </div>
							</div>
							<div class="row-fluid">
							<div class="span3 ">
                                  <div class="control-group">
                                      <label class="control-label">Shortage Amount</label>
                                      <div class="controls">
                                          <input class="m-wrap m-ctrl-medium " name="shortage_amount" size="16" type="text" onkeypress="return isNumberKey(event);"  required />
                                      </div>
                                  </div>
                              </div>
							  
							  <div class="span3">
                                  <div class="control-group">
                                      <label class="control-label">Shortage <small>(kg)</small></label>
                                      <div class="controls">
                                          <input type="text" name="shortage" class="m-wrap m-ctrl-medium" size="16" onkeypress="return isNumberKey(event);" required />
                                      </div>
                                  </div>
                              </div>
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Advanced</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="advanced" size="16" type="text"   />

                                    </div>
                                </div>
                            </div>
 <div class="span3">
                                  <div class="control-group">
                                  <label class="control-label">Muneshiyana &nbsp;(Rs.)</label>
                                      <div class="controls">
                                      <input type="text" name="Munsiyana" class="m-wrap m-ctrl-medium" size="16" onkeypress="return isNumberKey(event);" required />
                                      </div>
                                  </div>
                              </div>
                          </div>
						  <div class="row-fluid">
						  <div class="span3">
                                  <div class="control-group">
                                      <label class="control-label">Other Deduction</label>
                                      <div class="controls">
                                          <input type="text" name="other_deduction" class="m-wrap m-ctrl-medium" size="16" onkeypress="return isNumberKey(event);" required/>
                                      </div>
                                  </div>
                              </div>
                            <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Remark</label>
                                    <div class="controls">
                                        <input type="text" name="remark" class="m-wrap span12" size="16"  placeholder="">

                                    </div>
                                </div>
                            </div></div>
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
        function Get_DO_Data(id) {


            $.ajax({
                type: "get",
                url:   "{{url('get/DO_Data')}}",
                data : {'do_entry_id': id },
                success: function(re){
                    obj = JSON.parse(re);

                    var return_data = "";

                    var do_data = obj.DO_Data.length;
                            return_data +=" <td>"+obj.DO_Data.do_number +"</td>";
                            return_data +=" <td>"+obj.DO_Data.mines_id +"</td>";
                            return_data +=" <td>"+obj.DO_Data.valid_date +"</td>";
                            return_data +=" <td>"+obj.DO_Data.quantity +"</td>";
                            return_data +=" <td>"+obj.DO_Data.mines_id +"</td>";
                            return_data +=" <td>"+obj.DO_Data.rate +"</td>";
                            return_data +=" <td>"+obj.category_name.category_name +"</td>";
                            return_data +=" <td>"+obj.product_name.product_name +"</td>";



                    $("#DO_Data").html(return_data);
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

