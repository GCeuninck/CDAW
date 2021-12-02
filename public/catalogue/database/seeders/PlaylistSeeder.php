<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Playlist_media;
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
        //Etape 1

        //add conditions    

        $users = User::getUsers();
        
        foreach ($users as $user){
            
            $i = 1;
            while ($i <= 3){
                $playlistData = [
                    'name_playlist' => 'playlist' . $i,
                    'pseudo_playlist' => $user->pseudo
                ];
                Playlist::createPlaylist($playlistData);
                $i++;
            }
        }

        
        $nbMedia = 50;
        $medias = Media::take($nbMedia)->get();
        $playlists = Playlist::getPlaylists();

        foreach ($playlists as $playlist){
            $j = 1;
            foreach ($medias as $media){
                Playlist_media::addMediaPlaylist($media['id_media'], $playlist['id_playlist']);
                if($j == 3) { 
                    break; 
                }
                else{
                    $j++;
                }
            }
        }
        
    }
}
