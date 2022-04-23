<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/application-default/css/custom-log-reg.css') }}">
    <title>LOGIN</title>
    <style>
        .login-page{
            width: 100%;
            height: 100vh;
            object-fit: cover;
            background-repeat: no-repeat;
        }
    </style>
  </head>
  <body class="login-page" style="background-image: url({{ asset('assets/application-default/img/admin-login-bg.jpg') }})">
    <div class="form-wrap">
        <div class="login-card">
            <div class="logo text-center">
                <img src="{{ asset('assets/application-default/img/login-logo.png') }}" alt="" class="img-fluid">
            </div>
            <div class="login-child  p-4">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <h5 class="text-center">Login</h5>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-check remember-me">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember" {{ old('remember') ? 'checked' : '' }}>
                          Remember Me
                        </label>
                    </div>
                    <div class="forgot-login">
                        <div class="forgot">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                            @endif
                        </div>
                        <div class="login">
                            <button type="submit" class="btn btn-cutom">
                                LOGIN
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
