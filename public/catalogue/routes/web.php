<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\listeMediasController@getIndex');
Route::get('/profile', 'App\Http\Controllers\listeMediasController@getProfile');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
