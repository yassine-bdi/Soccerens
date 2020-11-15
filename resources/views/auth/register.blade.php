
@extends('auth.layout')

@section('content')
<div class="wrap-login100 bg-light  p-l-50 p-r-50 p-t-72 p-b-50">
                    <form method="POST" action="{{ route('register') }}" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Birth date') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control" name="birth" value="{{ old('birth') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button> <br> <br> <a class="btn btn-link" href="{{ route('login') }}">&larr; Back </a>
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
