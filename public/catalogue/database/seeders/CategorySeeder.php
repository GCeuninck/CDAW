<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Etape 1
        DB::table('categories')->insert([
             'name' =>'Fantastique'
            ]);
        DB::table('categories')->insert([
            'name' =>'Action'
            ]); 
        DB::table('categories')->insert([
            'name' =>'Documentaire'
            ]); 

        //Etape 2
        //\App\Models\Category::factory(10)->create();
    }
}