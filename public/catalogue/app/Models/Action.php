<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = 'action';

    protected $guarded = ['code_action', 'pseudo_action', 'id_media_action'];

    public static function createAction($action) {
        $data = [
            'code_action' => $action['code_action'],
            'label_action' => $action['label_action'],
            'date_action' => $action['date_action'],
            'pseudo_action' => $action['pseudo_action'],
            'id_media_action' => $action['id_media_action'],
            'comment' => $action['comment'],
            'code_status' => $action['code_status']
        ];
        return $data;
    }
}
