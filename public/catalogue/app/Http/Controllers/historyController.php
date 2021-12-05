<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Media;
use DataTables;
use URL;

class historyController extends Controller
{
   
    public function showHistory($pseudo) {
        return view('userHistory', compact('pseudo'));
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
            ->addColumn('liked', function($row){
                if( Action::isLikedByUser($row->id_media_action,$row->pseudo_action))
                {
                    $bool =  '<p>Oui</p>';
                }else $bool = '<p>Non</p>';
                return $bool;
            })
            ->rawColumns(['action','liked'])

        ->make(true);
    }
}
