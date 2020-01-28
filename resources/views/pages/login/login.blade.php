@extends('pages.login.master')
@section('content')
	<div class="login-wrapper">
        <!-- BEGIN Login Form -->
		<form id="form-login" method="POST" action="{{ route('login') }}">
			@csrf
            <h3>Login to your account</h3>
			@if(session('error_msg'))
			  <div class="alert alert-warning">
				  {{session('error_msg')}}
			  </div>
			@endif
			@if($errors->any())
				  @foreach($errors->all() as $error)
					<div class="alert alert-warning">
						{{$error}}
					</div>
				@endforeach
			@endif
            <hr/>
            <div class="form-group">
                <div class="controls">
                    <input type="phone" name="phone_number" placeholder="Phone Number" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <input type="password" name="password" placeholder="Password" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" value="remember" /> Remember me
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary form-control">Sign In</button>
                </div>
            </div>
            <hr/>
            <p class="clearfix">
                <a href="#" class="goto-forgot pull-left">Forgot Password?</a>
                <a href="{{ route('register') }}" class="goto-register pull-right">Sign up now</a>
            </p>
        </form>
        <!-- END Login Form -->

        <!-- BEGIN Forgot Password Form -->
        <form id="form-forgot" action="http://thetheme.io/flaty/index.html" method="get" style="display:none">
            <h3>Get back your password</h3>
            <hr/>
            <div class="form-group">
                <div class="controls">
                    <input type="text" placeholder="Email" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary form-control">Recover</button>
                </div>
            </div>
            <hr/>
            <p class="clearfix">
                <a href="#" class="goto-login pull-left">← Back to login form</a>
            </p>
        </form>
        <!-- END Forgot Password Form -->

        <!-- BEGIN Register Form -->
        <form id="form-register" action="http://thetheme.io/flaty/index.html" method="get" style="display:none">
            <h3>Sign up</h3>
            <hr/>
            <div class="form-group">
                <div class="controls">
                    <input type="text" placeholder="Email" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <input type="text" placeholder="Username" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <input type="password" placeholder="Password" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <input type="password" placeholder="Repeat Password" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" value="remember" /> I accept the <a href="#">user aggrement</a>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary form-control">Sign up</button>
                </div>
            </div>
            <hr/>
            <p class="clearfix">
                <a href="#" class="goto-login pull-left">← Back to login form</a>
            </p>
        </form>
        <!-- END Register Form -->
    </div>
@endsection
