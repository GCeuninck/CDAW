<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
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
        $playlists = array();
        
        foreach ($users as $user){
            
            $i = 1;
            while ($i <= 3){
                $playlistData = [
                    'name_playlist' => 'playlist' . $i,
                    'creation_date' =>  Carbon::now()->format('Y-m-d'),
                    'pseudo_playlist' => $user->pseudo
                ];
                array_push($playlists, Playlist::createPlaylist($playlistData));
                $i++;
            }
        }

        foreach($playlists as $playlist)
        {
            DB::table('playlist')->insert([
                'name_playlist' => $playlist['name_playlist'],
                'creation_date' => $playlist['creation_date'],
                'pseudo_playlist' => $playlist['pseudo_playlist']
                ]
            );
        }

        
        $nbMedia = 50;
        $medias = Media::take($nbMedia)->get();
        $playlists = Playlist::getPlaylists();
        $playlists_media = array();

        foreach ($playlists as $playlist){
            $j = 1;
            foreach ($medias as $media){
                array_push($playlists_media, Playlist_media::addMediaPlaylist($media['id_media'], $playlist['id_playlist']));
                if($j == 3) { 
                    break; 
                }
                else{
                    $j++;
                }
            }
        }

        foreach($playlists_media as $playlist_media)
        {
            DB::table('playlist_media')->insert([
                'id_playlist_pm' => $playlist_media['id_playlist_pm'],
                'id_media_pm' => $playlist_media['id_media_pm']
                ]
            );
        }
        
    }
}
