<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Playlist_media;
use App\Models\Subscription;
use App\Models\Media;


class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::getUsers();

        //User1 : 1 playlist film, 1 playlist série
        $playlistData = [
            'name_playlist' => 'Playlist films',
            'pseudo_playlist' => $users[0]->pseudo
        ];
        $playlist1 = Playlist::createPlaylist($playlistData);

        $playlistData = [
            'name_playlist' => 'playlist séries',
            'pseudo_playlist' => $users[0]->pseudo
        ];
        $playlist2 = Playlist::createPlaylist($playlistData);

        Playlist_media::addMediaPlaylist(Media::getMedia('tt15097216')->id_media, $playlist1->id_playlist);
        Playlist_media::addMediaPlaylist(Media::getMedia('tt12361178')->id_media, $playlist1->id_playlist);
        Playlist_media::addMediaPlaylist(Media::getMedia('tt1160419')->id_media, $playlist1->id_playlist);

        Playlist_media::addMediaPlaylist(Media::getMedia('tt9174558')->id_media, $playlist2->id_playlist);
        Playlist_media::addMediaPlaylist(Media::getMedia('tt6741278')->id_media, $playlist2->id_playlist);
        Playlist_media::addMediaPlaylist(Media::getMedia('tt9140342')->id_media, $playlist2->id_playlist);

        //User2 : 1 playlist films et séries
        $playlistData = [
            'name_playlist' => 'Playlist films et séries',
            'pseudo_playlist' => $users[1]->pseudo
        ];
        $playlist3 = Playlist::createPlaylist($playlistData);

        Playlist_media::addMediaPlaylist(Media::getMedia('tt15097216')->id_media, $playlist3->id_playlist);
        Playlist_media::addMediaPlaylist(Media::getMedia('tt12361178')->id_media, $playlist3->id_playlist);
        Playlist_media::addMediaPlaylist(Media::getMedia('tt1160419')->id_media, $playlist3->id_playlist);
        Playlist_media::addMediaPlaylist(Media::getMedia('tt9174558')->id_media, $playlist3->id_playlist);
        Playlist_media::addMediaPlaylist(Media::getMedia('tt6741278')->id_media, $playlist3->id_playlist);
        Playlist_media::addMediaPlaylist(Media::getMedia('tt9140342')->id_media, $playlist3->id_playlist);
        
        //User3 : 1 playlist vide
        $playlistData = [
            'name_playlist' => 'Playlist vide',
            'pseudo_playlist' => $users[2]->pseudo
        ];
        $playlist4 = Playlist::createPlaylist($playlistData);

        //User1 : 2 abonnements à Playlist3 et Playlist4
        Subscription::addSubPlaylist($users[0]->pseudo, $playlist3->id_playlist);
        Subscription::addSubPlaylist($users[0]->pseudo, $playlist4->id_playlist);

        //User3 : 1 abonnement à Playlist1
        Subscription::addSubPlaylist($users[2]->pseudo, $playlist1->id_playlist);
        
    }
}
