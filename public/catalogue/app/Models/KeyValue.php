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

    public static function getRoles(){
        return KeyValue::where('type','=', 'role');
    }

    public static function getUserRole(){
        return KeyValue::getRoles()->where('code','=', '0')->first();
    }

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
