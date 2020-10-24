@extends('layouts.app-admin')
@section('title', 'Admin creation')
@section('body-class', 'bg-light')

@section('admin-content')
<div class="group-create-wrap">
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col mb-4">
                @include('backend.creation.menu')
            </div>
        </div>

        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('status'))
                    <div class="alert {{session()->get('alert')}} alert-dismissible fade show" role="alert">
                        {{ session()->get('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-10">
                <div class="card">
                    <form id="form_cr" action="{{route('groups.admin.save', app()->getLocale())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-header mb-3">{{__('Add admin')}}</h5>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="group_select">{{ __('Select group') }}</label>
                                            <select id="group_select" name="group_id" class="form-control">
                                                <option value="">{{ __('Select group') }}</option>
                                                @foreach($group as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="user_select">{{ __('Select user') }} <span class="text-danger">*</span></label>
                                            <select id="user_select" name="users_id" class="form-control" required>
                                                <option value="">{{ __('Select user') }}</option>
                                                @foreach($user as $row)
                                                    <option value="{{$row->id}}"
                                                            data-email="{{$row->email}}"
                                                            data-name="{{$row->name}}"
                                                            data-phone="{{$row->phone}}"
                                                            data-bio="{{$row->bio}}"
                                                    >{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="admin_name">{{ __('Admin name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="admin_name" value="{{ old('admin_name') }}" name="admin_name" placeholder="ex: Adam Levi" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="admin_profile_image"> {{ __('Profile Image') }} </label>
                                            <input type="file" class="form-control-file" id="admin_profile_image" name="avatar">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="admin_email">{{ __('Email') }} <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="admin_email" value="{{ old('email') }}" name="email" placeholder="email@domain.com" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="admin_phone_no">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control" id="admin_phone_no" value="{{ old('phone') }}" name="phone" placeholder="+470156421" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="admin_bio">{{ __('About / Bio') }}</label>
                                            <textarea class="form-control" name="bio" id="admin_bio" rows="3">{{ old('bio') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">{{__('Store')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        var group_select = "{{session('select_group')}}";
        $(function () {
            $('#group_select').val(group_select);
        });
    </script>

    <script type="text/javascript">
        $(function () {

            $('#user_select').change(function () {
                var name = $(this).find(':selected').data('name');
                var email = $(this).find(':selected').data('email');
                var phone = $(this).find(':selected').data('phone');
                var bio = $(this).find(':selected').data('bio');

                $('#admin_name').val(name);
                $('#admin_email').val(email);
                $('#admin_phone_no').val(phone);
                $('#admin_bio').val(bio);
            });
        });
    </script>
@endsection
