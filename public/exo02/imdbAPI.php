<?php    

    class imdbClass{

        // constructor
		public function __construct() {
            include 'AccessKey.php';

			$this->url = "https://imdb-api.com/fr/API/Top250Movies/" . $key; //key is private, replace $key with your personal key if required;
			$this->imdbMovies = imdbClass::getMoviesFromIMDB();
		}

        public function getMoviesFromIMDB(){
                    
            $curl = curl_init();
        
            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
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

            $movieArray = array();
			
			foreach($response as $i => $movie){
				$movieArray[$i] = new MovieClass($movie["id"], $movie["title"]);
			};

			return $movieArray;
        }
    }
    
?>