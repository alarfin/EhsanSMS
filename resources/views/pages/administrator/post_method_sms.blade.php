@extends('master')
@section('administrator', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title" style="max-width:768px; margin: 0 auto; text-align:center">
					<h3> Unlimited SMS Send </h3>
					<div class="" style="min-height:10px;"></div>
					@if($errors->any())
						  @foreach($errors->all() as $error)
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								{{$error}}
							</div>
						@endforeach
					@endif
					<div class="box-tool">
						<a data-action="collapse" href="#"></a>
						{{-- <a data-action="close" href="#"><i class="fa fa-times"></i></a> --}}
					</div>
				</div>
				<div class="box-content" style="min-height:500px;max-width:768px; margin: 0 auto; padding:50px 5px;">
					<form action="https://api.mobireach.com.bd/ApacheGearWS/SendTextMultiMessage" method="post" class="form-horizontal" target="_blank" enctype="multipart/form-data">
						@csrf
						<div class="">
							<input hidden type="text" name="Username" value="esoftware">
							<input hidden type="text" name="Password" value="Abcd@4321">
							<input hidden type="text" name="From" value="8801847121242">
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="To">Reciever Number</label>
							<div class="col-sm-9 col-lg-10 controls">
								<textarea id="To" name="To" rows="5" class="form-control" pattern="(^[8801]{4}[3-9]{1}[0-9]{8}|,)$" placeholder="Enter numbers as 01*********, 01*********"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="Message">Message</label>
							<div class="col-sm-9 col-lg-10 controls">
								<textarea id="sms" name="Message" rows="8" class="form-control" placeholder="Message Message"></textarea>
								<div id="msg" style="color:green;">
								   Characters: <span id="Message_chars">0</span>
							   </div>
								<div id="msg" style="color:red;">
 								   Unicode: 1 sms = 70 characters | Regualr: 1 sms = 160 characters<br>
							   </div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Send SMS </button>
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
	<script type="text/javascript">
	counter = function() {
		var message = $('#sms').val();
		if (message.length == 0) {
			$('#message').html(0);
			return;
		}
		var message_chars = message.length;
		$('#Message_chars').html(message_chars);
};

$(document).ready(function() {
	$('#sms').click(counter);
	$('#sms').change(counter);
	$('#sms').keydown(counter);
	$('#sms').keypress(counter);
	$('#sms').keyup(counter);
	$('#sms').blur(counter);
	$('#sms').focus(counter);
});
</script>
@endsection
