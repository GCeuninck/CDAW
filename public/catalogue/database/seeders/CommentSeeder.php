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
        $nbMedia = 50;
        $medias = Media::take($nbMedia)->get();

        foreach ($users as $user){
            
            $i = 1;
            while ($i <= 3){
                $media = $medias[$i];

                $commentData = [
                    'comment' => $user->pseudo . ' has commented on this media : ' . $media->id_media,
                    'pseudo_comment' => $user->pseudo,
                    'id_media_comment' => $media->id_media,
                ];
                Comment::createComment($commentData);
                $i++;
            }
        }
    }
}
