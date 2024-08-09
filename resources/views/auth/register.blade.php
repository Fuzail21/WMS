@extends('layouts.app')


@section('styles')
    <!-- Link CSS files specific to this page -->
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

<body class="body">


<div class="container">
    <div class="logo">
        <img class="" src="img/20-20-Logo-White.png" alt="20-20-Logo" width="150px">
        </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-weight:600 ; text-align:center; font-size: 120%; color:#091F62;">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createUser') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Code</label>

                            <div class="col-md-6">
                                <input id="password" type="text" name="password" class="form-control  @error('password') is-invalid @enderror">
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">{{ __('Confirm Code') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div class="text-red-500" id="errorMessage1"></div>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="designation" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Designation</label>

                            <div class="col-md-6">
                                <select id="designation" class="form-control @error('designation') is-invalid @enderror" name="designation" required>
                                    <option value="" disabled selected>Select a designation</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="department" class="col-md-4 col-form-label text-md-end" style="color:#0A1E61;">Department</label>

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department" required autocomplete="department">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="button">{{ __('Register') }}</button>
                            </div>
                        </div>

                        {{-- <div class="row mb-3" >
                            <div class="col-md-6 offset-md-4">
                                <div class="login" style="padding-top:7px ;">
                                   Already have an account?

                                   <a href="{{ route('login') }}" style="color:#0A1E61; font-weight:bold;"> Log In</a>
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


// const passwordInput = document.getElementById("password");
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


    document.getElementById('password-confirm').addEventListener('input', function() {
        var password = this.value;
        var passwordField = this;
        var errorMessageElement = document.getElementById('errorMessage1');

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



