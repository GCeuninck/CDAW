<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;
use App\Models\Media;
use App\Models\Action;
use DataTables;
use Auth;

class ShowFilmsController extends Controller
{

    //jalon3
    public function showIndex() {
        $n=15;
        $movies = Media::where('code_type', '=' , 0)->take($n)->get();
        $series = Media::where('code_type', '=' , 1)->take($n)->get();

        return view('index', compact('movies','series'));
    }

    public function showMediaDetail($id) {
        $media = Media::getMedia($id);
        if($media->duration == null){
            Media::getMediaDetailFromIMDB($id);
            $media = Media::getMedia($id);
        }

        //Add Media to History if logged
        if(Auth::check()){
            $data = [
                'pseudo_action' => Auth::user()->pseudo,
                'id_media_action' => $media->id_media
            ];
            Action::createViewAction($data);
        }

        return view('detail', compact('media'));
    }

    public function showAllMedias() {
        $medias = Media::all();

        return view('allMedias', compact('medias'));
    }
    
    public function showUserPlaylists() {
        //todo

        return view('userPlaylists');
    }

    public function showHistory($pseudo) {
        return view('userHistory', [$pseudo]);
    }

    public function showUserHistory($pseudo){
        $UserHistoryId = Action::where('code_action', '=' , 0)->where('pseudo_action', '=', $pseudo)->get('id_media_action');
        return Datatables::of(Media::whereIn('id_media', $UserHistoryId)->get())->make(true);
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
