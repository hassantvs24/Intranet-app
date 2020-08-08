@extends('layouts.app')

@section('title', 'Reset Password')

@section('body-class', 'hide-header')

@section('content')
    <div class="login-page-wrap">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-stretch align-content-stretch">
                <div class="col-md-5 bg-dark left-col d-flex flex-wrap justify-content-center align-content-center align-items-center">
                    <h1 class="text-center text-light w-100 font-weight-bolder">{{ __('Reset Password.') }}</h1>
                    <p class="w-100 text-center text-light">{{ __('We will send the link to you registered email.') }}</p>
                </div>

                <div class="col-md-7 right-col d-flex flex-wrap justify-content-center align-content-center align-items-center">
                    <div class="login-form">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
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

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
