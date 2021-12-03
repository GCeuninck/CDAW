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
                    @if($media->release_date)
                        <p Id="ReleaseDate" class="p-justified"><?php $date = date_create($media->release_date); echo (date_format($date, 'd/m/Y')); ?></p>
                    @else
                        <p Id="ReleaseDate" class="p-justified">Non renseignée</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <label for="Author" class="col-sm-5">Auteur/Réalisateur</label>
                <div class="col">
                    @if($media->director)
                        <p Id="Author" class="p-justified">{{$media->director}}</p>
                    @else
                        <p Id="Author" class="p-justified">Non renseigné</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <label for="Gender" class="col-sm-5">Genre(s)</label>
                <div class="col">
                    <p Id="Gender" class="p-justified">
                    @foreach ($genres as $genre)
                        {{ $genre->label }}
                        @if( !$loop->last)
                        ,
                        @endif
                    @endforeach
                    </p>
                </div>
            </div>
            <div class="row">
                <label for="Duration" class="col-sm-5">Durée</label>
                <div class="col">
                    @if($media->duration)
                        <p Id="Duration" class="p-justified">
                            <?php 
                                function hoursandmins($time)
                                {
                                    if ($time < 1) {
                                        return;
                                    }
                                    $hours = floor($time / 60);
                                    $minutes = ($time % 60);
                                    if($hours>0)
                                    {
                                            return sprintf('%d heures %02d minutes', $hours, $minutes);
                                    }else
                                    {
                                            return sprintf('%02d minutes', $minutes);
                                    }
                                }
                                echo hoursandmins($media->duration);
                            ?>
                        </p>
                    @else
                        <p Id="Duration" class="p-justified">Non renseignée</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <label for="Actors" class="col-sm-5">Acteur(s)</label>
                <div class="col">
                    @if($media->actors)
                        <p Id="Actors" class="p-justified">{{$media->actors}} </p>
                    @else
                        <p Id="Actors" class="p-justified">Non renseignés</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <label for="NbLike" class="col-sm-5">Nombre de j'aime</label>
                <div class="col">
                    <p Id="NbLike" class="p-justified">{{$likes}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row bottom-1">
        <div class="row">
            <h5 for="Synopsis" class="col">Synopsis</h5>
            <hr/>
            <div class="col border">
                <p Id="Synopsis" class="p-justified align-middle">
                    {{ $media->synopsis }}
                </p>
            </div>
        </div>
    </div>
    @if( Auth::user())
    <div class="row bottom-1">
        <div class="col-md-6">
            <a class=".btn-link text-center" data-bs-toggle="modal" data-bs-target="#addPlaylistModal">
                <button type="button" class="btn btn-dark float-end">Ajouter à une playlist</button>
            </a>
        </div>
        @if($isLiked)
        <div class="col-md-6">
            <a class=".btn-link">
                <form action="{{ route('media.dislike', $media->id_media)}}" method="post">
                    @csrf
                    <button class="btn btn-warning" type="submit">
                        Je n'aime plus <i class="fas fa-heart-broken black"></i>
                    </button>
                </form>
            </a>
        </div>
        @else
        <div class="col-md-6">
            <a class=".btn-link">
                <form action="{{ route('media.like', $media->id_media)}}" method="post">
                    @csrf
                    <button class="btn btn-warning" type="submit">
                        J'aime <i class="far fa-heart black"></i>
                    </button>
                </form>
            </a>
        </div>
        @endif
    </div>
    @endif
</div>

<!-- Modal Ajout Playlist-->
<div class="modal " id="addPlaylistModal" tabindex="-1" aria-labelledby="addPlaylist" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title  " id="addPlaylist">Ajouter à une de vos playlist</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="playlist_table" class="display" cellpadding="10" cellspacing="10">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Date de création</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($playlists as $playlist)
                        <tr>
                            <td>{{$playlist->name_playlist}}</td>
                            <td>{{$playlist->creation_date}}</td>
                            <td>
                                <form action="{{ route('media.addPlaylist', [$media->id_media, $playlist->id_playlist])}}" method="post">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Ajouter</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection