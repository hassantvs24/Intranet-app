@extends('layouts.app-admin')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="users-create-wrap">
        {{-- START create group --}}
        <div class="container" id="create-group-form-wrap">
            <div class="row page-header my-4 pt-4">
                <div class="col">
                    <h3 class="page-title">{{ __('Create Board') }}</h3>
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
                            <div class="form-group col-md-6 d-flex flex-wrap">
                                <label for="" class="d-block w-100">{{ __('Select a group:') }}</label>

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

                        {{-- This start and end date will change according to selected group --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="group_start_date">{{ __('Start date') }}</label>
                                <input type="date" class="form-control" id="group_start_date" name="group_start_date" value="2020-08-12" disabled>
                            </div>
                        </div>
                        {{-- This start and end date will change according to selected group --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="group_end_date">{{ __('End date') }}</label>
                                <input type="date" class="form-control" id="group_end_date" name="group_end_date" value="2020-08-27" disabled>
                            </div>
                        </div>
{{--                        <div class="form-row">--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="user_email">{{ __('User Email') }}</label>--}}
{{--                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="email@domain.com" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-row">--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="user_phone_no">{{ __('User Phone') }}</label>--}}
{{--                                <input type="tel" class="form-control" id="user_phone_no" name="user_phone_no" placeholder="+470156421" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">{{ __('Create Board') }}</button>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="alert alert-primary mt-4 font-weight-bold" role="alert">
                                    {{ __('To add information cards for the users of this group & board, please save the board first.') }}
                                    {{ __('After saving you will get the option to add or edit information cards. Thank you.') }}
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        {{-- END create group --}}
    </div>
@endsection
