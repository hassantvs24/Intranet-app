@extends('layouts.app')

@section('title', 'Register')

@section('body-class', 'page page-register hide-header')

@section('content')
    <div class="register-page-wrap">
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
                        <h1 class="text-center text-light w-100 font-weight-bolder">{{ __('Register.') }}</h1>
                        <p class="w-100 text-center text-light">{{ __('Register for a new account using this form.') }}</p>
                    </div>
                </div>

                <div class="col-md-7 right-col d-flex flex-wrap justify-content-center align-content-center align-items-center">
                    <div class="register-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Levi Freeman">

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="ex: email@domain.com">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone No.') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="tel" placeholder="+472056465456">

                                    @error('phone')
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

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
