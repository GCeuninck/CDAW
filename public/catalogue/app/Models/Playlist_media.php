<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Playlist_media extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;

    protected $table = 'playlist_media';

    protected $primaryKey = ['id_playlist_pm','id_media_pm'];

	public $incrementing = false;

    protected $fillable = [
        'id_playlist_pm',
        'id_media_pm',
        'date_pm'
    ];

    protected $hidden = [];

    public static function addMediaPlaylist($id_media, $id_playlist) {
        $data = [
            'id_media_pm' => $id_media,
            'id_playlist_pm' => $id_playlist,
            'date_pm' => Carbon::now()->format('Y-m-d'),
        ];
        return Playlist_media::updateOrCreate($data);
    }

    public static function removeMediaPlaylist($id_playlist, $id_media){
        $playlist_media = Playlist_media::where('id_media_pm', '=', $id_media)->where('id_playlist_pm', '=', $id_playlist)->first();
        $playlist_media->delete();
    }

    public function getMediaInfosPlaylist(){
        return $this->belongsTo(Media::class, "id_media_pm", "id_media")->with('getMediaType'); 
    }
}
