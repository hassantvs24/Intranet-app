@extends('layouts.app')

@section('body-class', 'user-dashboard body-teal')

@section('content')
    <div class="container">
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
                @if ( count( $cards ) > 1)
                    @foreach ( $cards as $card )
                        <div class="col col-md-4 my-4">
                            <div class="card">
                                <div class="card-header bg-color">
                                    <h3 class="cart-title mb-0 txt-color"> {{ $card->title  }} </h3>
                                </div>
                                <div class="card-body">
                                    {!! $card->html_content !!}
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
@endsection
