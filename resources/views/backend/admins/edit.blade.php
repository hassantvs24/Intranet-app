@extends('layouts.app-admin')
@section('title', 'Edit Admin')
@section('body-class', 'bg-light')

@section('admin-content')
<div class="users-create-wrap">
    {{-- START create group --}}
    <div class="container" id="create-group-form-wrap">
        <div class="row page-header my-4 pt-4">
            <div class="col">
                <h3 class="page-title">{{ __('Edit Admin') }}</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="{{ route('update-admin',[ app()->getLocale(), $admin->id ]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="group_name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="group_name" name="name" value="{{$admin->name}}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_email">{{ __('User Email') }}</label>
                            <input type="email" class="form-control" id="user_email" name="email" value="{{$admin->email}}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_phone_no">{{ __('User Phone') }}</label>
                            <input type="tel" class="form-control" id="user_phone_no" name="phone" value="{{$admin->phone}}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlTextarea1">{{ __('About / Bio') }}</label>
                            <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3">{{$admin->bio}}</textarea>
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
