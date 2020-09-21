@extends('layouts.app-admin')
@section('title', 'Create New Group')
@section('body-class', 'bg-light')

@section('admin-content')
<div class="group-create-wrap">
    {{-- START create group --}}
    <div class="container" id="create-group-form-wrap">
        <div class="row page-header my-4 pt-4">
            <div class="col">
                <h3 class="page-title">{{ __('Create group') }}</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="{{ route('group.store', app()->getLocale()) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="group_name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="group_name" name="name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 d-flex flex-wrap">
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
                        <div class="form-group col-md-6">
                            <label for="group_start_date">{{ __('Events Start date') }}</label>
                            <input type="date" class="form-control" id="group_start_date" name="start_date" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="group_end_date">{{ __('Events End date') }}</label>
                            <input type="date" class="form-control" id="group_end_date" name="end_date" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="group_archive_start_date">{{ __('Start date') }}</label>
                            <input type="date" class="form-control" id="group_archive_start_date" name="archive_start_date" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="archive_group_end_date">{{ __('Archive date') }}</label>
                            <input type="date" class="form-control" id="archive_group_end_date" name="archive_end_date" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="" class="d-block w-100">{{ __('Select group admins:') }}</label>

                        <div class="form-group col-md-6">
                            @foreach($admins as $admin)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="{{ $admin->id }}" name="group_admins[]" id="group_admin_{{ $admin->id }}">
                                <label class="custom-control-label" for="group_admin_{{ $admin->id }}">{{ $admin->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Add New Group') }}</button>
                </form>
            </div>
        </div>
    </div>
    {{-- END create group --}}
</div>
@endsection
