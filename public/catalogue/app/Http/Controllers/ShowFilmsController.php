<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;

class ShowFilmsController extends Controller
{
    public function showAllFilms() {
        $films = Film::with('category')->get();
        $categories = Category::all();

        $data = [
            "films" => $films,
            "categories" => $categories
        ];

        return view('films', $data);
    }

    public function UpdateFilm(Request $request, Film $film) {
        $name = $request->input('titleMovie');
        $director = $request->input('directorMovie');
        $categoryId = $request->input('category');

        $data = [
            "name" => $name,
            "director" => $director,
            "category_id" => $categoryId
        ];

        $film->update($data);

        return redirect('/films');
    }

    public function addFilm(Request $request) {
        $name = $request->input('titleMovie');
        $director = $request->input('directorMovie');
        $categoryId = $request->input('category');

        // $data = [
        //     "name" => $name,
        //     "director" => $director,
        //     "category_id" => $categoryId
        // ];

        $validatedData = $request->validate([
            'name' => 'required|max:20',
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
