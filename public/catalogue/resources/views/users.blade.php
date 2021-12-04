@extends( Auth::user()  ?  'template_loged' : 'template' )

@section("contentBody")        

    <div class="container">
        <h1>Utilisateurs</h1>
        
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Role</th>
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
                ajax: "{{ route('users.list') }}",
                columns: [
                    {data: 'pseudo', name: 'pseudo'},
                    {data: 'get_role_infos.label', name: 'get_role_infos.label'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            
        });
    </script>

@endsection