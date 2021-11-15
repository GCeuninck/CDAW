<?php
	
	// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	// Movie class
	// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	class MovieClass
	{
		// constructor
		public function __construct($id, $title) {
			$this->id = $id;
			$this->title = $title;
		}

		public static function getMovies(){
			include 'AccessKey.php';
            
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://imdb-api.com/fr/API/Top250Movies/" . $key, //key is private, replace $key with your personal key if required
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

		// class-side method to render an array of movies as an HTML table
		public static function showMoviesAsTable($movies) {
			echo '<table><thead>
					<tr><th>Id</th><th>Titre</th></tr></thead><tbody>';
			foreach($movies as $movie) {
				echo "<tr>"
				. "<td>". $movie->id . "</td>"
				. "<td>". $movie->title . "</td></tr>";
			}
			echo '</tbody></table>';
		}

		public static function showAllMoviesAsTable() {
            $response = MovieClass::getMovies();
            static::showMoviesAsTable($response);
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style>
		table {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
		}

		td {
			text-align: center;
			padding-left: 2em;
			padding-right: 2em;
		}
		</style>
	</head>
	<body>
		<h1>Movies</h1>
		<?php
			MovieClass::showAllMoviesAsTable();
		?>
	</body>
</html>

