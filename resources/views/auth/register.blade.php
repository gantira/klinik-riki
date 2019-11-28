
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
                <div class="auth-box register">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="{{ asset('img/logo.png') }}" width="200px" alt="DiffDash"></div>
                            <p class="lead">Create an account</p>
                        </div>
                        {!! Form::open(['route'=>'register', 'method'=>'post', 'class'=>'form-auth-small']) !!}
                            <div class="form-group">
                                <label for="signup-email" class="control-label sr-only">Name</label>
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                                @if ($errors->has('name'))
                                    <small>{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signup-email" class="control-label sr-only">Email</label>
                                {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                                @if ($errors->has('email'))
                                    <small>{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signup-password" class="control-label sr-only">Password</label>
                                {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
                                @if ($errors->has('password'))
                                    <small>{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signup-password" class="control-label sr-only">Confirm Password</label>
                                {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm Password']) !!}
                                @if ($errors->has('password_confirmation'))
                                    <small>{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                            <div class="bottom">
                                <span class="helper-text">Already have an account? <a href="{{ route('login') }}">Login</a></span>
                            </div>
                        {!! Form::close() !!}
                        <div class="separator-linethrough"><span>OR</span></div>
                        <button class="btn btn-signin-social"><i class="fa fa-facebook-official facebook-color"></i> Sign in with Facebook</button>
                        <button class="btn btn-signin-social"><i class="fa fa-twitter twitter-color"></i> Sign in with Twitter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>
