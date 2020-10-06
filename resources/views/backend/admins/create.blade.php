@extends('layouts.app-admin')
@section('title', 'Create New Admin')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="admins-create-wrap">
        {{-- START create group --}}
        <div class="container" id="create-group-form-wrap">
            <div class="row page-header my-4 pt-4">
                <div class="col">
                    <h3 class="page-title">{{ __('Create Admin') }}</h3>
                    <hr>
                </div>
            </div>

            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                 @endif
                <div class="col">
                    <form action="{{ route('admin.store', app()->getLocale() ) }}" method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="group_name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="group_name" name="name" placeholder="ex: Adam Levi" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_profile_image"> {{ __('Profile Image') }} </label>
                                <input type="file" class="form-control-file" id="user_profile_image" name="avatar">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="user_email" name="email" placeholder="email@domain.com" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_phone_no">{{ __('Phone') }}</label>
                                <input type="tel" class="form-control" id="user_phone_no" name="phone" placeholder="+470156421" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlTextarea1">{{ __('About / Bio') }}</label>
                                <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Add New Admin') }}</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- END create group --}}
    </div>
@endsection
