<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategorie;
use App\Models\FaqVraag;

class FaqSeeder extends Seeder
{
    public function run()
    {
        // Maak een categorie Nieuwsitems
        $nieuwsCategorie = FaqCategorie::create(['naam' => 'Nieuwsitems']);

        // Voeg vragen toe aan deze categorie
        $nieuwsCategorie->vragen()->createMany([
            [
                'vraag' => 'Hoe kan ik een nieuwsitem indienen?',
                'antwoord' => 'Je kunt een nieuwsitem indienen via ons contactformulier onder de "Contact" pagina.'
            ],
            [
                'vraag' => 'Hoe snel wordt mijn nieuwsitem geplaatst?',
                'antwoord' => 'Nieuwsitems worden doorgaans binnen 24 tot 48 uur gecontroleerd en geplaatst.'
            ],
            [
                'vraag' => 'Kan ik mijn nieuwsitem later nog aanpassen?',
                'antwoord' => 'Ja, neem contact op met onze redactie om wijzigingen door te geven.'
            ],
        ]);

        // Maak een categorie Abonnementen
        $abonnementCategorie = FaqCategorie::create(['naam' => 'Abonnementen']);

        $abonnementCategorie->vragen()->createMany([
            [
                'vraag' => 'Hoe kan ik een abonnement afsluiten?',
                'antwoord' => 'Je kunt je abonnement afsluiten via de pagina "Abonnementen" in het menu.'
            ],
            [
                'vraag' => 'Kan ik mijn abonnement op elk moment stopzetten?',
                'antwoord' => 'Ja, je kunt je abonnement maandelijks stopzetten via je profielinstellingen.'
            ],
        ]);
    }
}
