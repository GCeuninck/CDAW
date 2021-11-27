<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyValue extends Model
{
    use HasFactory;

    protected $table = 'keyvalue';    

    public static function createUserRole(){
        return KeyValue::updateOrCreate([
            'type' => 'role',
            'code' => '0',
            'label' => 'user'
        ]);
    }

    public static function createMovieType(){
        return KeyValue::updateOrCreate([
            'type' => 'media_type',
            'code' => '0',
            'label' => 'movie'
        ]);
    }

    public static function createSerieType(){
        return KeyValue::updateOrCreate([
            'type' => 'media_type',
            'code' => '1',
            'label' => 'serie'
        ]);
    }

    // Media KeyValue
    public static function getMediaTypes(){
        return KeyValue::where('type','=', 'media_type');
    }

    public static function getMovieType(){
        return KeyValue::getMediaTypes()->where('code','=', '0')->first();
    }

    public static function getSerieType(){
        return KeyValue::getMediaTypes()->where('code','=', '1')->first();
    }

    // Role KeyValue
    public static function getRoles(){
        return KeyValue::where('type','=', 'role');
    }

    public static function getUserRole(){
        return KeyValue::getRoles()->where('code','=', '0')->first();
    }

    // Status KeyValue
    public static function createPendingStatus(){
        return KeyValue::updateOrCreate([
            'type' => 'status',
            'code' => '0',
            'label' => 'pending'
        ]);
    }

    public static function getStatus(){
        return KeyValue::where('type','=', 'status');
    }

    public static function getPendingStatus(){
        return KeyValue::getStatus()->where('code','=', '0')->first();
    }
}
