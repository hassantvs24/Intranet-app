@extends('layouts.app-admin')
@section('body-class', 'bg-light')

@section('admin-content')
<div class="users-create-wrap">
    {{-- START create group --}}
    <div class="container" id="create-group-form-wrap">
        <div class="row page-header my-4 pt-4">
            <div class="col">
                <h3 class="page-title">{{ __('Create & Invite user') }}</h3>
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
                            <label for="user_profile_image">{{ __('Profile Image') }}</label>
                            <input type="file" class="form-control-file" id="user_profile_image" name="user_profile_image">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 d-flex flex-wrap">
                            <label for="" class="d-block w-100">{{ __('Assign a group:') }}</label>

                            @foreach($groups as $group)
                                <div class="custom-control custom-radio select-group-btn mr-4 my-1">
                                    <input type="radio" id="group_{{$group->id}}" name="user_group" class="custom-control-input" value="{{$group->id}}">
                                    <label class="custom-control-label" for="group_{{$group->id}}">{{$group->name}}</label>
                                </div>
                            @endforeach

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
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlTextarea1">{{ __('About / Bio') }}</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="" class="d-block w-100">{{ __('Select primary contact:') }}</label>

                        <div class="form-group col-md-6" id="primary-contacts-wrap">
                            {{-- Dynamic data here - Axios get() --}}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Invite & Add New User') }}</button>
                </form>
            </div>
        </div>
    </div>
    {{-- END create group --}}
</div>

<script>
    const primary_contacts_wrap = $('#primary-contacts-wrap')

    $(".select-group-btn input[name='user_group']").change(function () {
        // get selected group id
        let group_id = $(this).val()
        // clear old req data
        let admins_html = ``
        // get new data
        axios.get('/api/group/'+ group_id +'/contacts')
            .then(function (response) {
                // console.log( (response.data.data))
                let data = response.data.data
                // prepare html
                data.forEach((admin) => {
                    console.log(admin.name)
                    admins_html += `
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="group_admins" id="group_admin_${admin.id}" value="${admin.id}">
                            <label class="custom-control-label" for="group_admin_${admin.id}">${admin.name}</label>
                        </div>
                    `
                })
                // console.log(admins_html)
                // clear DOM -> remove old group admins
                primary_contacts_wrap.html('')
                // set html in DOM
                primary_contacts_wrap.html(admins_html)
            })
    })
</script>
@endsection
