<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist_media extends Model
{
    use HasFactory;

    protected $table = 'playlist_media';

    protected $fillable = [
        'id_playlist_pm',
        'id_media_pm'
    ];

    protected $hidden = [];

    public static function addMediaPlaylist($id_media, $id_playlist) {
        $data = [
            'id_media_pm' => $id_media,
            'id_playlist_pm' => $id_playlist,
        ];
        return $data;
    }
}
