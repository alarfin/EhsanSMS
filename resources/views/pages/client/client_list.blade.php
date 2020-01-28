@extends('master')
@section('client', 'active')
@section('content')
	<!-- BEGIN Main Content -->
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title">
					<h3><i class="fa fa-table"></i>Client List</h3>
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
									<th class="text-center">Email</th>
									<th class="text-center">Mobile Number</th>
									<th class="text-center">Status</th>
									<th class="text-center">Edit</th>
									<th class="text-center">Delete</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach ($clients as $client)
									<tr class="table-flag-blue">
										<td class="text-center">{{ $i++ }}</td>
										<td class="text-center">{{ $client->name }}</td>
										<td class="text-center">{{ $client->email }}</td>
										<td class="text-center">{{ $client->phone_number }}</td>
										<td class="text-center">
											<a href="{{$client->status==1? route('client_disable', $client->id):route('client_enable', $client->id) }}" title="Change Status"><span class="label label-{{ $client->status==1?'success':'warning' }}">{{ $client->status==1?'Enable':'Disable' }}</span></a>
										</td>
										<td class="text-center">
											<a href="{{ route('client_edit', $client->id) }}" title="Edit"><span class="label label-info">Edit</span></a>
										</td>
										<td class="text-center">
											<a href="{{ route('client_delete', $client->id) }}" onclick="return confirm('Do you want to Delete Permenantly?')" title="Delete"><span class="label label-important">Delete</span></a>
										</td>
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
