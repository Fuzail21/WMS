@extends('layouts.app')

{{-- @section('content') --}}


@section('styles')
    <!-- Link CSS files specific to this page -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

<body class="body">

<div class="container">
    <div class="logo">
    <img class="" src="img/20-20-Logo-White.png" alt="20-20-Logo" width="150px">
    </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color: #091F62;">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('loginRegister') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="color:#091F62;">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="color:#091F62;">Code</label>

                            <div class="col-md-6">
                                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    {{-- <span>
                                    <img id="password-toggle" src="img/eye.svg" alt="password">
                                    </span> --}}
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="text-red-500" id="errorMessage"></div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="button">{{ __('Login') }}</button>
{{--
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#091F62; font-weight:bold;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="signup" style="padding-top:7px ;">
                                   Don't have an account?

                                   <a href="{{ route('register') }}" style="color:#091F62; font-weight:bold;">Sign Up</a>
                                </div>
                            </div>
                        </div> --}}

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
//     const passwordInput = document.getElementById("password");
// const passwordToggle = document.getElementById("password-toggle");

// passwordToggle.addEventListener("click", function () {
//   if (passwordInput.type === "password") {
//     passwordInput.type = "text";
//     passwordToggle.textContent = "visibility_off";
//   } else {
//     passwordInput.type = "password";
//     passwordToggle.textContent = "visibility";
//   }
// });




document.getElementById('password').addEventListener('input', function() {
        var password = this.value;
        var passwordField = this;
        var errorMessageElement = document.getElementById('errorMessage');

        if (password.length > 6) {
            passwordField.classList.add('border-red-500');
            errorMessageElement.textContent = "Only 6 digit allowed.";
        } else {
            passwordField.classList.remove('border-red-500');
            errorMessageElement.textContent = "";
        }
    });

</script>
</body>
{{-- @endsection --}}
