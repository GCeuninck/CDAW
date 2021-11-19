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

        $i=3;
        DB::table('films')->insert([
            'name' => 'Title' . $i,
            'director' => 'director' . $i,
            'category_id' => $i
            ]
        );

        // //Etape 2
        // \App\Models\Category::factory(10)->create();
    }
}
