@extends('layouts.app-admin')
@section('body-class', 'bg-light')

@section('admin-content')
<div class="users-create-wrap">
    {{-- START create group --}}
    <div class="container" id="create-group-form-wrap">
        <div class="row page-header my-4 pt-4">
            <div class="col">
                <h3 class="page-title">{{ __('Create Board') }}</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col">
                <form action="{{ route('store-board') }}"  method="post">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="group_name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="group_name" name="name" placeholder="ex: Adam Levi" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 d-flex flex-wrap">
                            <label for="" class="d-block w-100">{{ __('Select a group:') }}</label>

                            @foreach($groups as $group)
                            <div class="custom-control custom-radio select-group-btn mr-4 my-1">
                                <input type="radio" id="group_{{$group->id}}" name="user_group" class="custom-control-input" value="{{ $group->id }}">
                                <label class="custom-control-label" for="group_{{$group->id}}">{{ $group->name }}</label>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    {{-- This start and end date will change according to selected group --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="group_start_date">{{ __('Start date') }}</label>
                            <input type="date" class="form-control" id="group_start_date" name="group_start_date" value="" disabled>
                        </div>
                    </div>
                    {{-- This start and end date will change according to selected group --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="group_end_date">{{ __('End date') }}</label>
                            <input type="date" class="form-control" id="group_end_date" name="group_end_date" value="" disabled>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Create Board') }}</button>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="alert alert-primary mt-4 font-weight-bold" role="alert">
                                {{ __('To add information cards for the users of this group & board, please save the board first.') }}
                                {{ __('After saving you will get the option to add or edit information cards. Thank you.') }}
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- END create group --}}
</div>

<script>
    $(".select-group-btn input[name='user_group']").change(function () {
        // get selected group id
        let group_id = $(this).val()

        // group data
        axios.get('/api/groups/'+group_id)
        .then(function (response) {
            // console.log(response.data.data)
            let data = response.data.data
            let start_date = data.start_date
            let end_date = data.end_date
            // set srat && end date
            $('#group_start_date').val(start_date)
            $('#group_end_date').val(end_date)
        })
    })
</script>
@endsection
