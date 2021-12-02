<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\KeyValue;
use App\Models\User;
use App\Models\Media;
use App\Models\Action;
use Carbon\Carbon;

class ActionSeeder extends Seeder
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
                $actionViewData = [
                    'code_action' => '0',
                    'label_action' => 'view',
                    'date_action' => Carbon::now()->format('Y-m-d'),
                    'pseudo_action' => $user->pseudo,
                    'id_media_action' => $media->id_media,
                    'comment' => $user->pseudo . ' has seen this media : ' . $media->id_media,
                    'code_status' => KeyValue::getStatus('0')['code'],
                ];
                Action::createAction($actionViewData);

                $actionCommentData = [
                    'code_action' => '1',
                    'label_action' => 'comment',
                    'date_action' => Carbon::now()->format('Y-m-d'),
                    'pseudo_action' => $user->pseudo,
                    'id_media_action' => $media->id_media,
                    'comment' => $user->pseudo . ' has commented on this media : ' . $media->id_media,
                    'code_status' => KeyValue::getStatus('0')['code'],
                ];
                Action::createAction($actionCommentData);
                $i++;
            }
        }
    }
}
