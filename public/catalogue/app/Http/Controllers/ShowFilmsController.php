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

    // public function UpdateFilm(Request $request, Film $film) {
    //     $name = $request->input('titleMovie');
    //     $director = $request->input('directorMovie');
    //     $categoryId = $request->input('category');

    //     $data = [
    //         "name" => $name,
    //         "director" => $director,
    //         "category_id" => $categoryId
    //     ];

    //     $film->update($data);

    //     return view('/films');
    // }

    //edit view
    public function edit($id)

    {
        $film = Film::findOrFail($id);
        $categories = Category::all();
    
        return view('edit',compact('film','categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:20',
            'director' => 'required|max:30',
            'category_id' => 'required'
        ]);

        Film::whereId($id)->update($validatedData);

        return redirect('/films')->with('success', 'Film mis à jour avec succès');
    }

    public function addFilm(Request $request) {
        // $name = $request->input('titleMovie');
        // $director = $request->input('directorMovie');
        // $categoryId = $request->input('category');

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
