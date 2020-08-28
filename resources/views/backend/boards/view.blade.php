@extends('layouts.app-admin')
@section('body-class', 'bg-light')
@php
    $group_name = \App\Group::find($board->group_id)->name;
@endphp
@section('admin-content')
    <div class="users-view-wrap">
        <div class="container" id="create-group-form-wrap">
            <div class="row page-header my-4 pt-4">
                <div class="col">
                    <h3 class="page-title">{{ $board->name }}</h3>
                    <div class="group-info mt-3">
                        <div class="info-line-item">
                            <span class="font-weight-bold">{{ __('Associated group: ') }}</span>
                            <span>{{ $group_name }}</span>
                        </div>
{{--                        <div class="info-line-item my-2">--}}
{{--                            <span class="font-weight-bold">{{ __('Associated Admins: ') }}</span>--}}
{{--                            <span>2020/08/27</span>--}}
{{--                        </div>--}}
                        <div class="info-line-item">
                            <span class="font-weight-bold">{{ __('Current members: ') }}</span>
                            <span>15</span>
                        </div>
                    </div>
                </div>

                <div class="col text-right"></div>
            </div>

            <div class="row">
                <div class="col">
                    <a href="{{ route('edit-board', $board->id) }}" type="submit" class="btn btn-primary">
                        {{ __('Edit Board') }}
                    </a>
                    <a href="{{ route('edit-infocards', $board->id) }}" type="submit" class="btn btn-secondary ml-2">
                        {{ __('Edit Info Cards for this board') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
