@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h4 class="box-title">Edit User</h4>
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

			<form class="form-horizontal" method="post" action="{{ route('users.update', $result->id) }}">
				@csrf
				<div class="box-body">

                    <div class="form-group">
						<label for="role" class="col-sm-2 control-label">Role</label>
						<div class="col-sm-2">
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="role" required>
								<option value="admin" @if(in_array('admin', $roles)) selected @endif>Admin</option>
								<option value="researcher" @if(in_array('researcher', $roles)) selected @endif>Researcher</option>
								<option value="assistant" @if(in_array('assistant', $roles)) selected @endif>Researcher Assistant</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="{{ $result->name }}">
						</div>
					</div>

                    <div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="{{ $result->email }}">
						</div>
					</div>

                    <div class="form-group">
						<label for="password" class="col-sm-2 control-label">
                            Password (Leave blank if you don't want to change)
                        </label>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
						</div>
					</div>

                    <div class="form-group">
						<label for="contact_information" class="col-sm-2 control-label">Contact Information</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="contact_information" name="contact_information" placeholder="Contact Information" required value="{{ $result->contact_information }}">
						</div>
					</div>

                    <div class="form-group">
						<label for="area_of_expertise" class="col-sm-2 control-label">Area of Expertise</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="area_of_expertise" name="area_of_expertise" placeholder="Area of Expertise" required value="{{ $result->area_of_expertise }}">
						</div>
					</div>

				</div>

				<div class="box-footer">
					<div class="col-sm-12">
						<div class="col-sm-4 col-md-offset-2">
							<button type="submit" class="btn btn-info"> Update </button>
						</div>
					</div>
				</div>
				<br>
			</form>
		</div>
	</div>
</div>
@endsection
