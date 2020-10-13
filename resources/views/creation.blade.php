@extends('layouts.app-creation')
@section('title', 'Create Group')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="group-create-wrap">
        <div class="container">
            <div class="row">
                <div class="col mt-3">
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

            <div class="row">
                <div class="col m-4">
                    <h3 class="text-center">{{__('Group creation')}}</h3>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-creat_group-tab" data-toggle="tab" href="#nav-creat_group" role="tab" aria-controls="nav-home" aria-selected="true">{{__('Create group')}}</a>
                            <a class="nav-item nav-link" id="nav-add_group-tab" data-toggle="tab" href="#nav-add_group" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('Add Board')}}</a>
                            <a class="nav-item nav-link" id="nav-add_admin-tab" data-toggle="tab" href="#nav-add_admin" role="tab" aria-controls="nav-contact" aria-selected="false">{{__('Add admin')}}</a>
                            <a class="nav-item nav-link" id="nav-invite_users-tab" data-toggle="tab" href="#nav-invite_users" role="tab" aria-controls="nav-contact" aria-selected="false">{{__('Invite users')}}</a>
                        </div>
                    </nav>
                    <form id="form_cr" action="{{route('creation-save', app()->getLocale())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-creat_group" role="tabpanel" aria-labelledby="nav-home-tab">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{__('Create group')}}</h5>

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="group_name">{{ __('Group name') }}</label>
                                                        <input type="text" class="form-control" id="group_name" name="name" value="{{ old('name') }}" placeholder="{{ __('Group name') }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group d-flex flex-wrap">
                                                        <label for="" class="d-block w-100">{{ __('Select a group color:') }}</label>

                                                        <div class="custom-control custom-radio mr-4 my-1 body-green">
                                                            <input type="radio" id="group_color_green" name="group_color" value="green" class="custom-control-input" checked>
                                                            <label class="custom-control-label" for="group_color_green">Green</label>
                                                            <span class="bg-color rounded-circle show-group-color"></span>
                                                        </div>
                                                        <div class="custom-control custom-radio mr-4 my-1 body-blue">
                                                            <input type="radio" id="group_color_blue" name="group_color" value="blue" class="custom-control-input">
                                                            <label class="custom-control-label" for="group_color_blue">Blue</label>
                                                            <span class="bg-color rounded-circle show-group-color"></span>
                                                        </div>
                                                        <div class="custom-control custom-radio mr-4 my-1 body-yellow">
                                                            <input type="radio" id="group_color_yellow" name="group_color" value="yellow" class="custom-control-input">
                                                            <label class="custom-control-label" for="group_color_yellow">Yellow</label>
                                                            <span class="bg-color rounded-circle show-group-color"></span>
                                                        </div>
                                                        <div class="custom-control custom-radio mr-4 my-1 body-red">
                                                            <input type="radio" id="group_color_red" name="group_color" value="red" class="custom-control-input">
                                                            <label class="custom-control-label" for="group_color_red">Red</label>
                                                            <span class="bg-color rounded-circle show-group-color"></span>
                                                        </div>
                                                        <div class="custom-control custom-radio mr-4 my-1 body-pink">
                                                            <input type="radio" id="group_color_pink" name="group_color" value="pink" class="custom-control-input">
                                                            <label class="custom-control-label" for="group_color_pink">Pink</label>
                                                            <span class="bg-color rounded-circle show-group-color"></span>
                                                        </div>
                                                        <div class="custom-control custom-radio mr-4 my-1 body-orange">
                                                            <input type="radio" id="group_color_orange" name="group_color" value="orange" class="custom-control-input">
                                                            <label class="custom-control-label" for="group_color_orange">Orange</label>
                                                            <span class="bg-color rounded-circle show-group-color"></span>
                                                        </div>
                                                        <div class="custom-control custom-radio mr-4 my-1 body-teal">
                                                            <input type="radio" id="group_color_teal" name="group_color" value="teal" class="custom-control-input">
                                                            <label class="custom-control-label" for="group_color_teal">Teal</label>
                                                            <span class="bg-color rounded-circle show-group-color"></span>
                                                        </div>
                                                        <div class="custom-control custom-radio mr-4 my-1 body-violet">
                                                            <input type="radio" id="group_color_violet" name="group_color" value="violet" class="custom-control-input">
                                                            <label class="custom-control-label" for="group_color_violet">Violet</label>
                                                            <span class="bg-color rounded-circle show-group-color"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="group_archive_start_date">{{ __('User access date') }}</label>
                                                        <input type="date" class="form-control" id="group_archive_start_date"  value="{{ old('archive_start_date') }}" name="archive_start_date" required>
                                                        <small class="form-text text-muted">{{__('This is the date users will get the first access to the boards')}}</small>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="group_start_date">{{ __('Events Start date') }}</label>
                                                        <input type="date" class="form-control" id="group_start_date" value="{{ old('start_date') }}" name="start_date" required>
                                                        <small class="form-text text-muted">{{__('This is the date the event starts')}}</small>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="group_end_date">{{ __('Events End date') }}</label>
                                                        <input type="date" class="form-control" id="group_end_date" value="{{ old('end_date') }}" name="end_date" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="archive_group_end_date">{{ __('Archive date') }}</label>
                                                        <input type="date" class="form-control" id="archive_group_end_date" value="{{ old('archive_end_date') }}" name="archive_end_date" required>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-muted text-right">
                                        <a href="#" onclick="next_to_group()"  class="btn btn-primary">{{__('Next')}}</a>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-add_group" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <div class="card">
                                    <div class="card-body" style="height: 300px">
                                        <h5 class="card-title">{{__('Add Board')}}</h5>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="board_name">{{ __('Add new board name') }}</label>
                                                        <input type="text" class="form-control" id="board_name" placeholder="{{ __('Board name') }}" value="{{ old('board_name') }}" name="board_name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
{{--                                                <p class="text-info"><b>{{ __('Or Select Board') }}</b></p>--}}
{{--                                                @foreach($board as $row)--}}
{{--                                                    <div class="form-check">--}}
{{--                                                        <input class="form-check-input" type="checkbox" name="board_id" value="{{$row->id}}" id="defaultCheck1{{$row->id}}">--}}
{{--                                                        <label class="form-check-label" for="defaultCheck1{{$row->id}}">--}}
{{--                                                            Default checkbox--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between">
                                        <a href="#" onclick="back_to_crgroup()" class="btn btn-danger">{{__('Back')}}</a>
                                        <a href="#" onclick="next_to_admin()" class="btn btn-primary">{{__('Next')}}</a>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-add_admin" role="tabpanel" aria-labelledby="nav-contact-tab">

                                <div class="card">
                                    <div class="card-body" style="height: 300px">
                                        <h5 class="card-title">{{__('Add admin')}}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="admin_name">{{ __('Admin name') }}</label>
                                                        <input type="text" class="form-control" id="admin_name" value="{{ old('admin_name') }}" name="admin_name" placeholder="ex: Adam Levi" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="user_profile_image"> {{ __('Profile Image') }} </label>
                                                        <input type="file" class="form-control-file" id="user_profile_image" name="avatar">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="user_email">{{ __('Email') }}</label>
                                                        <input type="email" class="form-control" id="user_email" value="{{ old('email') }}" name="email" placeholder="email@domain.com" required>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="user_phone_no">{{ __('Phone') }}</label>
                                                        <input type="tel" class="form-control" id="user_phone_no" value="{{ old('phone') }}" name="phone" placeholder="+470156421" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="exampleFormControlTextarea1">{{ __('About / Bio') }}</label>
                                                        <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3">{{ old('bio') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between">
                                        <a href="#" onclick="back_to_group()" class="btn btn-danger">{{__('Back')}}</a>
                                        <a href="#" onclick="next_to_invite()" class="btn btn-primary">{{__('Next')}}</a>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav-invite_users" role="tabpanel" aria-labelledby="nav-contact-tab">

                                <div class="card">
                                    <div class="card-body" style="height: 300px">
                                        <h5 class="card-title">{{__('Invite users')}}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="invite_user">{{ __('User email') }}</label>
                                                        <input type="email" class="form-control" id="invite_user" value="{{ old('invite_user_email') }}" name="invite_user_email" placeholder="email@domain.com">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between">
                                        <a href="#" onclick="back_to_admin()" class="btn btn-danger">{{__('Back')}}</a>
                                        <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        next_to_group = () => $('#nav-add_group-tab').trigger('click');
        back_to_crgroup = () => $('#nav-creat_group-tab').trigger('click');
        next_to_admin = () => $('#nav-add_admin-tab').trigger('click');
        back_to_group = () => $('#nav-add_group-tab').trigger('click');
        next_to_invite = () => $('#nav-invite_users-tab').trigger('click');
        back_to_admin = () => $('#nav-add_admin-tab').trigger('click');
       // send_data = () => $('#form_cr').submit();

    </script>
@endsection