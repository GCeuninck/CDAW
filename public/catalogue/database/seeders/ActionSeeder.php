<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Media;
use App\Models\Action;

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

        //User1 : Visionnage
        $actionView1 = [
            'pseudo_action' => $users[0]->pseudo,
            'id_media_action' => Media::getMedia('tt15097216')->id_media,
        ];
        Action::createViewAction($actionView1);

        $actionView2 = [
            'pseudo_action' => $users[0]->pseudo,
            'id_media_action' => Media::getMedia('tt12361178')->id_media,
        ];
        Action::createViewAction($actionView2);

        $actionView3 = [
            'pseudo_action' => $users[0]->pseudo,
            'id_media_action' => Media::getMedia('tt1160419')->id_media,
        ];
        Action::createViewAction($actionView3);

        $actionView4 = [
            'pseudo_action' => $users[0]->pseudo,
            'id_media_action' => Media::getMedia('tt9174558')->id_media,
        ];
        Action::createViewAction($actionView4);

        $actionView5 = [
            'pseudo_action' => $users[0]->pseudo,
            'id_media_action' => Media::getMedia('tt6741278')->id_media,
        ];
        Action::createViewAction($actionView5);

        $actionView6 = [
            'pseudo_action' => $users[0]->pseudo,
            'id_media_action' => Media::getMedia('tt9140342')->id_media,
        ];
        Action::createViewAction($actionView6);

        //User1 : Aimer
        $actionLike1 = [
            'pseudo_action' => $users[0]->pseudo,
            'id_media_action' => Media::getMedia('tt1160419')->id_media,
        ];
        Action::createLikeAction($actionLike1);

        $actionLike2 = [
            'pseudo_action' => $users[0]->pseudo,
            'id_media_action' => Media::getMedia('tt9174558')->id_media,
        ];
        Action::createLikeAction($actionLike2);

        //User2 : Visionnage
        $actionView7 = [
            'pseudo_action' => $users[1]->pseudo,
            'id_media_action' => Media::getMedia('tt15097216')->id_media,
        ];
        Action::createViewAction($actionView7);

        $actionView8 = [
            'pseudo_action' => $users[1]->pseudo,
            'id_media_action' => Media::getMedia('tt12361178')->id_media,
        ];
        Action::createViewAction($actionView8);

        $actionView9 = [
            'pseudo_action' => $users[1]->pseudo,
            'id_media_action' => Media::getMedia('tt1160419')->id_media,
        ];
        Action::createViewAction($actionView9);

        $actionView10 = [
            'pseudo_action' => $users[1]->pseudo,
            'id_media_action' => Media::getMedia('tt9174558')->id_media,
        ];
        Action::createViewAction($actionView10);

        $actionView11 = [
            'pseudo_action' => $users[1]->pseudo,
            'id_media_action' => Media::getMedia('tt6741278')->id_media,
        ];
        Action::createViewAction($actionView11);

        $actionView12 = [
            'pseudo_action' => $users[1]->pseudo,
            'id_media_action' => Media::getMedia('tt9140342')->id_media,
        ];
        Action::createViewAction($actionView12);
    }
}
