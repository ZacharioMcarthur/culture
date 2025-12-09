<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nom_role' => 'Administrateur'],
            ['nom_role' => 'Moderateur'],
            ['nom_role' => 'Contributeur'],
            ['nom_role' => 'Lecteur'],
        ]);
    }
}
