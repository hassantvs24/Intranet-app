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
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
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
                        {{-- edit-options --}}
                        <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">
                            <div class="d-inline-block">
                                <button class="btn btn-outline-primary btn-sm d-inline-block" id="btn-edit-group" data-toggle="modal" data-target="#staticBackdrop">
                                    {{ __('Edit') }}
                                </button>
                            </div>

                            <div class="custom-control custom-switch d-inline-block ml-auto">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2" checked>
                                <label class="custom-control-label" for="customSwitch2">{{ __('Visibility') }}</label>
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
                            <h3 class="cart-title mb-0 txt-color">Video</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--video">
                                <iframe width="100%" height="180" src="https://www.youtube.com/embed/L4qM1IEhtNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                <label class="custom-control-label" for="customSwitch3">{{ __('Visibility') }}</label>
                            </div>
                        </div>
                        {{-- // edit-options --}}
                    </div>
                </div>
                <!-- END card -->

                <!-- START card -->
                <div class="col col-md-12 my-4">
                    <div class="card">
                        <div class="card-header bg-color">
                            <h3 class="cart-title mb-0 txt-color">{{ __('Calender') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body__child card-body__child--text">
                                <div id="calendar"></div>
                            </div>
                        </div>

                        {{-- edit-options --}}
                        <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">
                            <div class="d-inline-block">
                                <button class="btn btn-outline-primary btn-sm d-inline-block" id="edit-calender-btn">
                                    {{ __('Edit') }}
                                </button>
                                <button class="btn btn-secondary btn-sm d-inline-block" id="save-calender-btn" disabled>
                                    {{ __('Save') }}
                                </button>
                            </div>

                            <div class="custom-control custom-switch d-inline-block ml-auto">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                                <label class="custom-control-label" for="customSwitch4">{{ __('Visibility') }}</label>
                            </div>
                        </div>
                        {{-- // edit-options --}}
                    </div>
                </div>
                <!-- END card -->

            </div>
        </div>
        <!-- END data cards -->
    </div>

    {{-- ============= template for editing cards - modal ============= --}}
    <div class="modal right fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog">
            <div class="modal-content border-0 px-4">

            <div class="modal-header border-0">
                <h3 class="modal-title" id="staticBackdropLabel">{{ __('Modal title') }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="">{{ __('Change card title') }}</label>
                    <input type="text" class="form-control" name="card_title" value="Old title goes here">
                </div>

                <!-- Create the editor container -->
                <form method="post" action="#" id="card-content-form">
                    <textarea id="summernote" name="editordata" class="form-control"></textarea>
                </form>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="button" class="btn btn-primary">{{ __('Save Changes') }}</button>
            </div>

            </div>
        </div>
    </div>

    {{-- ====== template - modal - primary contact ====== --}}
    <div id="primary-contact-edit-template" class="template">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <label for=""></label>
                            <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- // ====== template - modal - primary contact ====== --}}

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        (function($) {
            $('#summernote').summernote({
                height: 200,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        })(jQuery);
    </script>
    {{-- // ============= template for editing cards - modal ============= --}}
@endsection
