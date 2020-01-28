@extends('master')
@section('administrator', 'active')
@section('content')
	<!-- BEGIN Main Content -->
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title text-center">
					<h3>Recharge History</h3>
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
				<div class="box-content">
					<div class="clearfix"></div>
					<div class="table-responsive" style="border:0">
						<table class="table table-advance" id="table1">
							<thead>
								<tr>
									<th class="text-center">Serial</th>
									<th class="text-center">Name</th>
									<th class="text-center">Amount</th>
									<th class="text-center">Transaction ID</th>
									<th class="text-center">Date</th>
									@if (Auth::user()->role=="root")
										<th class="text-center">Edit</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach ($recharge_histories as $recharge_history)
									<tr class="table-flag-blue">
										<td class="text-center">{{ $i++ }}</td>
										<td class="text-center">{{ $recharge_history->user->name }}</td>
										<td class="text-center">{{ $recharge_history->amount }}</td>
										<td class="text-center">{{ $recharge_history->trx_id }}</td>
										<td class="text-center">{{ $recharge_history->created_at }}</td>
										@if (Auth::user()->role=="root")
											<td class="text-center">
												<a href="{{ route('recharge_edit', $recharge_history->id) }}" title="Edit"><span class="label label-info">Edit</span></a>
											</td>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END Main Content -->
@endsection
@section('styles')
	<!--page specific css styles-->
    <link rel="stylesheet" href="{{asset('public/BackEnd')}}/assets/data-tables/bootstrap3/dataTables.bootstrap.css" />
@endsection
@section('scripts')
	<!--page specific plugin scripts-->
	<script type="text/javascript" src="{{asset('public/BackEnd')}}/assets/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="{{asset('public/BackEnd')}}/assets/data-tables/bootstrap3/dataTables.bootstrap.js"></script>
@endsection
