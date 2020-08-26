@extends('layouts.app-admin')
@section('body-class', 'bg-light')

@section('admin-content')
<div class="users-view-wrap">
    <div class="container" id="create-group-form-wrap">
        <div class="row page-header my-4 pt-4">
            <div class="col">
                <h3 class="page-title">{{ $admin->name }}</h3>
                <img src="{{$admin->avatar}}" class="rounded" alt="Cinque Terre" height="200" width="200">
                <div class="group-info mt-3">
                    <div class="info-line-item">
                        <span class="font-weight-bold">{{ __('Email: ') }}</span>
                        <span>{{$admin->email}}</span>
                    </div>
                    <div class="info-line-item my-2">
                        <span class="font-weight-bold">{{ __('Phone: ') }}</span>
                        <span>{{$admin->phone}}</span>
                    </div>
                </div>
            </div>

            <div class="col text-right"></div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('edit-admin',$admin->id) }}" class="btn btn-primary">
                    {{ __('Edit User') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection