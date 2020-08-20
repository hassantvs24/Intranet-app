@extends('layouts.app-admin')
@section('body-class', 'bg-light body-primary')

@section('admin-content')
    {{-- show cards here --}}
    {{-- pull card data from database, if doesnt exist, set defaults --}}
    {{-- save card data to database --}}
    <div class="container">
        <!-- START data cards -->
        <div class="data-cards">
            <div class="row">
                <!-- START card -->
                <div class="col col-md-4 my-4">
                    <div class="card">
                        <div class="card-header bg-color">
                            <h3 class="cart-title mb-0 txt-color">{{ __('Text or image') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--img">
                                <img class="img-fluid rounded" src="/images/demo-card-image.png" alt="">
                            </div>
                            <div class="card-body__child card-body__child--text">
                                {{ __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque.') }}
                            </div>
                        </div>

                        {{-- edit-options --}}
                        <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">
                            <div class="d-inline-block">
                                <button class="btn btn-outline-primary btn-sm d-inline-block" id="btn-edit-group" data-toggle="modal" data-target="#staticBackdrop">
                                    {{ __('Edit') }}
                                </button>
                            </div>

                            <div class="custom-control custom-switch d-inline-block ml-auto">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">{{ __('Visibility') }}</label>
                            </div>
                        </div>
                        {{-- // edit-options --}}
                    </div>
                </div>
                <!-- END card -->
                <!-- START card -->
                <div class="col col-md-4 my-4">
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
                </div>
                <!-- END card -->
                <!-- START card -->
                <div class="col col-md-4 my-4">
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
                </div>
                <!-- END card -->
                <!-- START card -->
                <div class="col col-md-8 my-4">
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
                </div>
                <!-- END card -->
                <!-- START card -->
                <div class="col col-md-4 my-4">
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
                </div>
                <!-- END card -->
            </div>
        </div>
        <!-- END data cards -->
    </div>

    {{-- ============= template for editing cards - modal ============= --}}
    <!-- Include stylesheet Quills -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0 px-4">

            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">{{ __('Modal title') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <!-- Create the editor container -->
                <div id="editorjs">
                    <p>Hello World!</p>
                    <p>Some initial <strong>bold</strong> text</p>
                    <p><br></p>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div>

          </div>
        </div>
      </div>

      <script src="{{ asset('js/editor.js') }}"></script>
      <script>
          const editor = new EditorJS();
      </script>

    {{-- // ============= template for editing cards - modal ============= --}}
@endsection
