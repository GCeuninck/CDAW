@extends( Auth::check()  ?  'template_loged' : 'template' )

@section("contentBody")
    <div class="container bottom-1">
        <div class="header-align">
            <h1>Playlists de {{ $pseudo }}</h1>

            @if(Auth::check() and Auth::user()->pseudo == $pseudo)
                <a data-bs-toggle="modal" data-bs-target="#createPlaylistModal">
                    <button type="button" class="btn btn-warning btn-lg">Créer une playlist</button>
                </a>
            @endif
        </div>

        @if($playlists->isEmpty())
        <div class="bottom-1">
            <span>Aucune playlist</span>
        </div>  
        @endif

        @foreach ($playlists as $playlist)
            <hr class="large">
            <div class="header-align">
                <h2>{{$playlist->name_playlist}}</h2>

                @if(Auth::check() and (Auth::user()->pseudo != $pseudo and !in_array($playlist->id_playlist, $currentUserSubIdList)))
                    <form action="{{ route('playlist.sub', [$pseudo, $playlist->id_playlist])}}" method="post">
                        @csrf
                        <button class="btn btn-warning" type="submit">S'abonner à cette playlist</button>
                    </form>
                @endif

                @if(Auth::check() and (Auth::user()->pseudo == $pseudo or $currentUserRole == '1'))
                    <form action="{{ route('playlist.delete', [$pseudo, $playlist->id_playlist])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer cette playlist</button>
                    </form>
                @endif

            </div>
            <div class="playlistDatatable" data-id="{{ $playlist->id_playlist }}">
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>Date d'ajout à la playlist</th>
                            <th>Titre</th>
                            <th>Type de média</th>
                            <th>Date de sortie</th>
                            <th>Réalisateur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

    <div class="container bottom-1">
        <div class="header-align">
            <h1>Abonnements de {{ $pseudo }}</h1>
        </div>

        @if($subPlaylists->isEmpty())
        <div class="bottom-1">
            <span>Aucun abonnement</span>
        </div>  
        @endif

        @foreach ($subPlaylists as $subPlaylist)
            <hr class="large">
            <div class="header-align">
                <h2>{{$subPlaylist->getPlaylistInfos->name_playlist}}</h2>
                <h4>créée par {{$subPlaylist->getPlaylistInfos->pseudo_playlist}}</h4>

                @if(Auth::check() and (Auth::user()->pseudo != $subPlaylist->getPlaylistInfos->pseudo_playlist and Auth::user()->pseudo != $pseudo and !in_array($subPlaylist->getPlaylistInfos->id_playlist, $currentUserSubIdList)))
                    <form action="{{ route('playlist.sub', [$pseudo, $subPlaylist->getPlaylistInfos->id_playlist])}}" method="post">
                        @csrf
                        <button class="btn btn-warning" type="submit">S'abonner à cette playlist</button>
                    </form>
                @endif

                @if(Auth::check() and (Auth::user()->pseudo == $pseudo or $currentUserRole == '1'))
                    <form action="{{ route('playlist.deleteSub', [$pseudo, $subPlaylist->getPlaylistInfos->id_playlist])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer des abonnements</button>
                    </form>
                @endif

            </div>
            
            <div class="playlistDatatable" data-id="{{ $subPlaylist->getPlaylistInfos->id_playlist }}">
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>Date d'ajout à la playlist</th>
                            <th>Titre</th>
                            <th>Type de média</th>
                            <th>Date de sortie</th>
                            <th>Réalisateur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

    <!-- Create Modal-->
    <div class="modal " id="createPlaylistModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPlaylist">Créer une playlist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addPlaylist" action="{{ route('playlist.add', $pseudo)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="titlePlaylist">Titre</label>
                            <input type="Titre" class="form-control bottom-1" name="name" id="name" aria-describedby="titlePlaylist" placeholder="Nom de la playlist">
                        </div>
                        <br>
                        <input type="submit" value="Créer"/>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        
        $(function (){
            $('.playlistDatatable').each(
            function () {
                var pseudo = {!! json_encode($pseudo, JSON_HEX_TAG) !!};
                var process_id = $(this).data("id");
                var url = '{{ url("/pseudoPlaylist/playlists/list/idPlaylist") }}';
                url = url.replace('pseudoPlaylist', pseudo);
                url = url.replace('idPlaylist', process_id);
                var table = $(this).find('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "url": url,
                    },                    
                    columns: [
                        {data: 'date_pm', name: 'date_pm'},
                        {data: 'get_media_infos_playlist.title', name: 'get_media_infos_playlist.title'},
                        {data: 'get_media_infos_playlist.get_media_type.label', name: 'get_media_infos_playlist.get_media_type.label'},
                        {data: 'get_media_infos_playlist.release_date', name: 'get_media_infos_playlist.release_date'},
                        {data: 'get_media_infos_playlist.director', name: 'get_media_infos_playlist.director'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });

        });
    </script>
@endsection
