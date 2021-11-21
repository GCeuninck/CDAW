<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Etape 1
        //Coder en dur juste pour l'exemple du jalon2
        DB::table('films')->insert([
            'name' => 'Retour vers le passé',
            'director' => 'Gérard Menvussa',
            'category_id' => 1
            ]
        );

        DB::table('films')->insert([
            'name' => 'Le seigneur des agneaux',
            'director' => 'Judas Nanas',
            'category_id' => 2
            ]
        );

        DB::table('films')->insert([
            'name' => 'La guerre des étoiles de mer',
            'director' => 'Terry Golo',
            'category_id' => 3
            ]
        );

        // //Etape 2
        // \App\Models\Category::factory(10)->create();
    }
}
