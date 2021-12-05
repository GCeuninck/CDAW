<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Playlist extends Model
{
    use HasFactory;

    protected $table = 'playlist';
    protected $guarded = ['id_playlist'];
    protected $hidden = [];
    protected $primaryKey = 'id_playlist';

    public static function createPlaylist($playlist) {
        $data = [
            'name_playlist' => $playlist['name_playlist'],
            'creation_date' => Carbon::now()->format('Y-m-d'),
            'pseudo_playlist' => $playlist['pseudo_playlist']
        ];
        return Playlist::create($data);
    }

    public static function getPlaylists() {
        return Playlist::all();
    }

    public static function getPlaylist($id_playlist) {
        return Playlist::where('id_playlist', '=', $id_playlist)->first();
    }

    public static function getUserPlaylists($pseudo_playlist) {
        return Playlist::where('pseudo_playlist', '=', $pseudo_playlist);
    }

    public static function deletePlaylist($id_playlist){
        $playlist = Playlist::getPlaylist($id_playlist);
        $playlist->delete();
    }

    
}
