<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $table = 'playlist';
    protected $guarded = ['id_playlist'];
    protected $hidden = [];

    public static function createPlaylist($playlist) {
        $data = [
            'name_playlist' => $playlist['name_playlist'],
            'creation_date' => $playlist['creation_date'],
            'pseudo_playlist' => $playlist['pseudo_playlist']
        ];
        return Playlist::create($data);
    }

    public static function getPlaylists() {
        return Playlist::all();
    }

    public static function getUserPlaylists($pseudo_playlist) {
        return Playlist::where('pseudo_playlist', '=', $pseudo_playlist);
    }
}
