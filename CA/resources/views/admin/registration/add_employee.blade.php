@extends('admin.master')

@section('title')
    Add Employee
@endsection

@section('pagetitle')
    <h3 class="page-title">Add New Employee</h3>

    <ul class="breadcrumb">       
        <li>
		    <i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="{{asset('admin/registration/add_employee')}}">Register New Employee</a>
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
    @if(Session::has('employee_message'))	
		<p class="alert" style="color:green;font-weight:bold"> {{ Session::get('employee_message') }}</p>	
    @endif
	
    <div class="col-md-8">
        <div class="box box-primary">
            <form role="form" method="post" action="{{url('admin/registration/add_employee')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="inpuFLName">Father's Name</label>
                        <input type="text" class="form-control" id="inputFName" name="father_name" placeholder="Enter father's name" value="{{ old('father_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Enter address" value="{{ old('address') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputMobile">Mobile No</label>
                        <input type="text" class="form-control" id="inputMobile" name="mobile_number" placeholder="Enter mobile number" value="{{ old('mobile_number') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input type="email" class="form-control" id="inputEmail"  name="email_id" placeholder="Enter email" value="{{ old('email_id') }}">
                    </div>
					<div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword"  name="password" placeholder="Enter password" value="{{ old('password') }}">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection