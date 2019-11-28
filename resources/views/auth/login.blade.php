
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login | DiffDash - Free Admin Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('diffdash/assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('diffdash/assets/css/demo.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('diffdash/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('diffdash/assets/img/favicon.png') }}">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="{{ asset('img/logo.png') }}" width="200px" alt="DiffDash"></div>
                            <p class="lead">Login to your account</p>
                        </div>
                        {!! Form::open(['route'=>'login', 'method'=>'post', 'class'=>'form-auth-small']) !!}
                            <div class="form-group">
                                <label for="email" class="control-label sr-only">Email</label>
                                {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password', 'required']) !!}
                            </div>
                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input type="checkbox">
                                    <span>Remember me</span>
                                </label>
                                <span class="helper-text element-right">Don't have an account? <a href="{{ route('register') }}">Register</a></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            <div class="bottom">
                                <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>
