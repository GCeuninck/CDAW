<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Playlist_media;
use App\Models\Subscription;
use DataTables;
use URL;
use Auth;

class playlistController extends Controller
{
    public function addMediaToUserPlaylists($id, $id_playlist){
        Playlist_media::addMediaPlaylist($id, $id_playlist);

        return redirect('/media/' . $id); 
    }

    public function addPlaylist(Request $request, $pseudo) {

        $validatedData = $request->validate([
            'name' => 'required|max:30',
        ]);

        $playlistData = [
            'name_playlist' => $validatedData['name'],
            'pseudo_playlist' => $pseudo
        ];
        
        Playlist::createPlaylist($playlistData);

        return redirect($pseudo .'/playlists/');
    }

    public function createAndAddPlaylist(Request $request, $id) {

        $pseudo = Auth::user()->pseudo;

        $validatedData = $request->validate([
            'name' => 'required|max:30',
        ]);

        $playlistData = [
            'name_playlist' => $validatedData['name'],
            'pseudo_playlist' => $pseudo
        ];
        
        $playlist = Playlist::createPlaylist($playlistData);
        Playlist_media::addMediaPlaylist($id, $playlist->id_playlist);

        return redirect($pseudo .'/playlists/');
    }

    public function removeSubPlaylist($pseudo, $idPlaylist){
        Subscription::deleteSub($pseudo, $idPlaylist);
        return redirect($pseudo .'/playlists/');
    }

    public function removeUserPlaylist($pseudo, $idPlaylist){
        Playlist::deletePlaylist($idPlaylist);
        return redirect($pseudo .'/playlists/');
    }

    public function removeMediaUserPlaylist($pseudo, $idPlaylist, $idMedia){
        Playlist_media::removeMediaPlaylist($idPlaylist, $idMedia);
        return redirect($pseudo .'/playlists/'); 
    }

    public function subUserPlaylist($pseudo, $idPlaylist){
        Subscription::addSubPlaylist(Auth::user()->pseudo, $idPlaylist);
        return redirect($pseudo .'/playlists/');
    }   

    public function showPlaylists($pseudo) {
        $playlists = Playlist::getUserPlaylists($pseudo)->get();
        $subPlaylists = Subscription::getUserSubscription($pseudo)->get();

        $currentUserRole = '';
        if(Auth::Check()){
            $currentUserRole = User::getUserInfos(Auth::user()->pseudo)->code_role;
        }
        return view('userPlaylists', compact('pseudo', 'playlists', 'subPlaylists', 'currentUserRole'));
    }


    public function showUserPlaylists($pseudo, $idPlaylist) {
        $mediasPlaylistData = Playlist_media::where('id_playlist_pm', '=', $idPlaylist)->with('getMediaInfosPlaylist')
        ->get();

        $creatorPlaylist = Playlist::where('id_playlist', '=', $idPlaylist)->first()->pseudo_playlist;

        $currentUserRole = '';
        $currentUserPseudo = '';
        if(Auth::check()){
            $currentUser = User::getUserInfos(Auth::user()->pseudo);
            $currentUserRole = $currentUser->code_role;
            $currentUserPseudo = $currentUser->pseudo;
        }

        return Datatables::of($mediasPlaylistData)
        ->addIndexColumn()
            ->addColumn('action', function($row) use ($pseudo, $idPlaylist, $currentUserRole, $currentUserPseudo, $creatorPlaylist){
                $btn = '<div class="row">
                    <div class="col-sm-3">
                        <a href="'. URL::asset('/media/' . $row->id_media_pm) . '" class="edit btn btn-warning ">Voir</a>
                    </div>';
                
                if($currentUserRole == '1' or $creatorPlaylist == $currentUserPseudo){
                    $btn = $btn.'
                    <div class="col-sm-3">
                        <form action="'. URL::asset($pseudo .'/playlists/'. $idPlaylist . '/' . $row->id_media_pm) . '" method="post">
                            '.csrf_field().'
                            '.method_field("DELETE").'
                            <button class="edit btn btn-danger btn-align" type="submit">Supprimer</button>
                        </form>
                    </div>';
                }
                $btn = $btn . '</div>';
                return $btn;
            })
        ->rawColumns(['action'])
        ->make(true);
    }
}
