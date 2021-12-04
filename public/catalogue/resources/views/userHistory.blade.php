@extends("template_loged")

@section("contentBody")
    
    <div class="container">
        <h1>Historique</h1>
        
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>Date de visionnage</th>
                    <th>Titre</th>
                    <th>Type de média</th>
                    <th>Date de sortie</th>
                    <th>Réalisateur</th>
                    <th>Favoris</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {
            
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                dom :     
                    "<'row'<'col-sm-6'l><'col-sm-6 end'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-6'p><'col-sm-6 end'i>>",
                ajax: "{{ route('history.list', ['pseudo' => Auth::user()->pseudo]) }}",
                columns: [
                    {data: 'date_action', name: 'date_action'},
                    {data: 'get_media_infos.title', name: 'get_media_infos.title'},
                    {data: 'get_media_infos.get_media_type.label', name: 'get_media_infos.get_media_type.label'},
                    {data: 'get_media_infos.release_date', name: 'get_media_infos.release_date'},
                    {data: 'get_media_infos.director', name: 'get_media_infos.director'},
                    {data: 'liked', name: 'liked', orderable: true, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            
        });
    </script>
@endsection
