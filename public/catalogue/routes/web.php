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

// Route::get('/{name}/{firstname}', function ($name, $firstname) {
//     echo 'Nom :' . $name . ' Prénom :' . $firstname;
// })->whereAlpha('name')-> whereAlpha('firstname');
// Route::get('/', function () {
//     return view('listeMedias');
// });


//  
Route::get('/categories', 'App\Http\Controllers\listeMediasController@getCategories'); 

Route::get('/', 'App\Http\Controllers\listeMediasController@getListeMedias');
Route::get('/index', 'App\Http\Controllers\listeMediasController@getIndex');







