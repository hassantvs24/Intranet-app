@extends('layouts.app')

@section('body-class', 'user-dashboard body-teal')

@section('content')
    {{-- ======================== START new content ======================== --}}
    <div class="container-fluid pb-5">
        <div class="row mt-4" id="cards-layout">
            {{-- =================== first column =================== --}}
            <div id="first-column" class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color">This is how you can prepare</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body__child card-body__child--info-btn">
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Trening
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Kartlegging
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Trening
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Kartlegging
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Trening
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Kartlegging
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Trening
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Kartlegging
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Trening
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Kartlegging
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Trening
                            </h3>
                            <h3 class="cart-title text-center bg-color-light px-2 py-3 rounded"
                                data-toggle="modal" data-target="#newDataPreviewModal">
                                Kartlegging
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            {{-- =================== second column =================== --}}
            <div id="second-column" class="col-12 col-md-4">
                <div class="card" data-toggle="modal" data-target="#newDataPreviewModal">
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color">Text or image</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body__child card-body__child--img">
                            <img class="img-fluid rounded" src="/images/demo-card-image.png" alt="">
                        </div>
                        <div class="card-body__child card-body__child--text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </div>
                    </div>
                </div>

                <div class="card" data-toggle="modal" data-target="#newDataPreviewModal">
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color">Text or image</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body__child card-body__child--text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </div>
                    </div>
                </div>
            </div>
            {{-- =================== third column =================== --}}
            <div id="third-column" class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color">Text or image</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body__child card-body__child--text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color">Text or image</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body__child card-body__child--text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                        </div>
                    </div>
                </div>
                {{-- START primary contact card --}}
                {{-- this card is visible for all users, with their assigned admin --}}
                <div class="card card--primary-contact">
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color">Primary contact</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body__child card-body__child--img">
                            <img class="rounded-circle d-block m-auto" height="100" width="100" src="/images/demo-card-image.png" alt="">
                        </div>
                        <div class="card-body__child card-body__child--text text-center">
                            <div class="name font-weight-bold">Contact Name</div>
                            <div class="name font-weight-bold">email@domain.com</div>
                            <div class="name font-weight-bold">+8801994961651</div>
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
                        <h3 class="cart-title mb-0 txt-color"> Calculator </h3>
                    </div>
                    <div class="card-body mt-4">
                        <div id="calendar"></div>
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
                        <h3>Cool title goes here.</h3>
                        <div class="divider"></div>
                    </div>
                    <div class="content">
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

    {{-- hiding old content --}}
    @if(0)
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{--<h1>{{ __('Dashboard') }}</h1>
                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    {{ __('You are logged in!') }}
                </div>--}}
            </div>
        </div>
        <!-- START data cards -->
        <div class="data-cards">
            <div class="row">
                @if( !@empty ( auth()->user()->group->boards ) )
                    <input type="hidden" name="board_id" id="board_id" value="{{ auth()->user()->group->boards->id }}" />
                @endif

                @if ( count( $cards ) > 0 )
                    @foreach ( $cards as $card )
                        @if ( $card->card_type == 'normal')
                            <div class="col col-md-4 my-4">
                        @elseif ( $card->card_type == 'calender')
                            <div class="col col-md-12 my-12">
                        @endif
                                <div class="card">
                                    <div class="card-header bg-color">
                                        @if($card->card_type == 'calender')
                                            <h3 class="cart-title mb-0 txt-color"> {{ $card->title  }} </h3>
                                            @else
                                            <h3 class="cart-title mb-0 txt-color" id="preview_ac" onclick="show_contents(this)" style="cursor: pointer; display: block;" data-toggle="modal" data-target="#dataPreviewModal"> {{ $card->title  }} </h3>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        @if ( $card->card_type == 'normal')
                                            {!! $card->html_content !!}
                                        @elseif ( $card->card_type == 'calender')
                                            <div id="calendar"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endif
                <!-- START card -->
{{--                 <div class="col col-md-4 my-4">
                    <div class="card">
                        <div class="card-header bg-color">
                            <h3 class="cart-title mb-0 txt-color">Text or image</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--img">
                                <img class="img-fluid rounded" src="/images/demo-card-image.png" alt="">
                            </div>
                            <div class="card-body__child card-body__child--text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque, praesentium reiciendis sed voluptatem! Delectus laborum non provident quo tenetur velit?
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END card -->
                <!-- START card -->
{{--                 <div class="col col-md-4 my-4">
                    <div class="card">
                        <div class="card-header bg-color">
                            <h3 class="cart-title mb-0 txt-color">Resources & Links</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--links">
                                <ul>
                                    <li><a href="#">How to take a nap?</a></li>
                                    <li><a href="#">Where to find good materials for our business?</a></li>
                                    <li><a href="#">Who to ask if I have questions and concerns</a></li>
                                    <li><a href="#">How to take a nap?</a></li>
                                </ul>
                            </div>
                            <div class="card-body__child card-body__child--text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet.
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END card -->
                <!-- START card -->
{{--                 <div class="col col-md-4 my-4">
                    <div class="card">
                        <div class="card-header bg-color">
                            <h3 class="cart-title mb-0 txt-color">Video</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--video">
                                <iframe width="100%" height="180" src="https://www.youtube.com/embed/L4qM1IEhtNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END card -->
                <!-- START card -->
{{--                 <div class="col col-md-8 my-4">
                    <div class="card">
                        <div class="card-header bg-color">
                            <h3 class="cart-title mb-0 txt-color">Calender</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--text">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END card -->
                <!-- START card -->
{{--                 <div class="col col-md-4 my-4">
                    <div class="card">
                        <div class="card-header bg-color">
                            <h3 class="cart-title mb-0 txt-color">Primary contact</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--img">
                                <img class="rounded-circle d-block m-auto" height="100" width="100" src="/images/demo-card-image.png" alt="">
                            </div>
                            <div class="card-body__child card-body__child--text text-center">
                                <div class="name font-weight-bold">Contact Name</div>
                                <div class="name font-weight-bold">email@domain.com</div>
                                <div class="name font-weight-bold">+8801994961651</div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END card -->

            </div>
        </div>
        <!-- END data cards -->
    </div>
        <div class="row">
            <div class="col">
                <div class="modal fade" id="dataPreviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="preview_title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="preview_content" style="overflow-y: auto; max-height: 500px;">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    @endif
@endsection

@section('script')
    <script type="text/javascript">
        function show_contents(el) {
            var titles = el.innerHTML;
            document.getElementById("preview_title").innerHTML = titles;

           var paren =  el.parentElement;


            var bodys = paren.nextElementSibling.innerHTML;
            document.getElementById("preview_content").innerHTML = bodys;

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
