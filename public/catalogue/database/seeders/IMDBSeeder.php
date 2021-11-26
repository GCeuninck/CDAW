<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models;
use App\Models\MediaList;
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
        
        $imdbMovies = MediaList::getMoviesFromIMDB();
        $imdbSeries = MediaList::getSeriesFromIMDB();

       // $series = [];

        foreach($imdbMovies as $movie)
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

        foreach($imdbSeries as $serie)
        {
            DB::table('media')->insert([
                'title' => $serie->title,
                'poster_link' => $serie->image,
                'release_date' => $serie->year,
                ]
            );

            // data $validate blabla
          //  Media::create()
        }

        // //Etape 2
        // \App\Models\Category::factory(10)->create();
    }
}
