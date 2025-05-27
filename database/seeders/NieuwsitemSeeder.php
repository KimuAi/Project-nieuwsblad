<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nieuwsitem;
use Illuminate\Support\Carbon;

class NieuwsitemSeeder extends Seeder
{
    public function run()
    {
        Nieuwsitem::insert([
            [
                'titel' => 'Stad bereidt zich voor op jaarlijkse kermis',
                'afbeelding' => 'nieuws-items/kermis.jpg',
                'content' => 'De jaarlijkse kermis is weer in aantocht en dit jaar belooft het evenement groter en gezelliger dan ooit tevoren te worden. Met een breed scala aan nieuwe attracties, waaronder spannende achtbanen, kleurrijke draaimolens en spectaculaire shows, is er voor iedereen iets te beleven. De kermis, die traditioneel in het stadscentrum plaatsvindt, trekt jaarlijks duizenden bezoekers van jong tot oud. Naast de ritjes en spelletjes kunnen bezoekers genieten van diverse eetkraampjes met lekkernijen variërend van suikerspinnen tot hartige snacks. Organisatoren benadrukken dat veiligheid voorop staat en dat er extra maatregelen zijn genomen om het evenement veilig en toegankelijk te houden voor iedereen. De kermis opent zijn deuren komende vrijdag en duurt tot en met het weekend, waarbij lokale artiesten ook voor live entertainment zullen zorgen.',
                'publicatiedatum' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Lokale voetbalclub wint belangrijke derby',
                'afbeelding' => 'nieuws-items/voetbal.jpg',
                'content' => 'In een zinderende en tot de laatste minuut spannende derby heeft de lokale voetbalclub een belangrijke overwinning geboekt tegen hun stadsrivaal met een eindstand van 3-2. De wedstrijd vond plaats in een volgepakte stadion waar duizenden fans hun team luidkeels aanmoedigden. De eerste helft kende een sterk tempo, waarbij beide teams kansen creëerden, maar het was uiteindelijk de lokale club die het net wist te vinden dankzij een doelpunt van hun spits in de 35e minuut. De tegenstander wist vlak voor rust nog gelijk te maken, maar na de pauze toonde de thuisploeg veerkracht en scoorde twee keer, waarmee ze de overwinning veiligstelden. De coach prees het doorzettingsvermogen van zijn spelers en benadrukte dat deze winst een boost geeft voor de rest van het seizoen.',
                'publicatiedatum' => Carbon::now()->subDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Nieuwe bibliotheek geopend in het centrum',
                'afbeelding' => 'nieuws-items/bibliotheek.jpg',
                'content' => 'In het hart van de stad is vandaag de nieuwe bibliotheek officieel geopend, een moderne ontmoetingsplek die bedoeld is om de lees- en kenniservaring voor inwoners te verbeteren. Het gebouw is ontworpen met een eigentijdse uitstraling en biedt een uitgebreide collectie van zowel fysieke boeken als digitale media. Bezoekers kunnen gebruikmaken van rustige leeshoeken, studieruimtes en gratis wifi. Naast het lenen van boeken worden er ook regelmatig lezingen, workshops en kinderactiviteiten georganiseerd. De bibliotheek wil zich hiermee profileren als een centrum voor educatie, cultuur en ontmoeting. Burgemeester Jan de Vries sprak bij de opening zijn trots uit over de investering in deze toekomstgerichte faciliteit die een positieve bijdrage levert aan de gemeenschap.',
                'publicatiedatum' => Carbon::now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Weerbericht: zomerse temperaturen in aantocht',
                'afbeelding' => 'nieuws-items/weer.jpg',
                'content' => 'Meteorologen verwachten dat de komende week het weer flink zal omslaan met zomerse temperaturen en veel zonneschijn. Na een periode van wisselvallig weer komt er een hogedrukgebied boven onze regio te liggen, wat zorgt voor stabiele en warme omstandigheden. Overdag kunnen de temperaturen stijgen tot wel 25 tot 28 graden Celsius, ideaal voor buitenactiviteiten en de start van het terrassenseizoen. Ook ’s avonds blijft het aangenaam warm, met minimale kans op neerslag. Wel wordt er gewaarschuwd voor de sterke zonkracht, dus het is verstandig om voldoende zonnebrandcrème te gebruiken en genoeg water te drinken. De komende dagen zijn perfect om te genieten van het voorjaar dat nu echt overgaat in de zomer.',
                'publicatiedatum' => Carbon::now()->subHours(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
