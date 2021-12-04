<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use DataTables;
use URL;

class historyController extends Controller
{
   
    public function showHistory($pseudo) {
        return view('userHistory', [$pseudo]);
    }

    public function showUserHistory($pseudo){
        $UserHistoryData = Action::where('code_action', '=' , 0)->where('pseudo_action', '=', $pseudo)->with('getMediaInfos')
        ->get();
        return Datatables::of($UserHistoryData)
        ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'. URL::asset('/media/' . $row->id_media_action) . '" class="edit btn btn-warning btn-sm">Voir</a>';
                return $btn;
            })
        ->rawColumns(['action'])
        ->make(true);
    }
}
