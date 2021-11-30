<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $guarded = ['id_media'];
    protected $hidden = [];

    public static function createMedia($media, $type) {
        $data = [
            'id_media' => $media['id'] ,
            'title' => $media['title'],
            'release_date' => $media['year'],
            'poster_link' => $media['image'],
            'code_type' => $type
        ];
        return $data;
    }

    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id"); //Objet retourné, Id permettant d'identifier l'objet, la clé qui fait référence à l'id
    }
}
