@extends('master')
@section('administrator', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title" style="max-width:768px; margin: 0 auto; text-align:center">
					<h3> SMS Sender</h3>
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
					<form action="@if ($sms_sender) {{ route('sms_sender_update', $sms_sender->id) }} @else {{ route('sms_sender_store') }} @endif" method="post" class="form-horizontal" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">SMS Sender </label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="text" id="sender" name="sender" placeholder="Enter SMS Sender"  value="{{ $sms_sender->sender??'' }}" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @if ($sms_sender) Update @else Save @endif  </button>
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
