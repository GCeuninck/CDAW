<?php

    include_once 'MovieClass.php';
    include_once 'imdbAPI.php';

    // class-side method to render an array of movies as an HTML table
    function showAllMoviesAsTable() {
		$imdb = new imdbClass();
		$imdb->getMoviesFromIMDB();

        echo '<table><thead>
                <tr><th>Id</th><th>Titre</th></tr></thead><tbody>';
        foreach($imdb->imdbMovies as $movie) {
            echo "<tr>"
            . "<td>". $movie->id . "</td>"
            . "<td>". $movie->title . "</td></tr>";
        }
        echo '</tbody></table>';
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
			showAllMoviesAsTable();
		?>
	</body>
</html>