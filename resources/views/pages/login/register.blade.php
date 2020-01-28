@extends('pages.login.master')
@section('login_title')
	{{ 'Registration Form' }}
@endsection
@section('content')
	<div class="login-wrapper">
        <!-- BEGIN Login Form -->
		<form id="formValidate" method="POST" action="{{ route('register') }}">
			@csrf
            <h3>Register for account</h3>
			@if($errors->any())
				  @foreach($errors->all() as $error)
					<div class="alert alert-warning alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
						{{$error}}
					</div>
				@endforeach
			@endif
            <hr/>
            <div class="form-group">
                <div class="controls">
					<input type="text" hidden name="role" value="client">
                    <input type="text" name="phone_number" id="mobile" placeholder="Enter Mobile Number" pattern="(^[01]{2}[3-9]{1}[0-9]{8})$" value="{{ old('phone_number') }}" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <input type="password" name="password" placeholder="Enter Password" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
            </div>
            <hr/>
            <p class="clearfix">
                <a href="{{ route('login') }}" class="goto-register pull-right">Sign In</a>
            </p>
        </form>
        <!-- END Login Form -->

    </div>
@endsection
