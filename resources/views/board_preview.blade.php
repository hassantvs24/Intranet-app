@extends('layouts.app')

@section('body-class', 'user-dashboard body-'.$color)

@section('content')
    {{-- ======================== START new content ======================== --}}
    <div class="container-fluid pb-5">
        <div class="row mt-4" id="cards-layout">
            {{-- =================== first column =================== --}}
            <div id="first-column" class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color">{{ __('This is how you can prepare') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body__child card-body__child--info-btn">
                            @foreach($titles as $row)
                                <h3 onclick="show_contents(this)" class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                    data-toggle="modal" data-target="#newDataPreviewModal">
                                    {{$row->title}}
                                </h3>
                                <div class="html_contents" style="position: absolute; left: -9999px; visibility:hidden; display:none;"> {!! $row->html_content !!}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- =================== second column =================== --}}
            <div id="second-column" class="col-12 col-md-4">


                @foreach($normal as $row)
                    <div class="card"  onclick="show_contents_normal(this)" data-toggle="modal" data-target="#newDataPreviewModal">
                        <div class="card-header bg-color">
                            <h3 class="cart-title mb-0 txt-color">{{$row->title}}</h3>
                        </div>
                        <div class="html_contents" style="position: absolute; left: -9999px; visibility:hidden; display:none;"> {!! $row->html_content !!}</div>
                        <div class="card-body">
                            {!! Str::limit(strip_tags($row->html_content), 300) !!}
                        </div>
                    </div>
                @endforeach


            </div>
            {{-- =================== third column =================== --}}
            <div id="third-column" class="col-12 col-md-4">
                @foreach($static as $row)
                    <div class="card">
                        <div class="card-header bg-color">
                            <h3 class="cart-title mb-0 txt-color">{{$row->title}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--text">
                                {!! $row->html_content !!}
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- START primary contact card --}}
                {{-- this card is visible for all users, with their assigned admin --}}
                <div class="card card--primary-contact">
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color">Primary contact</h3>
                    </div>
                    @php
                        $admin = $contact->get_admin();
                    @endphp
                    <div class="card-body">
                        <div class="card-body__child card-body__child--img">
                            <img class="rounded-circle d-block m-auto" height="100" width="100" src="{{asset($admin->avatar ?? '/images/demo-card-image.png')}}" alt="Avatar">
                        </div>
                        <div class="card-body__child card-body__child--text text-center">
                            <div class="name font-weight-bold">{{$admin->name ?? $contact->name}}</div>
                            <div class="name font-weight-bold">{{$admin->email ?? $contact->email}}</div>
                            <div class="name font-weight-bold">{{$admin->phone ?? $contact->phone}}</div>
                        </div>
                    </div>
                </div>
                {{-- END primary contact card --}}
            </div>
        </div>

        {{-- START calender row --}}
        <div class="row mt-5 mb-5">
            <div class="col mx-auto" style="max-width: 1300px">
                <div class="card">
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color">{{__('Event Calender')}} </h3>
                    </div>
                    <div class="card-body mt-4">
                        <div id="calendar" data-board="{{$board_id}}"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END calender row --}}
    </div>

    {{-- ======== start new content-modal ======== --}}
    <div class="modal fade" id="newDataPreviewModal" tabindex="-1" role="dialog" aria-labelledby="newDataPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close rounded-circle" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="margin-top: -2px;">
                            <svg width="20" height="20" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="42.6777" y="0.251282" width="10" height="60" rx="5" transform="rotate(45 42.6777 0.251282)" fill="white"/>
                                <rect x="49.7487" y="42.6777" width="10" height="60" rx="5" transform="rotate(135 49.7487 42.6777)" fill="white"/>
                            </svg>
                        </span>
                    </button>
                </div>

                <div class="modal-body" id="preview_content">
                    <div class="title">
                        <h3 id="modal_preview_title">Cool title goes here.</h3>
                        <div class="divider"></div>
                    </div>
                    <div class="content" id="modal_preview_body">
                        <img class="img-fluid rounded" src="/images/demo-card-image.png" alt="">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </p><p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ======== END new content-modal ======== --}}
    {{-- ======================== END new content ======================== --}}
@endsection

@section('script')
    <script type="text/javascript">
        /**
         * show content for titles category
         * @param el
         */
        function show_contents(el) {
            var titles = el.innerHTML;
            document.getElementById("modal_preview_title").innerHTML = titles;
            var bodys =  el.nextElementSibling.innerHTML;
            document.getElementById("modal_preview_body").innerHTML = bodys;

        }

        /**
         * show content for titles normal
         * @param e
         */
        function show_contents_normal(e) {
            var titles = e.childNodes[1].childNodes[1].innerHTML;
            document.getElementById("modal_preview_title").innerHTML = titles;
            var bodys =  e.childNodes[3].innerHTML;
            document.getElementById("modal_preview_body").innerHTML = bodys;
        }

    </script>

@endsection

@section('style')
    <style>
        /*body.modal-open .modal {*/
        /*    display: flex !important;*/
        /*    height: 100%;*/
        /*    margin-top: 50px;*/
        /*}*/

        /*body.modal-open .modal .modal-dialog {*/
        /*    margin: auto;*/
        /*}*/
    </style>
@endsection
