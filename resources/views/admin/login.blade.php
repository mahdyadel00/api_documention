<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Ejarly Admin Panel</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="{{ asset('admin_files/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin_files/fonts/material-design-icons/material-icon.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap -->
    <link href="{{ asset('admin_files/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('admin_files/assets/css/pages/extra_pages.css') }}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('admin_files/assets/img/favicon.ico') }}" />
    <style>
        .invalid-feedback{
            color:red;
        }
    </style>
</head>
<body>
<div class="form-title">
    <h1>Ejarly</h1>
</div>
<!-- Login Form-->
<div class="login-form text-center">
    <div style="display: none" class="toggle"><i class="fa fa-user-plus"></i>
    </div>
    <div class="form formLogin">
        <h2>Login to your account</h2>
        @if($errors->first())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('admin.login.action') }}" method="post">
            @csrf
            <input type="email" name="email" required class="{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-Mail" />
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                            <strong style="font-size: 11px;">{{ $errors->first('email') }}</strong>
                        </span>
            @endif
            <input type="password" name="password" required class="{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" />
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
            @endif
            <div class="remember text-left">
                <div class="checkbox checkbox-primary">
                    <input id="checkbox2" type="checkbox" name="remember" checked>
                    <label for="checkbox2">
                        Remember me
                    </label>
                </div>
            </div>
            <button type="submit">Login</button>
            <!-- <div class="forgetPassword"><a href="javascript:void(0)">Forgot your password?</a>
            </div> -->
        </form>
    </div>
    <div class="form formRegister">
        <h2>Create an account</h2>
        <form>
            <input type="text" placeholder="Username" />
            <input type="password" placeholder="Password" />
            <input type="email" placeholder="Email Address" />
            <input type="text" placeholder="Full Name" />
            <input type="tel" placeholder="Phone Number" />
            <button>Register</button>
        </form>
    </div>
    <div class="form formReset">
        <h2>Reset your password?</h2>
        <form>
            <input type="email" placeholder="Email Address" />
            <button>Send Verification Email</button>
        </form>
    </div>
</div>
<!-- start js include path -->
<script src="{{ asset('admin_files/assets/plugins/jquery/jquery.min.js') }}" ></script>
<script src="{{ asset('admin_files/assets/js/pages/extra_pages/pages.js') }}" ></script>
<!-- end js include path -->
</body>
</html>
