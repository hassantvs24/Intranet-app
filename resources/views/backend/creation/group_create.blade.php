@extends('layouts.app-admin')
@section('title', 'Group creation')
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
                    <form id="form_cr" action="{{route('groups.create.save', app()->getLocale())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-header mb-3">{{__('Create group')}}</h5>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="group_name">{{ __('Group name') }} <span class="text-danger">*</span></label>
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
                                            <label for="group_archive_start_date">{{ __('User access date') }} <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="group_archive_start_date"  value="{{ old('archive_start_date') }}" name="archive_start_date" required>
                                            <small class="form-text text-muted">{{__('This is the date users will get the first access to the boards')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="group_start_date">{{ __('Events Start date') }} <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="group_start_date" value="{{ old('start_date') }}" name="start_date" required>
                                            <small class="form-text text-muted">{{__('This is the date the event starts')}}</small>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="group_end_date">{{ __('Events End date') }} <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="group_end_date" value="{{ old('end_date') }}" name="end_date" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="archive_group_end_date">{{ __('Archive date') }} <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="archive_group_end_date" value="{{ old('archive_end_date') }}" name="archive_end_date" required>
                                        </div>
                                    </div>

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

    </script>
@endsection
