<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist_media extends Model
{
    use HasFactory;

    protected $table = 'playlist_media';
    protected $guarded = ['id_playlist_pm','id_media_pm'];
    protected $hidden = [];
}
