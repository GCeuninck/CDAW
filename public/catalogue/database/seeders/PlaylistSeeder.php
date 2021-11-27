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

        $nbMedia = 50;

        $users = User::getUsers();
        $medias = Media::take($nbMedia)->get();

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

        
    }
}
