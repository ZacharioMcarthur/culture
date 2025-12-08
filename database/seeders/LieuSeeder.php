<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lieux = [
            [
                'nom' => 'Porto-Novo',
                'description' => 'Capitale administrative du Bénin, connue pour son patrimoine colonial et ses musées. Ville aux influences culturelles multiples.',
                'ville' => 'Porto-Novo',
                'region' => 'Ouémé',
                'latitude' => 6.4969,
                'longitude' => 2.6289,
                'horaires' => 'Ouvert tous les jours',
                'statut' => true,
            ],
            [
                'nom' => 'Abomey',
                'description' => 'Ancienne capitale du royaume du Dahomey, classée au patrimoine mondial de l\'UNESCO. Site historique majeur avec ses palais royaux.',
                'ville' => 'Abomey',
                'region' => 'Zou',
                'latitude' => 7.1829,
                'longitude' => 1.9912,
                'horaires' => '8h00 - 17h00',
                'statut' => true,
            ],
            [
                'nom' => 'Ouidah',
                'description' => 'Ville historique célèbre pour son passé lié à la traite des esclaves. Route des Esclaves classée à l\'UNESCO.',
                'ville' => 'Ouidah',
                'region' => 'Atlantique',
                'latitude' => 6.3631,
                'longitude' => 2.0851,
                'horaires' => '7h00 - 18h00',
                'statut' => true,
            ],
            [
                'nom' => 'Cotonou',
                'description' => 'Capitale économique du Bénin, ville moderne avec un mélange d\'influences africaines et occidentales. Centre économique dynamique.',
                'ville' => 'Cotonou',
                'region' => 'Littoral',
                'latitude' => 6.3703,
                'longitude' => 2.3912,
                'horaires' => 'Ouvert 24h/24',
                'statut' => true,
            ],
            [
                'nom' => 'Parakou',
                'description' => 'Deuxième ville du pays, centre commercial et culturel important. Porte d\'entrée vers le nord du Bénin.',
                'ville' => 'Parakou',
                'region' => 'Borgou',
                'latitude' => 9.3488,
                'longitude' => 2.6094,
                'horaires' => 'Ouvert tous les jours',
                'statut' => true,
            ],
            [
                'nom' => 'Natitingou',
                'description' => 'Située dans l\'Atacora, ville entourée de montagnes. Porte d\'entrée vers les parcs nationaux du nord.',
                'ville' => 'Natitingou',
                'region' => 'Atacora',
                'latitude' => 10.3042,
                'longitude' => 1.3798,
                'horaires' => '7h00 - 19h00',
                'statut' => true,
            ],
            [
                'nom' => 'Lokossa',
                'description' => 'Ville côtière du Mono, connue pour ses plages et son artisanat. Centre agricole et touristique en développement.',
                'ville' => 'Lokossa',
                'region' => 'Mono',
                'latitude' => 6.6387,
                'longitude' => 1.7167,
                'horaires' => '6h00 - 20h00',
                'statut' => true,
            ],
            [
                'nom' => 'Djougou',
                'description' => 'Ville du nord-ouest, centre commercial important. Connue pour son marché et son artisanat traditionnel.',
                'ville' => 'Djougou',
                'region' => 'Donga',
                'latitude' => 9.7085,
                'longitude' => 1.6660,
                'horaires' => 'Marché: tous les 5 jours',
                'statut' => true,
            ],
            [
                'nom' => 'Grand-Popo',
                'description' => 'Station balnéaire populaire, connue pour ses plages magnifiques et ses lagons. Destination touristique prisée.',
                'ville' => 'Grand-Popo',
                'region' => 'Mono',
                'latitude' => 6.2804,
                'longitude' => 1.8227,
                'horaires' => '6h00 - 22h00',
                'statut' => true,
            ],
            [
                'nom' => 'Kétou',
                'description' => 'Ville historique du plateau, connue pour son palais royal et ses traditions culturelles. Site touristique important.',
                'ville' => 'Kétou',
                'region' => 'Plateau',
                'latitude' => 7.3633,
                'longitude' => 2.5998,
                'horaires' => '8h00 - 17h00',
                'statut' => true,
            ],
        ];

        foreach ($lieux as $lieu) {
            \App\Models\Lieu::create($lieu);
        }
    }
}
