@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h4 class="box-title">Create New Equipment</h4>
			</div>

			@if ($errors->any())
                <div class="col-sm-12 text-center">
                    <br>
                    @foreach ($errors->all() as $error)
                        <div style="color: red;">{{ $error }}</div>
                    @endforeach
                    <br>
                </div>
			@endif

			<form class="form-horizontal" method="post" action="{{ route('equipments.store') }}">
				@csrf
				<div class="box-body">

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="{{ old('name') }}">
                        </div>
                    </div>



                    <div class="form-group">
						<label for="usage_status" class="col-sm-2 control-label">Usage Status</label>
						<div class="col-sm-2">
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="usage_status">
								<option value="available">Available</option>
								<option value="in-use">In-use</option>
								<option value="under-maintenance">Under-maintenance</option>
							</select>
						</div>
					</div>

                    <div class="form-group">
						<label for="status" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-2">
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status">
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
							</select>
						</div>
					</div>

				</div>

				<div class="box-footer">
					<div class="col-sm-12">
						<div class="col-sm-4 col-md-offset-2">
							<button type="submit" class="btn btn-info"> Save </button>
						</div>
					</div>
				</div>
				<br>
			</form>
		</div>
	</div>
</div>
@endsection
