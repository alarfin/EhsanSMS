@extends('master')
@section('content')
	<div class="row">
		<div align="center" style="max-width:500px; min-height:600px; margin: 0 auto; padding-top:50px;">
			<div class="box box-red">
				<div class="box-title">
					<h3> Change Password</h3>
					<div class="box-tool">
						<a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
						<a data-action="close" href="#"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="box-content">
					<form action="{{ route('password_store', Auth::user()->id) }}" method="post" class="form-horizontal">
						@csrf
						<div class="form-group">
							<label class="col-sm-4 col-md-5 control-label">New password</label>
							<div class="col-sm-8 col-md-7 controls">
								<input type="password" name="password" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 col-md-5 control-label">Re-type new password</label>
							<div class="col-sm-8 col-md-7 controls">
								<input type="password" name="password_confirmation" class="form-control" />
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4 col-md-7 col-md-offset-5">
								<button type="submit" class="btn btn-primary">Update Password</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
