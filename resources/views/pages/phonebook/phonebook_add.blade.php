@extends('master')
@section('contacts', 'active')
@section('content')
	<div class="row">
		<div class="col-md-12" style="min-height:600px;">
			<div class="box">
				<div class="box-title">
					<h3><i class="fa fa-bars"></i> Add Phonebook</h3>
					<div class="" style="min-height:10px;"></div>
					@if(session('success_msg'))
					  <div class="alert alert-success alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  {{session('success_msg')}}
					  </div>
					@endif
					@if($errors->any())
						  @foreach($errors->all() as $error)
							<div class="alert alert-warning alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								{{$error}}
							</div>
						@endforeach
					@endif
					<div class="box-tool">
						<a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
						{{-- <a data-action="close" href="#"><i class="fa fa-times"></i></a> --}}
					</div>
				</div>
				<div class=""></div>
				<div class="box-content" style="min-height:50px; padding:50px 5px;">
					<form action="{{ route('phonebook_store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Name </label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="text" id="name" name="name" placeholder="Enter name" pattern="([a-zA-Z]{3,30}\s*)+" value="{{ old('name') }}" class="form-control" />
								{{-- <span id="name_msg" class="help-inline" style="color:red"></span> --}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label">Mobile Number <span style="color:red">*</span> </label>
							<div class="col-sm-9 col-lg-10 controls">
								<input type="text" id="phone_number" name="phone_number" placeholder="Enter Phone Number" pattern="(^[01]{2}[3-9]{1}[0-9]{8})$" value="{{ old('phone_number') }}" class="form-control" />
								{{-- <span id="name_msg" class="help-inline" style="color:red"></span> --}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label"> Group </label>
							<div class="col-sm-9 col-lg-10 controls">
								<select class="form-control" name="group_id">
									@foreach ($groups as $group)
										<option value="{{ $group->id }}">{{ $group->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label"> Status </label>
							<div class="col-sm-9 col-lg-10 controls">
								<select class="form-control" name="status">
									<option value="1">Enable</option>
									<option value="0">Disable</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Add Phonebook </button>
								<button type="reset" class="btn">Cancel</button>
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
@endsection
