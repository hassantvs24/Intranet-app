@extends('layouts.app-admin')
@section('title', 'All Boards')
@section('body-class', 'bg-light')

@section('admin-content')
    <div class="container-fluid p-4">
        <div class="row page-header mb-3">
            <div class="col">
                <h3 class="page-title">{{ __('Boards') }}</h3>
            </div>
        </div>

        <div class="row mb-4">
            <div class="alert alert-primary font-weight-bold" role="alert">
                {{__('Boards are page that your customer will see while logged in.')}} <br>
{{--                {{__('You can create multiple boards and assign days for which board show up when')}} <br>--}}
                {{__('You can update the same board for a group as necessary.')}}
            </div>
        </div>

        <div class="row mb-4 align-items-center align-content-center">
            <div class="col">
                <form action="{{ route('search-board', [ app()->getLocale() ] ) }}" method="get">
                {{-- <form action="#" method="get"> --}}
                    <div class="form-row">
                        <div class="col col-md-5">
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0" id="search-icon">
                                        <svg height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M21.45,20A11,11,0,1,0,20,21.45l8.26,8.26a1,1,0,0,0,1.41-1.41ZM4,13a9,9,0,1,1,9,9A9,9,0,0,1,4,13Z" data-name="Layer 2" fill="#999"/></svg>
                                    </span>
                                </div>
                                <input type="search" class="form-control border-left-0" id="inputGroupFile01" aria-describedby="search-icon" name="search" placeholder="{{ __('Search') }}" value="@if( !empty( $_GET['search'] ) ) {{ $_GET['search'] }} @endif ">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col text-right">
                <a href="{{ route('create-board', app()->getLocale()) }}" class="btn btn-primary btn-md">{{ __('Create New') }}</a>
            </div>
        </div>

        <div class="row mb-4" id="all-boards">
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
                        <th scope="col" class="border-0">{{ __('Linked Group') }}</th>
{{--                        <th scope="col" class="border-0">{{ __('Group Color') }}</th>--}}
                        <th scope="col" class="border-0"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($boards) > 0)
                        @foreach($boards as $board)
                            <tr>
                                <th scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="group_1_id">
                                        <label class="custom-control-label" for="group_1_id"></label>
                                    </div>
                                </th>
                                <td> {{ $board->name }} </td>
                                <td> {{ $board->group->name }} </td>
                                {{-- <td><span class="bg-primary group-color-dot"></span></td> --}}
                                <td class="cta-group-item">
    {{--                                 <a href="{{ route('view-board', $board->id) }}" class="btn btn-outline-primary btn-sm" id="btn-view-group"
                                       data-toggle="tooltip" data-placement="top" title="{{ __('View board') }}"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,19C5.526,19,.44,12.9.227,12.634a1,1,0,0,1,0-1.268C.44,11.105,5.526,5,12,5s11.56,6.105,11.773,6.366a1,1,0,0,1,0,1.268C23.56,12.9,18.474,19,12,19ZM2.349,12C3.764,13.472,7.611,17,12,17s8.239-3.525,9.651-5C20.236,10.528,16.389,7,12,7S3.761,10.525,2.349,12Z"/><path d="M12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,12,10Z"/></svg>
                                    </a> --}}
                                    <a href="{{ route('edit-board', [ app()->getLocale(), $board->id ] ) }}" class="btn btn-outline-primary btn-sm" id="btn-edit-group"
                                       data-toggle="tooltip" data-placement="top" title="{{ __('Edit Board') }}"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path d="M10.3,17.744l-.472,3.3a1,1,0,0,0,.99,1.142.987.987,0,0,0,.142-.01l3.3-.472a1,1,0,0,0,.565-.283l9.6-9.6,1.886-1.885a1,1,0,0,0,0-1.414L23.479,5.693a1,1,0,0,0-1.414,0L20.179,7.579l-9.6,9.6A1,1,0,0,0,10.3,17.744Zm12.476-9.93,1.414,1.415-.472.471L22.3,8.286ZM12.229,18.357,20.886,9.7,22.3,11.114l-8.657,8.657-1.649.236Z" fill="#999"/><path d="M27,15a1,1,0,0,0-1,1v9a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6h9a1,1,0,0,0,0-2H7A3,3,0,0,0,4,7V25a3,3,0,0,0,3,3H25a3,3,0,0,0,3-3V16A1,1,0,0,0,27,15Z" fill="#999"/></svg>
                                    </a>
                                    <a href="{{ route('edit-infocards', [ app()->getLocale(), $board->id ] ) }}" class="btn btn-outline-primary btn-sm" id="btn-edit-group"
                                       data-toggle="tooltip" data-placement="top" title="{{ __('Edit board data') }}"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g data-name="Layer 3"><path d="M23.92,6.59H22V4.71a.5.5,0,0,0-.5-.5H18.34V2.86a2.35,2.35,0,0,0-4.71,0V4.21H10.42a.5.5,0,0,0-.5.5V6.59H8.08A2.87,2.87,0,0,0,5.21,9.46V28.62a2.87,2.87,0,0,0,2.87,2.87H23.92a2.87,2.87,0,0,0,2.87-2.87V9.46A2.87,2.87,0,0,0,23.92,6.59Zm-13-1.37h3.21a.5.5,0,0,0,.5-.5V2.86a1.35,1.35,0,0,1,2.71,0V4.71a.5.5,0,0,0,.5.5H21V8.85H10.92ZM25.79,28.62a1.87,1.87,0,0,1-1.87,1.87H8.08a1.87,1.87,0,0,1-1.87-1.87V9.46A1.87,1.87,0,0,1,8.08,7.59H9.92V9.35a.5.5,0,0,0,.5.5H21.55a.5.5,0,0,0,.5-.5V7.59h1.87a1.87,1.87,0,0,1,1.87,1.87Z"/><path d="M10.2 14.67h5.23a.5.5 0 0 0 0-1H10.2a.5.5 0 0 0 0 1zM10.2 17.84h5.23a.5.5 0 0 0 0-1H10.2a.5.5 0 0 0 0 1zM21.55 20H10.2a.5.5 0 0 0 0 1H21.55a.5.5 0 0 0 0-1zM21.55 23.17H10.2a.5.5 0 1 0 0 1H21.55a.5.5 0 0 0 0-1zM21.55 26.34H10.2a.5.5 0 0 0 0 1H21.55a.5.5 0 0 0 0-1zM21.55 13.49H17.79a.5.5 0 0 0-.5.5v3.76a.5.5 0 0 0 .5.5h3.76a.5.5 0 0 0 .5-.5V14A.5.5 0 0 0 21.55 13.49zM21 17.25H18.29V14.49H21z"/></g></svg>
                                    </a>

                             {{-- <form action="{{ route('delete-board', [ app()->getLocale(), $board->id ] ) }}" method="post">
                                @csrf
                                @method('DELETE') --}}
                                    <button class="btn btn-outline-primary btn-sm" id="btn-delete-group">
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64"><path d="M59.53,6.62h-7.14h-9.45v-4.3C42.94,1.04,41.9,0,40.62,0H23.38c-1.28,0-2.32,1.04-2.32,2.32v4.3h-9.45H4.47 c-1.28,0-2.32,1.04-2.32,2.32c0,1.28,1.04,2.32,2.32,2.32h4.82v41.61C9.29,59.01,14.28,64,20.42,64h23.16 c6.14,0,11.13-4.99,11.13-11.13V11.26h4.82c1.28,0,2.32-1.04,2.32-2.32C61.85,7.66,60.81,6.62,59.53,6.62z M25.7,4.64H38.3v1.98 H25.7V4.64z M50.07,52.87c0,3.58-2.91,6.49-6.49,6.49H20.42c-3.58,0-6.49-2.91-6.49-6.49V11.26h36.15V52.87z"/><path d="M23.38 51.47c1.28 0 2.32-1.04 2.32-2.32V29.21c0-1.28-1.04-2.32-2.32-2.32-1.28 0-2.32 1.04-2.32 2.32v19.93C21.06 50.43 22.1 51.47 23.38 51.47zM32 51.47c1.28 0 2.32-1.04 2.32-2.32V21.47c0-1.28-1.04-2.32-2.32-2.32s-2.32 1.04-2.32 2.32v27.67C29.68 50.43 30.72 51.47 32 51.47zM40.62 51.47c1.28 0 2.32-1.04 2.32-2.32V29.21c0-1.28-1.04-2.32-2.32-2.32-1.28 0-2.32 1.04-2.32 2.32v19.93C38.3 50.43 39.34 51.47 40.62 51.47z"/></svg>
                                    </button>
                            {{-- </form> --}}
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td>
                                    {{ __('No records found') }}
                                    <a href="{{ route('create-board', app()->getLocale() ) }}">{{ __('Create new.') }}</a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <nav aria-label="Page navigation example">
                    {{ $boards->links() }}
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('archived-boards', app()->getLocale() ) }}" class="btn btn-warning">{{ __('view archived boards') }}</a>
            </div>
        </div>
    </div>
@endsection
