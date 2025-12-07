<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LangueSeeder extends Seeder
{
    public function run()
    {
        $langues = [
            [
                'nom_langue' => 'Français',
                'code_langue' => 'fr',
                'description' => 'Langue officielle du Bénin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom_langue' => 'Fon',
                'code_langue' => 'fon',
                'description' => 'Langue locale parlée au Sud du Bénin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom_langue' => 'Yoruba',
                'code_langue' => 'yor',
                'description' => 'Langue locale parlée au Sud-Est du Bénin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom_langue' => 'Bariba',
                'code_langue' => 'bba',
                'description' => 'Langue locale parlée au Nord du Bénin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom_langue' => 'Dendi',
                'code_langue' => 'ddn',
                'description' => 'Langue locale parlée au Nord du Bénin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom_langue' => 'Adja',
                'code_langue' => 'ajg',
                'description' => 'Langue locale parlée au Sud-Ouest du Bénin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('langues')->insert($langues);
    }
}