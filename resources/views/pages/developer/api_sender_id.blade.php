@extends('master')
@section('developer', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title text-center">
					<h3> API KEY & Sender ID</h3>
					<div class="" style="min-height:10px;"></div>
				</div>
				<div class=""></div>
				<div class="box-content" style="min-height:50px; padding:50px 25px;">
					<h3>API KEY : <span style="font-size:16px;">{{ Auth::user()->api_key }}</span> </h3>
					<h3>Sender ID : <span style="font-size:16px;">{{ Auth::user()->sender_id }}</span> </h3>

				</div>
			</div>
		</div>
	</div>
@endsection
