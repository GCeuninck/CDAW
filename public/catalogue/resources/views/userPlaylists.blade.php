@extends("template_loged")

@section("contentBody")
    <div class="container">
        <h1>Playlists</h1>
        <p style="color: red">EN COURS DE CONSTRUCTION</p>
        <br>
        <p>Cette route est protégée par un middleware ! Elle n'est visible que si vous êtes connecté ;)</p>

        <a data-bs-toggle="modal" data-bs-target="#createPlaylistModal">
            <button type="button" class="btn btn-warning btn-lg">Créer une playlist</button>
        </a>

        @foreach ($playlists as $playlist)
            <h1>{{$playlist->name_playlist}}</h1>
            <form action="{{ route('playlist.delete', [$pseudo, $playlist->id_playlist])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer cette playlist</button>
            </form>
            <br/>
            <div class="playlistDatatable" data-id="{{ $playlist->id_playlist }}">
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date d'ajout à la playlist</th>
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
        $(function () {
            $('.playlistDatatable').each(
                function () {
                var $process_id = $(this).data("id");
                var url = '{{ url("/" . Auth::user()->pseudo . "/playlists/list/idPlaylist") }}';
                url = url.replace('idPlaylist', $process_id);
                var table = $(this).find('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "url": url,
                    },                    
                    columns: [
                        {data: 'get_media_infos_playlist.title', name: 'get_media_infos_playlist.title'},
                        {data: 'date_pm', name: 'date_pm'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });

        });
    </script>
@endsection
