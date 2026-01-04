<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('langues')->insert([
            ['nom'=>'Français','code'=>'fr','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Fon','code'=>'fon','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Yoruba','code'=>'yor','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Goun','code'=>'gou','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Mina','code'=>'min','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Aja','code'=>'aja','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Bariba','code'=>'bar','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Dendi','code'=>'den','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Fulfulde','code'=>'ful','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Yom','code'=>'yom','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Mokole','code'=>'mok','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Adja','code'=>'adj','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Tori','code'=>'tor','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Toffin','code'=>'tof','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Biali','code'=>'bia','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Anii','code'=>'ani','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Aguna','code'=>'agu','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Miyobe','code'=>'miy','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Gwamhi-Wuri','code'=>'gwm','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Lokpa','code'=>'lok','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Tammari','code'=>'tam','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Nateni','code'=>'nat','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Kabiyé','code'=>'kab','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Wémé','code'=>'wem','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Seto','code'=>'set','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Defi','code'=>'def','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Xwla','code'=>'xwl','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Tchumbuli','code'=>'tch','created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Nago','code'=>'nago','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
