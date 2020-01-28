@extends('master')
@section('recharge', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="col-md-4 col-md-offset-4">
				<a href="#">
					<div class="tile tile-success" style="min-height: 250px;">
						<div class="img img-center">
							<i class="fa fa-briefcase"></i>
						</div>
						<p>
							<table>
								<tr>
									<th>Total Recharge </th>
									<td class="amount"> : {!! number_format($balances, 2) !!} Taka</td>
								</tr>
								<tr>
									<th>Total SMS Cost </th>
									<td class="amount"> : {!! number_format($costs, 2) !!} Taka</td>
								</tr>
								<tr>
									<th>Direct SMS Cost </th>
									<td class="amount"> : {!! number_format($direct_sms_cost, 2) !!} Taka</td>
								</tr>
								<tr>
									<th>Current Balance </th>
									<td class="amount"> : {!! number_format($current_balance, 2) !!} Taka</td>
								</tr>
							</table>
						</p>
					</div>
				</a>
			</div>
		</div>
	</div>
@endsection
@section('styles')
	<style media="all">
		th{
			padding: 5px;
			font-size: 16px;
		}
		.amount{
			font-size: 14px;
		}
	</style>
@endsection
