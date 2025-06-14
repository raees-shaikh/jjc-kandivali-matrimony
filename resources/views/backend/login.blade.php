<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.svg" />
    <link rel="icon" type="image/png" href="{{url('frontend/image/icons/favicon.png')}}">
    <title>Login - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="backend/css/cms.css">
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
              body {
                  font-family: 'Poppins', sans-serif;
              }
              .cubold{
                font-weight:600
              }
              body{
                overflow-x:hidden !important;
              }
    </style>
</head>

<body class="auth-page-bg">
    <div class="container px-3">
       <div class="m-0 justify-content-center px-2">
        <div class="text-center px-0 mt-5 pt-5 ">
            <img class="logo " height="50px" src="{{ url('frontend/image/logo.png') }}" alt="" width="">
        </div>
        <div class="auth-form px-2 mx-auto mx-width-550 m-0 px-0" >
            {{--<img class="d-block mx-auto w-100 mt-5" style="max-width:250px" src="images/vission-eye-logo-circle.svg"
                alt="">--}}



            <h1 class="text-center h2 mt-4 auth-text-primary cubold">Login</h1>
            <form method="POST" action="{{ route('cms.login.submit') }}">
                @csrf
                <div class="auth-form-input mt-5">
                    <img class="icon" src="backend/images/icon-user.svg" draggable="false">
                    <input class="form-control" placeholder="E-mail or Username " id="email" name="email"
                        type="email" minlength="8" maxlength="30" required>
                </div>
                @if ($errors->has('email'))
                    <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('email') }}</div>
                @endif
                <div class="auth-form-input mt-4">
                    <img class="icon eye-show-pass" src="backend/images/icon-eye.svg" draggable="false">
                    <input class="form-control password" type="password" placeholder="Password" id="password"
                        name="password" minlength="8" maxlength="16" required>
                </div>
                @if ($errors->has('password'))
                    <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('password') }}</div>
                @endif

                @if ($errors->has('credentials'))
                    <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('credentials') }}</div>
                @endif
                @if (session('status'))
                    <div class="text-success">
                        <li> {{ session('status') }} </li>
                    </div>
                @endif

                <div class="text-center my-3">

                    <a href="{{ route('cms.forgotPassword.index') }}" class="text-black text-muted text-underline">
                        <small>
                            Forgot your password?
                        </small>
                    </a>
                </div>
                <button type="submit" class="form-control btn-lg btn-primary h-auto  auth-bg-primary font-bold">
                    Login
                </button>

            </form>
            <div class="text-center text-muted mt-3">
                <small>
                    &copy;
                    {{ date('Y') }} All Rights Reserved | Powered by
                    <a href="http://acetrot.com" class="text-muted text-underline" target="_blank">
                        Acetrot.com
                    </a>
                </small>
            </div>
        </div>
       </div>
    </div>

    <script src="backend/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="backend/bootstrap/js/popper.min.js"></script>
    <script src="backend/bootstrap/js/bootstrap.min.js"></script>
    <script>
        var eyeIcon = document.querySelectorAll(".eye-show-pass");
        var passwordInput = document.querySelectorAll(".password");
        eyeIcon.forEach(icons => {
            icons.addEventListener('click', function(e) {
                passwordInput.forEach(inputs => {
                    if (inputs.type === "password") {
                        inputs.type = "tepasswordInputt";
                    } else {
                        inputs.type = "password";
                    }
                });
            })
        });
    </script>
</body>

</html>
