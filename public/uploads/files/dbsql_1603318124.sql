-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2020 at 10:57 AM
-- Server version: 10.3.24-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getonnetdev_intranet`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `group_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Final test board', 2, '2020-09-28 12:39:16', '2020-09-28 12:39:16', 1),
(3, 'Nazmul Group', 5, '2020-10-13 01:51:07', '2020-10-13 01:51:07', 1),
(4, 'Board for nazmul', 6, '2020-10-13 02:20:26', '2020-10-13 02:20:26', 1),
(5, 'Khannas Board', 7, '2020-10-13 02:39:45', '2020-10-13 02:39:45', 1),
(6, 'Nazmul Board', 8, '2020-10-15 06:36:02', '2020-10-15 06:36:02', 1),
(7, 'Suvon Board', 9, '2020-10-16 05:11:14', '2020-10-16 05:11:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `board_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_type` enum('normal','calender') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `html_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `view_type` enum('before','under','after') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `board_id`, `title`, `card_type`, `is_visible`, `html_content`, `created_at`, `updated_at`, `view_type`) VALUES
(1, 1, 'Slik kan du førebu deg', 'normal', 1, '<ul>\n                        <li> Trening </li>\n                        <li> Kartlegging </li>\n                        <li> Pakkeliste </li>\n                        <li> Permisjon og besøk? </li>\n                        <li> Reiseplanleggjar </li>\n                        <li> Vanlege spørsmål og svar </li>\n                    </ul>', '2020-09-28 12:39:19', '2020-09-28 12:39:19', 'under'),
(2, 1, 'XX dagar att til opphaldet startar', 'normal', 1, '<p> Velkomen til AiR I denne videoen får du eit innblikk i kva som kan møte deg i dei 4 vekene ved AiR. </p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/SXYsbwH6YFI\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> Telemarksvingjen Å løyse utfordringar i livet krev samspel mellom kropp og sjel.</p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/nNXHvncx8ug\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> AiR sett frå lufta </p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/DSlJeDY9B9c\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> Velkomen til Rauland!\n                    Rauland er ei fjellbygd, 800 meter over havet, i Vest-Telemark. Under opphaldet ditt her vil dubli nærare kjend med nærområdet, i\n                    aktivitetane vi tilbyr. Du får også fritid der dukan utforske området, aleine eller kanskje saman med nokon på gruppa di.\n                    Sjekk alle muligheitene på Visit Rauland sine nettsider. </p>', '2020-09-28 12:39:19', '2020-09-28 12:39:19', 'under'),
(3, 1, 'Velkomen til AiR!', 'normal', 1, '<p> Du har no fått plass ved Rehabiliteringssenteret AiR. Her driv vi med arbeidsretta rehabilitering. Det\n                    betyr at arbeid er hovudmålet i behandlinga, fordi vi meiner at arbeid er helsebringande.\n                    Hos oss er du ein deltakar. Det betyr at det er du som er i førarsetet.\n                    Når det nærmar seg oppghaldet vil du få tildelt ein primærkontakt, som er din kontaktperson inn mot\n                    det tverrfaglege teamet som er der for å hjelpe deg. </p>\n                    <p> Behandlinga ved AiR er gruppebasert. Du kjem hit saman med 16 andre. Vanlegvis er det eit fleirtal\n                    kvinner, og gjennomsnittsalderen er 43 år.Enkelte har muskel- og skjelettplagar, andre lettare\n                    psykiske lidingar, dei fleste har fleire og samansette plager.Felles for alle er at det dei slit med hindrar dei i å\n                    vere i arbeid.</p>\n                    <div class=\"card-header bg-color\">\n                        <h3 class=\"cart-title mb-0 txt-color\"> Timeplanen (grovmaska) </h3>\n                    </div>\n                    <p> Ankomstveka: Kartlegging, bli kjend med gruppa\n                    og anlegget, fysisk aktivitet Veke 1: Fysisk aktivitet, kognitiv\n                    tilnærming, plan for opphaldet, temadag arbeid, kosthald, riding (for dei som vil) </p>', '2020-09-28 12:39:19', '2020-09-28 12:39:19', 'under'),
(4, 1, 'Kartlegging', 'normal', 1, '<p> Den første veka er sett av til kartlegging.\n                    Det er ønskeleg at du sjølvogså set av tid til å tenkje gjennom kva du vil ha fokus på dei fire vekene du er her.\n                    Vi har laga to oppgåver til deg som kan bidra til at du kjem i gang med dette arbeidet på eiga hand. </p>\n                    <p> Oppgåve 1: «Slik står eg no» </p>\n                    <p> Dette er ei oppgåve der me inviterer til at du kan sjå på ulike sider ved\n                    livssituasjonen din som påverkar / kan påverke arbeidshelsa di.Fargelegg/skriv fargen i dei ulike\n                    områda i skoen: Klikk for å legge til tekst\n                    Grønt: «Det går greit»\n                    Gult: «Det skurrar litt»\n                    Raudt: «Her er det eit problem»\n                    </p>\n                    <p> Oppgåve 2: «Sol» </p>\n                    <p> Denne oppgåva er tenkt å bidra til at du og teamet lettare kan finne fram til kva for område det er viktig\n                    at vi saman har fokus på dei fire vekene du skal vere her hjå oss. Les den ufullstendige setninga midt\n                    i sola under inni deg og skriv resten av setninga på strekane. </p>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'before'),
(5, 1, 'Pakkeliste?', 'normal', 1, '<p> Dette må du ha med: </p>\n                    <ul>\n                        <li> Dine eigne, faste medisinar for heile opphaldet </li>\n                        <li> Aktuelle røntgenrapportar (du treng ikkje røntgenbiletet) </li>\n                        <li> Badetøy, treningstøy og joggesko til innebruk </li>\n                        <li> Joggesko, fjellsko/gummistøvlar </li>\n                        <li> Tøy og sko du eventuelt kan ri i </li>\n                        <li> Turkopp, liten tursekk og eventuelt termos </li>\n                    </ul>\n                    <p> Det kan også vere lurt å ha med: </p>\n                    <ul>\n                        <li> Musikkinstrument og hobbyutstyr </li>\n                        <li> Ei god bok </li>\n                        <li> PC og vekkeklokke </li>\n                        <li> Spinningsko og sykkelshorts </li>\n                    </ul>\n                    <p> Du treng ikkje: </p>\n                    <ul>\n                        <li> Sengetøy </li>\n                        <li> Handdukar </li>\n                    </ul>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'before'),
(6, 1, 'Permisjon og besøk?', 'normal', 1, '<p> Permisjon i helgene Fyrste helg i opphaldet kan du ta permisjon frå\n                    laurdag kl. 12.00. Dei andre helgene kan du ta permisjon frå fredag kl. 15.30, og du må vere\n                    tilbake til trening/undervisning måndag morgon kl. 08.30.\n                    Utover dette blir det ikkje gjeve permisjonar utan at du har heilt spesiell grunn. Slik grunn\n                    kan til dømes vera alvorleg sjukdom eller dødsfall i familie, gravferd eller avtaler med\n                    offentleg kontor som krev personleg frammøte.Spørsmål om permisjon tek du opp medteamleiaren i så god tid som mogleg. </p>\n                    <p> Besøk av vener og familie Det er for tida, pga koronarestriksjonar, ikkje\n                    høve til å ta i mot besøk av familie og vener inne på AiR sitt område. </p>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'before'),
(7, 1, 'Reiseplanleggjar', 'normal', 1, '<p> No i Koronatida oppmodar vi om å reise med privatbil.\n                    Du finn oss her:\n                    Haddlandsvegen 20\n                    3864 Rauland\n                    (link til googlemaps)\n                    Viss du kjem med offentleg transport:\n                    Haukeliekspressen stoppar i Åmot (link til Haukeliekspressen )\n                    Derifrå kan du ta lokalbuss til Rauland ( link til telemarkbil.no ) </p>\n                    <p>\n                    Reiseutgifter\n                    Reiseutgifter til og fra AiR-klinikk (ankomst og\n                    avreise) blir dekt av Pasientreiser. Reise må\n                    skje på billigaste måte med offentleg transport.\n                    Du betalar eigenandel som blir trekt frå beløpet\n                    du legg ut. Har du spesielle behov, les\n                    Pasientreiser sine reglar for bruk av privat bil.\n                    </p>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'before'),
(8, 1, 'Undervisning', 'normal', 1, '<ul>\n                        <li> Dagens undervisning tilgjengeleg på nett (video, streaming)</li>\n                        <li> Tidlegare undervisning tilgjengeleg </li>\n                        <li> Vil du trene litt ekstra? </li>\n                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>\n                        <li> xxxxx </li>\n                    </ul>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'under'),
(9, 1, 'Trening', 'normal', 1, '<p>Du kan kome til oss nett slik du er.\n                    For å få endå betre utbyte av opphaldet kan det likevel vere fint å starte litt på treninga allereie no.\n                    Videosnuttar: For deg som ikkje beveger deg så mykje til vanleg For deg som er i normalt god form\n                    For deg som føler deg sprek I løpet av opphaldet vil du bli kjend med mange måtar å kome i betre form på, og halde formen ved like.\n                    Har du spesielle plagar vil vi hjelpe deg med å finne fram til gode øvingar som gjer at du kan meistre dei\n                    best mogleg.\n                    Du vil også få innblikk i ulike metodar for mental trening, mellom anna mindfullness.</p>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'before'),
(10, 1, 'Vanlege spørsmål og svar', 'normal', 1, '<p>Får eg eige rom?</p>\n                    <ul>\n                        <li> Du får tildelt enkeltrom med bad og wc. Dette vil vera ditt rom gjennom heile opphaldet. </li>\n                        <li> Handkle og sengetøy får du låne her. </li>\n                        <li> Det er radio og hårtørkar på alle rom. </li>\n                        <li> Du har ansvar for reinhald og orden i ditt rom, men vil få god informasjon om rutiner og kvar du\n                        finn vaskeutstyr når du kjem hit. </li>\n                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>\n                        <li> Det er kun tilgang til internett og TV i fellesareala. </li>\n                    </ul>\n                    <p> Kan eg vaske klede når eg er der? </p>\n                    <ul>\n                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>\n                    </ul>\n                    <p> Korleis er maten og måltida? </p>\n                    <ul>\n                        <li>\n                            Kjøkenet vårt serverer frukost, lunsj, mellommåltid\n                            og middag i spisesalen kvar dag (bortsett frå\n                            onsdag, laurdag og sundag då alle smører seg\n                            lunsj-niste ved frukost). I tillegg blir det servert eit\n                            enkelt mellommåltid kvar ettermiddag.\n                        </li>\n\n                        <li> Dersom det vert lagt fram legeattest tilpassar me\n                        kosten for dei som har spesielle behov. Ta i så fall\n                        kontakt med oss før du kjem. Me kan og tilby\n                        vegetarkost, men diverre ikkje Vegan og Foodmap. </li>\n                    </ul>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'before'),
(11, 1, 'Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)', 'normal', 1, '<ul>\n                        <li> Som \"FØR\" </li>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'under'),
(12, 1, 'Melding frå primærkontakten', 'normal', 1, '<ul>\n                        <li> Timeplan i dag </li>\n                        <li> <p> Grunntimeplan som eiga fil </p> </li>\n                        <li> Timeplan denne veka </li>\n                    </ul>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'under'),
(13, 1, 'Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)', 'normal', 1, '<ul>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'under'),
(14, 1, 'Undervisning', 'normal', 1, '<ul>\n                        <li> Dagens undervisning tilgjengeleg på nett (streaming) </li>\n                        <li> Tidlegare undervisning tilgjengeleg (video) </li>\n                        <li> Vil du trene litt ekstra? </li>\n                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>\n                        <li> Kosthald </li>\n                    </ul>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'under'),
(15, 1, 'Neste oppfølging frå AiR', 'normal', 1, '<p> Då du reiste frå AiR fekk du tilbod om oppfølging.\n                    Neste oppfølging for deg blir: </p>\n                    <ul>\n                        <li> Oppfølgingsprogram </li>\n                    </ul>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'under'),
(16, 1, 'Kosthald', 'normal', 1, '<p> Film: Meir enn raspa grønsaker\n                    I boka «Meir enn berre raspa gulrøter!» finn du\n                    oppskrifter på mange fargeglade og smaksrike\n                    vegetarretter frå AiR-kjøkenet.\n                    Kjøkenet her på huset kombinerer både grønsaker, kjøt\n                    og fisk i menyane sine, men det kan vera spennande å\n                    gjere ein vegetar-vri som variasjon.\n                    Mange trur nok at vegetarrettar krev ukjende og\n                    vanskelege råvarer å få tak i, men slik treng det ikkje å\n                    vera.</p>\n                    <p>– I boka har me har lagt vekt på å bruke heilt enkle\n                    råvarer som du kan kjøpe i vanlege matbutikkar.\n                    – Sjølv om ein har eit vanleg kosthald, kan det vera\n                    spennande å prøve vegetarretter av og til. I boka har me difor sett saman oppskrifter du kan bruke både til\n                    frukost, middag og mellommåltid.</p>\n                    <p> Slik skaffar du deg boka\n                    Kjøp den i resepsjonen, eller bestill boka på e-post\n                    til tinging@air.no Prisen er kr 230,- + evt. porto.\n                    Du kan få tilsendt faktura eller betale med Vipps til 565748. </p>\"', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'after'),
(17, 1, 'Treningsdagbok', 'normal', 1, '<ul>\n                        <li> Plan for arbeid / oppfølging </li>\n                        <li> Som \"FØR\" </li>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'under'),
(18, 1, 'Calender', 'calender', 1, 'test', '2020-09-28 12:39:20', '2020-09-28 12:39:20', 'under'),
(19, 3, 'Slik kan du førebu deg', 'normal', 1, '<ul>\n                        <li> Trening </li>\n                        <li> Kartlegging </li>\n                        <li> Pakkeliste </li>\n                        <li> Permisjon og besøk? </li>\n                        <li> Reiseplanleggjar </li>\n                        <li> Vanlege spørsmål og svar </li>\n                    </ul>', '2020-10-13 01:55:36', '2020-10-13 01:55:36', 'under'),
(20, 3, 'Velkomen til AiR!', 'normal', 1, '<p> Du har no fått plass ved Rehabiliteringssenteret AiR. Her driv vi med arbeidsretta rehabilitering. Det\n                    betyr at arbeid er hovudmålet i behandlinga, fordi vi meiner at arbeid er helsebringande.\n                    Hos oss er du ein deltakar. Det betyr at det er du som er i førarsetet.\n                    Når det nærmar seg oppghaldet vil du få tildelt ein primærkontakt, som er din kontaktperson inn mot\n                    det tverrfaglege teamet som er der for å hjelpe deg. </p>\n                    <p> Behandlinga ved AiR er gruppebasert. Du kjem hit saman med 16 andre. Vanlegvis er det eit fleirtal\n                    kvinner, og gjennomsnittsalderen er 43 år.Enkelte har muskel- og skjelettplagar, andre lettare\n                    psykiske lidingar, dei fleste har fleire og samansette plager.Felles for alle er at det dei slit med hindrar dei i å\n                    vere i arbeid.</p>\n                    <div class=\"card-header bg-color\">\n                        <h3 class=\"cart-title mb-0 txt-color\"> Timeplanen (grovmaska) </h3>\n                    </div>\n                    <p> Ankomstveka: Kartlegging, bli kjend med gruppa\n                    og anlegget, fysisk aktivitet Veke 1: Fysisk aktivitet, kognitiv\n                    tilnærming, plan for opphaldet, temadag arbeid, kosthald, riding (for dei som vil) </p>', '2020-10-13 01:55:36', '2020-10-13 01:55:36', 'under'),
(21, 3, 'XX dagar att til opphaldet startar', 'normal', 1, '<p> Velkomen til AiR I denne videoen får du eit innblikk i kva som kan møte deg i dei 4 vekene ved AiR. </p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/SXYsbwH6YFI\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> Telemarksvingjen Å løyse utfordringar i livet krev samspel mellom kropp og sjel.</p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/nNXHvncx8ug\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> AiR sett frå lufta </p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/DSlJeDY9B9c\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> Velkomen til Rauland!\n                    Rauland er ei fjellbygd, 800 meter over havet, i Vest-Telemark. Under opphaldet ditt her vil dubli nærare kjend med nærområdet, i\n                    aktivitetane vi tilbyr. Du får også fritid der dukan utforske området, aleine eller kanskje saman med nokon på gruppa di.\n                    Sjekk alle muligheitene på Visit Rauland sine nettsider. </p>', '2020-10-13 01:55:36', '2020-10-13 01:55:36', 'under'),
(22, 3, 'Kartlegging', 'normal', 1, '<p> Den første veka er sett av til kartlegging.\n                    Det er ønskeleg at du sjølvogså set av tid til å tenkje gjennom kva du vil ha fokus på dei fire vekene du er her.\n                    Vi har laga to oppgåver til deg som kan bidra til at du kjem i gang med dette arbeidet på eiga hand. </p>\n                    <p> Oppgåve 1: «Slik står eg no» </p>\n                    <p> Dette er ei oppgåve der me inviterer til at du kan sjå på ulike sider ved\n                    livssituasjonen din som påverkar / kan påverke arbeidshelsa di.Fargelegg/skriv fargen i dei ulike\n                    områda i skoen: Klikk for å legge til tekst\n                    Grønt: «Det går greit»\n                    Gult: «Det skurrar litt»\n                    Raudt: «Her er det eit problem»\n                    </p>\n                    <p> Oppgåve 2: «Sol» </p>\n                    <p> Denne oppgåva er tenkt å bidra til at du og teamet lettare kan finne fram til kva for område det er viktig\n                    at vi saman har fokus på dei fire vekene du skal vere her hjå oss. Les den ufullstendige setninga midt\n                    i sola under inni deg og skriv resten av setninga på strekane. </p>', '2020-10-13 01:55:37', '2020-10-13 01:55:37', 'before'),
(23, 3, 'Permisjon og besøk?', 'normal', 1, '<p> Permisjon i helgene Fyrste helg i opphaldet kan du ta permisjon frå\n                    laurdag kl. 12.00. Dei andre helgene kan du ta permisjon frå fredag kl. 15.30, og du må vere\n                    tilbake til trening/undervisning måndag morgon kl. 08.30.\n                    Utover dette blir det ikkje gjeve permisjonar utan at du har heilt spesiell grunn. Slik grunn\n                    kan til dømes vera alvorleg sjukdom eller dødsfall i familie, gravferd eller avtaler med\n                    offentleg kontor som krev personleg frammøte.Spørsmål om permisjon tek du opp medteamleiaren i så god tid som mogleg. </p>\n                    <p> Besøk av vener og familie Det er for tida, pga koronarestriksjonar, ikkje\n                    høve til å ta i mot besøk av familie og vener inne på AiR sitt område. </p>', '2020-10-13 01:55:37', '2020-10-13 01:55:37', 'before'),
(24, 3, 'Pakkeliste?', 'normal', 1, '<p> Dette må du ha med: </p>\n                    <ul>\n                        <li> Dine eigne, faste medisinar for heile opphaldet </li>\n                        <li> Aktuelle røntgenrapportar (du treng ikkje røntgenbiletet) </li>\n                        <li> Badetøy, treningstøy og joggesko til innebruk </li>\n                        <li> Joggesko, fjellsko/gummistøvlar </li>\n                        <li> Tøy og sko du eventuelt kan ri i </li>\n                        <li> Turkopp, liten tursekk og eventuelt termos </li>\n                    </ul>\n                    <p> Det kan også vere lurt å ha med: </p>\n                    <ul>\n                        <li> Musikkinstrument og hobbyutstyr </li>\n                        <li> Ei god bok </li>\n                        <li> PC og vekkeklokke </li>\n                        <li> Spinningsko og sykkelshorts </li>\n                    </ul>\n                    <p> Du treng ikkje: </p>\n                    <ul>\n                        <li> Sengetøy </li>\n                        <li> Handdukar </li>\n                    </ul>', '2020-10-13 01:55:37', '2020-10-13 01:55:37', 'before'),
(25, 3, 'Trening', 'normal', 1, '<p>Du kan kome til oss nett slik du er.\n                    For å få endå betre utbyte av opphaldet kan det likevel vere fint å starte litt på treninga allereie no.\n                    Videosnuttar: For deg som ikkje beveger deg så mykje til vanleg For deg som er i normalt god form\n                    For deg som føler deg sprek I løpet av opphaldet vil du bli kjend med mange måtar å kome i betre form på, og halde formen ved like.\n                    Har du spesielle plagar vil vi hjelpe deg med å finne fram til gode øvingar som gjer at du kan meistre dei\n                    best mogleg.\n                    Du vil også få innblikk i ulike metodar for mental trening, mellom anna mindfullness.</p>', '2020-10-13 01:55:37', '2020-10-13 01:55:37', 'before'),
(26, 3, 'Reiseplanleggjar', 'normal', 1, '<p> No i Koronatida oppmodar vi om å reise med privatbil.\n                    Du finn oss her:\n                    Haddlandsvegen 20\n                    3864 Rauland\n                    (link til googlemaps)\n                    Viss du kjem med offentleg transport:\n                    Haukeliekspressen stoppar i Åmot (link til Haukeliekspressen )\n                    Derifrå kan du ta lokalbuss til Rauland ( link til telemarkbil.no ) </p>\n                    <p>\n                    Reiseutgifter\n                    Reiseutgifter til og fra AiR-klinikk (ankomst og\n                    avreise) blir dekt av Pasientreiser. Reise må\n                    skje på billigaste måte med offentleg transport.\n                    Du betalar eigenandel som blir trekt frå beløpet\n                    du legg ut. Har du spesielle behov, les\n                    Pasientreiser sine reglar for bruk av privat bil.\n                    </p>', '2020-10-13 01:55:37', '2020-10-13 01:55:37', 'before'),
(27, 3, 'Vanlege spørsmål og svar', 'normal', 1, '<p>Får eg eige rom?</p>\n                    <ul>\n                        <li> Du får tildelt enkeltrom med bad og wc. Dette vil vera ditt rom gjennom heile opphaldet. </li>\n                        <li> Handkle og sengetøy får du låne her. </li>\n                        <li> Det er radio og hårtørkar på alle rom. </li>\n                        <li> Du har ansvar for reinhald og orden i ditt rom, men vil få god informasjon om rutiner og kvar du\n                        finn vaskeutstyr når du kjem hit. </li>\n                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>\n                        <li> Det er kun tilgang til internett og TV i fellesareala. </li>\n                    </ul>\n                    <p> Kan eg vaske klede når eg er der? </p>\n                    <ul>\n                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>\n                    </ul>\n                    <p> Korleis er maten og måltida? </p>\n                    <ul>\n                        <li>\n                            Kjøkenet vårt serverer frukost, lunsj, mellommåltid\n                            og middag i spisesalen kvar dag (bortsett frå\n                            onsdag, laurdag og sundag då alle smører seg\n                            lunsj-niste ved frukost). I tillegg blir det servert eit\n                            enkelt mellommåltid kvar ettermiddag.\n                        </li>\n\n                        <li> Dersom det vert lagt fram legeattest tilpassar me\n                        kosten for dei som har spesielle behov. Ta i så fall\n                        kontakt med oss før du kjem. Me kan og tilby\n                        vegetarkost, men diverre ikkje Vegan og Foodmap. </li>\n                    </ul>', '2020-10-13 01:55:37', '2020-10-13 01:55:37', 'before'),
(28, 3, 'Undervisning', 'normal', 1, '<ul>\n                        <li> Dagens undervisning tilgjengeleg på nett (video, streaming)</li>\n                        <li> Tidlegare undervisning tilgjengeleg </li>\n                        <li> Vil du trene litt ekstra? </li>\n                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>\n                        <li> xxxxx </li>\n                    </ul>', '2020-10-13 01:55:37', '2020-10-13 01:55:37', 'under'),
(29, 3, 'Melding frå primærkontakten', 'normal', 1, '<ul>\n                        <li> Timeplan i dag </li>\n                        <li> <p> Grunntimeplan som eiga fil </p> </li>\n                        <li> Timeplan denne veka </li>\n                    </ul>', '2020-10-13 01:55:37', '2020-10-13 01:55:37', 'under'),
(30, 3, 'Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)', 'normal', 1, '<ul>\n                        <li> Som \"FØR\" </li>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-10-13 01:55:38', '2020-10-13 01:55:38', 'under'),
(31, 3, 'Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)', 'normal', 1, '<ul>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-10-13 01:55:38', '2020-10-13 01:55:38', 'under'),
(32, 3, 'Undervisning', 'normal', 1, '<ul>\n                        <li> Dagens undervisning tilgjengeleg på nett (streaming) </li>\n                        <li> Tidlegare undervisning tilgjengeleg (video) </li>\n                        <li> Vil du trene litt ekstra? </li>\n                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>\n                        <li> Kosthald </li>\n                    </ul>', '2020-10-13 01:55:38', '2020-10-13 01:55:38', 'under'),
(33, 3, 'Neste oppfølging frå AiR', 'normal', 1, '<p> Då du reiste frå AiR fekk du tilbod om oppfølging.\n                    Neste oppfølging for deg blir: </p>\n                    <ul>\n                        <li> Oppfølgingsprogram </li>\n                    </ul>', '2020-10-13 01:55:38', '2020-10-13 01:55:38', 'under'),
(34, 3, 'Treningsdagbok', 'normal', 1, '<ul>\n                        <li> Plan for arbeid / oppfølging </li>\n                        <li> Som \"FØR\" </li>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-10-13 01:55:38', '2020-10-13 01:55:38', 'under'),
(35, 3, 'Kosthald', 'normal', 1, '<p> Film: Meir enn raspa grønsaker\n                    I boka «Meir enn berre raspa gulrøter!» finn du\n                    oppskrifter på mange fargeglade og smaksrike\n                    vegetarretter frå AiR-kjøkenet.\n                    Kjøkenet her på huset kombinerer både grønsaker, kjøt\n                    og fisk i menyane sine, men det kan vera spennande å\n                    gjere ein vegetar-vri som variasjon.\n                    Mange trur nok at vegetarrettar krev ukjende og\n                    vanskelege råvarer å få tak i, men slik treng det ikkje å\n                    vera.</p>\n                    <p>– I boka har me har lagt vekt på å bruke heilt enkle\n                    råvarer som du kan kjøpe i vanlege matbutikkar.\n                    – Sjølv om ein har eit vanleg kosthald, kan det vera\n                    spennande å prøve vegetarretter av og til. I boka har me difor sett saman oppskrifter du kan bruke både til\n                    frukost, middag og mellommåltid.</p>\n                    <p> Slik skaffar du deg boka\n                    Kjøp den i resepsjonen, eller bestill boka på e-post\n                    til tinging@air.no Prisen er kr 230,- + evt. porto.\n                    Du kan få tilsendt faktura eller betale med Vipps til 565748. </p>\"', '2020-10-13 01:55:38', '2020-10-13 01:55:38', 'after'),
(36, 3, 'Calender', 'calender', 1, 'test', '2020-10-13 01:55:38', '2020-10-13 01:55:38', 'under'),
(37, 7, 'Slik kan du førebu deg', 'normal', 1, '<ul>\n                        <li> Trening </li>\n                        <li> Kartlegging </li>\n                        <li> Pakkeliste </li>\n                        <li> Permisjon og besøk? </li>\n                        <li> Reiseplanleggjar </li>\n                        <li> Vanlege spørsmål og svar </li>\n                    </ul>', '2020-10-16 07:43:30', '2020-10-16 07:43:30', 'under'),
(38, 7, 'XX dagar att til opphaldet startar', 'normal', 1, '<p> Velkomen til AiR I denne videoen får du eit innblikk i kva som kan møte deg i dei 4 vekene ved AiR. </p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/SXYsbwH6YFI\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> Telemarksvingjen Å løyse utfordringar i livet krev samspel mellom kropp og sjel.</p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/nNXHvncx8ug\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> AiR sett frå lufta </p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/DSlJeDY9B9c\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> Velkomen til Rauland!\n                    Rauland er ei fjellbygd, 800 meter over havet, i Vest-Telemark. Under opphaldet ditt her vil dubli nærare kjend med nærområdet, i\n                    aktivitetane vi tilbyr. Du får også fritid der dukan utforske området, aleine eller kanskje saman med nokon på gruppa di.\n                    Sjekk alle muligheitene på Visit Rauland sine nettsider. </p>', '2020-10-16 07:43:31', '2020-10-16 07:43:31', 'under'),
(39, 7, 'Velkomen til AiR!', 'normal', 1, '<p> Du har no fått plass ved Rehabiliteringssenteret AiR. Her driv vi med arbeidsretta rehabilitering. Det\n                    betyr at arbeid er hovudmålet i behandlinga, fordi vi meiner at arbeid er helsebringande.\n                    Hos oss er du ein deltakar. Det betyr at det er du som er i førarsetet.\n                    Når det nærmar seg oppghaldet vil du få tildelt ein primærkontakt, som er din kontaktperson inn mot\n                    det tverrfaglege teamet som er der for å hjelpe deg. </p>\n                    <p> Behandlinga ved AiR er gruppebasert. Du kjem hit saman med 16 andre. Vanlegvis er det eit fleirtal\n                    kvinner, og gjennomsnittsalderen er 43 år.Enkelte har muskel- og skjelettplagar, andre lettare\n                    psykiske lidingar, dei fleste har fleire og samansette plager.Felles for alle er at det dei slit med hindrar dei i å\n                    vere i arbeid.</p>\n                    <div class=\"card-header bg-color\">\n                        <h3 class=\"cart-title mb-0 txt-color\"> Timeplanen (grovmaska) </h3>\n                    </div>\n                    <p> Ankomstveka: Kartlegging, bli kjend med gruppa\n                    og anlegget, fysisk aktivitet Veke 1: Fysisk aktivitet, kognitiv\n                    tilnærming, plan for opphaldet, temadag arbeid, kosthald, riding (for dei som vil)</p><p><br></p><p><a title=\"invoice-1919.pdf\" href=\"/uploads/files/invoice-1919pdf_1602862137.pdf\">invoice-1919.pdf</a> </p>', '2020-10-16 07:43:31', '2020-10-16 09:29:07', 'under'),
(40, 7, 'Kartlegging', 'normal', 1, '<p> Den første veka er sett av til kartlegging.\n                    Det er ønskeleg at du sjølvogså set av tid til å tenkje gjennom kva du vil ha fokus på dei fire vekene du er her.\n                    Vi har laga to oppgåver til deg som kan bidra til at du kjem i gang med dette arbeidet på eiga hand. </p>\n                    <p> Oppgåve 1: «Slik står eg no» </p>\n                    <p> Dette er ei oppgåve der me inviterer til at du kan sjå på ulike sider ved\n                    livssituasjonen din som påverkar / kan påverke arbeidshelsa di.Fargelegg/skriv fargen i dei ulike\n                    områda i skoen: Klikk for å legge til tekst\n                    Grønt: «Det går greit»\n                    Gult: «Det skurrar litt»\n                    Raudt: «Her er det eit problem»\n                    </p>\n                    <p> Oppgåve 2: «Sol» </p>\n                    <p> Denne oppgåva er tenkt å bidra til at du og teamet lettare kan finne fram til kva for område det er viktig\n                    at vi saman har fokus på dei fire vekene du skal vere her hjå oss. Les den ufullstendige setninga midt\n                    i sola under inni deg og skriv resten av setninga på strekane. </p>', '2020-10-16 07:43:31', '2020-10-16 07:43:31', 'before'),
(41, 7, 'Permisjon og besøk?', 'normal', 1, '<p> Permisjon i helgene Fyrste helg i opphaldet kan du ta permisjon frå\n                    laurdag kl. 12.00. Dei andre helgene kan du ta permisjon frå fredag kl. 15.30, og du må vere\n                    tilbake til trening/undervisning måndag morgon kl. 08.30.\n                    Utover dette blir det ikkje gjeve permisjonar utan at du har heilt spesiell grunn. Slik grunn\n                    kan til dømes vera alvorleg sjukdom eller dødsfall i familie, gravferd eller avtaler med\n                    offentleg kontor som krev personleg frammøte.Spørsmål om permisjon tek du opp medteamleiaren i så god tid som mogleg. </p>\n                    <p> Besøk av vener og familie Det er for tida, pga koronarestriksjonar, ikkje\n                    høve til å ta i mot besøk av familie og vener inne på AiR sitt område. </p>', '2020-10-16 07:43:31', '2020-10-16 07:43:31', 'before'),
(42, 7, 'Pakkeliste?', 'normal', 1, '<p> Dette må du ha med: </p>\n                    <ul>\n                        <li> Dine eigne, faste medisinar for heile opphaldet </li>\n                        <li> Aktuelle røntgenrapportar (du treng ikkje røntgenbiletet) </li>\n                        <li> Badetøy, treningstøy og joggesko til innebruk </li>\n                        <li> Joggesko, fjellsko/gummistøvlar </li>\n                        <li> Tøy og sko du eventuelt kan ri i </li>\n                        <li> Turkopp, liten tursekk og eventuelt termos </li>\n                    </ul>\n                    <p> Det kan også vere lurt å ha med: </p>\n                    <ul>\n                        <li> Musikkinstrument og hobbyutstyr </li>\n                        <li> Ei god bok </li>\n                        <li> PC og vekkeklokke </li>\n                        <li> Spinningsko og sykkelshorts </li>\n                    </ul>\n                    <p> Du treng ikkje: </p>\n                    <ul>\n                        <li> Sengetøy </li>\n                        <li> Handdukar </li>\n                    </ul>', '2020-10-16 07:43:31', '2020-10-16 07:43:31', 'before'),
(43, 7, 'Trening', 'normal', 1, '<p>Du kan kome til oss nett slik du er.\n                    For å få endå betre utbyte av opphaldet kan det likevel vere fint å starte litt på treninga allereie no.\n                    Videosnuttar: For deg som ikkje beveger deg så mykje til vanleg For deg som er i normalt god form\n                    For deg som føler deg sprek I løpet av opphaldet vil du bli kjend med mange måtar å kome i betre form på, og halde formen ved like.\n                    Har du spesielle plagar vil vi hjelpe deg med å finne fram til gode øvingar som gjer at du kan meistre dei\n                    best mogleg.\n                    Du vil også få innblikk i ulike metodar for mental trening, mellom anna mindfullness.</p>', '2020-10-16 07:43:31', '2020-10-16 07:43:31', 'before'),
(44, 7, 'Reiseplanleggjar', 'normal', 1, '<p> No i Koronatida oppmodar vi om å reise med privatbil.\n                    Du finn oss her:\n                    Haddlandsvegen 20\n                    3864 Rauland\n                    (link til googlemaps)\n                    Viss du kjem med offentleg transport:\n                    Haukeliekspressen stoppar i Åmot (link til Haukeliekspressen )\n                    Derifrå kan du ta lokalbuss til Rauland ( link til telemarkbil.no ) </p>\n                    <p>\n                    Reiseutgifter\n                    Reiseutgifter til og fra AiR-klinikk (ankomst og\n                    avreise) blir dekt av Pasientreiser. Reise må\n                    skje på billigaste måte med offentleg transport.\n                    Du betalar eigenandel som blir trekt frå beløpet\n                    du legg ut. Har du spesielle behov, les\n                    Pasientreiser sine reglar for bruk av privat bil.\n                    </p>', '2020-10-16 07:43:31', '2020-10-16 07:43:31', 'before'),
(45, 7, 'Vanlege spørsmål og svar', 'normal', 1, '<p>Får eg eige rom?</p>\n                    <ul>\n                        <li> Du får tildelt enkeltrom med bad og wc. Dette vil vera ditt rom gjennom heile opphaldet. </li>\n                        <li> Handkle og sengetøy får du låne her. </li>\n                        <li> Det er radio og hårtørkar på alle rom. </li>\n                        <li> Du har ansvar for reinhald og orden i ditt rom, men vil få god informasjon om rutiner og kvar du\n                        finn vaskeutstyr når du kjem hit. </li>\n                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>\n                        <li> Det er kun tilgang til internett og TV i fellesareala. </li>\n                    </ul>\n                    <p> Kan eg vaske klede når eg er der? </p>\n                    <ul>\n                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>\n                    </ul>\n                    <p> Korleis er maten og måltida? </p>\n                    <ul>\n                        <li>\n                            Kjøkenet vårt serverer frukost, lunsj, mellommåltid\n                            og middag i spisesalen kvar dag (bortsett frå\n                            onsdag, laurdag og sundag då alle smører seg\n                            lunsj-niste ved frukost). I tillegg blir det servert eit\n                            enkelt mellommåltid kvar ettermiddag.\n                        </li>\n\n                        <li> Dersom det vert lagt fram legeattest tilpassar me\n                        kosten for dei som har spesielle behov. Ta i så fall\n                        kontakt med oss før du kjem. Me kan og tilby\n                        vegetarkost, men diverre ikkje Vegan og Foodmap. </li>\n                    </ul>', '2020-10-16 07:43:32', '2020-10-16 07:43:32', 'before'),
(46, 7, 'Undervisning', 'normal', 1, '<ul>\n                        <li> Dagens undervisning tilgjengeleg på nett (video, streaming)</li>\n                        <li> Tidlegare undervisning tilgjengeleg </li>\n                        <li> Vil du trene litt ekstra? </li>\n                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>\n                        <li> xxxxx </li>\n                    </ul>', '2020-10-16 07:43:32', '2020-10-16 07:43:32', 'under'),
(47, 7, 'Melding frå primærkontakten', 'normal', 1, '<ul>\n                        <li> Timeplan i dag </li>\n                        <li> <p> Grunntimeplan som eiga fil </p> </li>\n                        <li> Timeplan denne veka </li>\n                    </ul>', '2020-10-16 07:43:32', '2020-10-16 07:43:32', 'under'),
(48, 7, 'Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)', 'normal', 1, '<ul>\n                        <li> Som \"FØR\" </li>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-10-16 07:43:32', '2020-10-16 07:43:32', 'under'),
(49, 7, 'Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)', 'normal', 1, '<ul>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-10-16 07:43:32', '2020-10-16 07:43:32', 'under'),
(50, 7, 'Undervisning', 'normal', 1, '<ul>\n                        <li> Dagens undervisning tilgjengeleg på nett (streaming) </li>\n                        <li> Tidlegare undervisning tilgjengeleg (video) </li>\n                        <li> Vil du trene litt ekstra? </li>\n                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>\n                        <li> Kosthald </li>\n                    </ul>', '2020-10-16 07:43:32', '2020-10-16 07:43:32', 'under'),
(51, 7, 'Neste oppfølging frå AiR', 'normal', 1, '<p> Då du reiste frå AiR fekk du tilbod om oppfølging.\n                    Neste oppfølging for deg blir: </p>\n                    <ul>\n                        <li> Oppfølgingsprogram </li>\n                    </ul>', '2020-10-16 07:43:32', '2020-10-16 07:43:32', 'under'),
(52, 7, 'Treningsdagbok', 'normal', 1, '<ul>\n                        <li> Plan for arbeid / oppfølging </li>\n                        <li> Som \"FØR\" </li>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-10-16 07:43:33', '2020-10-16 07:43:33', 'under'),
(53, 7, 'Kosthald', 'normal', 1, '<p> Film: Meir enn raspa grønsaker\n                    I boka «Meir enn berre raspa gulrøter!» finn du\n                    oppskrifter på mange fargeglade og smaksrike\n                    vegetarretter frå AiR-kjøkenet.\n                    Kjøkenet her på huset kombinerer både grønsaker, kjøt\n                    og fisk i menyane sine, men det kan vera spennande å\n                    gjere ein vegetar-vri som variasjon.\n                    Mange trur nok at vegetarrettar krev ukjende og\n                    vanskelege råvarer å få tak i, men slik treng det ikkje å\n                    vera.</p>\n                    <p>– I boka har me har lagt vekt på å bruke heilt enkle\n                    råvarer som du kan kjøpe i vanlege matbutikkar.\n                    – Sjølv om ein har eit vanleg kosthald, kan det vera\n                    spennande å prøve vegetarretter av og til. I boka har me difor sett saman oppskrifter du kan bruke både til\n                    frukost, middag og mellommåltid.</p>\n                    <p> Slik skaffar du deg boka\n                    Kjøp den i resepsjonen, eller bestill boka på e-post\n                    til tinging@air.no Prisen er kr 230,- + evt. porto.\n                    Du kan få tilsendt faktura eller betale med Vipps til 565748. </p>\"', '2020-10-16 07:43:33', '2020-10-16 07:43:33', 'after'),
(54, 7, 'Calender', 'calender', 1, 'test', '2020-10-16 07:43:33', '2020-10-16 07:43:33', 'under'),
(55, 4, 'Slik kan du førebu deg', 'normal', 1, '<ul>\n                        <li> Trening </li>\n                        <li> Kartlegging </li>\n                        <li> Pakkeliste </li>\n                        <li> Permisjon og besøk? </li>\n                        <li> Reiseplanleggjar </li>\n                        <li> Vanlege spørsmål og svar </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(56, 4, 'Kartlegging', 'normal', 1, '<p> Den første veka er sett av til kartlegging.\n                    Det er ønskeleg at du sjølvogså set av tid til å tenkje gjennom kva du vil ha fokus på dei fire vekene du er her.\n                    Vi har laga to oppgåver til deg som kan bidra til at du kjem i gang med dette arbeidet på eiga hand. </p>\n                    <p> Oppgåve 1: «Slik står eg no» </p>\n                    <p> Dette er ei oppgåve der me inviterer til at du kan sjå på ulike sider ved\n                    livssituasjonen din som påverkar / kan påverke arbeidshelsa di.Fargelegg/skriv fargen i dei ulike\n                    områda i skoen: Klikk for å legge til tekst\n                    Grønt: «Det går greit»\n                    Gult: «Det skurrar litt»\n                    Raudt: «Her er det eit problem»\n                    </p>\n                    <p> Oppgåve 2: «Sol» </p>\n                    <p> Denne oppgåva er tenkt å bidra til at du og teamet lettare kan finne fram til kva for område det er viktig\n                    at vi saman har fokus på dei fire vekene du skal vere her hjå oss. Les den ufullstendige setninga midt\n                    i sola under inni deg og skriv resten av setninga på strekane. </p>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'before'),
(57, 4, 'Vanlege spørsmål og svar', 'normal', 1, '<p>Får eg eige rom?</p>\n                    <ul>\n                        <li> Du får tildelt enkeltrom med bad og wc. Dette vil vera ditt rom gjennom heile opphaldet. </li>\n                        <li> Handkle og sengetøy får du låne her. </li>\n                        <li> Det er radio og hårtørkar på alle rom. </li>\n                        <li> Du har ansvar for reinhald og orden i ditt rom, men vil få god informasjon om rutiner og kvar du\n                        finn vaskeutstyr når du kjem hit. </li>\n                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>\n                        <li> Det er kun tilgang til internett og TV i fellesareala. </li>\n                    </ul>\n                    <p> Kan eg vaske klede når eg er der? </p>\n                    <ul>\n                        <li> I fellesvaskeriet har du tilgang til vaskemaskin mot myntinnkast. </li>\n                    </ul>\n                    <p> Korleis er maten og måltida? </p>\n                    <ul>\n                        <li>\n                            Kjøkenet vårt serverer frukost, lunsj, mellommåltid\n                            og middag i spisesalen kvar dag (bortsett frå\n                            onsdag, laurdag og sundag då alle smører seg\n                            lunsj-niste ved frukost). I tillegg blir det servert eit\n                            enkelt mellommåltid kvar ettermiddag.\n                        </li>\n\n                        <li> Dersom det vert lagt fram legeattest tilpassar me\n                        kosten for dei som har spesielle behov. Ta i så fall\n                        kontakt med oss før du kjem. Me kan og tilby\n                        vegetarkost, men diverre ikkje Vegan og Foodmap. </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'before'),
(58, 4, 'Reiseplanleggjar', 'normal', 1, '<p> No i Koronatida oppmodar vi om å reise med privatbil.\n                    Du finn oss her:\n                    Haddlandsvegen 20\n                    3864 Rauland\n                    (link til googlemaps)\n                    Viss du kjem med offentleg transport:\n                    Haukeliekspressen stoppar i Åmot (link til Haukeliekspressen )\n                    Derifrå kan du ta lokalbuss til Rauland ( link til telemarkbil.no ) </p>\n                    <p>\n                    Reiseutgifter\n                    Reiseutgifter til og fra AiR-klinikk (ankomst og\n                    avreise) blir dekt av Pasientreiser. Reise må\n                    skje på billigaste måte med offentleg transport.\n                    Du betalar eigenandel som blir trekt frå beløpet\n                    du legg ut. Har du spesielle behov, les\n                    Pasientreiser sine reglar for bruk av privat bil.\n                    </p>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'before');
INSERT INTO `cards` (`id`, `board_id`, `title`, `card_type`, `is_visible`, `html_content`, `created_at`, `updated_at`, `view_type`) VALUES
(59, 4, 'Pakkeliste?', 'normal', 1, '<p> Dette må du ha med: </p>\n                    <ul>\n                        <li> Dine eigne, faste medisinar for heile opphaldet </li>\n                        <li> Aktuelle røntgenrapportar (du treng ikkje røntgenbiletet) </li>\n                        <li> Badetøy, treningstøy og joggesko til innebruk </li>\n                        <li> Joggesko, fjellsko/gummistøvlar </li>\n                        <li> Tøy og sko du eventuelt kan ri i </li>\n                        <li> Turkopp, liten tursekk og eventuelt termos </li>\n                    </ul>\n                    <p> Det kan også vere lurt å ha med: </p>\n                    <ul>\n                        <li> Musikkinstrument og hobbyutstyr </li>\n                        <li> Ei god bok </li>\n                        <li> PC og vekkeklokke </li>\n                        <li> Spinningsko og sykkelshorts </li>\n                    </ul>\n                    <p> Du treng ikkje: </p>\n                    <ul>\n                        <li> Sengetøy </li>\n                        <li> Handdukar </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'before'),
(60, 4, 'Undervisning', 'normal', 1, '<ul>\n                        <li> Dagens undervisning tilgjengeleg på nett (video, streaming)</li>\n                        <li> Tidlegare undervisning tilgjengeleg </li>\n                        <li> Vil du trene litt ekstra? </li>\n                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>\n                        <li> xxxxx </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(61, 4, 'Trening', 'normal', 1, '<p>Du kan kome til oss nett slik du er.\n                    For å få endå betre utbyte av opphaldet kan det likevel vere fint å starte litt på treninga allereie no.\n                    Videosnuttar: For deg som ikkje beveger deg så mykje til vanleg For deg som er i normalt god form\n                    For deg som føler deg sprek I løpet av opphaldet vil du bli kjend med mange måtar å kome i betre form på, og halde formen ved like.\n                    Har du spesielle plagar vil vi hjelpe deg med å finne fram til gode øvingar som gjer at du kan meistre dei\n                    best mogleg.\n                    Du vil også få innblikk i ulike metodar for mental trening, mellom anna mindfullness.</p>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'before'),
(62, 4, 'Undervisning', 'normal', 1, '<ul>\n                        <li> Dagens undervisning tilgjengeleg på nett (streaming) </li>\n                        <li> Tidlegare undervisning tilgjengeleg (video) </li>\n                        <li> Vil du trene litt ekstra? </li>\n                        <li> VR, video, podcast? mindfull, sosial trening, fysisk trening, mental trening) </li>\n                        <li> Kosthald </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(63, 4, 'Permisjon og besøk?', 'normal', 1, '<p> Permisjon i helgene Fyrste helg i opphaldet kan du ta permisjon frå\n                    laurdag kl. 12.00. Dei andre helgene kan du ta permisjon frå fredag kl. 15.30, og du må vere\n                    tilbake til trening/undervisning måndag morgon kl. 08.30.\n                    Utover dette blir det ikkje gjeve permisjonar utan at du har heilt spesiell grunn. Slik grunn\n                    kan til dømes vera alvorleg sjukdom eller dødsfall i familie, gravferd eller avtaler med\n                    offentleg kontor som krev personleg frammøte.Spørsmål om permisjon tek du opp medteamleiaren i så god tid som mogleg. </p>\n                    <p> Besøk av vener og familie Det er for tida, pga koronarestriksjonar, ikkje\n                    høve til å ta i mot besøk av familie og vener inne på AiR sitt område. </p>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'before'),
(64, 4, 'Melding frå primærkontakten', 'normal', 1, '<ul>\n                        <li> Timeplan i dag </li>\n                        <li> <p> Grunntimeplan som eiga fil </p> </li>\n                        <li> Timeplan denne veka </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(65, 4, 'Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)', 'normal', 1, '<ul>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(66, 4, 'Neste oppfølging frå AiR', 'normal', 1, '<p> Då du reiste frå AiR fekk du tilbod om oppfølging.\n                    Neste oppfølging for deg blir: </p>\n                    <ul>\n                        <li> Oppfølgingsprogram </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(67, 4, 'Calender', 'calender', 1, 'test', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(68, 4, 'Velkomen til AiR!', 'normal', 1, '<p> Du har no fått plass ved Rehabiliteringssenteret AiR. Her driv vi med arbeidsretta rehabilitering. Det\n                    betyr at arbeid er hovudmålet i behandlinga, fordi vi meiner at arbeid er helsebringande.\n                    Hos oss er du ein deltakar. Det betyr at det er du som er i førarsetet.\n                    Når det nærmar seg oppghaldet vil du få tildelt ein primærkontakt, som er din kontaktperson inn mot\n                    det tverrfaglege teamet som er der for å hjelpe deg. </p>\n                    <p> Behandlinga ved AiR er gruppebasert. Du kjem hit saman med 16 andre. Vanlegvis er det eit fleirtal\n                    kvinner, og gjennomsnittsalderen er 43 år.Enkelte har muskel- og skjelettplagar, andre lettare\n                    psykiske lidingar, dei fleste har fleire og samansette plager.Felles for alle er at det dei slit med hindrar dei i å\n                    vere i arbeid.</p>\n                    <div class=\"card-header bg-color\">\n                        <h3 class=\"cart-title mb-0 txt-color\"> Timeplanen (grovmaska) </h3>\n                    </div>\n                    <p> Ankomstveka: Kartlegging, bli kjend med gruppa\n                    og anlegget, fysisk aktivitet Veke 1: Fysisk aktivitet, kognitiv\n                    tilnærming, plan for opphaldet, temadag arbeid, kosthald, riding (for dei som vil) </p>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(69, 4, 'Fritidsaktivitetar (på programmet, eller framlegg til eigne aktivitetar)', 'normal', 1, '<ul>\n                        <li> Som \"FØR\" </li>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(70, 4, 'Kosthald', 'normal', 1, '<p> Film: Meir enn raspa grønsaker\n                    I boka «Meir enn berre raspa gulrøter!» finn du\n                    oppskrifter på mange fargeglade og smaksrike\n                    vegetarretter frå AiR-kjøkenet.\n                    Kjøkenet her på huset kombinerer både grønsaker, kjøt\n                    og fisk i menyane sine, men det kan vera spennande å\n                    gjere ein vegetar-vri som variasjon.\n                    Mange trur nok at vegetarrettar krev ukjende og\n                    vanskelege råvarer å få tak i, men slik treng det ikkje å\n                    vera.</p>\n                    <p>– I boka har me har lagt vekt på å bruke heilt enkle\n                    råvarer som du kan kjøpe i vanlege matbutikkar.\n                    – Sjølv om ein har eit vanleg kosthald, kan det vera\n                    spennande å prøve vegetarretter av og til. I boka har me difor sett saman oppskrifter du kan bruke både til\n                    frukost, middag og mellommåltid.</p>\n                    <p> Slik skaffar du deg boka\n                    Kjøp den i resepsjonen, eller bestill boka på e-post\n                    til tinging@air.no Prisen er kr 230,- + evt. porto.\n                    Du kan få tilsendt faktura eller betale med Vipps til 565748. </p>\"', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'after'),
(71, 4, 'XX dagar att til opphaldet startar', 'normal', 1, '<p> Velkomen til AiR I denne videoen får du eit innblikk i kva som kan møte deg i dei 4 vekene ved AiR. </p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/SXYsbwH6YFI\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> Telemarksvingjen Å løyse utfordringar i livet krev samspel mellom kropp og sjel.</p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/nNXHvncx8ug\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> AiR sett frå lufta </p>\n                    <iframe width=\"100%\" height=\"180\" src=\"https://www.youtube.com/embed/DSlJeDY9B9c\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\n                    <p> Velkomen til Rauland!\n                    Rauland er ei fjellbygd, 800 meter over havet, i Vest-Telemark. Under opphaldet ditt her vil dubli nærare kjend med nærområdet, i\n                    aktivitetane vi tilbyr. Du får også fritid der dukan utforske området, aleine eller kanskje saman med nokon på gruppa di.\n                    Sjekk alle muligheitene på Visit Rauland sine nettsider. </p>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under'),
(72, 4, 'Treningsdagbok', 'normal', 1, '<ul>\n                        <li> Plan for arbeid / oppfølging </li>\n                        <li> Som \"FØR\" </li>\n                        <li> Velkomen til Rauland (faktaboks, lenke til kart mm) Yr.no </li>\n                    </ul>', '2020-10-17 11:03:45', '2020-10-17 11:03:45', 'under');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `board_id`, `start`, `end`, `details`, `created_at`, `updated_at`, `title`) VALUES
(1, 1, '2020-09-25 00:00:00', '2020-09-26 00:00:00', 'test', '2020-09-28 12:39:49', '2020-09-28 12:39:49', 'First Event'),
(2, 1, '2020-09-26 00:00:00', '2020-09-27 00:00:00', 'test', '2020-09-28 12:40:02', '2020-09-28 12:40:02', 'Second Event'),
(4, 3, '2020-09-29 00:00:00', '2020-09-30 00:00:00', 'sdgsg', '2020-10-15 07:36:59', '2020-10-15 07:36:59', 'dd'),
(5, 7, '2020-10-23 00:00:00', '2020-10-24 00:00:00', 'Hello', '2020-10-16 08:00:04', '2020-10-16 08:09:39', 'New Update'),
(10, 7, '2020-10-16 00:00:00', '2020-10-16 00:00:00', 'Setup', '2020-10-16 08:24:11', '2020-10-16 08:28:26', 'Job Time'),
(11, 3, '2020-10-17 17:13:00', '2020-10-18 17:13:00', 'Kuddus', '2020-10-17 05:13:31', '2020-10-17 05:13:31', 'Ultimate'),
(12, 3, '2020-10-18 17:27:00', '2020-10-18 23:27:00', 'Kuddus', '2020-10-17 09:27:26', '2020-10-17 09:27:26', 'Ultimatex');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `archive_start_date` date DEFAULT NULL,
  `archive_end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `color`, `start_date`, `end_date`, `created_at`, `updated_at`, `archive_start_date`, `archive_end_date`, `status`) VALUES
(1, 'test group', 'green', '2020-09-25', '2020-09-28', '2020-09-23 09:17:39', '2020-09-23 09:17:39', '2020-09-22', '2020-09-30', 1),
(2, 'Final Test Group', 'green', '2020-09-25', '2020-09-28', '2020-09-28 12:39:01', '2020-09-28 12:39:01', '2020-09-22', '2020-09-30', 1),
(3, 'testing final', 'green', '2020-10-10', '2020-10-20', '2020-10-06 08:56:30', '2020-10-06 08:56:30', '2020-10-06', '2020-10-20', 1),
(5, 'Millat Group', 'orange', '2020-10-13', '2020-10-16', '2020-10-13 01:51:07', '2020-10-13 01:51:07', '2020-10-13', '2020-10-20', 1),
(6, 'Kuddus Miah', 'green', '2020-10-14', '2020-10-16', '2020-10-13 02:20:26', '2020-10-13 02:20:26', '2020-10-13', '2020-10-22', 1),
(7, 'Kannas', 'orange', '2020-10-13', '2020-10-16', '2020-10-13 02:39:45', '2020-10-13 02:39:45', '2020-10-13', '2020-10-20', 1),
(8, 'Kuddus Miah', 'blue', '2020-10-15', '2020-10-21', '2020-10-15 06:36:02', '2020-10-15 06:36:02', '2020-10-15', '2020-10-22', 1),
(9, 'Suvon Group', 'red', '2020-10-16', '2020-10-23', '2020-10-16 05:01:07', '2020-10-16 05:01:07', '2020-10-16', '2020-10-23', 1),
(10, 'Salman', 'yellow', '2020-10-19', '2020-10-23', '2020-10-19 08:21:09', '2020-10-19 08:21:09', '2020-10-19', '2020-10-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_admins`
--

CREATE TABLE `group_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_admins`
--

INSERT INTO `group_admins` (`id`, `name`, `email`, `phone`, `avatar`, `bio`, `users_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'JAMAL', 'abc@gmail.com', '01234567890', '/uploads/images/kuddus-miah_1602765362.webp', 'This is jamal', 4, '2020-10-15 06:36:03', '2020-10-15 06:36:03', 1),
(2, 'Kamal', 'testkamal@gmail.com', '01234567890', '/uploads/images/_1602849474.webp', '', 5, '2020-10-16 05:57:55', '2020-10-16 05:57:55', 1),
(3, 'Kuddus Miah', 'velos@velostech.com', '01675870047', NULL, NULL, NULL, '2020-10-16 09:46:33', '2020-10-16 09:46:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_group_admin`
--

CREATE TABLE `group_group_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `group_admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_group_admin`
--

INSERT INTO `group_group_admin` (`id`, `group_id`, `group_admin_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2020-10-15 06:36:03', '2020-10-15 06:36:03'),
(2, 7, 2, '2020-10-16 05:57:55', '2020-10-16 05:57:55'),
(3, 7, 1, '2020-10-20 06:13:36', '2020-10-20 06:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2020_08_14_092948_create_groups_table', 1),
(15, '2020_08_14_093027_create_group_admins_table', 1),
(16, '2020_08_14_093139_create_boards_table', 1),
(17, '2020_08_14_114535_create_group_admin_table', 1),
(18, '2020_08_26_210820_create_events_table', 1),
(19, '2020_08_26_212703_create_cards_table', 1),
(20, '2020_09_17_112124_add_language_column_users', 1),
(21, '2020_09_18_142027_add_group_archive_start_date', 1),
(22, '2020_09_21_145446_add_title_column_events', 2),
(24, '2020_09_21_153314_rename_events_table_column', 3),
(25, '2020_09_21_173547_change_type_events_table_column', 4),
(26, '2020_09_21_184258_add_status_column_group', 4),
(27, '2020_09_22_141940_add_status_column_group_admin', 5),
(28, '2020_09_25_105656_add_view_type_column_cards', 6),
(29, '2020_09_27_124035_add_status_column_board', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','superadmin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `email`, `phone`, `role`, `email_verified_at`, `password`, `bio`, `primary_contact`, `remember_token`, `created_at`, `updated_at`, `language`) VALUES
(1, 2, 'kamrul', 'kkcucse.11@gmail.com', '01951633628', 'admin', NULL, '$2y$10$Fr5Rrr/uZGKul3IQadCRX.QgqbqzENciNbsjPRzLxOV12kLyUX4Kq', NULL, NULL, NULL, '2020-09-18 01:29:26', '2020-10-12 11:03:18', 'en'),
(2, 2, 'Torstein', 'torstein@getonnet.no', '46661140', 'admin', NULL, '$2y$10$Bv3hy33erkHlvJ8ulyrHnefqxIYXxII.ebNTDQ6E8nq6J1RBHhZui', NULL, NULL, NULL, '2020-08-28 02:34:15', '2020-08-28 02:34:15', 'en'),
(3, NULL, 'Ashikur Rahaman', 'ashikur@getonnet.agency', '01754364020', 'admin', NULL, '$2y$10$g14o18Sx5aD5NL3E6rkygelFCbIFtWBQjWaM6KPkojREzpRpA9P4C', NULL, NULL, NULL, '2020-08-28 06:28:37', '2020-08-28 06:28:37', 'en'),
(4, 2, 'JAMAL', 'abc@gmail.com', '01234567890', 'user', NULL, '$2y$10$PTZhEhvuq0jTA/5br.LtaeK1LZQhdpaJOvfmYlv4BpGCeI0wfRKta', 'This is jamal', NULL, NULL, '2020-09-29 01:02:37', '2020-09-29 01:02:37', 'en'),
(5, 5, 'Solveig Svardal', 'Solveig.Svardal@air.no', '123456798', 'admin', NULL, '$2y$10$W0a7H35RKCzXyYlRRpxxneWW/4GzQOuLn3SqshgRU3WXZzrUFE3Cy', NULL, NULL, 'fLyIvsfUtyoD7oSrpyp5Fnwtshp0CKyDvbp7di6zXTl8PhDUrNlmPGtiFFei', '2020-08-28 06:43:44', '2020-10-06 10:01:13', 'nor'),
(6, NULL, 'mahade', 'test@example.com', '12346798', 'admin', NULL, '$2y$10$TOOF0il4igSOcJZ5ACwOLOdkKkxlMr315beAhbV3aUPxTWpiXfkAW', NULL, NULL, NULL, '2020-09-03 08:00:36', '2020-09-03 08:00:36', 'en'),
(7, NULL, 'rokib', 'rrcucse.11@gmail.com', '12346798', 'admin', NULL, '$2y$10$Fr5Rrr/uZGKul3IQadCRX.QgqbqzENciNbsjPRzLxOV12kLyUX4Kq', NULL, NULL, NULL, '2020-09-03 08:00:36', '2020-09-03 08:00:36', 'en'),
(9, 1, 'Walid Mahade', 'walidmahade@gmail.com', '1994961651', 'admin', NULL, '$2y$10$7RC2jU1lKDNJs.pWENTlU.Bu95fFoyP9m/tskwFn3Sb9nP92CkkE6', NULL, NULL, NULL, '2020-08-28 01:32:49', '2020-08-28 01:32:49', 'en');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_admins`
--
ALTER TABLE `group_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_admins_email_unique` (`email`);

--
-- Indexes for table `group_group_admin`
--
ALTER TABLE `group_group_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `group_admins`
--
ALTER TABLE `group_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_group_admin`
--
ALTER TABLE `group_group_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
