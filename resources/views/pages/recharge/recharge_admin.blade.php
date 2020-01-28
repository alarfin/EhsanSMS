@extends('master')
@section('administrator', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title" style="max-width:768px; margin: 0 auto; text-align:center">
					<h3> Account Recharge </h3>
					<div class="" style="min-height:10px;"></div>
					@if(session('success_msg'))
					  <div class="alert alert-success alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  {{session('success_msg')}}
					  </div>
					@endif
					@if(session('error_msg'))
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{session('error_msg')}}
						</div>
					@endif
				</div>
				<div class="box-content" style="min-height:500px;max-width:768px; margin: 0 auto; padding:50px 5px;">
					<form action="{{ route('recharge_admin_store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label"> Select Client </label>
							<div class="col-sm-9 col-lg-10 controls">
								<select class="form-control" name="user_id">
									@foreach ($clients as $client)
										<option value="{{ $client->id }}">{{ $client->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Amount </label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="number" id="amount" name="amount" placeholder="Enter Amount"  value="{{ old('amount') }}" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Recharge </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script src="{{asset('public/BackEnd')}}/js/field-validator.js"></script>
@endsection
