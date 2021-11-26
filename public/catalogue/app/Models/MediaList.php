<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

class MediaList extends Model
{
    use HasFactory;

    // constructor
    public function __construct() {
        $key = "k_hd33v3x9";

        $this->urlMovies = "https://imdb-api.com/fr/API/Top250Movies/" . $key; //key is private, replace $key with your personal key if required;
        $this->MoviesList = array();

        $this->urlSeries = "https://imdb-api.com/fr/API/MostPopularTVs/" . $key; //key is private, replace $key with your personal key if required;
        $this->SeriesList = array();
    }

    public function getMediaFromIMDB(){
                
        $curl = curl_init();
    
        //Generate MoviesList
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->urlMovies,
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
            $this->MoviesList[$i] = new Media($movie);
        };

        //Generate SeriesList
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->urlSeries,
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
            $this->SeriesList[$i] = new Media($movie);
        };

        return $this;
    }
}
