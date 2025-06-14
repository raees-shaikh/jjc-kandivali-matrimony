<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="backend/assets/img/favicon.svg" />
    <title>Reset Password - Vission EMR</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="backend/css/cms.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .cubold {
            font-weight: 600
        }
    </style>
</head>

<body class="auth-page-bg">
    <div class="container">

        <div class="auth-form px-2 mx-auto" style="max-width:550px">
            <a href="{{ route('cms.login') }}">
                <img class="d-block mx-auto mt-5" style="max-width:275px" src="backend/images/logo.png" alt="">
            </a>
            <h1 class="text-center h2 mt-5 auth-text-primary cubold">Reset Password</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input class="form-control" type="text" name="token" value="{{ $request->route('token') }}"
                    required hidden>
                <div class="auth-form-input mt-5">
                    <img class="icon" src="backend/images/icon-user.svg" draggable="false">
                    <input class="form-control" placeholder="E-mail or Username " id="email" name="email"
                        type="email" minlength="8" maxlength="30" value="{{ request('email') }}" readonly required>
                </div>
                @if ($errors->has('email'))
                    <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                @endif
                <div class="auth-form-input mt-4">
                    <img class="icon eye-show-pass" src="backend/images/icon-eye.svg" draggable="false">
                    <input class="form-control password" type="password" placeholder="Password" id="password"
                        name="password" minlength="8" maxlength="16" required>
                </div>
                <div class="auth-form-input mt-4">
                    <img class="icon eye-show-pass" src="backend/images/icon-eye.svg" draggable="false">
                    <input class="form-control password" type="password" placeholder="Password" id="password2"
                        name="password_confirmation" minlength="8" maxlength="16" required>
                </div>
                @if ($errors->has('password'))
                    <div class="text-danger" role="alert">{{ $errors->first('password') }}</div>
                @endif

                <button type="submit" class="form-control btn-lg btn-primary h-auto mt-3 auth-bg-primary font-bold">
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
