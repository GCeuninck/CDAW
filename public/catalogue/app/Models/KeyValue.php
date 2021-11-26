<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyValue extends Model
{
    use HasFactory;

    protected $table = 'keyvalue';

    protected $guarded = ['id_keyvalue'];
    

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
}
