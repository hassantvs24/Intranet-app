@extends('layouts.app')

@section('title', 'Login')

@section('body-class', 'page page-login hide-header')

@section('content')
    <div class="login-page-wrap">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-stretch align-content-stretch">

                <div class="col-md-5 bg-dark left-col d-flex flex-wrap justify-content-center align-content-center align-items-center">
                    {{-- animations --}}
                    <div class="animation-overlay">
                        <div class="xmark xmark-1"> <div class="h-line"></div> <div class="v-line"></div> </div>
                        <div class="xmark xmark-2"> <div class="h-line"></div> <div class="v-line"></div> </div>
                        <div class="xmark xmark-3"> <div class="h-line"></div> <div class="v-line"></div> </div>
                        <div class="xmark xmark-4"> <div class="h-line"></div> <div class="v-line"></div> </div>
                        {{-- <div class="xmark xmark-2"> <div class="h-line"></div> <div class="v-line"></div> </div> --}}
                        <div class="circle circle-1"></div>
                        <div class="circle circle-2"></div>
                        <div class="circle circle-3"></div>
                        <div class="line line-1"></div>
                    </div>
                    {{-- // animations --}}
                    <div class="content">
                        <h1 class="text-center text-light w-100 font-weight-bolder">{{ __('Login.') }}</h1>
                        <p class="w-100 text-center text-light">{{ __('Please login to view your board.') }}</p>
                    </div>
                </div>

                <div class="col-md-7 right-col d-flex flex-wrap justify-content-center align-content-center align-items-center">
                    <div class="login-form">
                        <form method="POST" action="{{ route('login',app()->getLocale()) }}">
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
                                    <button type="submit" class="btn btn-primary ls-1">
                                        {{ __('Login') }}
                                    </button>

                                    {{-- @if (Route::has('password.request')) --}}
                                        <a class="btn btn-link" href="{{ route('password.request',app()->getLocale() ) }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
