@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h4 class="box-title">Password Change</h4>
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

            <form class="form-horizontal" method="post" action="{{ route('update-password') }}" enctype="multipart/form-data">
                @csrf
                <div class="box-body">

                    <div class="form-group">
                        <label for="old_password" class="col-sm-2 control-label">Old Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="" required value="{{ old('old_password') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password" placeholder="" required value="{{ old('password') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password Confirm</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="" required value="{{ old('password_confirmation') }}">
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
