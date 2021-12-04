<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $guarded = ['id_comment'];

    protected $fillable = [
        'date_comment',
        'pseudo_comment',
        'id_media_comment',
        'comment',
        'code_status',
    ];

    public static function createComment($commentData){
        $data = [
            'date_comment' => Carbon::now()->format('Y-m-d'),
            'pseudo_comment' => $commentData['pseudo_comment'],
            'id_media_comment' => $commentData['id_media_comment'],
            'comment' => $commentData['comment'],
            'code_status' => '0',
        ];
        return Comment::updateOrCreate($data);
    }

    public static function getAllMediaComments($id) {
        return Comment::where('id_media_comment', '=', $id)->get();
    }
}
