@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Typography</h1>

        <hr>
        <h1 class="display-1">Hello World!!</h1>
        <h1 class="display-2">Hello World!!</h1>
        <h1 class="display-3">Hello World!!</h1>
        <h1 class="display-4">Hello World!!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, at, aut consequatur corporis doloremque dolores ducimus, eius excepturi explicabo facere impedit ipsum iure maiores possimus repellendus sapiente sed unde voluptates?</p>
        <hr>

        <div class="cta">
            <h1>Buttons</h1>
            <a href="#" class="btn btn-primary">Click Here</a>
            <a href="#" class="btn btn-secondary">Click Here</a>
            <a href="#" class="btn btn-outline-primary">Click Here</a>
            <a href="#" class="btn btn-outline-secondary">Click Here</a>
        </div>

        <hr>

        <div class="data-cards">
            <h1>Data Cards</h1>
            <div class="row">
                <!-- START card -->
                <div class="col col-md-4 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="cart-title mb-0">Text or image</h3>
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
                </div>
                <!-- END card -->
                <!-- START card -->
                <div class="col col-md-4 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="cart-title mb-0">Resources & Links</h3>
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
                </div>
                <!-- END card -->
                <!-- START card -->
                <div class="col col-md-4 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="cart-title mb-0">Video</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--video">
                                <iframe width="100%" height="180" src="https://www.youtube.com/embed/L4qM1IEhtNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END card -->
                <!-- START card -->
                <div class="col col-md-8 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="cart-title mb-0">Calender</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--text">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END card -->
                <!-- START card -->
                <div class="col col-md-4 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="cart-title mb-0">Primary contact</h3>
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
                </div>
                <!-- END card -->
            </div>
        </div>
        <!-- END data cards -->
        <hr>

    </div>
@endsection
