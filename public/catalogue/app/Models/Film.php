<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $guarded = ['id'];
    protected $hidden = [];

    public function category(){
        // return $films = Film::select("films.name", "director", "categories.name")->join("categories", "films.category_id", "=", "categories.id");
        return $this->belongsTo(Category::class, "category_id", "id"); //Objet retourné, Id permettant d'identifier l'objet, la clé qui fait référence à l'id
    }
}
