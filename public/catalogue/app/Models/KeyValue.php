<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyValue extends Model
{
    use HasFactory;

    protected $table = 'keyvalue'; 
    
    protected $fillable = [
        'type',
        'code',
        'label'
    ];

    public static function createTag($label){
        return KeyValue::Create([
            'type' => 'tag',
            'code' => count(KeyValue::getAllTags()->get()),
            'label' => $label
        ]);
    }

    // Roles Creation
    public static function createUserRole(){
        return KeyValue::updateOrCreate([
            'type' => 'role',
            'code' => '0',
            'label' => 'user'
        ]);
    }

    public static function createAdminRole(){
        return KeyValue::updateOrCreate([
            'type' => 'role',
            'code' => '1',
            'label' => 'admin'
        ]);
    }

    public static function createBlockedRole(){
        return KeyValue::updateOrCreate([
            'type' => 'role',
            'code' => '2',
            'label' => 'blocked'
        ]);
    }

    public static function createRoles(){
        KeyValue::createUserRole();
        KeyValue::createAdminRole();
        KeyValue::createBlockedRole();
    }

    //Media Type Creation
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

    public static function createMediaTypes(){
        KeyValue::createMovieType();
        KeyValue::createSerieType();
    }

    // Status Creation
    public static function createPendingStatus(){
        return KeyValue::updateOrCreate([
            'type' => 'status',
            'code' => '0',
            'label' => 'pending'
        ]);
    }

    public static function createModeratedStatus(){
        return KeyValue::updateOrCreate([
            'type' => 'status',
            'code' => '1',
            'label' => 'moderated'
        ]);
    }

    public static function createStatus(){
        KeyValue::createPendingStatus();
        KeyValue::createModeratedStatus();
    }

    // Get Media Types
    public static function getAllMediaTypes(){
        return KeyValue::where('type','=', 'media_type');
    }

    public static function getMediaType($code){
        return KeyValue::getAllMediaTypes()->where('code','=', $code)->first();
    }

    // Get Roles
    public static function getAllRoles(){
        return KeyValue::where('type','=', 'role');
    }

    public static function getRole($code){
        return KeyValue::getAllRoles()->where('code','=', $code)->first();
    }

    // Get Status
    public static function getAllStatus(){
        return KeyValue::where('type','=', 'status');
    }

    public static function getStatus($code){
        return KeyValue::getAllStatus()->where('code','=', $code)->first();
    }

    // Get Tags
    public static function getAllTags(){
        return KeyValue::where('type','=', 'tag');
    }

    public static function getTag($code){
        return KeyValue::getAllTags()->where('code','=', $code)->first();
    }

    public static function getTagWithLabel($label){
        return KeyValue::getAllTags()->where('label','=', $label)->first();
    }
}
