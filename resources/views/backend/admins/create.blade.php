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
                            <div class="form-group">
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
                            <div class="form-group col-md-6">
                                <label for="group_name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="admin_name" name="name" placeholder="ex: Adam Levi" required>
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
                                <input type="email" class="form-control" id="admin_email" name="email" placeholder="email@domain.com" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_phone_no">{{ __('Phone') }}</label>
                                <input type="tel" class="form-control" id="admin_phone_no" name="phone" placeholder="+470156421" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="admin_bio">{{ __('About / Bio') }}</label>
                                <textarea class="form-control" name="bio" id="admin_bio" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 d-flex flex-wrap">
                                <label for="" class="d-block w-100">{{ __('Assign a group:') }}</label>

                                @foreach($group as $row)
                                    <div class="custom-control custom-checkbox select-group-btn mr-4 my-1">
                                        <input type="checkbox" id="group_{{$row->id}}" name="group_id[]" class="custom-control-input" value="{{$row->id}}">
                                        <label class="custom-control-label" for="group_{{$row->id}}">{{$row->name}}</label>
                                    </div>
                                @endforeach

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

@section('script')
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
