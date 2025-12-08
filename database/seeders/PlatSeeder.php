<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plats = [
            [
                'nom' => 'Aklui (Pâte d\'arachide)',
                'description' => 'Plat traditionnel du nord Bénin, composé de pâte d\'arachide pilée, servie avec de la viande ou du poisson. Un mets riche en protéines et en saveurs.',
                'region' => 'Nord',
                'ingredients' => 'Arachides pilées, viande/poisson, épices locales, huile rouge',
                'preparation' => 'Les arachides sont pilées finement puis cuites avec de la viande ou du poisson et des épices traditionnelles.',
                'statut' => true,
            ],
            [
                'nom' => 'Gbofloto',
                'description' => 'Soupe traditionnelle béninoise à base de feuilles de manioc pilées, accompagnée de viande ou de poisson. Un plat complet et nourrissant.',
                'region' => 'Sud',
                'ingredients' => 'Feuilles de manioc, viande/poisson, huile de palme, épices',
                'preparation' => 'Les feuilles de manioc sont pilées puis mijotées avec de la viande dans une sauce à l\'huile de palme.',
                'statut' => true,
            ],
            [
                'nom' => 'Kuli-kuli',
                'description' => 'Snack traditionnel béninois fait à partir de pâte d\'arachide frite. Croustillant et savoureux, parfait comme collation.',
                'region' => 'Centre',
                'ingredients' => 'Arachides, sel, huile pour friture',
                'preparation' => 'La pâte d\'arachide est façonnée en boules puis frite jusqu\'à obtenir une texture croustillante.',
                'statut' => true,
            ],
            [
                'nom' => 'Pêkêlê',
                'description' => 'Plat traditionnel du nord Bénin à base de mil ou de maïs, souvent accompagné de sauce à l\'arachide. Aliment de base dans les régions sahéliennes.',
                'region' => 'Nord',
                'ingredients' => 'Mil ou maïs, arachides, légumes, épices',
                'preparation' => 'Le mil est cuit puis servi avec une sauce épaisse à l\'arachide et aux légumes.',
                'statut' => true,
            ],
            [
                'nom' => 'Amiwo',
                'description' => 'Bouillie de maïs traditionnelle, souvent consommée au petit-déjeuner. Un plat simple mais nourrissant, emblématique de la cuisine béninoise.',
                'region' => 'Centre',
                'ingredients' => 'Maïs moulu, eau, sucre (optionnel)',
                'preparation' => 'Le maïs est moulu puis cuit à feu doux jusqu\'à obtenir une consistance crémeuse.',
                'statut' => true,
            ],
            [
                'nom' => 'Tô',
                'description' => 'Bouillie épaisse de maïs ou de mil, accompagnée de sauces diverses. Aliment de base dans tout le Bénin, particulièrement appréciée le soir.',
                'region' => 'Nord',
                'ingredients' => 'Maïs ou mil, eau, sauces diverses',
                'preparation' => 'Le grain est moulu puis cuit en remuant constamment pour obtenir une pâte épaisse.',
                'statut' => true,
            ],
            [
                'nom' => 'Sauce aux feuilles de bissap',
                'description' => 'Sauce traditionnelle à base de feuilles d\'oseille de Guinée (bissap), accompagnant riz ou pâtes. Rafraîchissante et légèrement acidulée.',
                'region' => 'Centre',
                'ingredients' => 'Feuilles de bissap, tomates, oignons, huile, poisson/viande',
                'preparation' => 'Les feuilles sont pilées puis mijotées avec tomates et oignons pour créer une sauce savoureuse.',
                'statut' => true,
            ],
            [
                'nom' => 'Ablo',
                'description' => 'Bouillie de maïs au sucre, spécialité du petit-déjeuner béninois. Douce et réconfortante, parfaite pour commencer la journée.',
                'region' => 'Sud',
                'ingredients' => 'Maïs, sucre, eau',
                'preparation' => 'Le maïs moulu est cuit avec du sucre pour obtenir une bouillie sucrée.',
                'statut' => true,
            ],
            [
                'nom' => 'Kinkéliba (Soupe de feuilles)',
                'description' => 'Soupe traditionnelle à base de feuilles diverses, riche en nutriments et en saveurs. Varie selon les régions et les saisons.',
                'region' => 'Centre',
                'ingredients' => 'Feuilles locales, viande/poisson, épices, huile de palme',
                'preparation' => 'Les feuilles sont pilées puis cuites longuement avec de la viande dans une sauce épicée.',
                'statut' => true,
            ],
            [
                'nom' => 'Aloko (Bananes plantains frites)',
                'description' => 'Bananes plantains frites, spécialité de la cuisine béninoise. Croustillantes à l\'extérieur, moelleuses à l\'intérieur.',
                'region' => 'Sud',
                'ingredients' => 'Bananes plantains, huile, sel',
                'preparation' => 'Les bananes plantains sont coupées et frites dans l\'huile chaude jusqu\'à dorure.',
                'statut' => true,
            ],
        ];

        foreach ($plats as $plat) {
            \App\Models\Plat::create($plat);
        }
    }
}
