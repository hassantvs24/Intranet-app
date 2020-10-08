@extends('layouts.app-admin')
@section('title', 'Welcome')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="group-view-wrap">
        <div class="container-fluid">

            <div class="row">
                <div class="col-6 m-4">
                    <h3 class="text-center">{{__('Group creation')}}</h3>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-creat_group-tab" data-toggle="tab" href="#nav-creat_group" role="tab" aria-controls="nav-home" aria-selected="true">{{__('Create group')}}</a>
                            <a class="nav-item nav-link" id="nav-add_group-tab" data-toggle="tab" href="#nav-add_group" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('Add group')}}</a>
                            <a class="nav-item nav-link" id="nav-add_admin-tab" data-toggle="tab" href="#nav-add_admin" role="tab" aria-controls="nav-contact" aria-selected="false">{{__('Add admin')}}</a>
                            <a class="nav-item nav-link" id="nav-invite_users-tab" data-toggle="tab" href="#nav-invite_users" role="tab" aria-controls="nav-contact" aria-selected="false">{{__('Invite users')}}</a>
                        </div>
                    </nav>
                    <form id="form_cr" action="#" method="post" enctype="multipart/form-data">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-creat_group" role="tabpanel" aria-labelledby="nav-home-tab">

                                <div class="card">
                                    <div class="card-body" style="height: 300px">
                                        <h5 class="card-title">{{__('Create group')}}</h5>
                                        <p class="card-text">......</p>

                                    </div>
                                    <div class="card-footer text-muted text-right">
                                        <a href="#" onclick="next_to_group()"  class="btn btn-primary">{{__('Next')}}</a>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-add_group" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <div class="card">
                                    <div class="card-body" style="height: 300px">
                                        <h5 class="card-title">{{__('Add group')}}</h5>
                                        <p class="card-text">......</p>

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
                                        <p class="card-text">......</p>

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
                                        <p class="card-text">......</p>

                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between">
                                        <a href="#" onclick="back_to_admin()" class="btn btn-danger">{{__('Back')}}</a>
                                        <a href="#" onclick="send_data()" class="btn btn-success">{{__('Submit')}}</a>
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
        send_data = () => $('#form_cr').submit();
    </script>
@endsection