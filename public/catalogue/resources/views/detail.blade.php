@extends( Auth::user()  ?  'template_loged' : 'template' )


@section("contentBody")        
<div class="container width-70 bottom-1">
    <div class="row bottom-1">
        <div class="col-3 d-flex align-items-center">
            <img class="detail_pic" src="{{ $media->poster_link }}" alt="image" class="img-thumbnail">
        </div>
        <div class="col-9 ">
            <div class="row ">
                <div class="col">
                    <div class="col">
                        <h1 Id="Title">{{ $media->title }}</h1>
                    </div>
                </div>
                <hr/>
            </div>
            <div class="row">
                <label for="ReleaseDate" class="col-sm-5">Date de sortie</label>
                <div class="col">
                    <p Id="ReleaseDate" class="p-justified">{{ $media->release_date }}</p>
                </div>
            </div>
            <div class="row">
                <label for="Author" class="col-sm-5">Auteur/Réalisateur</label>
                <div class="col">
                    <p Id="Author" class="p-justified">TODO</p>
                </div>
            </div>
            <div class="row">
                <label for="Gender" class="col-sm-5">Genre</label>
                <div class="col">
                    <p Id="Gender" class="p-justified">TODO</p>
                </div>
            </div>
            <div class="row">
                <label for="Duration" class="col-sm-5">Durée</label>
                <div class="col">
                    <p Id="Duration" class="p-justified">{{ $media->duration }} TODO</p>
                </div>
            </div>
            <div class="row">
                <label for="Actors" class="col-sm-5">Acteur(s)</label>
                <div class="col">
                    <p Id="Actors" class="p-justified">TODO </p>
                </div>
            </div>
            <div class="row">
                <label for="NbLike" class="col-sm-5">Nombre de j'aime</label>
                <div class="col">
                    <p Id="NbLike" class="p-justified">TODO</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <h5 for="Synopsis" class="col">Synopsis</h5>
            <hr/>
            <div class="col border">
                <p Id="Synopsis" class="p-justified align-middle">
                    TODO Le Premier Ordre étend ses tentacules aux confins de l'univers, poussant la Résistance dans ses retranchements. Il est impossible de se sauver à la vitesse de la lumière avec cet ennemi continuellement aux trousses. Cela n'empêche pas Finn et ses camarades de tenter d'identifier une brèche chez leur adversaire. Pendant ce temps, Rey se trouve toujours sur la planète Ahch-To pour convaincre Luke Skywalker de lui enseigner les rudiments de la Force.
                </p>
            </div>
        </div>
    </div>
    <br/>
    <div class="row bottom-1">
        <div class="col-md-6">
            <a class=".btn-link text-center" data-bs-toggle="modal" data-bs-target="#connexionModal">
                <button type="button" class="btn btn-dark float-end">Ajouter à une playlist</button>
            </a>
        </div>
        <div class="col-md-6">
            <a class=".btn-link text-center" data-bs-toggle="modal" data-bs-target="#connexionModal">
                <button type="button" class="btn btn-warning">
                    J'aime <i class="far fa-heart black"></i></button>
            </a>
        </div>
    </div>
</div>
@endsection