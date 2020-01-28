@extends('master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-title">
					<h3 class="text-center">Profile Info</h3>
					<div class="" style="min-height:10px;"></div>
					@if(session('success_msg'))
					  <div class="alert alert-success alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  {{session('success_msg')}}
					  </div>
					@endif
					<div class="box-tool">
						<a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
						<a data-action="close" href="#"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="box-content" style="min-height:600px;">
					<div class="row">
						<div class="col-md-3">
							<img class="img-responsive img-thumbnail" src="{{Auth::user()->photo? asset('storage/app/'. Auth::user()->photo):asset('storage/app/public/images/user.png')}}" alt="profile picture" />
							<br/>
							<br/>
						</div>
						<div class="col-md-9 user-profile-info">
							<p><span>Name :</span>{{ Auth::user()->name }}</p>
							<p><span>Email :</span>{{ Auth::user()->email }}</p>
							<p><span>Phone Number :</span>{{ Auth::user()->phone_number }}</p>
							<p><span>Company :</span>{{ Auth::user()->company }}</p>
							<p><span>Address :</span>{{ Auth::user()->address }}</p>
							<p><span>Status :</span>{{ Auth::user()->status==1?'Enable':'Disable' }}</p>
							<p><span>Role :</span>{{ Auth::user()->role == 'root'?'Administrator':'Client User' }}</p>
							<p><span>Short Bio :</span>{{ Auth::user()->bio }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
