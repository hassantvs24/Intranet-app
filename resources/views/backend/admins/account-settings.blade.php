@extends('layouts.app-admin')
@section('title', 'Account Settings')
@section('body-class', 'user-dashboard bg-light')

@section('admin-content')
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

                        <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </form>
                </div>

                <div class="col">
                    <div class="form-row">
                        <div class="form-group col-md-12 d-flex flex-wrap">
                            <label for="" class="d-block w-100">{{ __('Groups managed by me:') }}</label>

                            <ul class="list-group w-100">
                                <li class="list-group-item">Cras justo odio</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Morbi leo risus</li>
                                <li class="list-group-item">Porta ac consectetur ac</li>
                                <li class="list-group-item">Vestibulum at eros</li>
                              </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END create group --}}
    </div>
@endsection
