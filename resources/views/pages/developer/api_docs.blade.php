@extends('master')
@section('developer', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title text-center">
					<h3> How To use API </h3>
					<div class="" style="min-height:10px;"></div>
				</div>
				<div class=""></div>
				<div class="box-content" style="min-height:50px; padding:50px 25px;">
					<h2>For Single SMS </h2>
					<h3>GET Method sample :</h3>
					http://sms.worldehsan.org/api/send_sms?api_key=xxxxxxxxxxxxxxxx&sender_id=xxxxxxxxxxx&number=8801xxxxxxxxx&message=textSMSHere
					<p>
						<h5>Note:</h5>
						<ul>
							<li>api_key = Your API Key.</li>
							<li>sender_id = Your Sender ID.</li>
							<li>Number = which number do you want to send SMS.</li>
							<li>message = Your text message.Regular text=146 character per SMS and Unicode=56 character per sms.</li>
						</ul>
					</p>
					<h2>For Multiple/Bulk SMS </h2>
					<h3>GET Method sample :</h3>
					http://sms.worldehsan.org/api/send_sms?api_key=xxxxxxxxxxxxxxxx&sender_id=xxxxxxxxxxx&number=8801xxxxxxxxx,8801xxxxxxxxx,8801xxxxxxxxx&message=textSMSHere
					<p>
						<h5>Note:</h5>
						<ul>
							<li>api_key = Your API Key.</li>
							<li>sender_id = Your Sender ID.</li>
							<li>Number = All numbers where do you want to send SMS.</li>
							<li>message = Your text message.Regular text=146 character per SMS and Unicode=56 character per sms.</li>
						</ul>
					</p>
					<p>
						<h4>Return Value :</h4>
						Return value as JSON Format like
						<ul>
							<li>{"status":"Message Sent Successfully. This message cost is 0.60 Taka"}</li>
							<li>{"status":"Parameter Missing"}</li>
							<li>{"status":"API Key or Sender ID not Found"}</li>
							<li>{"status":"Number or message must not empty"}</li>
							<li>{"status":"You can send 465 character message at a time in Regular Text."}</li>
							<li>{"status":"You can send 195 character message at a time in Unicode."}</li>
						</ul>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection
