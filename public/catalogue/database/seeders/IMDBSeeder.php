<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models;
use App\Models\MediaList;
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
        $imdbMovies = MediaList::getMoviesFromIMDB();
        $imdbSeries = MediaList::getSeriesFromIMDB();

        foreach($imdbMovies as $movie)
        {
            Media::create([
                'id_media' => $movie['id_media'],
                'title' => $movie['title'],
                'poster_link' => $movie['poster_link'],
                'release_date' => $movie['release_date'],
                'code_type' => $movie['code_type'],
                ]
            );
        }

        foreach($imdbSeries as $serie)
        {
            Media::create([
                'id_media' => $serie['id_media'],
                'title' => $serie['title'],
                'poster_link' => $serie['poster_link'],
                'release_date' => $serie['release_date'],
                'code_type' => $serie['code_type'],
                ]
            );
        }

        Media::getMediaDetailFromIMDB(Media::getMedia('tt15097216')->id_media);
        Media::getMediaDetailFromIMDB(Media::getMedia('tt12361178')->id_media);
        Media::getMediaDetailFromIMDB(Media::getMedia('tt1160419')->id_media);
        Media::getMediaDetailFromIMDB(Media::getMedia('tt9174558')->id_media);
        Media::getMediaDetailFromIMDB(Media::getMedia('tt6741278')->id_media);
        Media::getMediaDetailFromIMDB(Media::getMedia('tt9140342')->id_media);
    }
}
