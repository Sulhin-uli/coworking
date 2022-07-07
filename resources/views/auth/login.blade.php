{{-- Default Login  --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }} tes</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


{{-- Login Custom --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Simple login form with social login buttons using HTML and CSS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('css')}}/login.css">
    </head>
    <body>
        <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h1>Login</h1>

                <div class="form-group">
                    {{-- <input type="email" name="email" placeholder="E-mail Address"> --}}
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="input-icon"><i class="fa fa-envelope"></i></span>
                    @error('email')
                    {{-- <span class="input-icon" role="alert"> --}}
                        <strong>{{ $message }}</strong>
                    {{-- </span> --}}
                     @enderror
                </div>

                <div class="form-group">
                    {{-- <input type="password" name="psw" placeholder="Password"> --}}
                    {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="psw" required autocomplete="current-password"> --}}
                    {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                    @error('password')
                    {{-- <span class="input-icon" role="alert"> --}}
                        <strong>{{ $message }}</strong>
                    {{-- </span> --}}
                     @enderror
                </div>      

                <button type="submit" class="mb-2 login-btn">Login</button>     
                {{-- <a class="btn btn-primary">Home</a>      --}}
                
                
                <a class="reset-psw" href="/">Ke Home</a>


                {{-- <div class="seperator">
                    <b>or</b>
                </div> --}}


                    {{-- <p>Sign in with your social media account</p> --}}
                <!-- Social login buttons -->


                {{-- <div class="social-icon">
                    <button type="button"><i class="fa fa-twitter"></i></button>
                    <button type="button"><i class="fa fa-facebook"></i></button>
                </div> --}}
            </form>
        </div>
    </body>
</html>


