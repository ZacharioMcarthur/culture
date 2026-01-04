<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{
    public function run(): void
    {
        // Départements
        DB::table('regions')->insert([
            ['nom_region'=>'Alibori','type_region'=>'departement','description'=>'Nord-est du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Atacora','type_region'=>'departement','description'=>'Nord-ouest du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Atlantique','type_region'=>'departement','description'=>'Sud-centre du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Borgou','type_region'=>'departement','description'=>'Nord-centre du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Collines','type_region'=>'departement','description'=>'Centre du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Donga','type_region'=>'departement','description'=>'Nord-ouest du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Kouffo','type_region'=>'departement','description'=>'Sud-ouest du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Littoral','type_region'=>'departement','description'=>'Petit département comprenant Cotonou','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Mono','type_region'=>'departement','description'=>'Sud-ouest du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Ouémé','type_region'=>'departement','description'=>'Sud-est du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Plateau','type_region'=>'departement','description'=>'Centre-est du Bénin','created_at'=>now(),'updated_at'=>now()],
            ['nom_region'=>'Zou','type_region'=>'departement','description'=>'Centre-sud du Bénin','created_at'=>now(),'updated_at'=>now()],
        ]);

        // Communes et villes principales
        $communes = [
            'Banikoara','Gogounou','Kandi','Karimama','Malanville','Segbana',
            'Boukoumbé','Cobly','Kérou','Kouandé','Matéri','Natitingou','Péhunco','Tanguiéta','Toucountouna',
            'Abomey-Calavi','Allada','Kpomassè','Ouidah','Sô-Ava','Toffo','Tori-Bossito','Zè',
            'Bembèrèkè','Kalalé','Nikki','Parakou','Pèrèrè','Sinendé','Tchaourou',
            'Bantè','Dassa-Zoumè','Glazoué','Ouèssè','Savalou','Savé',
            'Bassila','Copargo','Djougou','Ouaké',
            'Aplahoué','Djakotomey','Klouékanmè','Lalo','Toviklin',
            'Cotonou','Athiémé','Bopa','Comé','Grand-Popo','Houéyogbé','Lokossa',
            'Adjarra','Adjohoun','Aguégués','Akpro-Missérété','Avrankou','Bonou','Dangbo','Porto Novo','Sèmè-Kpodji',
            'Ifangni','Adja-Ouèrè','Kétou','Pobè','Sakété',
            'Abomey','Agbangnizoun','Bohicon','Cové','Djidja','Ouinhi','Za-Kpota','Zangnanado','Zogbodomey'
        ];

        foreach ($communes as $commune) {
            DB::table('regions')->insert([
                'nom_region' => $commune,
                'type_region' => $commune === 'Cotonou' ? 'ville' : 'commune',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
