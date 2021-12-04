<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

class UserController extends Controller
{
   
    public function showAllUsers() {
        $isAdmin = User::isAdmin();
        return view('users', compact('isAdmin'));
    }

    //TODO
    public function showUsersDatatable(){
        $UsersData = User::with('getRoleInfos')->get();
        return Datatables::of($UsersData)->make(true);
    }
}
