@extends('layouts.app-admin')
@section('title', 'View Group Invite')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="users-view-wrap">
        <div class="container" id="create-group-form-wrap">
            <div class="row page-header my-4 pt-4">
                <div class="col">
                    <h3 class="page-title">{{ $group->name }}</h3>
                    <div class="group-info mt-3">
                        <div class="info-line-item">
                            <span class="font-weight-bold">{{ __('Start date: ') }}</span>
                            <span>{{$group->start_date}}</span>
                        </div>
                        <div class="info-line-item my-2">
                            <span class="font-weight-bold">{{ __('End date: ') }}</span>
                            <span>{{$group->end_date}}</span>
                        </div>
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
                <div class="col">
                    <form action="{{route('send-invite', app()->getLocale())}}" method="post">
                        @csrf
                        <div class="row mb-4 align-items-center align-content-center">
                            <div class="col">
{{--                                <form action="#" method="get">--}}
                                    <div class="form-row">
                                        <div class="col col-md-5">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text bg-white border-right-0" id="search-icon">
                                                    <svg height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                        <path d="M21.45,20A11,11,0,1,0,20,21.45l8.26,8.26a1,1,0,0,0,1.41-1.41ZM4,13a9,9,0,1,1,9,9A9,9,0,0,1,4,13Z" data-name="Layer 2" fill="#999" /></svg>
                                                </span>
                                                </div>
                                                <input type="search" class="form-control border-left-0" id="inputGroupFile01" aria-describedby="search-icon" placeholder="search">
                                            </div>
                                        </div>
                                    </div>
{{--                                </form>--}}
                            </div>

                            <div class="col text-right">
                                <button type="submit" class="btn btn-primary">{{ __('Invite Users to this group') }}</button>
                            </div>
                        </div>

                        <div class="row mb-4" id="all-users">
                            <div class="col">
                                <table class="table table--all-groups shadow-sm rounded border-0 overflow-hidden">
                                    <thead class="thead-light border-0">
                                    <tr class="border-0">
                                        <th scope="col" class="border-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="select_all_groups">
                                                <label class="custom-control-label" for="select_all_groups"></label>
                                            </div>
                                        </th>
                                        <th scope="col" class="border-0">{{ __('Name') }}</th>
                                        <th scope="col" class="border-0">{{ __('Email') }}</th>
                                        <th scope="col" class="border-0">{{ __('Primary Contact') }}</th>
                                        <th scope="col" class="border-0">{{ __('Group') }}</th>
                                        <th scope="col" class="border-0">{{ __('Status') }}</th>
                                        <th scope="col" class="border-0">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invitation as $row)
                                        <tr>
                                            <th scope="row">
                                                @if($row->status != 'Registered')
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="send_email[]" value="{{ $row->id }}" class="custom-control-input" id="group_1_id{{$row->id}}">
                                                        <label class="custom-control-label" for="group_1_id{{$row->id}}"></label>
                                                    </div>
                                                @endif
                                            </th>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->p_contact['name'] ?? '' }}</td>
                                            <td>{{ $row->group->name ?? '' }}</td>
                                            @if($row->status == 'Registered')
                                                <td>{{ $row->status }}</td>
                                            @else
                                                <td><a href="#">{{ $row->status }}</a></td>
                                            @endif
                                            <td class="cta-group-item">
                                                <!--<button class="btn btn-outline-primary btn-sm" id="btn-delete-group">
                                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64">
                                                        <path d="M59.53,6.62h-7.14h-9.45v-4.3C42.94,1.04,41.9,0,40.62,0H23.38c-1.28,0-2.32,1.04-2.32,2.32v4.3h-9.45H4.47 c-1.28,0-2.32,1.04-2.32,2.32c0,1.28,1.04,2.32,2.32,2.32h4.82v41.61C9.29,59.01,14.28,64,20.42,64h23.16 c6.14,0,11.13-4.99,11.13-11.13V11.26h4.82c1.28,0,2.32-1.04,2.32-2.32C61.85,7.66,60.81,6.62,59.53,6.62z M25.7,4.64H38.3v1.98 H25.7V4.64z M50.07,52.87c0,3.58-2.91,6.49-6.49,6.49H20.42c-3.58,0-6.49-2.91-6.49-6.49V11.26h36.15V52.87z" />
                                                        <path d="M23.38 51.47c1.28 0 2.32-1.04 2.32-2.32V29.21c0-1.28-1.04-2.32-2.32-2.32-1.28 0-2.32 1.04-2.32 2.32v19.93C21.06 50.43 22.1 51.47 23.38 51.47zM32 51.47c1.28 0 2.32-1.04 2.32-2.32V21.47c0-1.28-1.04-2.32-2.32-2.32s-2.32 1.04-2.32 2.32v27.67C29.68 50.43 30.72 51.47 32 51.47zM40.62 51.47c1.28 0 2.32-1.04 2.32-2.32V29.21c0-1.28-1.04-2.32-2.32-2.32-1.28 0-2.32 1.04-2.32 2.32v19.93C38.3 50.43 39.34 51.47 40.62 51.47z" /></svg>
                                                </button>-->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        /*jQuery(document).ready(function($) {
            $('#searchuser').select2({
              // placeholder: 'Select an option'
              placeholder: 'search users'
            });
        }); */

    </script>
@endsection
