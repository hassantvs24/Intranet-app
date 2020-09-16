@extends('layouts.app-admin')
@section('title', 'Welcome')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="group-view-wrap">
        <div class="container-fluid" id="dashboard">
            <div class="row page-header my-4 pt-4">

                <div class="col-3">
                    <div class="card card--dashboard shadow-sm">
                        <h3>{{ __('Total Active Groups') }}</h3>
                        <h3 class="display-3 my-3 text-primary">{{ $total_groups }}</h3>
                        <div class="card--dashboard__links">
                            <a href="{{ route('all-groups', app()->getLocale() ) }}" class="btn-link font-weight-light">{{ __('View All') }}</a>
                            <span class="divider px-2"></span>
                            <a href="{{ route('all-groups', app()->getLocale() ) }}" class="btn-link text-black-50 font-weight-light">{{ __('View Archived') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card card--dashboard shadow-sm">
                        <h3>{{ __('Total Active Users') }}</h3>
                        <h3 class="display-3 my-3">{{ $total_users }}</h3>
                        <div class="card--dashboard__links">
                            <a href="{{ route('all-users', app()->getLocale() ) }}" class="btn-link font-weight-light">{{ __('View All') }}</a>
                            <span class="divider px-2"></span>
                            <a href="{{ route('archived-users', app()->getLocale() ) }}" class="btn-link text-black-50 font-weight-light">{{ __('View Archived') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card card--dashboard shadow-sm">
                        <h3>{{ __('Total Admins') }}</h3>
                        <h3 class="display-3 my-3">{{ $total_admins }}</h3>
                        <div class="card--dashboard__links">
                            <a href="{{ route('all-admins', app()->getLocale() ) }}" class="btn-link font-weight-light">{{ __('View All') }}</a>
                            <span class="divider px-2"></span>
                            <a href="{{ route('archived-admins', app()->getLocale() ) }}" class="btn-link text-black-50 font-weight-light">{{ __('View Archived') }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
