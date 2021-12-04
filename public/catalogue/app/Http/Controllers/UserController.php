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
        $currentUserRole = '';
        if(Auth::check()){
            $currentUserRole = User::getUserInfos(Auth::user()->pseudo)->code_role;
        }
        return view('users', compact('isAdmin'));
    }

    public function showUsersDatatable(){
        $UsersData = User::with('getRoleInfos')->get();
        $currentUserRole = '';
        $currentUserPseudo = '';
        if(Auth::check()){
            $currentUser = User::getUserInfos(Auth::user()->pseudo);
            $currentUserRole = $currentUser->code_role;
            $currentUserPseudo = $currentUser->pseudo;
        }

        return Datatables::of($UsersData)
        ->addIndexColumn()
            ->addColumn('action', function($row) use($currentUserRole, $currentUserPseudo){
                $btn = '<div class="row">';
                if($row->code_role != '2' and $row->code_role != '1' and $currentUserRole == '1'){
                    $btn = $btn.'
                    <div class="col-sm-2">
                        <form action="'. URL::asset('/users/list/ban/' . $row->pseudo) . '" method="post">
                            '.csrf_field().'
                            <button class="edit btn btn-danger btn-align" type="submit">Bannir</button>
                        </form>
                    </div>';
                }
                if($row->code_role == '2' and $currentUserRole == '1'){
                    $btn = $btn.'
                    <div class="col-sm-2">
                        <form action="'. URL::asset('/users/list/unban/' . $row->pseudo) . '" method="post">
                            '.csrf_field().'
                            <button class="edit btn btn-warning btn-align" type="submit">Débannir</button>
                        </form>
                    </div>';
                }
                if($row->code_role != '2' and $row->code_role != '1' and $currentUserRole == '1'){
                    $btn = $btn.'
                    <div class="col-sm-2">
                        <form action="'. URL::asset('/users/list/promote/' . $row->pseudo) . '" method="post">
                            '.csrf_field().'
                            <button class="edit btn btn-success btn-align" type="submit">Promouvoir</button>
                        </form>
                    </div>';
                }
                if($row->code_role == '1' and $row->pseudo != $currentUserPseudo and $currentUserRole == '1'){
                    $btn = $btn.'
                    <div class="col-sm-2">
                        <form action="'. URL::asset('/users/list/dismiss/' . $row->pseudo) . '" method="post">
                            '.csrf_field().'
                            <button class="edit btn btn-info btn-align" type="submit">Destituer</button>
                        </form>
                    </div>';
                }
                $btn = $btn . '</div>';
                return $btn;
            })
            ->rawColumns(['action'])->make(true);
    }

    public function banUser($pseudo)
    {
        if(User::isAdmin()){
            User::getUserInfos($pseudo)->update(['code_role' => '2']);
        }
        return redirect('/users');
    }

    public function unbanUser($pseudo)
    {
        if(User::isAdmin()){
            User::getUserInfos($pseudo)->update(['code_role' => '0']);
        }
        return redirect('/users');
    }

    public function promoteUser($pseudo)
    {
        if(User::isAdmin()){
            User::getUserInfos($pseudo)->update(['code_role' => '1']);
        }
        return redirect('/users');
    }

    public function dismissUser($pseudo)
    {
        if(User::isAdmin()){
            User::getUserInfos($pseudo)->update(['code_role' => '0']);
        }
        return redirect('/users');
    }
}
