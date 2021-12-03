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
