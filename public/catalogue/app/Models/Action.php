<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KeyValue;
use App\Models\Media;
use Carbon\Carbon;

class Action extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;

    protected $table = 'action';

    protected $primaryKey = ['code_action','pseudo_action','id_media_action'];

    public $incrementing = false;
    
    protected $fillable = [
        'code_action',
        'label_action', 
        'date_action', 
        'comment',
        'code_status',
        'pseudo_action', 
        'id_media_action'
    ];

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
        return Action::updateOrCreate($data);
    }

    public static function createViewAction($action) {
        $data = [
            'code_action' => '0',
            'label_action' => 'view',
            'date_action' => Carbon::now()->format('Y-m-d'),
            'pseudo_action' => $action['pseudo_action'],
            'id_media_action' => $action['id_media_action'],
            'comment' => $action['pseudo_action'] . ' has seen this media : ' . $action['id_media_action'],
            'code_status' => KeyValue::getStatus('0')['code']
        ];
        return Action::updateOrCreate($data);
    }

    public static function createLikeAction($action) {
        $data = [
            'code_action' => '2',
            'label_action' => 'like',
            'date_action' => Carbon::now()->format('Y-m-d'),
            'pseudo_action' => $action['pseudo_action'],
            'id_media_action' => $action['id_media_action'],
            'comment' => $action['pseudo_action'] . ' liked this media : ' . $action['id_media_action'],
            'code_status' => KeyValue::getStatus('0')['code']
        ];
        return Action::updateOrCreate($data);
    }

    public static function deleteLikeAction($pseudo, $id) {
        $action= Action::where('code_action', '=' , 2)->where('pseudo_action', '=', $pseudo)->where('id_media_action', '=', $id)->first();
        $action->delete();
        // return Action::delete($data);
        // return Action::destroy($action);
    }

    public static function getAllMediaLikes($id) {
        return Action::where('code_action', '=' , 2)->where('id_media_action', '=', $id)->get();
    }

    public static function getAllUserLikes($pseudo) {
        return Action::where('code_action', '=' , 2)->where('pseudo_action', '=', $pseudo)->get();
    }

    public static function isLikedByUser($id,$pseudo) {
        $isLiked = Action::where('code_action', '=' , 2)->where('pseudo_action', '=', $pseudo)->where('id_media_action', '=', $id)->get();
        return !$isLiked->isEmpty();
    }

    public function getMediaInfos(){
        return $this->belongsTo(Media::class, "id_media_action", "id_media")->with('getMediaType'); 
    }
}
