<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Media;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::getUsers();

        //User1 : 2 commentaires sur un même film
        $comment1 = [
            'comment' => "J'adore ce film, je recommande !",
            'pseudo_comment' => $users[0]->pseudo,
            'id_media_comment' => Media::getMedia('tt1160419')->id_media,
        ];
        Comment::createComment($comment1);

        $comment2 = [
            'comment' => "Mieux que la première version",
            'pseudo_comment' => $users[0]->pseudo,
            'id_media_comment' => Media::getMedia('tt1160419')->id_media,
        ];
        Comment::createComment($comment2);

        //User2 : 1 commentaire sur un film et une série
        $comment3 = [
            'comment' => "Star Wars restera supérieur dans mon coeur...",
            'pseudo_comment' => $users[1]->pseudo,
            'id_media_comment' => Media::getMedia('tt1160419')->id_media,
        ];
        Comment::createComment($comment3);

        $comment4 = [
            'comment' => "J'adore !",
            'pseudo_comment' => $users[1]->pseudo,
            'id_media_comment' => Media::getMedia('tt9174558')->id_media,
        ];
        Comment::createComment($comment4);
    }
}
