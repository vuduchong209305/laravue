<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="{{ asset('') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="public/admin/img/avatar.png">
    <title>Admin | Login</title>

    <link rel="stylesheet" href="public/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/admin/css/ionicons.min.css">
    <link rel="stylesheet" href="public/admin/css/AdminLTE.min.css">
    <link rel="stylesheet" href="public/admin/css/blue.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Đăng nhập</b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">@include('admin.error')</p>

            <form action="{{ route('postLogin') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember</a>
                            </label>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>

                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{ url('auth/facebook') }}"" class="btn btn-block btn-social btn-facebook btn-flat">
                    <i class="fa fa-facebook"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                    <i class="fa fa-google-plus"></i> Sign in using Google+
                </a>
            </div>

            <a href="#">I forgot my password</a>
            
        </div>

    </div>

    <script src="public/admin/js/jquery.min.js"></script>
    <script src="public/admin/js/bootstrap.min.js"></script>
</body>

</html>