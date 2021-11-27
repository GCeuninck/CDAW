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
        $actions = array();

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
                    'comment' => $user->pseudo . ' has seen this media : ' . $media->title,
                    'code_status' => KeyValue::getPendingStatus()['code'],
                    'pseudo_playlist' => $user->pseudo
                ];
                array_push($actions, Action::createAction($actionViewData));

                $actionCommentData = [
                    'code_action' => '1',
                    'label_action' => 'comment',
                    'date_action' => Carbon::now()->format('Y-m-d'),
                    'pseudo_action' => $user->pseudo,
                    'id_media_action' => $media->id_media,
                    'comment' => $user->pseudo . ' has commented on this media : ' . $media->title,
                    'code_status' => KeyValue::getPendingStatus()['code'],
                    'pseudo_playlist' => $user->pseudo
                ];
                array_push($actions, Action::createAction($actionCommentData));
                $i++;
            }
        }

        foreach($actions as $action)
        {
            DB::table('action')->insert([
                'code_action' => $action['code_action'],
                'label_action' => $action['label_action'],
                'date_action' => $action['date_action'],
                'pseudo_action' => $action['pseudo_action'],
                'id_media_action' => $action['id_media_action'],
                'comment' => $action['comment'],
                'code_status' => $action['code_status']
                ]
            );
        }
    }
}
