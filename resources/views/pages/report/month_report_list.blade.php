@extends('master')
@section('report', 'active')
@section('content')
	<!-- BEGIN Main Content -->
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title">
					<h3><i class="fa fa-table"></i>This month SMS History</h3>
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
									<th class="text-center">Number</th>
									<th class="text-center">Message</th>
									<th class="text-center">Time</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach ($reports as $report)
									<tr class="table-flag-blue">
										<td class="text-center">{{ $i++ }}</td>
										<td class="text-center numbers">{{ $report->phone_number }}</td>
										<td class="text-center">{{ $report->message }}</td>
										<td class="text-center">{{ $report->created_at??'' }}</td>
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
		<style media="screen">
		table{
			table-layout: fixed;
		}
		td{
		    word-wrap:break-word
				padding: 5px;
				margin: 0px;
		}
		.numbers{
				overflow: scroll;
		}
		</style>
@endsection
@section('scripts')
	<!--page specific plugin scripts-->
	<script type="text/javascript" src="{{asset('public/BackEnd')}}/assets/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="{{asset('public/BackEnd')}}/assets/data-tables/bootstrap3/dataTables.bootstrap.js"></script>
@endsection
