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

            <div class="row mb-4">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col">
                    <form action="{{ route('admin-account-settings', app()->getLocale()) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="group_name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="ex: Adam Levi" required
                                value="{{ $user->name }}"/>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="user_profile_image"> {{ __('Profile Image') }} </label>
                                <input type="file" class="form-control-file" id="user_profile_image" name="user_profile_image">
                                 {{-- <img id="userimage" src="#" alt="your image" /> --}}
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="user_email">{{ __('User Email') }}</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="email@domain.com" required
                                value="{{ $user->email }}" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="user_phone_no">{{ __('User Phone') }}</label>
                                <input type="tel" class="form-control" id="user_phone_no" name="user_phone_no" placeholder="+470156421" required
                                value="{{ $user->phone }}" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="user_language"> {{ __( 'Language' ) }} </label>
                                <select name="user_language">
                                    <option value=""></option>
                                    <option value="en" @if( $user->language == 'en' ) {{ 'selected' }} @endif > {{ __( 'English' ) }}</option>
                                    <option value="nor" @if( $user->language == 'nor' ) {{ 'selected' }} @endif >  {{ __( 'Norwegian' ) }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="user_bio">{{ __('About / Bio') }}</label>
                                <textarea class="form-control" name="user_bio" id="exampleFormControlTextarea1" rows="3">
                                    {{ $user->bio }}
                                </textarea>
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

    <style>
        #userimage{
            max-width: 600px;
            max-height: 200px;
        }
    </style>

    <script>
      /*  $(document).ready(function(){
            function readURL(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                  $('#userimage').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
              }
            }

            $("#user_profile_image").change(function() {
              readURL(this);
            });
        }); */
    </script>
@endsection
