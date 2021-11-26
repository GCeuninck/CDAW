<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

class MediaList extends Model
{
    use HasFactory;

    protected $MoviesList = array();
    protected $SeriesList = array();

    public static function getMoviesFromIMDB(){
        $key = "k_hd33v3x9";
        $curl = curl_init();
    
        //Generate MoviesList
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://imdb-api.com/fr/API/Top250Movies/" . $key,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        
        $response = json_decode(curl_exec($curl), true)["items"];
        curl_close($curl);
        
        foreach($response as $i => $movie){
            $MoviesList[$i] = new Media($movie);
        };

        return $MoviesList;
    }

    public static function getSeriesFromIMDB(){
        $key = "k_hd33v3x9";
        $curl = curl_init();

        //Generate SeriesList
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://imdb-api.com/fr/API/MostPopularTVs/" . $key,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
            
        $response = json_decode(curl_exec($curl), true)["items"];
        curl_close($curl);
        
        foreach($response as $i => $movie){
            $SeriesList[$i] = new Media($movie);
        };

        return $SeriesList;
    }
}
