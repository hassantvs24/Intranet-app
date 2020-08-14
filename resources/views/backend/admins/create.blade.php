@extends('layouts.app-admin')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="users-create-wrap">
        {{-- START create group --}}
        <div class="container" id="create-group-form-wrap">
            <div class="row page-header my-4 pt-4">
                <div class="col">
                    <h3 class="page-title">{{ __('Create user') }}</h3>
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
                                <label for="user_profile_image">Profile Image</label>
                                <input type="file" class="form-control-file" id="user_profile_image" name="user_profile_image">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 d-flex flex-wrap">
                                <label for="" class="d-block w-100">{{ __('Assign a group:') }}</label>

                                <div class="custom-control custom-radio mr-4 my-1">
                                    <input type="radio" id="group_a" name="user_group" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="group_a">Group A</label>
                                </div>
                                <div class="custom-control custom-radio mr-4 my-1">
                                    <input type="radio" id="group_b" name="user_group" class="custom-control-input">
                                    <label class="custom-control-label" for="group_b">Group B</label>
                                </div>
                                <div class="custom-control custom-radio mr-4 my-1">
                                    <input type="radio" id="group_c" name="user_group" class="custom-control-input">
                                    <label class="custom-control-label" for="group_c">Group C</label>
                                </div>
                                <div class="custom-control custom-radio mr-4 my-1">
                                    <input type="radio" id="group_d" name="user_group" class="custom-control-input">
                                    <label class="custom-control-label" for="group_d">Group D</label>
                                </div>
                                <div class="custom-control custom-radio mr-4 my-1">
                                    <input type="radio" id="group_e" name="user_group" class="custom-control-input">
                                    <label class="custom-control-label" for="group_e">Group E</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_email">{{ __('User Email') }}</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="email@domain.com" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_phone_no">{{ __('User Phone') }}</label>
                                <input type="tel" class="form-control" id="user_phone_no" name="user_phone_no" placeholder="+470156421" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="" class="d-block w-100">{{ __('Select primary contact:') }}</label>

                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="group_admins" id="group_admin_1" checked>
                                    <label class="custom-control-label" for="group_admin_1">Adam Rusega</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="group_admins" id="group_admin_2">
                                    <label class="custom-control-label" for="group_admin_2">Levi Archman</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="group_admins" id="group_admin_3">
                                    <label class="custom-control-label" for="group_admin_3">Jhonny Ive</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="group_admins" id="group_admin_4">
                                    <label class="custom-control-label" for="group_admin_4">Douglas Costa</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="group_admins" id="group_admin_4">
                                    <label class="custom-control-label" for="group_admin_4">Eren Yeager</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="group_admins" id="group_admin_4">
                                    <label class="custom-control-label" for="group_admin_4">Bone ALi Mia</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="group_admins" id="group_admin_4">
                                    <label class="custom-control-label" for="group_admin_4">Alan Walker</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Add New User') }}</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- END create group --}}
    </div>
@endsection
