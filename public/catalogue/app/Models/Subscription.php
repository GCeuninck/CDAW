<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;

    protected $table = 'subscription';

    protected $fillable = [
        'id_playlist_sub',
        'pseudo_sub'
    ];

    protected $primaryKey = ['id_playlist_sub','pseudo_sub'];

    protected $guarded = ['id_playlist_sub ', 'pseudo_sub '];

    public static function getSub($pseudo_sub, $id_playlist_sub) {
        return Subscription::where('pseudo_sub', '=', $pseudo_sub)->where('id_playlist_sub', '=', $id_playlist_sub)->first();
    }

    public static function addSubPlaylist($pseudo_sub, $id_playlist_sub) {
        $data = [
            'pseudo_sub' => $pseudo_sub,
            'id_playlist_sub' => $id_playlist_sub
        ];
        return Subscription::create($data);
    }

    public static function deleteSub($pseudo_sub, $id_playlist_sub){
        $sub = Subscription::getSub($pseudo_sub, $id_playlist_sub);
        $sub->delete();
    }

    public static function getUserSubscription($pseudo){
        return Subscription::where('pseudo_sub', '=', $pseudo)->with('getPlaylistInfos');
    }

    public function getPlaylistInfos(){
        return $this->belongsTo(Playlist::class, "id_playlist_sub", "id_playlist"); 
    }
}
