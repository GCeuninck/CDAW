@extends("template_loged")

@section("contentBody")
    <div class="container">
        <h1>Playlists</h1>
        <p style="color: red">EN COURS DE CONSTRUCTION</p>
        <br>
        <p>Cette route est protégée par un middleware ! Elle n'est visible que si vous êtes connecté ;)</p>

        @foreach ($playlists as $playlist)
            <h1>{{$playlist->name_playlist}}</h1>
            <br/>
            <table class="table table-bordered yajra-datatable" data-id="{{ $playlist->id_playlist }}">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        @endforeach
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('.yajra-datatable').each(
                function () {
                var $sel = $(this);
                var $process_id = $(this).data.id;
                var table = $sel.DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('playlist.list', ['pseudo' => Auth::user()->pseudo, 'idPlaylist' => '1']) }}",
                    columns: [
                        {data: 'id_media', name: 'id_media'},
                        {data: 'title', name: 'title'},
                    ]
                });
            });

        });
    </script>
@endsection
