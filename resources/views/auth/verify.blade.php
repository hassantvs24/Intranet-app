@extends('layouts.app')

@section('content')
    <div class="login-page-wrap">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-stretch align-content-stretch">
                <div class="col-md-5 bg-dark left-col d-flex flex-wrap justify-content-center align-content-center align-items-center">
                    <h1 class="text-center text-light w-100 font-weight-bolder">{{ __('Verify Account.') }}</h1>
{{--                    <p class="w-100 text-center text-light">{{ __('Please login to view your board.') }}</p>--}}
                </div>

                <div class="col-md-7 right-col d-flex flex-wrap justify-content-center align-content-center align-items-center">
                    <div class="login-form">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend', app()->getLocale()) }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
