@extends('layouts.app-admin')

@section('body-class', 'bg-light')

@section('admin-content')
    <div class="group-view-wrap">
        <div class="container-fluid" id="dashboard">
            <div class="row page-header my-4 pt-4">

                <div class="col-3">
                    <div class="card card--dashboard shadow-sm">
                        <h3>{{ __('Total Active Groups') }}</h3>
                        <h3 class="display-3 my-3 text-primary">4</h3>
                        <div class="card--dashboard__links">
                            <a href="{{ route('all-groups') }}" class="btn-link font-weight-light">{{ __('View All') }}</a>
                            <span class="divider px-2"></span>
                            <a href="{{ route('all-groups') }}" class="btn-link text-black-50 font-weight-light">{{ __('View Archived') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card card--dashboard shadow-sm">
                        <h3>{{ __('Total Active Users') }}</h3>
                        <h3 class="display-3 my-3">70</h3>
                        <div class="card--dashboard__links">
                            <a href="{{ route('all-groups') }}" class="btn-link font-weight-light">{{ __('View All') }}</a>
                            <span class="divider px-2"></span>
                            <a href="{{ route('all-groups') }}" class="btn-link text-black-50 font-weight-light">{{ __('View Archived') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card card--dashboard shadow-sm">
                        <h3>{{ __('Total Admins') }}</h3>
                        <h3 class="display-3 my-3">5</h3>
                        <div class="card--dashboard__links">
                            <a href="{{ route('all-groups') }}" class="btn-link font-weight-light">{{ __('View All') }}</a>
                            <span class="divider px-2"></span>
                            <a href="{{ route('all-groups') }}" class="btn-link text-black-50 font-weight-light">{{ __('View Archived') }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
