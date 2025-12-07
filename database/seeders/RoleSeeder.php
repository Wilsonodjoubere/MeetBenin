<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id_role' => 1,
                'nom_role' => 'Administrateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_role' => 2,
                'nom_role' => 'Auteur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_role' => 3,
                'nom_role' => 'Visiteur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_role' => 4,
                'nom_role' => 'Éditeur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_role' => 5,
                'nom_role' => 'Modérateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}