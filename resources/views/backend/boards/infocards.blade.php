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
            <div class="row" id="data-cards-wrap">

                {{-- {{ $board_id }}--}}

                <!-- START card -->
{{--                <div class="col col-md-4 my-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header bg-color">--}}
{{--                            <h3 class="cart-title mb-0 txt-color">{{ __('Text or image') }}</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-body__child card-body__child--img">--}}
{{--                                <img class="img-fluid rounded" src="/images/demo-card-image.png" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="card-body__child card-body__child--text">--}}
{{--                                {{ __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque.') }}--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- edit options -->--}}
{{--                        <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">--}}
{{--                            <div class="d-inline-block">--}}
{{--                                <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="normal" data-card-id="card-1" data-board-id="123"--}}
{{--                                    data-toggle="modal" data-target="#dataEditModal">--}}
{{--                                    {{ __('Edit') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                            <div class="custom-control custom-switch d-inline-block ml-auto">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>--}}
{{--                                <label class="custom-control-label" for="customSwitch1">{{ __('Visibility') }}</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- // edit options -->--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- END card -->

                <!-- START card -->
{{--                <div class="col col-md-4 my-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header bg-color">--}}
{{--                            <h3 class="cart-title mb-0 txt-color">Resources & Links</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-body__child card-body__child--links">--}}
{{--                                <ul>--}}
{{--                                    <li><a href="#">How to take a nap?</a></li>--}}
{{--                                    <li><a href="#">Where to find good materials for our business?</a></li>--}}
{{--                                    <li><a href="#">Who to ask if I have questions and concerns</a></li>--}}
{{--                                    <li><a href="#">How to take a nap?</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="card-body__child card-body__child--text">--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{-- edit-options --}}
{{--                        <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">--}}
{{--                            <div class="d-inline-block">--}}
{{--                                <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="normal" data-card-id="card-2" data-board-id="123"--}}
{{--                                    data-toggle="modal" data-target="#dataEditModal">--}}
{{--                                    {{ __('Edit') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                            <div class="custom-control custom-switch d-inline-block ml-auto">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="customSwitch2" checked>--}}
{{--                                <label class="custom-control-label" for="customSwitch2">{{ __('Visibility') }}</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{-- // edit-options --}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- END card -->

                <!-- START card -->
{{--                <div class="col col-md-4 my-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header bg-color">--}}
{{--                            <h3 class="cart-title mb-0 txt-color">Video</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-body__child card-body__child--video">--}}
{{--                                <iframe width="100%" height="180" src="https://www.youtube.com/embed/L4qM1IEhtNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{-- edit-options --}}
{{--                        <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">--}}
{{--                            <div class="d-inline-block">--}}
{{--                                <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="normal" data-card-id="card-3" data-board-id="123"--}}
{{--                                    data-toggle="modal" data-target="#dataEditModal">--}}
{{--                                    {{ __('Edit') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                            <div class="custom-control custom-switch d-inline-block ml-auto">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>--}}
{{--                                <label class="custom-control-label" for="customSwitch3">{{ __('Visibility') }}</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{-- // edit-options --}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- END card -->

                <!-- START card -->
{{--                <div class="col col-md-12 my-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header bg-color">--}}
{{--                            <h3 class="cart-title mb-0 txt-color">{{ __('Calender') }}</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-body__child card-body__child--text">--}}
{{--                                <div id="calendar"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">--}}
{{--                            <div class="d-inline-block">--}}
{{--                                <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="calendar" data-card-id="card-4" data-board-id="123">--}}
{{--                                    {{ __('Edit') }}--}}
{{--                                </button>--}}
{{--                                <button class="btn btn-secondary btn-sm d-inline-block save-card-data" disabled data-card-type="calendar" data-card-id="card-4" data-board-id="123">--}}
{{--                                    {{ __('Save') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                            <div class="custom-control custom-switch d-inline-block ml-auto">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>--}}
{{--                                <label class="custom-control-label" for="customSwitch4">{{ __('Visibility') }}</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
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
                    <label for="editing-card-title">{{ __('Change card title') }}</label>
                    <input type="text" class="form-control" id="editing-card-title" name="card_title" value="Old title goes here">
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
                <button type="button" class="btn btn-primary save-card-data" id="modal-save-btn"
                        data-card-title="" data-card-type="" data-card-id="card-1" data-board-id="123">
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
           Get card data for this board from api request
           --------------------------------------------*/
            let board_id = {{ $board_id }};
            const data_cards_wrap = $("#data-cards-wrap")

            // demo data for initial cards
            let demo_card_data = [
                {
                    "title": "Text or Image",
                    "html_content": '<p><img src="/images/demo-card-image.png" alt=""></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque.</p>',
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }}
                },
                {
                    "title": "Resources & Links",
                    "html_content": '<ul> <li><a href="#">How to take a nap?</a></li> <li><a href="#">Where to find good materials for our business?</a></li> <li><a href="#">Who to ask if I have questions and concerns</a></li> <li><a href="#">How to take a nap?</a></li> </ul><p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet. </p>',
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }}
                },
                {
                    "title": "Video",
                    "html_content": '<iframe width="100%" height="180" src="https://www.youtube.com/embed/L4qM1IEhtNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>',
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }}
                },
                {
                    "title": "Calender",
                    "html_content": 'test',
                    "card_type": "calender",
                    "is_visible": 1,
                    "board_id": {{ $board_id }}
                }
            ]
            // try to fetch cards
            axios.get('/api/cards/?board_id='+ board_id)
            .then(function (response) {
                console.log("card count: " +response.data.data.length)
                if (parseInt(response.data.data.length) === 0) {
                    set_default_demo_cards()
                } else {
                    load_cards_into_dom(response.data.data)
                }
            })

            function set_default_demo_cards() {
                demo_card_data.map(card => {
                    axios.post('/api/cards', card)
                    .then(function (response) {
                        console.log(response.data.data);
                        check_card_type_and_insert_dom(response.data.data)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                })
            }

            // function to laod card data into view
            function load_cards_into_dom(data) {
                // console.log("data exists")
                // console.log(data[0])
                data.map(function (card) {
                    check_card_type_and_insert_dom(card)
                })
            }
            function check_card_type_and_insert_dom(card) {
                if (card.card_type === 'normal') {
                    create_normal_card_and_insert_to_dom(card)
                } else if (card.card_type === 'calender') {
                    create_calender_card_and_insert_to_dom(card)
                }
            }
            // function to create normal card & insert to dom
            function create_normal_card_and_insert_to_dom(card) {
                let visibility = parseInt(card.is_visible) === 1 ? "checked" : ""
                let card_html = `
                    <div class="col col-md-4 my-4" id="template-card-${card.id}">
                        <div class="card">
                            <div class="card-header bg-color">
                                <h3 class="cart-title mb-0 txt-color">${card.title}</h3>
                            </div>
                            <div class="card-body">
                                ${card.html_content}
                            </div>

                            <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">
                                <div class="d-inline-block">
                                    <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="normal"
                                        data-card-title="${card.title}" data-card-id="${card.id}" data-board-id="${card.board_id}"
                                        data-toggle="modal" data-target="#dataEditModal">
                                        {{ __('Edit') }}
                                    </button>
                                </div>

                                <div class="custom-control custom-switch d-inline-block ml-auto">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch-${card.id}" name="is_visible" ${visibility}>
                                    <label class="custom-control-label" for="customSwitch-${card.id}">{{ __('Visibility') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                `
                data_cards_wrap.append(card_html)
            }
            // function to create calender card & insert to dom
            function create_calender_card_and_insert_to_dom(card) {
                let card_html = `
                    <div class="col col-md-12 my-4">
                        <div class="card">
                            <div class="card-header bg-color">
                                <h3 class="cart-title mb-0 txt-color">${card.title}</h3>
                            </div>

                            <div class="card-body">
                                <div class="card-body__child card-body__child--text">
                                    <div id="calendar"></div>
                                </div>
                            </div>

                            <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">
                                <div class="d-inline-block">
                                    <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="${card.card_type}" data-card-id="${card.id}" data-board-id="${card.board_id}">
                                        {{ __('Edit') }}
                                    </button>
                                    <button class="btn btn-secondary btn-sm d-inline-block save-card-data" disabled data-card-type="${card.card_type}" data-card-id="${card.id}" data-board-id="${card.board_id}">
                                        {{ __('Save') }}
                                    </button>
                                </div>

                                <div class="custom-control custom-switch d-inline-block ml-auto">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                                    <label class="custom-control-label" for="customSwitch4">{{ __('Visibility') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                `
                data_cards_wrap.append(card_html)
            }
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
                Edit card Data after editing
            --------------------------------------------*/
            const modal_card_title = $("#editing-card-title")
            const modal_save_btn = $('#modal-save-btn')
            // const edit_card_data_btn = $('.btn-edit-card')
            data_cards_wrap.on('click', '.btn-edit-card', function () {
                let card_title = $(this).attr('data-card-title')
                modal_card_title.val(card_title)
                let card_type = $(this).attr('data-card-type')
                let card_id = $(this).attr('data-card-id')
                let board_id = $(this).attr('data-board-id')
                let markupStr = $(this).parent().parent().siblings('.card-body').html()

                if (card_type === 'normal') {
                    modal_save_btn.attr('data-card-title', card_title)
                    modal_save_btn.attr('data-card-type', card_type)
                    modal_save_btn.attr('data-card-id', card_id)
                    modal_save_btn.attr('data-board-id', board_id)
                    cool_editor.summernote('code', markupStr);
                } else {
                    // card type calendar
                    // make save button enabled
                    $(this).next().removeAttr('disabled')
                }
            })
            // edit_card_data_btn.click(function () {})
            /*--------------------------------------------
                Save card Data after editing
            --------------------------------------------*/
            const save_card_data_btn = $('.save-card-data')
            save_card_data_btn.click(function () {
                let title = $("#editing-card-title").val()
                let card_type = $(this).attr('data-card-type')
                let card_id = $(this).attr('data-card-id')
                let board_id = $(this).attr('data-board-id')
                // let is_visible = $(this).attr('data-is-visible')

                if (card_type === 'normal') {
                    // get html string from editor
                    let html_string_from_editor = cool_editor.summernote('code')
                    console.log(html_string_from_editor)
                    // save data to database here
                    axios.put('/api/cards/'+card_id, {
                        "title" : title,
                        "html_content" : html_string_from_editor,
                        "board_id" : board_id,
                        "card_type" : card_type
                        // "is_visible" : is_visible,
                    }).then(function (response) {
                        console.log(response)
                        location.reload(true);
                    })
                    // console.log(card_type, card_id,html_string_from_editor);
                } else if (card_type === 'calendar') {
                    // get json object from calendar widget
                    // save to DB
                }
                // after saving show success message ?
                // or hide modal
                data_modal.modal('hide')
            })
            // save_card_data_btn.click(function () {})

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
