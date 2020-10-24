@extends('layouts.app-admin')
@section('title', 'Group Invitation')
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
                    <form id="form_cr" action="{{route('groups.invite.save', app()->getLocale())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-header mb-3">{{__('Invite users')}}</h5>
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-md-6">

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="group_select">{{ __('Select group') }}</label>
                                            <select id="group_select" name="group_id" class="form-control">
                                                <option value="">{{ __('Select group') }}</option>
                                                @foreach($group as $row)
                                                    <option value="{{$row->id}}" data-name="{{$row->name}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="user_select">{{ __('Primary contact') }}</label>
                                            <select id="user_select" name="primary_contact" class="form-control">
                                                <option value="">{{ __('Select admin') }}</option>
                                                @foreach($invited_user as $row)
                                                    <option value="{{$row->id}}" data-name="{{$row->name}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="user_name">{{ __('User name') }}</label>
                                            <input type="text" class="form-control" id="user_name" name="name" value="{{ old('name') }}" placeholder="{{ __('User name') }}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <label for="invite_user_input">{{__('Invite email')}}</label>
                                        <div class="input-group">
                                            <input type="email" id="invite_user_input" class="form-control" placeholder="email@domain.com" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-success" id="add_user_input" type="button">{{__('Add')}}</button>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="row">
                                        <div class="col">
                                            <p class="text-info"><b>{{ __('Select Existing User') }}</b></p>
                                            @foreach($guest_user as $row)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="existing_user[]" value="{{$row->id}}" id="inviteUsers{{$row->id}}">
                                                    <label class="form-check-label" for="inviteUsers{{$row->id}}">
                                                        {{$row->name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">
                                    <table class="table table-hover table-striped table-sm">
                                        <thead>
                                            <th>#</th>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Group')}}</th>
                                            <th>{{__('Primary Contact')}}</th>
                                        </thead>
                                        <tbody id="show_invite_email">
                                            <!-- generate email list -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" name="add_exist" value="exits" class="btn btn-info">{{__('Add existing user')}}</button>
                            <button type="submit" name="add_queue" value="queue" class="btn btn-primary">{{__('Save to queue')}}</button>
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
        var user_select = "{{session('select_primary')}}";
        $(function () {
            $('#group_select').val(group_select);
            $('#user_select').val(user_select);
        });
    </script>

    <script type="text/javascript">
        var email_list = [];

        $(function () {
            $('#add_user_input').click(function () {
                var names = $('#user_name').val();
                var emails = $('#invite_user_input').val();
                var primary_contact = $('#user_select').val();
                var primary_name = $('#user_select').find(':selected').data('name');
                var group_id = $('#group_select').val();
                var group_name =  $('#group_select').find(':selected').data('name');

                if(emails.length > 0 && validateEmail(emails) && names != '' && primary_contact != '' && group_id != ''){
                    const single_item = email_list.filter(items => items.email == emails);

                    if(single_item.length === 0){
                        email_list.unshift({
                            name: names,
                            email: emails,
                            primary: primary_contact,
                            p_name: primary_name,
                            group: group_id,
                            g_name: group_name
                        });
                        $('#invite_user_input, #user_name').val('');
                        email_list_generate();
                    }

                }

            });
        });

        function email_list_generate(){
            var gen = '';
            $.each(email_list, function(i, el){
                gen += `
                        <tr>
                            <td><input type="checkbox" name="queue_value[]" value="${el.email}, ${el.primary}, ${el.group}, ${el.name}" checked /></td>
                            <td>${el.name}</td>
                            <td>${el.email}</td>
                            <td>${el.g_name}</td>
                            <td>${el.p_name}</td>
                        </tr>
                    `;
            });
            $('#show_invite_email').html(gen);
        }


        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
    </script>
@endsection
