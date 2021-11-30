<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;
use App\Models\Media;
use App\Models\Action;
use DataTables;


class ShowFilmsController extends Controller
{

    //jalon3
    public function showAllMedias() {
        $n=15;
        $movies = Media::where('code_type', '=' , 0)->take($n)->get();
        $series = Media::where('code_type', '=' , 1)->take($n)->get();

        return view('index', compact('movies','series'));
    }

    public function showMediaDetail($id) {
        $media = Media::where('id_media', '=' , $id)->first();

        return view('detail', compact('media'));
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
