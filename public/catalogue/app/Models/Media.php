<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $guarded = ['id_media'];
    protected $hidden = [];

    public static function createMedia($media, $type) {
        $data = [
            'id_media' => $media['id'] ,
            'title' => $media['title'],
            'release_date' => $media['year'],
            'poster_link' => $media['image'],
            'code_type' => $type
        ];
        return $data;
    }

    public static function getMediaDetailFromIMDB($id_media){
        $key = "k_pkfnyjq8";
        $curl = curl_init();

        //Generate Media Detail
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://imdb-api.com/fr/API/Title/" . $key . "/" . $id_media ,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
            
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if($response != null ){
            // Save media data
            $data = [
                'id_media' => $id_media,
                'release_date' => $response['releaseDate'] ? $response['releaseDate'] : Media::where('id_media', '=', $id_media)->first()->release_date,
                'director' => $response['directors'],
                'duration' => $response['runtimeMins'],
                'synopsis' => $response['plotLocal'] ? $response['plotLocal'] : $response['plot'],
                'actors' => $response['stars'],
                'detail' => '1'
            ];

            Media::whereId_media($id_media)->update($data);

            // Add genres
            foreach($response['genreList'] as $genre){
                if(KeyValue::where('type', '=', 'tag')->where('label','=', $genre['value'])->first() == null){
                    KeyValue::createTag($genre['value']);
                }
                Tag::create([
                    'code_keyvalue_tag' => KeyValue::getTagWithLabel($genre['value'])['code'],
                    'id_media_tag' => $id_media
                ]);
            }
        }
    }

    public static function getMedia($id_media){
        return Media::where('id_media', '=' , $id_media)->first();
    }

    public static function getAllMovies($sort, $direction){
        return Media::where('code_type', '=' , 0)->orderBy($sort, $direction)->paginate(30);
    }

    public static function getAllSeries($sort, $direction){
        return Media::where('code_type', '=' , 1)->orderBy($sort, $direction)->paginate(30);
    }

    public static function getMedias($sort, $direction, $search, $type){
        if($type!='all')
        {
            if($search != '')
            {
                $medias = Media::where('code_type', '=' , $type)->where('title', 'like', "{$search}%")->orderBy($sort, $direction)->paginate(30);
            }else
            {
                $medias =  Media::where('code_type', '=' , $type)->orderBy($sort, $direction)->paginate(30);
            }
        }else
        {
            if($search != '')
            {
                $medias = Media::where('title', 'like', "{$search}%")->orderBy($sort, $direction)->paginate(30);
            }else
            {
                $medias = Media::orderBy($sort, $direction)->paginate(30);
            }
        }
        return $medias;
    }

    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id"); //Objet retourn??, Id permettant d'identifier l'objet, la cl?? qui fait r??f??rence ?? l'id
    }

    public function getMediaType()
    {
        return $this->belongsTo(KeyValue::class,'code_type', 'code')->where('type', '=', 'media_type');
    }
}
