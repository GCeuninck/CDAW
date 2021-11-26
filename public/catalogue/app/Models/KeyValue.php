<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyValue extends Model
{
    use HasFactory;

    protected $table = 'keyvalue';    

    public function createUserRole(){
        return KeyValue::create([
            'type' => 'role',
            'code' => '0',
            'label' => 'user'
        ]);
    }

    public function createMovieType(){
        return KeyValue::create([
            'type' => 'media_type',
            'code' => '0',
            'label' => 'movie'
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
    public function createPendingStatus(){
        return KeyValue::create([
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
