<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\KeyValue;

class KeyvalueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KeyValue::createMovieType();
        KeyValue::createSerieType();

        KeyValue::createUserRole();
        KeyValue::createPendingStatus();  
    }
}
