<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowFilmsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//GET FILMS ROUTE
Route::get('/films', 'App\Http\Controllers\ShowFilmsController@showAllFilms');

//CREATE FILM ROUTE
Route::post('/films', 'App\Http\Controllers\ShowFilmsController@addFilm');

//EDIT FILM ROUTE
Route::get('/films/edit/{id}', 'App\Http\Controllers\ShowFilmsController@edit');
Route::put('/films/edit/{id}', 'App\Http\Controllers\ShowFilmsController@update');

//DELETE FILM ROUTE
Route::delete('/films/{id}','App\Http\Controllers\ShowFilmsController@destroy');

//GET CATEGORIES ROUTE
Route::get('/categories', 'App\Http\Controllers\listeMediasController@getCategories');

//GET MEDIAS LIST ROUTE
//Route::get('/', 'App\Http\Controllers\listeMediasController@getListeMedias');

//INDEX
Route::get('/', 'App\Http\Controllers\ShowFilmsController@showIndex');
Route::get('/all', 'App\Http\Controllers\ShowFilmsController@showAllMedias');


//DETAIL
Route::get('/media/{id}', 'App\Http\Controllers\ShowFilmsController@showMediaDetail');

//ROUTES PROTEGEES
Route::get('/user/playlists', 'App\Http\Controllers\ShowFilmsController@showUserPlaylists')->middleware('auth');
Route::get('/{pseudo}/history', 'App\Http\Controllers\ShowFilmsController@showHistory')->middleware('auth');
Route::get('/{pseudo}/history/list', [ShowFilmsController::class, 'showUserHistory'])->middleware('auth')->name('history.list');;


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
