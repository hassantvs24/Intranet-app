@extends('layouts.app')
@section('body-class', 'user-dashboard bg-light body-teal')

@section('content')
    <div class="users-create-wrap">
        {{-- START create group --}}
        <div class="container" id="create-group-form-wrap">
            <div class="row page-header my-4 pt-4">
                <div class="col">
                    <h3 class="page-title">{{ __('Account Settings') }}</h3>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="#" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="group_name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="ex: Adam Levi" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="user_profile_image">Profile Image</label>
                                <input type="file" class="form-control-file" id="user_profile_image" name="user_profile_image">
                            </div>
                        </div>

                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="user_email">{{ __('User Email') }}</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="email@domain.com" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="user_phone_no">{{ __('User Phone') }}</label>
                                <input type="tel" class="form-control" id="user_phone_no" name="user_phone_no" placeholder="+470156421" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">{{ __('About / Bio') }}</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                    </form>
                </div>

                <div class="col">
                    <h4 class="mb-4">Group Info</h4>
                    <div>
                        <span class="font-weight-bold">{{ __('Primary contact') }}</span> :
                        <span>Group admin</span>
                    </div>
                    <div>
                        <span class="font-weight-bold">{{ __('Group Color') }}</span> :
                        <span>Red</span>
                    </div>
                    <div>
                        <span class="font-weight-bold">{{ __('Start date') }}</span> :
                        <span>10/08/2020</span>
                    </div>
                    <div>
                        <span class="font-weight-bold">{{ __('End date') }}</span> :
                        <span>25/08/2020</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- END create group --}}
    </div>
@endsection
