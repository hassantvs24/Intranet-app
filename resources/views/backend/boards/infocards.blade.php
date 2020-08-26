@extends('layouts.app-admin')
@section('body-class', 'bg-light body-primary')
@section('title', 'Edit InfoCards')

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
                                <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="normal" data-card-id="card-1" data-board-id="123" 
                                    data-toggle="modal" data-target="#dataEditModal">
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
                                <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="normal" data-card-id="card-2" data-board-id="123"
                                    data-toggle="modal" data-target="#dataEditModal">
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
                                <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="normal" data-card-id="card-3" data-board-id="123" 
                                    data-toggle="modal" data-target="#dataEditModal">
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
                                <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="calendar" data-card-id="card-4" data-board-id="123">
                                    {{ __('Edit') }}
                                </button>
                                <button class="btn btn-secondary btn-sm d-inline-block save-card-data" disabled data-card-type="calendar" data-card-id="card-4" data-board-id="123">
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
    <div class="modal right fade" id="dataEditModal" data-keyboard="false" tabindex="-1" aria-labelledby="dataEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog">
            <div class="modal-content border-0 px-4">

            <div class="modal-header border-0">
                <h3 class="modal-title" id="dataEditModalLabel">{{ __('Modal title') }}</h3>
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
                <div class="form-group">
                    <label for="card-content-form">{{ __('Card content') }}</label>
                    <div method="post" action="#" id="card-content-form">
                        <div id="summernote"></div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0 pb-5">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="button" class="btn btn-primary save-card-data" id="modal-save-btn" data-card-type="" data-card-id="card-1" data-board-id="123">
                    {{ __('Save Changes') }}
                </button>
            </div>

            </div>
        </div>
    </div>
    {{-- ============= END template for editing cards - modal ============= --}}

    {{-- <div id="csrftoken">@csrf</div> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function(){
            /*--------------------------------------------
                common dom items or variables
            --------------------------------------------*/
            const data_modal = $("#dataEditModal")

            /*--------------------------------------------
                Initalize text editor
            --------------------------------------------*/
            const cool_editor = $('#summernote')

            cool_editor.summernote({
                height: 200,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video']],
                ]
            });

            /*--------------------------------------------
            Get card data for this board from api request
            --------------------------------------------*/
            // afeter api req example data 
            let result = {
                "card-1": {
                    "type": "normal",
                    "title": "Text or Image",
                    "data": '<div class="card-body__child card-body__child--img"><img class="img-fluid rounded" src="/images/demo-card-image.png" alt=""></div><div class="card-body__child card-body__child--text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque.</div>'
                },
                "card-2": {
                    "type": "normal",
                    "title": "Resources & Links",
                    "data": '<div class="card-body__child card-body__child--links"> <ul> <li><a href="#">How to take a nap?</a></li> <li><a href="#">Where to find good materials for our business?</a></li> <li><a href="#">Who to ask if I have questions and concerns</a></li> <li><a href="#">How to take a nap?</a></li> </ul> </div><div class="card-body__child card-body__child--text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet. </div>'
                },
                "card-3": {
                    "type": "normal",
                    "title": "Video",
                    "data": '<iframe width="100%" height="180" src="https://www.youtube.com/embed/L4qM1IEhtNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>'
                },
                "card-4": {
                    "type": "calendar",
                    "title": "Calender",
                    "data": '<iframe width="100%" height="180" src="https://www.youtube.com/embed/L4qM1IEhtNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>'
                }
            }
            /*--------------------------------------------
                Edit card Data after editing
            --------------------------------------------*/
            const edit_card_data_btn = $('.btn-edit-card')
            const modal_save_btn = $('#modal-save-btn')
            edit_card_data_btn.click(function () {
                let card_type = $(this).attr('data-card-type')
                let card_id = $(this).attr('data-card-id')
                let board_id = $(this).attr('data-board-id')
                if (card_type === 'normal') {
                    modal_save_btn.attr('data-card-type', card_type)
                    modal_save_btn.attr('data-card-id', card_id)
                    modal_save_btn.attr('data-board-id', board_id)
                }
            })
            /*--------------------------------------------
                Save card Data after editing
            --------------------------------------------*/
            const save_card_data_btn = $('.save-card-data')
            save_card_data_btn.click(function () {
                let card_type = $(this).attr('data-card-type')
                let card_id = $(this).attr('data-card-id')
                let board_id = $(this).attr('data-board-id')
                
                if (card_type === 'normal') {
                    // get html string from editor
                    let html_string_from_editor = cool_editor.summernote('code')
                    // save data to database here
                    console.log(card_type, card_id,html_string_from_editor);
                } else if (card_type === 'calendar') {
                    // get json object from calendar widget
                    // save to DB
                }
                // after saving show success message ?
                // or hide modal
                // data_modal.modal('hide')
            })

            // get html from editor
            // let markupStr = cool_editor.summernote('code');

            // If you initialize multiple editor, You can get the HTML content of the second summernote with jQuery eq.
            // var markupStr = $('.summernote').eq(1).summernote('code');

            // set code inside editor
            // var markupStr = 'hello world';
            // cool_editor.summernote('code', markupStr);
        });
    </script>
    {{-- // ============= template for editing cards - modal ============= --}}
@endsection
