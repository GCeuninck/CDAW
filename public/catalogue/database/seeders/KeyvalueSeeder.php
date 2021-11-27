<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models;
use App\Models\MediaList;
use App\Models\KeyValue;
use App\Models\Media;


class KeyvalueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Etape 1

        //add conditions    

        KeyValue::createMovieType();
        KeyValue::createSerieType();

        KeyValue::createUserRole();
        KeyValue::createPendingStatus();  
    }
}
