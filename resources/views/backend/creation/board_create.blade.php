@extends('layouts.app-admin')
@section('title', 'Create Board')
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
                    <form id="form_cr" action="{{route('groups.board.save', app()->getLocale())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-header mb-3">{{__('Add Board')}}</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

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
                                            <label for="board_name">{{ __('Add new board name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="board_name" placeholder="{{ __('Board name') }}" value="{{ old('board_name') }}" name="board_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
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
        var group_select = "{{session('select_group')}}";
        $(function () {
            $('#group_select').val(group_select);
        });
    </script>
@endsection

