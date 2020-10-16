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

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-row">
                                        <label for="invite_user_input">{{__('Invite users')}}</label>
                                        <div class="input-group">
                                            <input type="email" id="invite_user_input" class="form-control" placeholder="email@domain.com" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-success" id="add_user_input" type="button">{{__('Add')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-4" id="show_invite_email">
                                        <!-- Invite User Email List here -->
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="group_select">{{ __('Select group') }} <span class="text-danger">*</span></label>
                                            <select id="group_select" name="group_id" class="form-control" required>
                                                <option value="">{{ __('Select group') }}</option>
                                                @foreach($group as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


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


        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
    </script>
@endsection
