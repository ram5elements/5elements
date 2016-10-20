@extends('user.master')
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
@section('pagetitle')

    <h3 class="page-title">
       Add Payment
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
        <li><a href="{{asset('user/Demo_Section')}}">Add Payment</a></li>
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
                    <h4><i class="icon-reorder"></i>Add Payment</h4>

                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->@if(Session::has('message'))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <form action="{{asset('user/AddPaymentSubmit')}}" id="form_sample_2" method="post">
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
                                    <label class="control-label">Date</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium date-picker" name="Date" size="16" required >

                                    </div>
                                </div>
                            </div>
                            <!--/span-->
							<div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Name Of Party</label>
                                    <div class="controls">
                              
                                          </select>
                                        <select class="span12 chosen" name="NameOfParty">
                                            <option value="">Select...</option>
                                           @foreach($Party_details as $value)
                                                <option value="{{ $value->company_name }}">{{ $value->company_name}}</option>
                                            @endforeach
                                        </select>
                                      
                                    </div>
                                </div>
                            </div>
                        
                            

                            <!--/span-->
							 <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Amount Received</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="AmountReceived" size="16" type="text" onkeypress="return isNumberKey(event);"  required />

                                    </div>
                                </div>
                            </div>
							 <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Amount Paid</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="AmountPaid" size="16" type="text" onkeypress="return isNumberKey(event);" required />

                                    </div>
                                </div>
                            </div>
							 <div class="span3 ">
                                <div class="control-group">
                                    <label class="control-label">Remark</label>
                                    <div class="controls">
                                        <input class="m-wrap m-ctrl-medium " name="remark" size="16" type="text"  required />

                                    </div>
                                </div>
                            </div>
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

   
@endsection