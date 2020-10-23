@extends('layouts.app-admin')
@section('body-class', 'bg-light body-primary')
@section('title', 'Edit InfoCards')

@section('admin-content')
    <div class="container-fluid">
        <div class="" style="position: absolute; right: 15px;">
            <a class="btn btn-secondary" href="{{route('preview_board', [app()->getLocale(), $board_id ])}}" target="_blank">{{ __('Preview') }}</a>
        </div>

        <ul id="filter" class="list-unstyled mt-4 d-flex">
            <li class="current mr-3"><a href="#" class="btn btn-outline-primary" data-filter="*"> {{ __('Show All') }} </a></li>
            <li class="mr-3"><a href="#" class="btn btn-outline-primary" data-filter="before"> {{ __('Before') }} </a></li>
            <li class="mr-3"><a href="#" class="btn btn-outline-primary" data-filter="after"> {{ __('After') }} </a></li>
            <li class="mr-3"><a href="#" class="btn btn-outline-primary" data-filter="under"> {{ __('During') }} </a></li>
        </ul>

        <!-- START data cards -->
        <div class="data-cards">
            <div class="row boardgrid" id="data-cards-wrap">
                <input type="hidden" name="board_id" id="board_id" value="{{ $board_id }}">
            </div>
        </div>
        <!-- END data cards -->
    </div>


    {{-- ============= START add new card button ============= --}}
    <button class="btn btn-primary position-fixed shadow-lg pb-4 pr-4 pt-5 pl-5"
            id="add-new-card-btn" data-card-type=""
            data-card-title="" data-card-id="" data-board-id="{{ $board_id }}"
            data-toggle="modal" data-target="#dataAddModal"
            style="right: 0;bottom: 0;z-index: 99; border-radius: 0; border-top-left-radius: 100px;">
        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="25" width="10" height="60" rx="5" fill="white"/>
            <rect x="60" y="25" width="10" height="60" rx="5" transform="rotate(90 60 25)" fill="white"/>
        </svg>
    </button>
    {{-- ============= END add new card button ============= --}}


    <div class="modal right fade" id="dataAddModal" data-keyboard="false" tabindex="-1" aria-labelledby="dataAddModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog">
            <div class="modal-content border-0 px-4">

            <div class="modal-header border-0">
                <h3 class="modal-title" id="dataAddModalLabel">{{ __('Modal title') }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('create_card', [app()->getLocale(), $board_id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="add-card-title">{{ __('Card title') }}</label>
                        <input type="text" class="form-control" id="add-card-title" placeholder="{{ __('Card title') }}" name="card_title" required>
                    </div>

                    <div class="form-group">
                        <label for="add-card-type">{{ __('Card type') }}</label>
                        <select class="form-control" name="card_type" id="add-card-type">
                            <option value="normal">Normal</option>
                            <option value="titles">Title</option>
                            <option value="static">Static</option>
                            <!--<option value="calender">Calender</option>-->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="add-view-type">{{ __('View type') }}</label>
                        <select class="form-control" name="view_type" id="add-view-type">
                            <option value="before"> {{ __('Before') }}</option>
                            <option value="under">{{ __('During') }}</option>
                            <option value="after"> {{ __('After') }} </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="add-visible">{{ __('Visibility') }}</label>
                        <select class="form-control" name="is_visible" id="add-visible">
                            <option value="1">Visible</option>
                            <option value="0">Not Visible</option>
                        </select>
                    </div>

                    <!-- Create the editor container -->
                    <div class="form-group">
                        <label for="add-card-content-form">{{ __('Card content') }}</label>
                        <div method="post" action="#" id="add-card-content-form">
                            <textarea name="html_content" id="add_summernote"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 pb-5">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary save-add-card-data" id="add-modal-save-btn"
                            data-card-title="" data-card-type="" data-card-id="card-1" data-board-id="{{ $board_id }}">
                        {{ __('Save Changes') }}
                    </button>
                </div>
            </form>

            </div>
        </div>
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
                <form action="{{route('update_card', [app()->getLocale(), $board_id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="update_card_id" name="card_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editing-card-title">{{ __('Card title') }}</label>
                            <input type="text" class="form-control" id="editing-card-title" name="card_title" value="Old title goes here">
                        </div>

                        <div class="form-group">
                            <label for="editing-card-type">{{ __('Card type') }}</label>
                            <select class="form-control" name="card_type" id="editing-card-type">
                                <option value="normal">Normal</option>
                                <option value="titles">Title</option>
                                <option value="static">Static</option>
                                <!--<option value="calender">Calender</option>-->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="view-type">{{ __('View type') }}</label>
                            <select class="form-control" name="view_type" id="view-type">
                                <option value="before"> {{ __('Before') }}</option>
                                <option value="under">{{ __('During') }}</option>
                                <option value="after"> {{ __('After') }} </option>
                            </select>
                        </div>

                        <!-- Create the editor container -->
                        <div class="form-group">
                            <label for="card-content-form">{{ __('Card content') }}</label>
                            <div method="post" action="#" id="card-content-form">
                                <textarea name="html_content" id="summernote"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 pb-5">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary save-card-data" id="modal-save-btn"
                                data-card-title="" data-card-type="" data-card-id="card-1" data-board-id="{{ $board_id }}">
                            {{ __('Save Changes') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="calenderform">
                    <div class="modal-header">
                        <h3 id="modalmessage" class="modal-title"></h3>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                        <h4 id="modalTitle" class="modal-title"></h4>
                    </div>
                    <div id="modalBody" class="modal-body">
                        <div class="form-group">
                            <label for=""> {{ __('Event Title') }}: </label>
                            <input type="text" class="form-control" name="event_title" id="event_title" placeholder="{{ __('Event Title') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for=""> {{ __("Event Description") }}: </label>
                            <textarea name="event_description" class="form-control"  id="event_description" cols="15" rows="5" required > </textarea>
                        </div>

                        <div class="form-group">
                            <input type="datetime-local" name="event_start" id="event_start" value="" />
                            <input type="datetime-local" name="event_end" id="event_end" value= "" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> {{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary"> {{ __('Save') }} </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dataPreviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ============= END template for editing cards - modal ============= --}}

    {{-- <div id="csrftoken">@csrf</div> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="{{asset('js/summernote-lite.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/summernote-file.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/demo_insert.js')}}"></script>

    <script>
        $(document).ready(function(){
            /*--------------------------------------------
           Get card data for this board from api request
           --------------------------------------------*/
            let board_id = {{ $board_id }};
            const data_cards_wrap = $("#data-cards-wrap");
            let demo_card_data = demo_insert_data(board_id);

            // demo data for initial cards
            var card_info_init = [];

            // try to fetch cards
            axios.get('/api/cards/?board_id='+ board_id)
            .then(function (response) {
                let cards_data = response.data.data
                if (parseInt(cards_data.length) === 0) {
                    set_default_demo_cards();
                } else {
                    if (! Array.isArray(cards_data)) {
                        cards_data = Object.values(cards_data)
                    }
                    // console.log(cards_data);
                    load_cards_into_dom(cards_data);
                }
            });

            function set_default_demo_cards() {
                demo_card_data.map(card => {
                    axios.post('/api/cards', card)
                    .then(function (response) {
                         //console.log(response.data.data);
                        check_card_type_and_insert_dom(response.data.data)
                    })
                    .catch(function (error) {
                        // console.log(error);
                    });
                })
            }

            // function to laod card data into view
            function load_cards_into_dom(data) {
                // console.log("data exists")
                // console.log(data)
                data.map(function (card) {
                    check_card_type_and_insert_dom(card)
                })
            }
            function check_card_type_and_insert_dom(card) {

                if (card.card_type !== 'calender') {
                    create_normal_card_and_insert_to_dom(card)
                } else {
                    create_calender_card_and_insert_to_dom(card)
                }
            }
            // function to create normal card & insert to dom
            function create_normal_card_and_insert_to_dom(card) {
                let visibility = parseInt(card.is_visible) === 1 ? "checked" : ""
                let contents = card.html_content.replace(/(<([^>]+)>)/gi, "");
                let card_html = `
                    <div class="col col-md-4 my-4 grid-item active ${card.view_type}" id="template-card-${card.id}" data-category="${card.view_type}">
                        <div class="card">
                            <div class="card-header bg-color">
                                <h3 class="cart-title mb-0 txt-color">${card.title}</h3>
                            </div>
                            <div class="card-body" style="height: 200px; overflow-y: auto;" >
                                ${contents.substring(0,300)} <a class="view_more" href="#" title="view more" data-title="${card.title}" data-toggle="modal" data-target="#dataPreviewModal">...</a>
                            </div>


                            <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">
                                <div class="d-inline-block">
                                    <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-view-type="${card.view_type}" data-card-type="${card.card_type}"
                                        data-card-title="${card.title}" data-card-id="${card.id}" data-board-id="${card.board_id}"
                                        data-toggle="modal" data-target="#dataEditModal">
                                        {{ __('Edit') }}
                                    </button>

                                    <div class="html_contents" style="position: absolute; left: -9999px; visibility:hidden; display:none;">${card.html_content}</div>
                            </div>

                <div class="custom-control custom-switch d-inline-block ml-auto">
                    <input type="checkbox" class="custom-control-input visibility_op" id="customSwitch-${card.id}" value="${card.id}" name="is_visible" ${visibility}>
                                    <label class="custom-control-label card-visibility" data-visibility="${card.id}" for="customSwitch-${card.id}">{{ __('Visibility') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>`;
                data_cards_wrap.append(card_html);
            }

            /**----------------------
             * Preview Data on modal
             * ----------------------
             * */


                data_cards_wrap.on('click', '.view_more', function (e) {
                    e.preventDefault();

                    var card_title = $(this).data('title');
                    var htm_con = $(this).parent().next('.card-footer').find('.html_contents').html();

                    $('#dataPreviewModal').find('.modal-title').html(card_title);
                    $('#dataPreviewModal').find('.modal-body').html(htm_con);

                });

            /**----------------------
             * /Preview Data on modal
             * ----------------------
             * */

            // function to create calender card & insert to dom
            function create_calender_card_and_insert_to_dom(card) {
                let card_html = `
                    <div class="col col-md-12 my-4 grid-item active ${card.view_type}" data-category="${card.view_type}">
                        <div class="card">
                            <div class="card-header bg-color">
                                <h3 class="cart-title mb-0 txt-color">${card.title}</h3>
                            </div>

                            <div class="card-body">
                                <div class="card-body__child card-body__child--text">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                data_cards_wrap.append(card_html);
            }
            /*--------------------------------------------
                common dom items or variables
            --------------------------------------------*/
            const data_modal = $("#dataEditModal");




            /*--------------------------------------------
                Edit card Data after editing
            --------------------------------------------*/

            data_cards_wrap.on('click','.btn-edit-card', function () {
                let card_id = $(this).attr('data-card-id');
                let card_type = $(this).attr('data-card-type');
                let view_type = $(this).attr('data-view-type');
                let card_title = $(this).attr('data-card-title');
                let markupStr = $(this).siblings('.html_contents').html();

                if (card_type !== 'calender') {
                    cool_editor.summernote('code', markupStr);
                    $('#update_card_id').val(card_id);
                    $('#editing-card-title').val(card_title);
                    $('#editing-card-type').val(card_type);
                    $('#view-type').val(view_type);
                }

            });

            data_cards_wrap.on('change','.visibility_op', function () {
                var card_id = $(this).val();

                $.get( "{{route('card-visible', [app()->getLocale()])}}?id="+card_id);
            });



          /*  const modal_card_title = $("#editing-card-title");
            const modal_save_btn = $('#modal-save-btn');
            // const edit_card_data_btn = $('.btn-edit-card')
            data_cards_wrap.on('click', '.btn-edit-card', function () {
                // update modal title
                $("#dataEditModalLabel").text("Edit data");
                let card_title = $(this).attr('data-card-title');
                modal_card_title.val(card_title);
                let card_type = $(this).attr('data-card-type');
                let card_id = $(this).attr('data-card-id');
                let board_id = $(this).attr('data-board-id');
                let markupStr = $(this).siblings('.html_contents').html();//$(this).parent().parent().siblings('.card-body').html()

                if (card_type !== 'calender') {
                    modal_save_btn.attr('data-card-title', card_title);
                    modal_save_btn.attr('data-card-type', card_type);
                    modal_save_btn.attr('data-card-id', card_id);
                    modal_save_btn.attr('data-board-id', board_id);
                    cool_editor.summernote('code', markupStr);
                } else {
                    // card type calendar
                    // make save button enabled
                    $(this).next().removeAttr('disabled')
                }
            });*/
            // edit_card_data_btn.click(function () {})
            /*--------------------------------------------
                Save card Data after editing
            --------------------------------------------*/
            /*const save_card_data_btn = $('.save-card-data');

            save_card_data_btn.click(function () {
                let title = $("#editing-card-title").val();
                let card_type = $(this).attr('data-card-type');
                let card_id = $(this).attr('data-card-id');
                let board_id = $(this).attr('data-board-id');
                let is_visible = $(this).attr('data-is-visible');
            });*/
           /* const save_card_data_btn = $('.save-card-data');
            save_card_data_btn.click(function () {
                let title = $("#editing-card-title").val();
                let card_type = $(this).attr('data-card-type');
                let card_id = $(this).attr('data-card-id');
                let board_id = $(this).attr('data-board-id');
                // let is_visible = $(this).attr('data-is-visible')

                if (card_type !== 'calender') {
                    // get html string from editor
                    let html_string_from_editor = cool_editor.summernote('code');
                    // console.log(html_string_from_editor)
                    // save data to database here
                    axios.put('/api/cards/'+card_id, {
                        "title" : title,
                        "html_content" : html_string_from_editor,
                        "board_id" : board_id,
                        "card_type" : card_type
                        // "is_visible" : is_visible,
                    }).then(function (response) {
                        // console.log(response)
                        location.reload(true);
                    })
                    // console.log(card_type, card_id,html_string_from_editor);
                } else {
                    // get json object from calendar widget
                    // save to DB
                }
                // after saving show success message ?
                // or hide modal
                data_modal.modal('hide')
            });*/

        });

        function show_edit_data() {

        }

        /*-------------------------
            handle add new card
        -------------------------*/
        /*$("#add-new-card-btn").click(function () {
            $("#dataEditModalLabel").text("Add new data card")
        })*/


    </script>

    <script type="text/javascript">

        /**-----------------------
         * File Upload in summernote
         * ----------------------
         */

        function myOwnCallBackAdd(file) {
            let data = new FormData();
            data.append("_token", "{{ csrf_token() }}");
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "{{route('infocards.upload', app()->getLocale())}}", //Your own back-end uploader
                cache: false,
                contentType: false,
                processData: false,
                xhr: function() { //Handle progress upload
                    let myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
                    return myXhr;
                },
                success: function(reponse) {
                    if(reponse.status === true) {
                        let listMimeImg = ['image/png', 'image/jpeg', 'image/webp', 'image/gif', 'image/svg'];
                        let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
                        let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
                        let elem;

                        if (listMimeImg.indexOf(file.type) > -1) {
                            //Picture
                            $('#add_summernote').summernote('editor.insertImage', reponse.filename);
                        } else if (listMimeAudio.indexOf(file.type) > -1) {
                            //Audio
                            elem = document.createElement("audio");
                            elem.setAttribute("src", reponse.filename);
                            elem.setAttribute("controls", "controls");
                            elem.setAttribute("preload", "metadata");
                            $('#add_summernote').summernote('editor.insertNode', elem);
                        } else if (listMimeVideo.indexOf(file.type) > -1) {
                            //Video
                            elem = document.createElement("video");
                            elem.setAttribute("src", reponse.filename);
                            elem.setAttribute("controls", "controls");
                            elem.setAttribute("preload", "metadata");
                            $('#add_summernote').summernote('editor.insertNode', elem);
                        } else {
                            //Other file type
                            elem = document.createElement("a");
                            let linkText = document.createTextNode(file.name);
                            elem.appendChild(linkText);
                            elem.title = file.name;
                            elem.href = reponse.filename;
                            $('#add_summernote').summernote('editor.insertNode', elem);
                        }
                    }
                }
            });
        }

        function myOwnCallBack(file) {
            let data = new FormData();
            data.append("_token", "{{ csrf_token() }}");
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "{{route('infocards.upload', app()->getLocale())}}", //Your own back-end uploader
                cache: false,
                contentType: false,
                processData: false,
                xhr: function() { //Handle progress upload
                    let myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
                    return myXhr;
                },
                success: function(reponse) {
                    if(reponse.status === true) {
                        let listMimeImg = ['image/png', 'image/jpeg', 'image/webp', 'image/gif', 'image/svg'];
                        let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
                        let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
                        let elem;

                        if (listMimeImg.indexOf(file.type) > -1) {
                            //Picture
                            $('#summernote').summernote('editor.insertImage', reponse.filename);
                        } else if (listMimeAudio.indexOf(file.type) > -1) {
                            //Audio
                            elem = document.createElement("audio");
                            elem.setAttribute("src", reponse.filename);
                            elem.setAttribute("controls", "controls");
                            elem.setAttribute("preload", "metadata");
                            $('#summernote').summernote('editor.insertNode', elem);
                        } else if (listMimeVideo.indexOf(file.type) > -1) {
                            //Video
                            elem = document.createElement("video");
                            elem.setAttribute("src", reponse.filename);
                            elem.setAttribute("controls", "controls");
                            elem.setAttribute("preload", "metadata");
                            $('#summernote').summernote('editor.insertNode', elem);
                        } else {
                            //Other file type
                            elem = document.createElement("a");
                            let linkText = document.createTextNode(file.name);
                            elem.appendChild(linkText);
                            elem.title = file.name;
                            elem.href = reponse.filename;
                            $('#summernote').summernote('editor.insertNode', elem);
                        }
                    }
                }
            });
        }

        function progressHandlingFunction(e) {
            if (e.lengthComputable) {
                //Log current progress
                console.log((e.loaded / e.total * 100) + '%');

                //Reset progress on complete
                if (e.loaded === e.total) {
                    console.log("Upload finished.");
                }
            }
        }

    </script>

    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {

        });


        $(document).ready(function() {
            $('ul#filter a').click(function() {
                $(this).css('outline','none');
                $('ul#filter .current').removeClass('current');
                $(this).parent().addClass('current');
                // var filterVal = $(this).text().toLowerCase().replace(' ','-');
                var filterVal = $(this).attr('data-filter');
                if(filterVal == '*') {
                    $('div.boardgrid div.hidden').fadeIn('slow').removeClass('hidden');
                } else {

                    $('div.boardgrid div.grid-item').each(function() {
                        if(!$(this).hasClass(filterVal)) {
                            $(this).fadeOut('normal').addClass('hidden');
                        } else {
                            $(this).fadeIn('slow').removeClass('hidden');
                        }
                    });
                }

                return false;
            });
        });

    </script>
    {{-- // ============= template for editing cards - modal ============= --}}


@endsection
