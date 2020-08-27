@extends('layouts.app-admin')
@section('body-class', 'bg-light')

@section('admin-content')
<div class="users-create-wrap">
    {{-- START create group --}}
    <div class="container" id="create-group-form-wrap">
        <div class="row page-header my-4 pt-4">
            <div class="col">
                <h3 class="page-title">{{ __('Create & Invite user') }}</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="#" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="group_name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="group_name" name="group_name" placeholder="ex: Adam Levi" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_profile_image">{{ __('Profile Image') }}</label>
                            <input type="file" class="form-control-file" id="user_profile_image" name="avatar">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="email@domain.com" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_phone_no">{{ __('Phone') }}</label>
                            <input type="tel" class="form-control" id="user_phone_no" name="user_phone_no" placeholder="+470156421" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlTextarea1">{{ __('About / Bio') }}</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 d-flex flex-wrap">
                            <label for="" class="d-block w-100">{{ __('Assign a group:') }}</label>

                            @foreach($groups as $group)
                                <div class="custom-control custom-radio select-group-btn mr-4 my-1">
                                    <input type="radio" id="group_{{$group->id}}" name="user_group" class="custom-control-input" value="{{$group->id}}">
                                    <label class="custom-control-label" for="group_{{$group->id}}">{{$group->name}}</label>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 d-flex flex-wrap">
                            <label for="" class="d-block w-100">{{ __('Select primary contact:') }}</label>

                            <div class="form-group col-md-6" id="primary-contacts-wrap">
                                {{-- Dynamic data here - Axios get() --}}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Invite & Add New User') }}</button>
                </form>
            </div>
        </div>
    </div>
    {{-- END create group --}}
</div>
@endsection
