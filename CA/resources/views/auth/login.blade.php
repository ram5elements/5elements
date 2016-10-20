@extends('master')

@section('main')

					@if (count($errors) > 0)
						<div>
							<ul class="alert alert-danger">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<p class="login-box-msg">Sign in to start your session</p>
					<form  role="form" method="POST" action="{{ url('auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group has-feedback">
							<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<input type="password" class="form-control" placeholder="Password" name="password">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>

					<!--	<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div> -->

						<div class="row">
							<div class="col-md-3 pull-right">
								<button type="submit" class="btn btn-success">Login</button>

							<!--	<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a> -->
							</div>
						<!--	<div class="col-md-3 pull-left">
								<a class="btn btn-link" href="{{ url('auth/register') }}">Not Registered User? Register</a>
							</div> -->
						</div>
					</form>

@endsection
