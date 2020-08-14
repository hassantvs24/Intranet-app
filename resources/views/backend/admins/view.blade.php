@extends('layouts.app-admin')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="users-view-wrap">
        <div class="container" id="create-group-form-wrap">
            <div class="row page-header my-4 pt-4">
                <div class="col">
                    <h3 class="page-title">{{ __('user name') }}</h3>
                    <div class="group-info mt-3">
                        <div class="info-line-item">
                            <span class="font-weight-bold">{{ __('Email: ') }}</span>
                            <span>email@domain.com</span>
                        </div>
                        <div class="info-line-item my-2">
                            <span class="font-weight-bold">{{ __('Phone: ') }}</span>
                            <span>+47016454</span>
                        </div>
                        <div class="info-line-item">
                            <span class="font-weight-bold text-primary">{{ __('Group: ') }}</span>
                            <span>Group A</span>
                        </div>
                    </div>
                </div>

                <div class="col text-right"></div>
            </div>

            <div class="row">
                <div class="col">
                    <a href="{{ route('edit-user') }}" type="submit" class="btn btn-primary">
                        {{ __('Edit User') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
