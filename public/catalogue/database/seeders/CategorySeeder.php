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
        for($i=0; $i<10;$i++){
            DB::table('categories')->insert([
                'name' => Str::random(10)
               ]);
        }

        //Etape 2
        //\App\Models\Category::factory(10)->create();
    }
}