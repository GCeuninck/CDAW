<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyValue extends Model
{
    use HasFactory;

    protected $table = 'keyvalue';

    protected $guarded = ['id_keyvalue'];
}
