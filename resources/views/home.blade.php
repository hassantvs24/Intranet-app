@extends('layouts.app')

@section('body-class', 'user-dashboard body-teal')

@section('content')
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
    body.modal-open .modal {
        display: flex !important;
        height: 100%;
        margin-top: 50px;
    }

    body.modal-open .modal .modal-dialog {
        margin: auto;
    }
</style>
@endsection
