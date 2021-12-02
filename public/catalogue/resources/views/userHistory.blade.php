@extends("template_loged")

@section("contentBody")
    
    <div class="container">
        <h1>Historique</h1>
        <p style="color: red">EN COURS DE CONSTRUCTION</p>
        
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de sortie</th>
                    <th>Type</th>
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
                    "<'row'<'col-sm-12'rt>>" +
                    "<'row'<'col-sm-6'p><'col-sm-6 end'i>>",
                ajax: "{{ route('history.list', ['pseudo' => Auth::user()->pseudo]) }}",
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'release_date', name: 'release_date'},
                    {data: 'code_type', name: 'code_type'},
                ]
            });
            
        });
    </script>
@endsection
