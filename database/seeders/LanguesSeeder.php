<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('langues')->insert([
            ['nom_langue'=>'Français','code_langue'=>'fr','description'=>'Langue officielle du Bénin'],
            ['nom_langue'=>'Fon','code_langue'=>'fon','description'=>'Principal language du sud (Gbe)'],
            ['nom_langue'=>'Yoruba','code_langue'=>'yor','description'=>'Langue importante au sud'],
            ['nom_langue'=>'Goun','code_langue'=>'gou','description'=>'Parlé dans la région de Porto-Novo'],
            ['nom_langue'=>'Mina','code_langue'=>'min','description'=>'Parlé dans le Sud (Grand-Popo)'],
            ['nom_langue'=>'Aja','code_langue'=>'aja','description'=>'Langue du sud-ouest'],
            ['nom_langue'=>'Bariba','code_langue'=>'bar','description'=>'Langue du Nord (Borgou)'],
            ['nom_langue'=>'Dendi','code_langue'=>'den','description'=>'Langue du Nord (zone Dendi)'],
            ['nom_langue'=>'Fulfulde','code_langue'=>'ful','description'=>'Langue des Peuls au nord'],
            ['nom_langue'=>'Yom','code_langue'=>'yom','description'=>'Langue du centre (Collines)'],
            ['nom_langue'=>'Mokole','code_langue'=>'mok','description'=>'Variante du sud, proche du Yoruba'],
            ['nom_langue'=>'Adja','code_langue'=>'adj','description'=>'Groupe Gbe, sud-ouest'],
            ['nom_langue'=>'Tori','code_langue'=>'tor','description'=>'Petite langue locale'],
            ['nom_langue'=>'Toffin','code_langue'=>'tof','description'=>'Variante locale'],
            ['nom_langue'=>'Biali','code_langue'=>'bia','description'=>'Langue du nord'],
            ['nom_langue'=>'Anii','code_langue'=>'ani','description'=>'Langue menacée du sud-ouest'],
            ['nom_langue'=>'Aguna','code_langue'=>'agu','description'=>'Langue vulnérable'],
            ['nom_langue'=>'Miyobe','code_langue'=>'miy','description'=>'Langue menacée'],
            ['nom_langue'=>'Gwamhi-Wuri','code_langue'=>'gwm','description'=>'Langue locale vulnérable'],
            ['nom_langue'=>'Lokpa','code_langue'=>'lok','description'=>'Langue du nord-ouest'],
            ['nom_langue'=>'Tammari','code_langue'=>'tam','description'=>'Langue au nord (Somba/Tata)'],
            ['nom_langue'=>'Nateni','code_langue'=>'nat','description'=>'Langue nord-centre'],
            ['nom_langue'=>'Kabiyé','code_langue'=>'kab','description'=>'Présente en régions frontalières (Togo/Bénin)'],
            ['nom_langue'=>'Wémé','code_langue'=>'wem','description'=>'Petit groupe linguistique local'],
            ['nom_langue'=>'Seto','code_langue'=>'set','description'=>'Petit groupe local'],
            ['nom_langue'=>'Defi','code_langue'=>'def','description'=>'Petit groupe'],
            ['nom_langue'=>'Xwla','code_langue'=>'xwl','description'=>'Petit groupe'],
            ['nom_langue'=>'Tchumbuli','code_langue'=>'tch','description'=>'Langue en danger'],
            ['nom_langue'=>'Nago','code_langue'=>'nago','description'=>'Dialecte du yoruba au Bénin'],
        ]);
    }
}
