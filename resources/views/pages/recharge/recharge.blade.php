@extends('master')
@section('recharge', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="" style="font-size:18px;padding:15px;">
				<p class="text-center">For recharging balance please bKash desired BDT amount into our bKash merchant number 01819770294 from any personal bKash number and collect transaction number and use at following form. Carefully add "Zero(0)" and "O" of transaction Id.</p>
				<p class="text-center">For any kind of info please Contact 01819770294. Or visit <a href="{{route('recharge_docs')}}"> How to bKash ?</a> page.</p>
			</div>
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
					<div class="box-tool">
						<a data-action="collapse" href="#"></a>
						{{-- <a data-action="close" href="#"><i class="fa fa-times"></i></a> --}}
					</div>
				</div>
				<div class="box-content" style="min-height:500px;max-width:768px; margin: 0 auto; padding:50px 5px;">
					<form action="{{ route('balance_store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="trx_id">Trnsaction ID </label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="text" id="trx_id" name="trx_id" placeholder="Enter ID" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit </button>
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
