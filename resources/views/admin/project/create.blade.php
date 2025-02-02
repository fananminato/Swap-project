@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h4 class="box-title">Create New Project</h4>
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

			<form class="form-horizontal" method="post" action="{{ route('projects.store') }}">
				@csrf
				<div class="box-body">

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required value="{{ old('title') }}">
                        </div>
                    </div>

					<div class="form-group">
						<label for="details" class="col-sm-2 control-label">Details</label>
						<div class="col-sm-9">
							<textarea type="text" class="form-control" id="details" name="details" required>{{ old('details') }}</textarea>
							<script type="text/javascript">
								CKEDITOR.replace("details", {height:"200", width:"100%"});
							</script>
						</div>
					</div>

                    <div class="form-group">
						<label for="funding" class="col-sm-2 control-label">Funding</label>
						<div class="col-sm-6">
							<input type="number" class="form-control" id="funding" name="funding" placeholder="Funding" required value="{{ old('funding') }}">
						</div>
					</div>

                    <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-2">
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status">
								<option value="ongoing">Ongoing</option>
								<option value="completed">Completed</option>
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
