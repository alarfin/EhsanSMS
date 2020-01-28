@extends('master')
@section('sms_send', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title" style="max-width:768px; margin: 0 auto; text-align:center">
					<h3> Multi/Bulk SMS Send </h3>
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
					<form action="{{ route('send_sms') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="phone_number">Reciever Number</label>
							<div class="col-sm-9 col-lg-10 controls">
								<textarea id="phone_number" name="phone_number" rows="8" class="form-control" pattern="(^[8801]{4}[3-9]{1}[0-9]{8})$|," placeholder="Enter numbers as 01*********, 01*********"></textarea>
								{{-- <input type="text" id="phone_number" name="phone_number" placeholder="Enter number as 8801xxxxxxxxx" pattern="(^[8801]{4}[3-9]{1}[0-9]{8})$" class="form-control" /> --}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label"> Message Type </label>
							<div class="col-sm-9 col-lg-10 controls">
								<select class="form-control" name="type" id="type">
									<option value="regular">Regular</option>
									<option value="unicode">Unicode</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="regular">
							<label class="col-sm-3 col-lg-2 control-label" for="regular_message">Message</label>
							<div class="col-sm-9 col-lg-10 controls">
								<textarea id="regular_message" name="regular_message" rows="8" class="form-control" placeholder="Regular Message"></textarea>
								<div id="msg" style="color:green;">
								   Characters: <span id="regular_chars">0</span> |
								   Message: <span id="regular_message_count">0</span><br>
							   </div>
							</div>
						</div>
						<div class="form-group" id="unicode">
							<label class="col-sm-3 col-lg-2 control-label" for="trx_id">Message</label>
							<div class="col-sm-9 col-lg-10 controls">
								<textarea id="message" name="unicode_message" rows="8" class="form-control" placeholder="Unicode Message"></textarea>
								<div id="msg" style="color:green;">
								   Characters: <span id="uni_chars">0</span> |
								   Message: <span id="uni_message_count">0</span><br>
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
	var unicode = $('#message').val();
	if (unicode.length == 0) {
		$('#uni_chars').html(0);
		$('#uni_message_count').html(0);
		return;
	}
	var uni_chars = unicode.length;
	if (uni_chars > 0) {
		var uni_message_count = '1';
	}
	if (uni_chars > 55) {
		var uni_message_count = '2';
	}
	if (uni_chars > 125) {
		var uni_message_count = '3';
	}
	if (uni_chars > 195) {
		var uni_message_count = "<span style='color:red'>Please don't Send Message more than 3 at a time.</span>";
	}

	$('#uni_chars').html(uni_chars);
	$('#uni_message_count').html(uni_message_count);
};
	counter2 = function() {
		var regular = $('#regular_message').val();
		if (regular.length == 0) {
			$('#regular_chars').html(0);
			$('#regular_message_count').html(0);
			return;
		}
		var regular_chars = regular.length;
		if (regular_chars > 0) {
			var regular_message_count = '1';
		}
		if (regular_chars > 145) {
			var regular_message_count = '2';
		}
		if (regular_chars > 305) {
			var regular_message_count = '3';
		}
		if (regular_chars > 465) {
			var regular_message_count = "<span style='color:red'>Please don't Send more than 3 Message at a time.</span>";
		}

		$('#regular_chars').html(regular_chars);
		$('#regular_message_count').html(regular_message_count);
};

$(document).ready(function() {
	$('#count').click(counter);
	$('#message').change(counter);
	$('#message').keydown(counter);
	$('#message').keypress(counter);
	$('#message').keyup(counter);
	$('#message').blur(counter);
	$('#message').focus(counter);
});
$(document).ready(function() {
	$('#count2').click(counter2);
	$('#regular_message').change(counter2);
	$('#regular_message').keydown(counter2);
	$('#regular_message').keypress(counter2);
	$('#regular_message').keyup(counter2);
	$('#regular_message').blur(counter2);
	$('#regular_message').focus(counter2);
});
</script>
<script>
	$(document).ready(function(){
	$("#unicode").hide();
	$('#type').on('change', function() {
		  if ( this.value == 'regular')
		  {
			  $("#unicode").hide();
			  $("#regular").show();
		  }
		  if ( this.value == 'unicode')
		  {
			  $("#regular").hide();
			  $("#unicode").show();
		  }
	});
});
</script>
@endsection
