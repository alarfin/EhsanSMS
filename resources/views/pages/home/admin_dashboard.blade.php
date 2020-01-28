@extends('master')
@section('dashboard', 'active')
@section('content')
	<!-- BEGIN Page Title -->
	<div class="page-title">
		<div>
			<h1><i class="fa fa-file-o"></i> Dashboard</h1>
		</div>
	</div>
	<!-- END Page Title -->

	<!-- BEGIN Breadcrumb -->
	<div id="breadcrumbs">
		<ul class="breadcrumb">
			<li class="active"><i class="fa fa-home"></i> Home</li>
		</ul>
	</div>
	<!-- END Breadcrumb -->
	<!-- BEGIN Tiles -->
	<div class="row">
		<div class="col-lg-4 col-12">
			<div class="tile tile-magenta">
				<div class="img img-center">
					<i class="fa fa-users"></i>
				</div>
				<p class="title text-center">All Clients {{ $total_clients }} </p>
			</div>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('report_list') }}">
				<div class="tile tile-magenta">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Admin Send SMS {{ $total_send_sms }}</p>
				</div>
			</a>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('month_report_list') }}">
				<div class="tile tile-magenta">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Admin This Month SMS {{ $monthly_send_sms }}</p>
				</div>
			</a>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('phonebook_list') }}">
				<div class="tile tile-magenta">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Admin Contacts {{ $total_contacts }}</p>
				</div>
			</a>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('phonebook_group_list') }}">
				<div class="tile tile-magenta">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Admin Group {{ $total_group }}</p>
				</div>
			</a>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('balance') }}">
				<div class="tile tile-magenta">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Admin Balance {!! number_format($current_balance, 2) !!} Taka</p>
				</div>
			</a>
		</div>
	</div>
	<!-- END Tiles -->


@endsection
