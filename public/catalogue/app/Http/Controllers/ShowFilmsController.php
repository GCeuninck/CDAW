<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;
use App\Models\Media;
use App\Models\Action;
use App\Models\Tag;
use App\Models\KeyValue;
use App\Models\Playlist;
use App\Models\Playlist_media;
use DataTables;
use Auth;
use URL;

class ShowFilmsController extends Controller
{

    //jalon3
    public function showIndex() {
        $n=15;
        $sort = 'release_date';
        $direction = 'desc';
        $movies = Media::where('code_type', '=' , 0)->take($n)->orderBy($sort, $direction)->get();
        $series = Media::where('code_type', '=' , 1)->take($n)->orderBy($sort, $direction)->get();

        return view('index', compact('movies','series'));
    }

    public function showMediaDetail($id) {
        $media = Media::getMedia($id);
        if($media->detail == 0){
            Media::getMediaDetailFromIMDB($id);
            $media = Media::getMedia($id);
        }

        $genres = array();
        foreach(Tag::getTags($id)->get() as $tag){
            array_push($genres, KeyValue::getTag($tag['code_keyvalue_tag']));
        }

        $playlists = array();
        //Add Media to History if logged
        if(Auth::check()){
            $data = [
                'pseudo_action' => Auth::user()->pseudo,
                'id_media_action' => $media->id_media
            ];
            Action::createViewAction($data);

            $playlists = Playlist::getUserPlaylists(Auth::user()->pseudo)->get();
        }

        $allLikes = Action::getAllMediaLikes($id);
        $likes = count($allLikes);

        if(Auth::check())
        {
            $pseudo = Auth::user()->pseudo;
            $isLiked =Action::isLikedByUser($id,$pseudo);
        }

        return view('detail', compact('media', 'genres', 'playlists','likes','isLiked'));
    }

    public function addMediaToUserPlaylists($id, $id_playlist){
        Playlist_media::addMediaPlaylist($id, $id_playlist);

        return redirect('/media/' . $id); 
    }

    public function removeMediaUserPlaylist($pseudo, $idPlaylist, $idMedia){
        Playlist_media::removeMediaPlaylist($idPlaylist, $idMedia);
        return redirect($pseudo .'/playlists/'); 
    }

    public function likeMedia($id){
        $data = [
            'pseudo_action' => Auth::user()->pseudo,
            'id_media_action' => $id
        ];
        Action::createLikeAction($data);

        return redirect('/media/' . $id); 
    }

    public function dislikeMedia($id){
        $pseudo =  Auth::user()->pseudo;

        Action::deleteLikeAction($pseudo, $id);

        return redirect('/media/' . $id); 
    }

    public function showAllMedias() {
        $medias = Media::paginate(30);

        return view('allMedias', compact('medias'));
    }

    public function showAllMovies($sort='id_media',$direction='desc') {
        switch($sort)
        {
            case 'new':
                $sort_on='release_date';
                $direction='desc';
                break;
            case 'old':
                $sort_on='release_date';
                $direction='asc';
                break;
            case 'alpha':
                $sort_on='title';
                $direction='asc';
                break;
            case 'zeta':
                $sort_on='title';
                $direction='desc';
                break;
            default:
                $sort_on=$sort;
                break;
        }
        $medias = Media::getAllMovies($sort_on,$direction);
        $type='movies';

        return view('allMedias', compact('medias','sort','type'));
    }

    public function showAllSeries($sort='id_media',$direction='desc') {
        switch($sort)
        {
            case 'new':
                $sort_on='release_date';
                $direction='desc';
                break;
            case 'old':
                $sort_on='release_date';
                $direction='asc';
                break;
            case 'alpha':
                $sort_on='title';
                $direction='asc';
                break;
            case 'zeta':
                $sort_on='title';
                $direction='desc';
                break;
            default:
                $sort_on=$sort;
                break;
        }
        $medias = Media::getAllSeries($sort_on,$direction);
        $type='series';

        return view('allMedias', compact('medias','sort','type'));
    }
    
    public function showPlaylists($pseudo) {
        $playlists = Playlist::getUserPlaylists($pseudo)->get();
        return view('userPlaylists', compact('pseudo', 'playlists'));
    }

    public function showUserPlaylists($pseudo, $idPlaylist) {
        $mediasPlaylistId = Playlist_media::getAllMediaPlaylist($idPlaylist)->get('id_media_pm');
        return Datatables::of(Media::whereIn('id_media', $mediasPlaylistId)->get())
        ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'. URL::asset('/media/' . $row->id_media) . '" class="edit btn btn-warning btn-sm">Voir</a>';
                $btn = $btn.'
                    <form action="'. URL::asset(Auth::user()->pseudo .'/playlists/'. 1 . '/' . $row->id_media) . '" method="post">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="edit btn btn-danger btn-sm" type="submit">Supprimer</button>
                    </form>';
                return $btn;
            })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function showHistory($pseudo) {
        return view('userHistory', [$pseudo]);
    }

    public function showUserHistory($pseudo){
        $UserHistoryData = Action::with('getMediaInfos')->where('code_action', '=' , 0)->where('pseudo_action', '=', $pseudo)
        ->get();
        return Datatables::of($UserHistoryData)->make(true);
    }


    //jalon2
    public function showAllFilms() {
        $films = Film::with('category')->get();
        $categories = Category::all();

        $data = [
            "films" => $films,
            "categories" => $categories
        ];

        return view('films', $data);
    }

    //edit view
    public function edit($id)

    {
        $film = Film::findOrFail($id);
        $categories = Category::where('id', '!=' , $film->category_id)->get();

        return view('edit',compact('film','categories'));
    }

    public function update(Request $request, $id)
    {       

        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'director' => 'required|max:30',
            'category_id' => 'required'
        ]);

        Film::whereId($id)->update($validatedData);

        return redirect('/films')->with('success', 'Film mis à jour avec succès');
    }

    public function addFilm(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'director' => 'required|max:30',
            'category_id' => 'required'
        ]);

        Film::create($validatedData);

        return redirect('/films')->with('success','Film créé');
    }

    public function destroy($id) {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect('/films');
    }

}
