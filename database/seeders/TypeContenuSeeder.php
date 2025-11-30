<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeContenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_contenus')->insert([
            [
                'nom_type_contenu' => 'Article',
                'description' => 'Contenu textuel informatif et éducatif'
            ],
            [
                'nom_type_contenu' => 'Vidéo', 
                'description' => 'Contenu vidéo éducatif ou documentaire'
            ],
            [
                'nom_type_contenu' => 'Audio',
                'description' => 'Contenu audio comme des podcasts ou musiques traditionnelles'
            ],
            [
                'nom_type_contenu' => 'Image',
                'description' => 'Images et photographies culturelles'
            ],
            [
                'nom_type_contenu' => 'Document',
                'description' => 'Documents PDF et ressources téléchargeables'
            ],
            [
                'nom_type_contenu' => 'Quiz',
                'description' => 'Questionnaires interactifs sur la culture'
            ],
            [
                'nom_type_contenu' => 'Galerie',
                'description' => 'Collections d\'images thématiques'
            ],
        ]);
    }
}