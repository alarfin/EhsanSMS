@extends('master')
@section('client', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title">
					<h3><i class="fa fa-bars"></i> Client Add Form</h3>
					<div class="" style="min-height:10px;"></div>
					@if(session('success_msg'))
					  <div class="alert alert-success alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  {{session('success_msg')}}
					  </div>
					@endif
					@if($errors->any())
						  @foreach($errors->all() as $error)
							<div class="alert alert-warning alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								{{$error}}
							</div>
						@endforeach
					@endif
					<div class="box-tool">
						<a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
						{{-- <a data-action="close" href="#"><i class="fa fa-times"></i></a> --}}
					</div>
				</div>
				<div class="box-content">
					<form action="{{ route('client_store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<p align="center" style="margin:25px;">
								<img id="img_show" src="{{Auth::user()->photo? asset('storage/app/'. Auth::user()->photo):asset('storage/app/public/images/user.png')}}" alt="User Photo" width="150" height="150">
							</p>
							<p align="center">
								<input id="photo" name="photo" type="file" style="border:none; margin:10px"/>
							</p>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Name <span style="color:red">*</span> </label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="text" hidden name="role" value="client">
								<input type="text" id="name" name="name" placeholder="Enter name" pattern="([a-zA-Z]{3,30}\s*)+" value="{{ old('name') }}" class="form-control" />
								{{-- <span id="name_msg" class="help-inline" style="color:red"></span> --}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Email <span style="color:red">*</span> </label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="email" id="email" name="email"  data-type="email" placeholder="Enter Email Address" value="{{ old('email') }}" class="form-control" />
								{{-- <span id="email_msg" class="help-inline" style="color:red"></span> --}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Mobile Number <span style="color:red">*</span></label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="text" id="phone_number" name="phone_number" pattern="(^[01]{2}[3-9]{1}[0-9]{8})$" placeholder="Mobile Number Ex-01XXXXXXXXX" value="{{ old('email') }}" class="form-control" />
								{{-- <span id="email_msg" class="help-inline" style="color:red"></span> --}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Company</label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="text" id="company" name="company" placeholder="Enter Company" pattern="([a-zA-Z]{0,30}\s*)+" value="{{ old('name') }}" class="form-control" />
								<span id="name_msg" class="help-inline" style="color:red"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Address</label>
							<div class="col-sm-9 col-lg-10 controls">
								<textarea name="address" id="address" class="form-control" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Short Bio</label>
							<div class="col-sm-9 col-lg-10 controls">
								<textarea name="bio" id="bio" class="form-control" rows="6"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">SMS Rate</label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="text" id="sms_rate" name="sms_rate" placeholder="Enter SMS Rate" value="{{ old('name') }}" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Join Date</label>
							<div class="col-sm-9 col-lg-10 controls">
								 <input type="text" name="join_date" id="join_date" class="form-control date-picker" value="{{ date('d-m-Y') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Expiry Date</label>
							<div class="col-sm-9 col-lg-10 controls">
								 <input type="text" name="expiry_date" id="expiry_date" class="form-control date-picker" value="{{ date('d-m-Y',strtotime('+1 months')) }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Password</label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" />
								{{-- <span id="name_msg" class="help-inline" style="color:red"></span> --}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Confirm Password</label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password" class="form-control" />
								{{-- <span id="name_msg" class="help-inline" style="color:red"></span> --}}
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Add Client </button>
								<button type="reset" class="btn">Cancel</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/BackEnd/assets') }}/bootstrap-datepicker/css/datepicker.css" />
@endsection
@section('scripts')
	<script src="{{asset('public/BackEnd')}}/js/field-validator.js"></script>
	<script type="text/javascript" src="{{ asset('public/BackEnd/assets') }}/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		  function readURL(input) {
			  if (input.files && input.files[0]) {
				  var reader = new FileReader();
				  reader.onload = function (e) {
					  $('#img_show').attr('src', e.target.result);
				  }
				  reader.readAsDataURL(input.files[0]);
			  }
		  }

	  $("#photo").change(function(){
		  readURL(this);
	  });
	  </script>
@endsection
