function demo_insert_data(board_id) {
    return [
        {
            title: "Slik kan du førebu deg",
            html_content: `<ul>
                        <li> Trening </li>
                        <li> Kartlegging </li>
                        <li> Pakkeliste </li>
                        <li> Permisjon og besøk? </li>
                        <li> Reiseplanleggjar </li>
                        <li> Vanlege spørsmål og svar </li>
                    </ul>
                    `,
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title: "Velkomen til AiR!",
            html_content: `
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
            card_type: "titles",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title: "XX dagar att til opphaldet startar",
            html_content: `<p> Velkomen til AiR I denne videoen får du eit innblikk i kva som kan møte deg i dei 4 vekene ved AiR. </p>
                    <iframe width="100%" height="180" src="https://www.youtube.com/embed/SXYsbwH6YFI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p> Telemarksvingjen Å løyse utfordringar i livet krev samspel mellom kropp og sjel.</p>
                    <iframe width="100%" height="180" src="https://www.youtube.com/embed/nNXHvncx8ug" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p> AiR sett frå lufta </p>
                    <iframe width="100%" height="180" src="https://www.youtube.com/embed/DSlJeDY9B9c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p> Velkomen til Rauland!
                    Rauland er ei fjellbygd, 800 meter over havet, i Vest-Telemark. Under opphaldet ditt her vil dubli nærare kjend med nærområdet, i
                    aktivitetane vi tilbyr. Du får også fritid der dukan utforske området, aleine eller kanskje saman med nokon på gruppa di.
                    Sjekk alle muligheitene på Visit Rauland sine nettsider. </p>`,
            card_type: "titles",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title: "Kartlegging",
            html_content: `<p> Den første veka er sett av til kartlegging.
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
            card_type: "titles",
            is_visible: 1,
            board_id: board_id,
            view_type: "before"
        },
        {
            title: "Permisjon og besøk?",
            html_content: `<p> Permisjon i helgene Fyrste helg i opphaldet kan du ta permisjon frå
                    laurdag kl. 12.00. Dei andre helgene kan du ta permisjon frå fredag kl. 15.30, og du må vere
                    tilbake til trening/undervisning måndag morgon kl. 08.30.
                    Utover dette blir det ikkje gjeve permisjonar utan at du har heilt spesiell grunn. Slik grunn
                    kan til dømes vera alvorleg sjukdom eller dødsfall i familie, gravferd eller avtaler med
                    offentleg kontor som krev personleg frammøte.Spørsmål om permisjon tek du opp medteamleiaren i så god tid som mogleg. </p>
                    <p> Besøk av vener og familie Det er for tida, pga koronarestriksjonar, ikkje
                    høve til å ta i mot besøk av familie og vener inne på AiR sitt område. </p>`,
            card_type: "titles",
            is_visible: 1,
            board_id: board_id,
            view_type: "before"
        },
        {
            title: "Pakkeliste?",
            html_content: `<p> Dette må du ha med: </p>
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
            card_type: "titles",
            is_visible: 1,
            board_id: board_id,
            view_type: "before"
        },
        {
            title: "Trening",
            html_content: `<p>Du kan kome til oss nett slik du er.
                    For å få endå betre utbyte av opphaldet kan det likevel vere fint å starte litt på treninga allereie no.
                    Videosnuttar: For deg som ikkje beveger deg så mykje til vanleg For deg som er i normalt god form
                    For deg som føler deg sprek I løpet av opphaldet vil du bli kjend med mange måtar å kome i betre form på, og halde formen ved like.
                    Har du spesielle plagar vil vi hjelpe deg med å finne fram til gode øvingar som gjer at du kan meistre dei
                    best mogleg.
                    Du vil også få innblikk i ulike metodar for mental trening, mellom anna mindfullness.</p>`,
            card_type: "titles",
            is_visible: 1,
            board_id: board_id,
            view_type: "before"
        },
        {
            title: "Reiseplanleggjar",
            html_content: `<p> No i Koronatida oppmodar vi om å reise med privatbil.
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
            card_type: "titles",
            is_visible: 1,
            board_id: board_id,
            view_type: "before"
        },
        {
            title: "Vanlege spørsmål og svar",
            html_content: `<p>Får eg eige rom?</p>
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
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "before"
        },
        {
            title: "Undervisning",
            html_content: `<ul>
                        <li> Dagens undervisning tilgjengeleg på nett (video, streaming)</li>
                        <li> Tidlegare undervisning tilgjengeleg </li>
                        <li> Vil du trene litt ekstra? </li>
                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>
                        <li> xxxxx </li>
                    </ul>`,
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title: "Melding frå primærkontakten",
            html_content: `<ul>
                        <li> Timeplan i dag </li>
                        <li> <p> Grunntimeplan som eiga fil </p> </li>
                        <li> Timeplan denne veka </li>
                    </ul>`,
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title:
                "Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)",
            html_content: `<ul>
                        <li> Som "FØR" </li>
                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>
                    </ul>`,
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title:
                "Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)",
            html_content: `<ul>
                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>
                    </ul>`,
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title: "Undervisning",
            html_content: `<ul>
                        <li> Dagens undervisning tilgjengeleg på nett (streaming) </li>
                        <li> Tidlegare undervisning tilgjengeleg (video) </li>
                        <li> Vil du trene litt ekstra? </li>
                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>
                        <li> Kosthald </li>
                    </ul>`,
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title: "Neste oppfølging frå AiR",
            html_content: `<p> Då du reiste frå AiR fekk du tilbod om oppfølging.
                    Neste oppfølging for deg blir: </p>
                    <ul>
                        <li> Oppfølgingsprogram </li>
                    </ul>`,
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title: "Treningsdagbok",
            html_content: `
                    <ul>
                        <li> Plan for arbeid / oppfølging </li>
                        <li> Som "FØR" </li>
                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>
                    </ul>`,
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        },
        {
            title: "Kosthald",
            html_content: `<p> Film: Meir enn raspa grønsaker
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
            card_type: "normal",
            is_visible: 1,
            board_id: board_id,
            view_type: "after"
        },
        {
            title: "Calender",
            html_content: "test",
            card_type: "calender",
            is_visible: 1,
            board_id: board_id,
            view_type: "under"
        }
    ];
}

/*--------------------------------------------
    Initalize text editor
--------------------------------------------*/
const cool_editor = $("#summernote");

cool_editor.summernote({
    height: 200,
    toolbar: [
        // [groupName, [list of button]]
        ["style", ["bold", "italic", "underline"]],
        ["font", ["strikethrough", "superscript", "subscript"]],
        ["fontsize", ["fontsize"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["height", ["height"]],
        ["insert", ["link", "picture", "video", "file"]]
    ],
    callbacks: {
        onFileUpload: function(file) {
            //alert('hello');
            //Your own code goes here
            myOwnCallBack(file[0]);
        }
    }
});

const cool_editor_add = $("#add_summernote");

cool_editor_add.summernote({
    height: 200,
    toolbar: [
        // [groupName, [list of button]]
        ["style", ["bold", "italic", "underline"]],
        ["font", ["strikethrough", "superscript", "subscript"]],
        ["fontsize", ["fontsize"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["height", ["height"]],
        ["insert", ["link", "picture", "video", "file"]]
    ],
    callbacks: {
        onFileUpload: function(file) {
            //alert('hello');
            //Your own code goes here
            myOwnCallBackAdd(file[0]);
        }
    }
});
