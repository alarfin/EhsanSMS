@extends('master')
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
	@if (Auth::user()->expiry_date < date('Y-m-d'))
		<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  Your SMS Validity Expired !!!
		</div>
	@endif
	<!-- BEGIN Tiles -->
	<div class="row">
		<div class="col-lg-4 col-12">
			<a href="{{ route('report_list') }}">
				<div class="tile tile-aque">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Total Send SMS {{ $total_send_sms }}</p>
				</div>
			</a>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('report_list') }}">
				<div class="tile tile-green">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Direct SMS Cost {{ $direct_sms_cost }}</p>
				</div>
			</a>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('month_report_list') }}">
				<div class="tile tile-yellow">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">This Month SMS {{ $monthly_send_sms }}</p>
				</div>
			</a>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('phonebook_list') }}">
				<div class="tile tile-blue">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Total Contacts {{ $total_contacts }}</p>
				</div>
			</a>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('phonebook_group_list') }}">
				<div class="tile tile-aque">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Total Group {{ $total_group }}</p>
				</div>
			</a>
		</div>
		<div class="col-lg-4 col-12">
			<a href="{{ route('balance') }}">
				<div class="tile tile-magenta">
					<div class="img img-center">
						<i class="fa fa-users"></i>
					</div>
					<p class="title text-center">Current Balance {{ $current_balance }}</p>
				</div>
			</a>
		</div>
	</div>
	<!-- END Tiles -->


@endsection
