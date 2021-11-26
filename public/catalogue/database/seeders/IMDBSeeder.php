<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models;
use App\Models\MediaList;
use App\Models\KeyValue;
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
                'poster_link' => $movie->poster_link,
                'release_date' => $movie->release_date,
                'code_type' => $movie->code_type,
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
                'code_type' => $serie->code_type,
                ]
            );

            // data $validate blabla
          //  Media::create()
        }

        // //Etape 2
        // \App\Models\Category::factory(10)->create();
    }
}
