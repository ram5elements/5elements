@extends('admin.master')

@section('title')
    Add Client
@endsection

@section('pagetitle')
    <h3 class="page-title">Add New Client</h3>

    <ul class="breadcrumb">        
        <li>
			<i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="{{asset('admin/registration/add_client')}}">Register New Client</a>
        </li>
    </ul>
@endsection

@section('content')
   @if (count($errors) > 0)
						<div>
							<ul class="alert" style="color:red;">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>							
						</div>
	@endif
	@if(Session::has('client_message'))	
		<p class="alert" style="color:green;font-weight:bold"> {{ Session::get('client_message') }}</p>	
    @endif

    <div class="col-md-8">
        <div class="box box-primary">
            <form role="form" method="post" action="{{url('admin/registration/add_client')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputFName">Name</label>
                        <input type="text" class="form-control" id="inputFName" name="name" placeholder="Enter first name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Enter address" value="{{ old('address') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputCPerson">Contact Person</label>
                        <input type="text" class="form-control" id="inputCPerson" name="contact_person" placeholder="Enter contact person" value="{{ old('contact_person') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputMobile">Mobile No</label>
                        <input type="text" class="form-control" id="inputMobile" name="mobile_number" placeholder="Enter mobile number" value="{{ old('mobile_number') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input type="email" class="form-control" id="inputEmail" name="email_id" placeholder="Enter email" value="{{ old('email_id') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <input type="text" class="form-control" id="inputStatus" name="status" placeholder="Enter status" value="{{ old('status') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputPAN">PAN</label>
                        <input type="text" class="form-control" id="inputPAN" name="PAN" placeholder="Enter PAN in the format AAAAA9999A" value="{{ old('PAN') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputTAN">TAN</label>
                        <input type="text" class="form-control" id="inputTAN" name="TAN" placeholder="Enter TAN in the format ANBA99999B" value="{{ old('TAN') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputTIN">TIN</label>
                        <input type="text" class="form-control" id="inputTIN" name="TIN" placeholder="Enter TIN in the format 99999999999" value="{{ old('TIN') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputCIN">CIN</label>
                        <input type="text" class="form-control" id="inputCIN" name="CIN" placeholder="Enter CIN in the format A99999AA9999AAA999999" value="{{ old('CIN') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputExcise">Excise Registration No</label>
                        <input type="text" class="form-control" id="inputExcise" name="excise_reg_no" placeholder="Enter Excise Registration No in the format AAAAA9999ABC123" value="{{ old('excise_reg_no') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputService">Service Tax Registration No</label>
                        <input type="text" class="form-control" id="inputService" name="service_tax_reg_no" placeholder="Enter Service Tax Registration No in the format AAAAA9999ASD123" value="{{ old('service_tax_reg_no') }}">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection