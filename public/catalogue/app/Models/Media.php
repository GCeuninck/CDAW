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

    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id"); //Objet retourné, Id permettant d'identifier l'objet, la clé qui fait référence à l'id
    }
}
