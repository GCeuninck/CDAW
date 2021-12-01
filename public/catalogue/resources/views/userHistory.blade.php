@extends("template_loged")

@section("contentBody")
    
    <div class="container">
        <h1>Historique</h1>
        <p style="color: red">EN COURS DE CONSTRUCTION</p>
        <br>
        <p>  Cette route est protégée par un middleware ! Elle n'est visible que si vous êtes connecté ;)</p>
        
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
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
                ajax: "{{ route('history.list', ['pseudo' => Auth::user()->pseudo]) }}",
                columns: [
                    {data: 'id_media', name: 'id_media'},
                    {data: 'title', name: 'title'},
                ]
            });
            
        });
    </script>
@endsection
