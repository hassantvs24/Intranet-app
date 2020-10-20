@extends('layouts.app-admin')
@section('body-class', 'bg-light body-primary')
@section('title', 'Edit InfoCards')

@section('admin-content')
    <div class="container-fluid">
        <div class="" style="position: absolute; right: 15px;">
            <a class="btn btn-secondary" href="{{route('main', app()->getLocale())}}">{{ __('Preview') }}</a>
        </div>

        <ul id="filter" class="list-unstyled mt-4 d-flex">
            <li class="current mr-3"><a href="#" class="btn btn-outline-primary" data-filter="*"> {{ __('Show All') }} </a></li>
            <li class="mr-3"><a href="#" class="btn btn-outline-primary" data-filter="before"> {{ __('Before') }} </a></li>
            <li class="mr-3"><a href="#" class="btn btn-outline-primary" data-filter="after"> {{ __('After') }} </a></li>
            <li class="mr-3"><a href="#" class="btn btn-outline-primary" data-filter="under"> {{ __('During') }} </a></li>
        </ul>

        <!-- START data cards -->
        <div class="data-cards">
{{--             <div class="button-group filter-button-group">
              <button data-filter="*"> {{ __('Show All') }}</button>
              <button data-filter=".before"> {{ __('Before') }}</button>
              <button data-filter=".after"> {{ __('After') }}</button>
              <button data-filter=".under">{{ __('During') }} </button>
            </div> --}}
            <div class="row boardgrid" id="data-cards-wrap">
                <input type="hidden" name="board_id" id="board_id" value="{{ $board_id }}">
            </div>
        </div>
        <!-- END data cards -->
    </div>


    {{-- ============= START add new card button ============= --}}
    <button class="btn btn-primary position-fixed shadow-lg pb-4 pr-4 pt-5 pl-5"
            id="add-new-card-btn" data-card-type=""
            data-card-title="" data-card-id="" data-board-id=""
            data-toggle="modal" data-target="#dataEditModal"
            style="right: 0;bottom: 0;z-index: 99; border-radius: 0; border-top-left-radius: 100px;">
        <svg width="30" height="30" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="25" width="10" height="60" fill="white"/>
            <rect x="60" y="25" width="10" height="60" transform="rotate(90 60 25)" fill="white"/>
        </svg>
    </button>
    {{-- ============= END add new card button ============= --}}

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
                    <label for="editing-card-title">{{ __('Card title') }}</label>
                    <input type="text" class="form-control" id="editing-card-title" name="card_title" value="Old title goes here">
                </div>

                <div class="form-group">
                    <label for="editing-card-type">{{ __('Card type') }}</label>
{{--                    <input type="text" class="form-control" id="editing-card-type" name="card_type" value="">--}}
                    <select class="form-control" name="card_type" id="editing-card-type">
                        <option value="normal" selected>Normal</option>
                        <option value="normal">Calender</option>
                    </select>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script type="text/javascript" src="{{asset('js/summernote-file.js')}}"></script>

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
                    "title": "Slik kan du førebu deg",
                    "html_content": `<ul>
                        <li> Trening </li>
                        <li> Kartlegging </li>
                        <li> Pakkeliste </li>
                        <li> Permisjon og besøk? </li>
                        <li> Reiseplanleggjar </li>
                        <li> Vanlege spørsmål og svar </li>
                    </ul>
                    `,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "Velkomen til AiR!",
                    "html_content": `
                    <p> Du har no fått plass ved Rehabiliteringssenteret AiR. Her driv vi med arbeidsretta rehabilitering. Det
                    betyr at arbeid er hovudmålet i behandlinga, fordi vi meiner at arbeid er helsebringande.
                    Hos oss er du ein deltakar. Det betyr at det er du som er i førarsetet.
                    Når det nærmar seg oppghaldet vil du få tildelt ein primærkontakt, som er din kontaktperson inn mot
                    det tverrfaglege teamet som er der for å hjelpe deg. </p>
                    <p> Behandlinga ved AiR er gruppebasert. Du kjem hit saman med 16 andre. Vanlegvis er det eit fleirtal
                    kvinner, og gjennomsnittsalderen er 43 år.Enkelte har muskel- og skjelettplagar, andre lettare
                    psykiske lidingar, dei fleste har fleire og samansette plager.Felles for alle er at det dei slit med hindrar dei i å
                    vere i arbeid.</p>
                    <div class="card-header bg-color">
                        <h3 class="cart-title mb-0 txt-color"> Timeplanen (grovmaska) </h3>
                    </div>
                    <p> Ankomstveka: Kartlegging, bli kjend med gruppa
                    og anlegget, fysisk aktivitet Veke 1: Fysisk aktivitet, kognitiv
                    tilnærming, plan for opphaldet, temadag arbeid, kosthald, riding (for dei som vil) </p>
                    `,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "XX dagar att til opphaldet startar",
                    "html_content": `<p> Velkomen til AiR I denne videoen får du eit innblikk i kva som kan møte deg i dei 4 vekene ved AiR. </p>
                    <iframe width="100%" height="180" src="https://www.youtube.com/embed/SXYsbwH6YFI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p> Telemarksvingjen Å løyse utfordringar i livet krev samspel mellom kropp og sjel.</p>
                    <iframe width="100%" height="180" src="https://www.youtube.com/embed/nNXHvncx8ug" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p> AiR sett frå lufta </p>
                    <iframe width="100%" height="180" src="https://www.youtube.com/embed/DSlJeDY9B9c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p> Velkomen til Rauland!
                    Rauland er ei fjellbygd, 800 meter over havet, i Vest-Telemark. Under opphaldet ditt her vil dubli nærare kjend med nærområdet, i
                    aktivitetane vi tilbyr. Du får også fritid der dukan utforske området, aleine eller kanskje saman med nokon på gruppa di.
                    Sjekk alle muligheitene på Visit Rauland sine nettsider. </p>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "Kartlegging",
                    "html_content": `<p> Den første veka er sett av til kartlegging.
                    Det er ønskeleg at du sjølvogså set av tid til å tenkje gjennom kva du vil ha fokus på dei fire vekene du er her.
                    Vi har laga to oppgåver til deg som kan bidra til at du kjem i gang med dette arbeidet på eiga hand. </p>
                    <p> Oppgåve 1: «Slik står eg no» </p>
                    <p> Dette er ei oppgåve der me inviterer til at du kan sjå på ulike sider ved
                    livssituasjonen din som påverkar / kan påverke arbeidshelsa di.Fargelegg/skriv fargen i dei ulike
                    områda i skoen: Klikk for å legge til tekst
                    Grønt: «Det går greit»
                    Gult: «Det skurrar litt»
                    Raudt: «Her er det eit problem»
                    </p>
                    <p> Oppgåve 2: «Sol» </p>
                    <p> Denne oppgåva er tenkt å bidra til at du og teamet lettare kan finne fram til kva for område det er viktig
                    at vi saman har fokus på dei fire vekene du skal vere her hjå oss. Les den ufullstendige setninga midt
                    i sola under inni deg og skriv resten av setninga på strekane. </p>
                    `,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "before"
                },
                {
                    "title": "Permisjon og besøk?",
                    "html_content": `<p> Permisjon i helgene Fyrste helg i opphaldet kan du ta permisjon frå
                    laurdag kl. 12.00. Dei andre helgene kan du ta permisjon frå fredag kl. 15.30, og du må vere
                    tilbake til trening/undervisning måndag morgon kl. 08.30.
                    Utover dette blir det ikkje gjeve permisjonar utan at du har heilt spesiell grunn. Slik grunn
                    kan til dømes vera alvorleg sjukdom eller dødsfall i familie, gravferd eller avtaler med
                    offentleg kontor som krev personleg frammøte.Spørsmål om permisjon tek du opp medteamleiaren i så god tid som mogleg. </p>
                    <p> Besøk av vener og familie Det er for tida, pga koronarestriksjonar, ikkje
                    høve til å ta i mot besøk av familie og vener inne på AiR sitt område. </p>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "before"
                },
                {
                    "title": "Pakkeliste?",
                    "html_content": `<p> Dette må du ha med: </p>
                    <ul>
                        <li> Dine eigne, faste medisinar for heile opphaldet </li>
                        <li> Aktuelle røntgenrapportar (du treng ikkje røntgenbiletet) </li>
                        <li> Badetøy, treningstøy og joggesko til innebruk </li>
                        <li> Joggesko, fjellsko/gummistøvlar </li>
                        <li> Tøy og sko du eventuelt kan ri i </li>
                        <li> Turkopp, liten tursekk og eventuelt termos </li>
                    </ul>
                    <p> Det kan også vere lurt å ha med: </p>
                    <ul>
                        <li> Musikkinstrument og hobbyutstyr </li>
                        <li> Ei god bok </li>
                        <li> PC og vekkeklokke </li>
                        <li> Spinningsko og sykkelshorts </li>
                    </ul>
                    <p> Du treng ikkje: </p>
                    <ul>
                        <li> Sengetøy </li>
                        <li> Handdukar </li>
                    </ul>
                    `,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "before"
                },
                {
                    "title": "Trening",
                    "html_content": `<p>Du kan kome til oss nett slik du er.
                    For å få endå betre utbyte av opphaldet kan det likevel vere fint å starte litt på treninga allereie no.
                    Videosnuttar: For deg som ikkje beveger deg så mykje til vanleg For deg som er i normalt god form
                    For deg som føler deg sprek I løpet av opphaldet vil du bli kjend med mange måtar å kome i betre form på, og halde formen ved like.
                    Har du spesielle plagar vil vi hjelpe deg med å finne fram til gode øvingar som gjer at du kan meistre dei
                    best mogleg.
                    Du vil også få innblikk i ulike metodar for mental trening, mellom anna mindfullness.</p>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "before"
                },
                {
                    "title": "Reiseplanleggjar",
                    "html_content": `<p> No i Koronatida oppmodar vi om å reise med privatbil.
                    Du finn oss her:
                    Haddlandsvegen 20
                    3864 Rauland
                    (link til googlemaps)
                    Viss du kjem med offentleg transport:
                    Haukeliekspressen stoppar i Åmot (link til Haukeliekspressen )
                    Derifrå kan du ta lokalbuss til Rauland ( link til telemarkbil.no ) </p>
                    <p>
                    Reiseutgifter
                    Reiseutgifter til og fra AiR-klinikk (ankomst og
                    avreise) blir dekt av Pasientreiser. Reise må
                    skje på billigaste måte med offentleg transport.
                    Du betalar eigenandel som blir trekt frå beløpet
                    du legg ut. Har du spesielle behov, les
                    Pasientreiser sine reglar for bruk av privat bil.
                    </p>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "before"
                },
                {
                    "title": "Vanlege spørsmål og svar",
                    "html_content": `<p>Får eg eige rom?</p>
                    <ul>
                        <li> Du får tildelt enkeltrom med bad og wc. Dette vil vera ditt rom gjennom heile opphaldet. </li>
                        <li> Handkle og sengetøy får du låne her. </li>
                        <li> Det er radio og hårtørkar på alle rom. </li>
                        <li> Du har ansvar for reinhald og orden i ditt rom, men vil få god informasjon om rutiner og kvar du
                        finn vaskeutstyr når du kjem hit. </li>
                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>
                        <li> Det er kun tilgang til internett og TV i fellesareala. </li>
                    </ul>
                    <p> Kan eg vaske klede når eg er der? </p>
                    <ul>
                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>
                    </ul>
                    <p> Korleis er maten og måltida? </p>
                    <ul>
                        <li>
                            Kjøkenet vårt serverer frukost, lunsj, mellommåltid
                            og middag i spisesalen kvar dag (bortsett frå
                            onsdag, laurdag og sundag då alle smører seg
                            lunsj-niste ved frukost). I tillegg blir det servert eit
                            enkelt mellommåltid kvar ettermiddag.
                        </li>

                        <li> Dersom det vert lagt fram legeattest tilpassar me
                        kosten for dei som har spesielle behov. Ta i så fall
                        kontakt med oss før du kjem. Me kan og tilby
                        vegetarkost, men diverre ikkje Vegan og Foodmap. </li>
                    </ul> `,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "before"
                },
                {
                    "title": "Undervisning",
                    "html_content": `<ul>
                        <li> Dagens undervisning tilgjengeleg på nett (video, streaming)</li>
                        <li> Tidlegare undervisning tilgjengeleg </li>
                        <li> Vil du trene litt ekstra? </li>
                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>
                        <li> xxxxx </li>
                    </ul>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "Melding frå primærkontakten",
                    "html_content": `<ul>
                        <li> Timeplan i dag </li>
                        <li> <p> Grunntimeplan som eiga fil </p> </li>
                        <li> Timeplan denne veka </li>
                    </ul>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)",
                    "html_content": `<ul>
                        <li> Som "FØR" </li>
                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>
                    </ul>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)",
                    "html_content": `<ul>
                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>
                    </ul>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "Undervisning",
                    "html_content": `<ul>
                        <li> Dagens undervisning tilgjengeleg på nett (streaming) </li>
                        <li> Tidlegare undervisning tilgjengeleg (video) </li>
                        <li> Vil du trene litt ekstra? </li>
                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>
                        <li> Kosthald </li>
                    </ul>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "Neste oppfølging frå AiR",
                    "html_content": `<p> Då du reiste frå AiR fekk du tilbod om oppfølging.
                    Neste oppfølging for deg blir: </p>
                    <ul>
                        <li> Oppfølgingsprogram </li>
                    </ul>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "Treningsdagbok",
                    "html_content": `
                    <ul>
                        <li> Plan for arbeid / oppfølging </li>
                        <li> Som "FØR" </li>
                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>
                    </ul>`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
                {
                    "title": "Kosthald",
                    "html_content": `<p> Film: Meir enn raspa grønsaker
                    I boka «Meir enn berre raspa gulrøter!» finn du
                    oppskrifter på mange fargeglade og smaksrike
                    vegetarretter frå AiR-kjøkenet.
                    Kjøkenet her på huset kombinerer både grønsaker, kjøt
                    og fisk i menyane sine, men det kan vera spennande å
                    gjere ein vegetar-vri som variasjon.
                    Mange trur nok at vegetarrettar krev ukjende og
                    vanskelege råvarer å få tak i, men slik treng det ikkje å
                    vera.</p>
                    <p>– I boka har me har lagt vekt på å bruke heilt enkle
                    råvarer som du kan kjøpe i vanlege matbutikkar.
                    – Sjølv om ein har eit vanleg kosthald, kan det vera
                    spennande å prøve vegetarretter av og til. I boka har me difor sett saman oppskrifter du kan bruke både til
                    frukost, middag og mellommåltid.</p>
                    <p> Slik skaffar du deg boka
                    Kjøp den i resepsjonen, eller bestill boka på e-post
                    til tinging@air.no Prisen er kr 230,- + evt. porto.
                    Du kan få tilsendt faktura eller betale med Vipps til 565748. </p>"`,
                    "card_type": "normal",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "after"
                },
                {
                    "title": "Calender",
                    "html_content": 'test',
                    "card_type": "calender",
                    "is_visible": 1,
                    "board_id": {{ $board_id }},
                    "view_type": "under"
                },
            ];
            var card_info_init = [];
            // try to fetch cards
            axios.get('/api/cards/?board_id='+ board_id)
            .then(function (response) {
                let cards_data = response.data.data
                if (parseInt(cards_data.length) === 0) {
                    set_default_demo_cards()
                } else {
                    if (! Array.isArray(cards_data)) {
                        cards_data = Object.values(cards_data)
                    }
                    // console.log(cards_data);
                    load_cards_into_dom(cards_data)
                }
            })

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

                if (card.card_type === 'normal') {
                    create_normal_card_and_insert_to_dom(card)
                } else if (card.card_type === 'calender') {
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
                                ${contents.substring(0,300)} <a class="view_more" href="#" title="view more" data-toggle="modal" data-target="#dataPreviewModal">...</a>
                            </div>


                            <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">
                                <div class="d-inline-block">
                                    <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="normal"
                                        data-card-title="${card.title}" data-card-id="${card.id}" data-board-id="${card.board_id}"
                                        data-toggle="modal" data-target="#dataEditModal">
                                        {{ __('Edit') }}
                                    </button>

                                    <div class="html_contents" style="position: absolute; left: -9999px; visibility:hidden; display:none;">${card.html_content}</div>
                            </div>

                <div class="custom-control custom-switch d-inline-block ml-auto">
                    <input type="checkbox" class="custom-control-input" id="customSwitch-${card.id}" name="is_visible" ${visibility}>
                                    <label class="custom-control-label card-visibility" data-visibility="${card.id}" for="customSwitch-${card.id}">{{ __('Visibility') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                `
                data_cards_wrap.append(card_html);
                preview_modal_data();
            }

            /**----------------------
             * Preview Data on modal
             * ----------------------
             * */
            function preview_modal_data() {

                $('.view_more').click(function (e) {
                    e.preventDefault();

                    var card_title = $(this).data('card-title');
                    var htm_con = $(this).parent().next('.card-footer').find('.html_contents').html();


                    $('#dataPreviewModal').find('.modal-title').html(card_title);
                    $('#dataPreviewModal').find('.modal-body').html(htm_con);

                    //$(this).parent().next().find('.btn-preview-card').trigger('click');
                });

                /*$('.btn-preview-card').click(function () {

                    var card_title = $(this).data('card-title');
                    var htm_con = $(this).siblings('.html_contents').html();


                    $('#dataPreviewModal').find('.modal-title').html(card_title);
                    $('#dataPreviewModal').find('.modal-body').html(htm_con);

                });*/

                return false;
            }
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
                                    <input type="checkbox" class="custom-control-input card-check" id="customSwitch4" checked>
                                    <label class="custom-control-label card-visibility" data-visibility="${card.id}" for="customSwitch4">{{ __('Visibility') }}</label>
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
                    ['insert', ['link', 'picture', 'video', 'file']],
                ],
                callbacks: {
                    onFileUpload: function(file) {
                        //alert('hello');
                        //Your own code goes here
                        myOwnCallBack(file[0]);
                    },
                },
            });
            /*--------------------------------------------
                Edit card Data after editing
            --------------------------------------------*/
            const modal_card_title = $("#editing-card-title")
            const modal_save_btn = $('#modal-save-btn')
            // const edit_card_data_btn = $('.btn-edit-card')
            data_cards_wrap.on('click', '.btn-edit-card', function () {
                // update modal title
                $("#dataEditModalLabel").text("Edit data")
                let card_title = $(this).attr('data-card-title')
                modal_card_title.val(card_title)
                let card_type = $(this).attr('data-card-type')
                let card_id = $(this).attr('data-card-id')
                let board_id = $(this).attr('data-board-id')
                let markupStr = $(this).siblings('.html_contents').html();//$(this).parent().parent().siblings('.card-body').html()

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
            //

            // $(document).on('submit','#calenderform',function(e){
            //     e.preventDefault();

            //     var start = $('#event_start').val(),
            //         end   = $('#event_end').val(),
            //         description = $('#event_description').val(),
            //         title = $('#event_title').val();

            //     var data = {
            //         "start_date": start,
            //         "end_date": end,
            //         "details": description,
            //         "title": title,
            //         "board_id": board_id,
            //     };

            //     axios.post('/api/events', data)
            //     .then(function (response) {
            //         if( response.status == 200 ) {
            //             $('#modalmessage').text('');
            //             $('#modalmessage').text('Event Created');
            //             var data = response.data.data;
            //             // $('#calendar').fullCalendar('renderEvent', {
            //             //     title: title,
            //             //     start: start,
            //             //     allDay: true
            //             // });
            //             //
            //             calendar.addEvent({
            //                 title: data.title,
            //                 start: data.start,
            //                 allDay: true
            //             });
            //         }
            //     })
            //     .catch(function (error) {
            //         console.log(error);
            //     });
            // });

        });

        /*-------------------------
            handle add new card
        -------------------------*/
        $("#add-new-card-btn").click(function () {
            $("#dataEditModalLabel").text("Add new data card")
        })

        /**-----------------------
         * File Upload in summernote
         * ----------------------
         */
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
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // $(document).on('click', '.card-visibility', function(event) {
            //     event.preventDefault();
            //     var is_visible;
            //     var id = $(this).attr('data-visibility');
            //     var checkbox = $(`#customSwitch-${id}`);
            //     if ( checkbox.is( ":checked") ){
            //         is_visible = 1;
            //     } else {
            //         is_visible = 0;
            //     }

            //     var board_id= $("#board_id").val();

            //     axios.put('/api/cards/'+id, {
            //         "board_id" : board_id,
            //         "is_visible" : is_visible,
            //     }).then(function (response) {
            //         console.log(response)
            //         // location.reload(true);
            //     })
            // });



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
