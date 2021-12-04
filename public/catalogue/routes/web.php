<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowFilmsController;
use App\Http\Controllers\ShowMediasController;
use App\Http\Controllers\playlistController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\UserController;

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

//INDEX
Route::get('/', 'App\Http\Controllers\ShowMediasController@showIndex');

//ALL MEDIAS
Route::get('/{type}/sort/{sort?}/search/{search?}','App\Http\Controllers\ShowMediasController@showMedias')->name('medias');
Route::post('/medias/search','App\Http\Controllers\ShowMediasController@searchMedia')->name('medias.search');


//OLD
//Route::get('/all', 'App\Http\Controllers\ShowMediasController@showAllMedias');
// Route::get('/all/movies/{sort?}', 'App\Http\Controllers\ShowMediasController@showAllMovies')->name('all.movies');
// Route::get('/all/series/{sort?}', 'App\Http\Controllers\ShowMediasController@showAllSeries')->name('all.series');

//DETAIL
Route::get('/media/{id}', 'App\Http\Controllers\ShowMediasController@showMediaDetail');

//ROUTES PROTEGEES
Route::get('/user/playlists', 'App\Http\Controllers\playlistController@showUserPlaylists')->middleware('auth');

//DETAIL
Route::post('/media/{id}/addPlaylist/{id_playlist}', 'App\Http\Controllers\playlistController@addMediaToUserPlaylists')->middleware('auth')->name('media.addPlaylist');
Route::post('/media/{id}/like', 'App\Http\Controllers\ShowMediasController@likeMedia')->middleware('auth')->name('media.like');
Route::post('/media/{id}/dislike', 'App\Http\Controllers\ShowMediasController@dislikeMedia')->middleware('auth')->name('media.dislike');
Route::post('/media/{id}/comment', 'App\Http\Controllers\ShowMediasController@addComment')->middleware('auth')->name('media.comment');

//HISTORY
Route::get('/{pseudo}/history', 'App\Http\Controllers\historyController@showHistory')->middleware('auth');
Route::get('/{pseudo}/history/list', [historyController::class, 'showUserHistory'])->middleware('auth')->name('history.list');

//PLAYLIST
Route::get('/{pseudo}/playlists', 'App\Http\Controllers\playlistController@showPlaylists')->middleware('auth');
Route::get('/{pseudo}/playlists/list/{idPlaylist}', [playlistController::class, 'showUserPlaylists'])->middleware('auth')->name('playlist.list');
Route::post('/{pseudo}/playlists/list','App\Http\Controllers\playlistController@addPlaylist')->middleware('auth')->name('playlist.add');
Route::delete('/{pseudo}/playlists/list/{idPlaylist}','App\Http\Controllers\playlistController@removeUserPlaylist')->middleware('auth')->name('playlist.delete');
Route::delete('/{pseudo}/playlists/{idPlaylist}/{idMedia}','App\Http\Controllers\playlistController@removeMediaUserPlaylist')->middleware('auth');

//USERS
Route::get('/users', 'App\Http\Controllers\UserController@showAllUsers');
Route::get('/users/list', [UserController::class, 'showUsersDatatable'])->name('users.list');
Route::post('/users/list/ban/{pseudo}','App\Http\Controllers\UserController@banUser')->middleware('auth')->name('user.ban');
Route::post('/users/list/unban/{pseudo}','App\Http\Controllers\UserController@unbanUser')->middleware('auth')->name('user.unban');
Route::post('/users/list/promote/{pseudo}','App\Http\Controllers\UserController@promoteUser')->middleware('auth')->name('user.promote');
Route::post('/users/list/dismiss/{pseudo}','App\Http\Controllers\UserController@dismissUser')->middleware('auth')->name('user.dismiss');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//JALON 2 - not used
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
