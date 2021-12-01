<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tag';

    protected $fillable = [
        'code_keyvalue_tag',
        'id_media_tag'
    ];

    public static function getTags($id_media_tag){
        return Tag::where('id_media_tag', '=' , $id_media_tag);
    }
}
