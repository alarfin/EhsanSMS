@extends('master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-pink">
				<div class="box-title">
					<h3></i> Edit Profile</h3>
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
						<a data-action="close" href="#"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="box-content">
					<form action="{{ route('profile_update', $user->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
								<input type="text" name="name" value="{{ $user->name??'' }}" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Email <span style="color:red">*</span> </label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="email" name="email" value="{{ $user->email??'' }}" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Mobile Number <span style="color:red">*</span></label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="number" name="phone_number" value="{{ $user->phone_number??'' }}" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Company</label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="text" name="company" value="{{ $user->company??'' }}" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Address</label>
							<div class="col-sm-9 col-lg-10 controls">
								<textarea name="address" class="form-control" rows="3">{{ $user->address??'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Short Bio</label>
							<div class="col-sm-9 col-lg-10 controls">
								<textarea name="bio" class="form-control" rows="6">{{ $user->bio??'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary">Update Profile</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
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
