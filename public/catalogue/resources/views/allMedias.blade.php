@extends( Auth::user()  ?  'template_loged' : 'template' )

@section("contentBody")        

<?php
// On se connecte à là base de données
require_once('/workspace/public/test-pdo/initPDO.php');

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

// On détermine le nombre total d'medias
$sql = 'SELECT COUNT(*) AS nb_medias FROM `media`;';

// On prépare la requête
$query = $pdo->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'medias
$result = $query->fetch();

$nbMedias = (int) $result['nb_medias'];

// On détermine le nombre d'medias par page
$parPage = 30;

// On calcule le nombre de pages total
$pages = ceil($nbMedias / $parPage);

// Calcul du 1er media de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `media` ORDER BY `id_media` DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $pdo->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$medias = $query->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
?>

<div class="row full-width">
    <h1 class="text-center">Liste des médias</h1>

    <div id="columns">
        @foreach ($medias as $media)
        <figure>
        <img src="{{$media['poster_link']}}">
            <figcaption class="text-truncate">{{$media['title']}}</figcaption>
            </figure>
        @endforeach	
    </div> 

    <div id="pagination"></div>

    <!-- passe les infos des pages au script -->
    <input type=hidden id="totalPages" value={{strval($pages)}} />
    <input type=hidden id="currentPage" value={{strval($currentPage)}} />

</div>

<script src="{{asset('../resources/js/pagination.js')}}"></script>

@endsection