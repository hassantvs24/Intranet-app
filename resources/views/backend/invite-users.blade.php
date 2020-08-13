@extends('layouts.app')

@section('title', 'Login')

@section('body-class', 'page page-login hide-header')

@section('content')
    <div class="login-page-wrap">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-stretch align-content-stretch">
                <div class="col-md-5 bg-dark left-col d-flex flex-wrap justify-content-center align-content-center align-items-center">
                    <h1 class="text-center text-light w-100 font-weight-bolder">{{ __('Invite Users.') }}</h1>
                    <p class="w-100 text-center text-light">{{ __('Please enter an email & group to send invitation.') }}</p>
                </div>

                <div class="col-md-7 right-col d-flex flex-wrap justify-content-center align-content-center align-items-center">
                    <div class="login-form">
                        <form method="POST" action="#">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('customer email') }}" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Group') }}</label>

                                <div class="col-md-6">
                                    <select class=" form-control @error('password') is-invalid @enderror" id="inputGroupSelect01" required>
                                        <option selected>{{ __('Choose') }}...</option>
                                        <option value="1">Group A</option>
                                        <option value="2">Group B</option>
                                        <option value="3">Group C</option>
                                        <option value="3">Group D</option>
                                    </select>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary ls-1">
                                        {{ __('Send Invite') }}
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
