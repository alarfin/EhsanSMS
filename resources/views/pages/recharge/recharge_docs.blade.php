@extends('master')
@section('recharge', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title text-center">
					<h3> How to recharge ?</h3>
					<div class="" style="min-height:10px;"></div>
				</div>
				<div class=""></div>
				<div class="box-content" style="min-height:50px; padding:50px 5px;">
					<h3>bKash Payment Instruction:</h3>
					<ol>
						<li>Go to bKash Menu by dialing *247#</li>
						<li>Choose ‘Payment’</li>
						<li>Enter Merchant bKash Wallet No 01819770294 .</li>
						<li>Enter the amount of your order value</li>
						<li>Enter a reference No: 1 or your nickname</li>
						<li>Enter Counter No: 1 or any number</li>
						<li>Enter your Menu PIN to confirm</li>
						<li>Done! You will receive a confirmation SMS”</li>
						<li>Collect TrxID and Put this ID into the Bkash recharge input Field and click Submit.</li>
					</ol>
					<h2 class="text-center">Payment Diagram</h2>
					<p>
						<img class="img img-responsive" src="storage/app/public/images/bKash_Payment.jpg" width="100%" alt="Bkash Payment">
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection
