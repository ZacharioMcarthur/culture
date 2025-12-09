<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeMediasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_medias')->insert([
            ['nom_media'=>'Image'],
            ['nom_media'=>'Audio'],
            ['nom_media'=>'Vidéo'],
            ['nom_media'=>'Document'], // docx, pdf, xls, txt
        ]);
    }
}
