<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Action;
use App\Models\Tag;
use App\Models\KeyValue;
use App\Models\Playlist;
use App\Models\Playlist_media;
use App\Models\Comment;
use Auth;

class ShowMediasController extends Controller
{
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
        }else
        {
            $isLiked = false;
        }

        $comments = Comment::getAllMediaComments($id);

        return view('detail', compact('media', 'genres', 'playlists','likes','isLiked', 'comments'));
    }

    public function addComment(Request $request, $id){

        $validatedData = $request->validate([
            'comment' => 'required|max:300',
        ]);

        $commentData = [
            'comment' => $validatedData['comment'],
            'pseudo_comment' => Auth::user()->pseudo,
            'id_media_comment' => $id,
        ];
        
        Comment::createComment($commentData);

        return redirect('/media/' . $id);
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
}
