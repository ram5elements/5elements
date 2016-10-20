@extends('master')

@section('main')

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<p class="login-box-msg">Register</p>
					<form role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
						 	<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>

						<div class="form-group has-feedback">
							<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>

						<div class="form-group has-feedback">
							<input type="password" class="form-control" placeholder="Password" name="password">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>

						<div class="form-group has-feedback">
							<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>

						<div class="row">
							<div class="col-sm-4 pull-right">
								<button type="submit" class="btn btn-success">Register</button>
							</div>
						</div>
					</form>

@endsection
