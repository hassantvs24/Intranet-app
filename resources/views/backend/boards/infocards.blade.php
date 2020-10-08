@extends('layouts.app-admin')
@section('body-class', 'bg-light body-primary')
@section('title', 'Edit InfoCards')

@section('admin-content')
    <div class="container-flued">

        <ul id="filter">
            <li class="current"><a href="#" data-filter="*"> {{ __('Show All') }} </a></li>
            <li><a href="#" data-filter="before"> {{ __('Before') }} </a></li>
            <li><a href="#" data-filter="after"> {{ __('After') }} </a></li>
            <li><a href="#" data-filter="under"> {{ __('During') }} </a></li>
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
                            <input type="hidden" name="event_start" id="event_start" value="" />
                            <input type="hidden" name="event_end" id="event_end" value= "" />
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

    <script>
        $(document).ready(function(){
            /*--------------------------------------------
           Get card data for this board from api request
           --------------------------------------------*/
            let board_id = {{ $board_id }};
            const data_cards_wrap = $("#data-cards-wrap")

            // demo data for initial cards
            let demo_card_data = [
                // {
                //     "title": "Text or Image",
                //     "html_content": '<p><img src="/images/demo-card-image.png" alt=""></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet expedita libero maiores neque.</p>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Resources & Links",
                //     "html_content": '<ul> <li><a href="#">How to take a nap?</a></li> <li><a href="#">Where to find good materials for our business?</a></li> <li><a href="#">Who to ask if I have questions and concerns</a></li> <li><a href="#">How to take a nap?</a></li> </ul><p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos dolore doloremque eaque enim eveniet. </p>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Video",
                //     "html_content": '<iframe width="100%" height="180" src="https://www.youtube.com/embed/L4qM1IEhtNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Calender",
                //     "html_content": 'test',
                //     "card_type": "calender",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
//
                // {
                //     "title": "Diet",
                //     "html_content": "<p>In the book More than only raspa carrots! »You will find recipes for many colorful and tasty vegetarian dishesfrom The AiR kitchen. The kitchen here at the house combines both vegetables, meat and fish in menyane their, but it can vera exciting å die ein vegetarian twist as a variation. Many people probably think that vegetarian dishes required unknown and difficult raw materials to obtain,but so need it no å vera.- In the book has me has emphasized the use of very simple raw materials that you can buy in common grocery stores. - Myself about ein hair eit common diet, can it vera excitingto try vegetarian dishes occasionally. In the book hasme difor set together recipes you can use both for breakfast, dinner and snack. Such provides you book Buy it at the reception, or order the book by e-mail to tinging@air.no The price is NOK 230 + postage.You can receive an invoice or pay with ",
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Instruction",
                //     "html_content": '<ul> <li><a href="#">Today\'s teaching availableOnline (streaming)</a></li> <li><a href="#">Former owner instruction available (video)</a></li> <li><a href="#">Do you want to train a little extra? VR, video, podcast? mindfull, social training, physical training, mental training)</a></li> <li> <a href=""> Diet </a></ul>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Next follow-up from AiR",
                //     "html_content": '<p> When you traveled from AiR got you victim about follow-up. The next follow-up for you will be: </p> <ul> <li><a href="#">Follow-up program</a></li></ul>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Exercise diary",
                //     "html_content": '<ul> <li><a href="#">Plan for work / follow-up</a></li> <li><a href="#">Welcome to Rauland (fact box, link to map etc.) Yr.no</a></li> </ul>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Message from the primary contact",
                //     "html_content": '<ul> <li><a href="#"> Schedule today </a></li> </ul> <p> Basic timetable as own file </p> <ul><li><a href="#">Schedule this week</a></li> </ul>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Leisure activities",
                //     "html_content": '<ul> <li><a href="#"> Leisure activities (on the program, or submissions to own activities) </a></li> <li><a href="#">Welcome to Rauland (fact box, link to map etc.)</a></li> </ul>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Leisure activities",
                //     "html_content": '<ul> <li><a href="#"> Leisure activities (on the program, or submissions to own activities) </a></li> <li><a href="#">Welcome to Rauland (fact box, link to map etc.)</a></li> </ul>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Common Questions and answers",
                //     "html_content": '<p>Sheep eg own room? </p> <ul> <li><a href="#"> You will be assigned a single room with bathroom and toilet. This willvera your room throughout the stay. </a></li> <li><a href="#">Towels and bed linen can be borrowed here.</a></li> <li><a href="#"> It\'s radio and hair dryer in all rooms. </a></li> <li> <a href=""> You are responsible for reinhald and order in yourroom, but will get good information about routines and where to find laundry equipment when you come here. </a> </li> <li> <a href=""> In the communal laundry you have access to a washing machine against coin toss.</a> </li> <li> <a href=""> There is only access to internet and TV in the common area </a> </li> </ul>',
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Exercise",
                //     "html_content": `<p> You can come to us online as you are. To get yet better exchange of the stay can it anyway vere nice to start a little on the training allereie no.
                //     Video clips:
                //     For you who no moves you then mykje two common
                //     For you who are in normally good shape
                //     For you who feel fit During the stay you will stay known with many ways
                //     å come in better form on, and halde the shape by equal.
                //     Do you have special plagar we will help you find good ones exercises as gjer that you can master dei best possible.
                //     You will also gain insight into various methods for mental training, among other things mindfullness. </p>`,
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Travel planners",
                //     "html_content": `<p>No i Koronatida encourages we about traveling by private car.You can find us here: Haddlandsvegen 20 3864 Rauland (link to googlemaps)
                //     If you come along public transportation: Haukeliekspressen stops in Åmot (link to Haukeliekspressen) From there you can take the local bus to
                //     Rauland (link to telemarkbil.no) </p> <h4> Travel expenses </h4> <p> Travel expenses to and from AiRclinic (arrival
                //     and departure) is covered by Patient travel.Travel must take place oncheapest way with publictransportation. Youpays deductible that becomes funnel fromthe amount you spend. If you have special needs, read their Patient Travelsrules for use of private </p>`,
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Leave and visit?",
                //     "html_content": `<p> Leave on weekends First weekend in the stay you can take leave from Saturdayat 12.00 The other weekends you can take leavefromFriday at 15.30, and
                //     you mustvere back to training / teaching Monday tomorrowat 08.30. Beyond this it will be no gjeve leave withoutthat
                //     you have a very special reason. Such a reason can, for examplevera serious illness or death in family, funeral or agreements with public office that required personalattendance. Questions
                //     about leave are raisedteam leaders in as good a time as possible.</p>
                //     <p> Visits by friends and family
                //     It's time, because of coronary restrictions, no
                //     have the opportunity to receive visits from
                //     family and friends inside AiR its area. </p>`,
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },

                // {
                //     "title": "Packing list",
                //     "html_content": `<p> You must include this: </p>
                //     <ul>
                //         <li> Your own, fast medicine for whole the stay </li>
                //         <li> Current X-ray reports (you need no the X-ray image) </li>
                //         <li> Swimwear, training clothes and sneakers for indoor use </li>
                //         <li> Sneakers, mountain shoes /rubber boots </li>
                //         <li> Clothes and shoes you can possibly ride in </li>
                //     </ul>
                //     <p> It can too vere wise to include: </p>
                //     <ul>
                //     <li> Musical instrument and hobby equipment </li>
                //     <li> A good book </li>
                //     <li> PC and alarm clock </li>
                //     <li>  Spinning shoes and cycling shorts </li>
                //     </ul>
                //     <p> You need no: </p>
                //     <ul>
                //         <li> Linen </li>
                //         <li> Towels </li>
                //     </ul>
                //     `,
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Welcome two AiR!",
                //     "html_content": `<p> You have no got a place at the Rehabilitation Center AiR. Here we operatelabor lawrehabilitation. It means thatwork is the main goal in treatment, because we believe that work is health-promoting.
                //     With us you are ein participants. That means you're in itthe driver's seat. When it approaching seg the stay you will be assigned ein primary contact, which is your contact person towards it interdisciplinary the team that is
                //     there to help you.
                //     Treatment by AiRis group based. You're coming heretogether with 16 others. Usually is it eit plural women, and the average age is 43 year. Some have muscle and skeletal disorders, others lighter mental suffering, dei most have more and compound ailments.Common to all is that it dei struggle with hinders dei in å vere working.</p>`,
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "Welcome two AiR!",
                //     "html_content": `
                //     <h2> Welcome two AiR </h2>
                //     <p> In this video you get eit insight into what can meet you in dei 4 weeks at AiR.</p>
                //     <h2> Telemark swing </h2>
                //     <p> To solve challenges in life required interaction between body and soul. </p>
                //     <h2> AiR set from the air </h2>
                //     <h2> Welcome to Rauland! </h2> <p>
                //         Rauland is a mountain village, 800 meters above sea level, in West Telemark. Underthe
                //         stay your here will you become closer known with the immediate area, in the activitiesWe offer. You also get free time where you can
                //         explore the area, alone or maybetogether with nokon on your group. Check everyone the possibilities on Visit Rauland's website.
                //     </p>`,
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
                // {
                //     "title": "This is how you can prepare",
                //     "html_content": `
                //     <ul>
                //         <li>Exercise</li>
                //         <li>Mapping</li>
                //         <li>Packing list</li>
                //         <li>Leave and visit?</li>
                //         <li>Travel planners</li>
                //         <li>Common Questions and answers</li>
                //     </ul>`,
                //     "card_type": "normal",
                //     "is_visible": 1,
                //     "board_id": {{ $board_id }}
                // },
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
                                ${contents.substring(0,500)} <a class="view_more" href="#" title="view more">...</a>
                            </div>


                            <div class="card-footer mt-3 border-0 rounded-lg d-flex align-items-center">
                                <div class="d-inline-block">
                                    <button class="btn btn-outline-primary btn-sm d-inline-block btn-edit-card" data-card-type="normal"
                                        data-card-title="${card.title}" data-card-id="${card.id}" data-board-id="${card.board_id}"
                                        data-toggle="modal" data-target="#dataEditModal">
                                        {{ __('Edit') }}
                                    </button>

                                    <div class="html_contents" style="position: absolute; left: -9999px; visibility:hidden; display:none;">${card.html_content}</div>

                                    <button class="btn btn-outline-primary btn-sm d-inline-block btn-preview-card" data-card-type="normal"
                                        data-card-title="${card.title}"  data-card-id="${card.id}" data-board-id="${card.board_id}"
                                        data-toggle="modal" data-target="#dataPreviewModal">
                                        {{ __('Preview') }}
                                    </button>
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
                    $(this).parent().next().find('.btn-preview-card').trigger('click');
                });

                $('.btn-preview-card').click(function () {
                    
                    var card_title = $(this).data('card-title');
                    var htm_con = $(this).siblings('.html_contents').html();


                    $('#dataPreviewModal').find('.modal-title').html(card_title);
                    $('#dataPreviewModal').find('.modal-body').html(htm_con);

                });

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
