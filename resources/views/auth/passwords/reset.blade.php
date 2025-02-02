<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AMC Corporation ::: Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Favicon -->
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('website_assets/assets/images/favicons/favicon-32x32.png') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin_assets/admin_css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets/admin_css/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/admin_css/dist/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/admin_css/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/admin_css/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/admin_css/recustom_admin_login.css') }}">

</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <br />
        <div class="login-logo" style="background:#FFFFFF ">
            <h2 class="text-custom" style="padding-top:0px; margin-top:10px;">
                AMC Corporation :: Reset Password
            </h2>
        </div>
        <div class="login-box-body">
            @if ($errors->has('email'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('email') }}<br></strong>
            </span>
            @endif
            @if ($errors->has('password'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <form action="{{ route('password.update') }}" method="post" id="register" name="register">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" class="form-control"  placeholder="username"  name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Password" name="password_confirmation" required autocomplete="new-password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" name="login"  class="btn btn-success btn-block btn-flat">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="{{ asset('admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>

</html>
