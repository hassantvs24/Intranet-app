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

                        <div id="show_alart">

                        </div>

                </div>
            </div>

            <div class="row">
                <div class="col m-4">
                    <h3 class="text-center">{{__('Group creation')}}</h3>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-creat_group-tab" data-toggle="tab" href="#nav-creat_group" role="tab" aria-controls="nav-home" aria-selected="true">{{__('Create group')}}</a>
                            <a class="nav-item nav-link" id="nav-add_board-tab" data-toggle="tab" href="#nav-add_group" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('Add Board')}}</a>
                            <a class="nav-item nav-link" id="nav-add_admin-tab" data-toggle="tab" href="#nav-add_admin" role="tab" aria-controls="nav-contact" aria-selected="false">{{__('Add admin')}}</a>
                            <a class="nav-item nav-link" id="nav-invite_users-tab" data-toggle="tab" href="#nav-invite_users" role="tab" aria-controls="nav-contact" aria-selected="false">{{__('Invite users')}}</a>
                        </div>
                    </nav>
                    <form id="form_cr" action="{{route('creation-save', app()->getLocale())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content one_stop" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-creat_group" role="tabpanel" aria-labelledby="nav-home-tab">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{__('Create group')}}</h5>

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="group_name">{{ __('Group name') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="group_name" name="name" value="{{ old('name') }}" placeholder="{{ __('Group name') }}">
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
                                                        <label for="group_archive_start_date">{{ __('User access date') }} <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="group_archive_start_date"  value="{{ old('archive_start_date') }}" name="archive_start_date">
                                                        <small class="form-text text-muted">{{__('This is the date users will get the first access to the boards')}}</small>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="group_start_date">{{ __('Events Start date') }} <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="group_start_date" value="{{ old('start_date') }}" name="start_date">
                                                        <small class="form-text text-muted">{{__('This is the date the event starts')}}</small>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="group_end_date">{{ __('Events End date') }} <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="group_end_date" value="{{ old('end_date') }}" name="end_date">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="archive_group_end_date">{{ __('Archive date') }} <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="archive_group_end_date" value="{{ old('archive_end_date') }}" name="archive_end_date">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-muted text-right">
                                        <a href="#" onclick="next_to_board()"  class="btn btn-primary">{{__('Next')}}</a>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-add_group" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{__('Add Board')}}</h5>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="board_name">{{ __('Add new board name') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="board_name" placeholder="{{ __('Board name') }}" value="{{ old('board_name') }}" name="board_name">
                                                        <!--<small class="form-text text-muted">{{__('Make this blank, if you select existing board')}}</small>-->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
{{--                                                <p class="text-info"><b>{{ __('Or Select Existing Board') }}</b></p>--}}
{{--                                                @foreach($board as $row)--}}
{{--                                                    <div class="form-check board_check">--}}
{{--                                                        <input class="form-check-input" type="checkbox" name="board_id" value="{{$row->id}}" id="defaultCheck1{{$row->id}}">--}}
{{--                                                        <label class="form-check-label" for="defaultCheck1{{$row->id}}">--}}
{{--                                                            {{$row->name}}--}}
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
                                    <div class="card-body">
                                        <h5 class="card-title">{{__('Add admin')}}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-row">
                                                        <div class="form-group w-100">
                                                            <label for="user_select">{{ __('Select user') }} <span class="text-danger">*</span></label>
                                                            <select id="user_select" name="users_id" class="form-control">
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
                                                        <input type="text" class="form-control" id="admin_name" value="{{ old('admin_name') }}" name="admin_name" placeholder="ex: Adam Levi">
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
                                                        <input type="email" class="form-control" id="admin_email" value="{{ old('email') }}" name="email" placeholder="email@domain.com">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="admin_phone_no">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                                        <input type="tel" class="form-control" id="admin_phone_no" value="{{ old('phone') }}" name="phone" placeholder="+470156421">
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
                                    <div class="card-footer text-muted d-flex justify-content-between">
                                        <a href="#" onclick="back_to_board()" class="btn btn-danger">{{__('Back')}}</a>
                                        <a href="#" onclick="next_to_invite()" class="btn btn-primary">{{__('Next')}}</a>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav-invite_users" role="tabpanel" aria-labelledby="nav-contact-tab">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{__('Invite users')}}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-row">
                                                    <div class="form-group w-100">
                                                        <label for="user_select">{{ __('Select admin') }} <span class="text-danger">*</span></label>
                                                        <select id="user_select" name="users_id" class="form-control">
                                                            <option value="">{{ __('Select admin') }}</option>
                                                            @foreach($invited_user as $row)
                                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <label for="invite_user_input">{{__('Invite users')}}</label>
                                                    <div class="input-group">
                                                        <input type="email" id="invite_user_input" class="form-control" placeholder="email@domain.com" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-sm btn-success" id="add_user_input" type="button">{{__('Add')}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4" id="show_invite_email">
                                                    <!-- Invite User Email List here -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                    <p class="text-info"><b>{{ __('Or Select Existing User') }}</b></p>
                                                    @foreach($guest_user as $row)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="invite_user_id[]" value="{{$row->id}}" id="inviteUsers{{$row->id}}">
                                                            <label class="form-check-label" for="inviteUsers{{$row->id}}">
                                                                {{$row->name}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                        </div>

                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between">
                                        <a href="#" onclick="back_to_admin()" class="btn btn-danger">{{__('Back')}}</a>
                                        <button type="submit" class="btn btn-success">{{__('Store')}}</button>
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

        $(function () {
            //$('#nav-creat_group-tab, #nav-add_board-tab, #nav-add_admin-tab, #nav-invite_users-tab').prop('disabled', true);
        });

        function next_to_board(){
            var name = $('#group_name').val();
            var archive_start_date = $('#group_archive_start_date').val();
            var archive_end_date = $('#archive_group_end_date').val();
            var start_date = $('#group_start_date').val();
            var end_date = $('#group_end_date').val();
            var is_validate = false;

            if(name == ''){
                $('#group_name').addClass('is-invalid');
            }else{
                $('#group_name').removeClass('is-invalid');
            }

            if(archive_start_date == ''){
                $('#group_archive_start_date').addClass('is-invalid');
            }else{
                $('#group_archive_start_date').removeClass('is-invalid');
            }

            if(archive_end_date == ''){
                $('#archive_group_end_date').addClass('is-invalid');
            }else{
                $('#archive_group_end_date').removeClass('is-invalid');
            }

            if(start_date == ''){
                $('#group_start_date').addClass('is-invalid');
            }else{
                $('#group_start_date').removeClass('is-invalid');
            }

            if(end_date == ''){
                $('#group_end_date').addClass('is-invalid');
            }else{
                $('#group_end_date').removeClass('is-invalid');
            }

            if(name != '' && archive_start_date != '' && archive_end_date != '' && start_date != '' && end_date != ''){
                $('#nav-add_board-tab, #nav-creat_group-tab').prop('disabled', false);
                $('#nav-add_board-tab').trigger('click');
                hide_alarts();
            }else{
                show_alarts();
            }
        }

        function next_to_admin(){
            var board_name = $('#board_name').val();

            if(board_name == ''){
                $('#board_name').addClass('is-invalid');
            }else{
                $('#board_name').removeClass('is-invalid');
            }

            if (board_name != '') {
                $('#nav-add_admin-tab').prop('disabled', false);
                $('#nav-add_admin-tab').trigger('click');
                hide_alarts();
            }else{
                show_alarts();
            }

        }

        function next_to_invite(){
            var user_select = $('#user_select').val();
            var admin_name = $('#admin_name').val();
            var admin_email = $('#admin_email').val();
            var admin_phone_no = $('#admin_phone_no').val();

            if(user_select == ''){
                $('#user_select').addClass('is-invalid');
            }else{
                $('#user_select').removeClass('is-invalid');
            }

            if(admin_name == ''){
                $('#admin_name').addClass('is-invalid');
            }else{
                $('#admin_name').removeClass('is-invalid');
            }

            if(admin_email == ''){
                $('#admin_email').addClass('is-invalid');
            }else{
                $('#admin_email').removeClass('is-invalid');
            }

            if(admin_phone_no == ''){
                $('#admin_phone_no').addClass('is-invalid');
            }else{
                $('#admin_phone_no').removeClass('is-invalid');
            }

            if(user_select != '' && admin_name != '' && admin_email != '' && admin_phone_no != ''){
                $('#nav-invite_users-tab').prop('disabled', false);
                $('#nav-invite_users-tab').trigger('click');
                hide_alarts();
            }else{
                show_alarts();
            }
        }
        

        var email_list = [];
        $(function () {
            $('#add_user_input').click(function () {
                var emails = $('#invite_user_input').val();

                if(emails.length > 0 && validateEmail(emails)){
                    email_list.unshift(emails);
                    $('#invite_user_input').val('');
                    email_list_generate();
                }

            });
        });


        function email_list_generate(){
            var uniqueArray = email_list.filter(function(item, pos) {
                return email_list.indexOf(item) == pos;
            });
            var gen = '';
            $.each(uniqueArray, function(i, el){
                gen += `
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="invite_email[]" value="${el}" id="invEmail${i}" checked>
                            <label class="form-check-label" for="invEmail${i}">
                                ${el}
                            </label>
                        </div>
                    `;
            });
            $('#show_invite_email').html(gen);
        }

        back_to_crgroup = () => $('#nav-creat_group-tab').trigger('click');
        back_to_board = () => $('#nav-add_board-tab').trigger('click');
        back_to_admin = () => $('#nav-add_admin-tab').trigger('click');


        function show_alarts(){
            $('#show_alart').html(`
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Input Value Required!</strong> required input value.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            `);
        }

        function hide_alarts(){
            $('#show_alart').html('');
        }

        /**-----------------------------
         * Add board options implements
         * -----------------------------
         */
        $(function () {
            //alert($('.board_check input[type="checkbox"]').prop('checked'));

            // $('.board_check input[type="checkbox"]').on('change', function() {
            //     if($(this).prop('checked')){
            //         $('#board_name').val('');
            //         $('#board_name').prop("disabled",true);
            //     }else{
            //         $('#board_name').prop("disabled",false);
            //     }
            //     $('.board_check input:checkbox').not(this).prop('checked', false);
            // });

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
        /**-----------------------------
         * Add board options implements
         * -------------------------------
         */

        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

    </script>
@endsection