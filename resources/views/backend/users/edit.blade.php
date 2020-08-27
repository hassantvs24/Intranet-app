@extends('layouts.app-admin')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="users-create-wrap">
        {{-- START create group --}}
        <div class="container" id="create-group-form-wrap">
            <div class="row page-header my-4 pt-4">
                <div class="col">
                    <h3 class="page-title">{{ __('Edit user') }}</h3>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="#" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="group_name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" value="{{ $user->name }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_profile_image">{{ __('Profile Image') }}</label>
                                <div class="profile-image">
                                    @if($user->avatar)
                                        <img src="{{$user->avatar}}" class="rounded" alt="Cinque Terre" height="200" width="200">
                                    @endif
                                </div>
                                <input type="file" class="form-control-file" id="user_profile_image" name="avatar">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_phone_no">{{ __('Phone') }}</label>
                                <input type="tel" class="form-control" id="user_phone_no" name="user_phone_no" value="{{ $user->phone }}" required>
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
                                    {{-- dynamic content here --}}
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- END create group --}}
    </div>
@endsection
