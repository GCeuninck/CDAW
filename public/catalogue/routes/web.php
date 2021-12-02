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


//INDEX
Route::get('/', 'App\Http\Controllers\ShowFilmsController@showIndex');

//ALL
//Route::get('/all', 'App\Http\Controllers\ShowFilmsController@showAllMedias');
Route::get('/all/movies/{sort?}', 'App\Http\Controllers\ShowFilmsController@showAllMovies')->name('all.movies');
Route::get('/all/series/{sort?}', 'App\Http\Controllers\ShowFilmsController@showAllSeries')->name('all.series');;

//DETAIL
Route::get('/media/{id}', 'App\Http\Controllers\ShowFilmsController@showMediaDetail');

//ROUTES PROTEGEES
Route::get('/user/playlists', 'App\Http\Controllers\ShowFilmsController@showUserPlaylists')->middleware('auth');

//DETAIL
Route::post('/media/{id}/addPlaylist/{id_playlist}', 'App\Http\Controllers\ShowFilmsController@addMediaToUserPlaylists')->middleware('auth')->name('media.addPlaylist');
Route::post('/media/{id}/like', 'App\Http\Controllers\ShowFilmsController@likeMedia')->middleware('auth')->name('media.like');
Route::post('/media/{id}/dislike', 'App\Http\Controllers\ShowFilmsController@dislikeMedia')->middleware('auth')->name('media.dislike');

//HISTORY
Route::get('/{pseudo}/history', 'App\Http\Controllers\ShowFilmsController@showHistory')->middleware('auth');
Route::get('/{pseudo}/history/list', [ShowFilmsController::class, 'showUserHistory'])->middleware('auth')->name('history.list');

//PLAYLIST
Route::get('/{pseudo}/playlists', 'App\Http\Controllers\ShowFilmsController@showPlaylists')->middleware('auth');
Route::get('/{pseudo}/playlists/list/{idPlaylist}', [ShowFilmsController::class, 'showUserPlaylists'])->middleware('auth')->name('playlist.list');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
