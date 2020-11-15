@extends('auth.layout')




@section('content')

<div class="wrap-login100 bg-light  p-l-50 p-r-50 p-t-72 p-b-50">
  

    
    <form method="POST" action="{{ route('login') }}" class="form-signin">
        @csrf

        <div class="form-label-group row">
            <label for="email" class="col-md-4 form-label text-md-center">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <br>
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
                <button type="submit" class="btn btn-success">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    <br>   <br> <br> not registred ? don't wait  <a class="btn btn-success" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div>
        </div>
    </form>
          
                



</div> 
<style>
.wrap-login100 {
    width: 520px;
    min-height: 100vh;
    background: #fff;
    border-radius: 2px;
    position:relative;
    justify-content: space-between; 
    font-family: 'Poppins';
}
.p-r-50 {
    padding-right: 50px;
}
.p-l-50 {
    padding-left: 50px;
}
.p-b-50 {
    padding-bottom: 50px;
}
.p-t-72 {
    padding-top: 72px;
}
* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
*, ::after, ::before {
    box-sizing: inherit;
}
body, html {
    font-family: 'Poppins' , sans-serif;
}
body {
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
} 
form {
    justify-content: space-between; 
}

</style>
@endsection
