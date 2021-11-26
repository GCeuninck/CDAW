<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Media;

class IMDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Etape 1
        $seeder = null;
        $imdb = new imdbClass();
		$imdb->getMoviesFromIMDB();

        $movies = [];
        $series = [];

        foreach($movies as $movie)
        {
            DB::table('media')->insert([
                'title' => $movie->title,
                'poster_link' => $movie->image,
                'release_date' => $movie->year,
                ]
            );

            // data $validate blabla
          //  Media::create()
        }

        // //Etape 2
        // \App\Models\Category::factory(10)->create();
    }
}
