@extends("template")

@section("contentBody")
    <!-- Create Modal-->
    <div class="modal " id="createFilm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  " id="exampleModalLabel">Créer un film</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addFilm" action="{{url('#')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="titleMovie"> Titre</label>
                            <input type="Titre" class="form-control bottom-1" name="name" id="name" aria-describedby="title" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="directorMovie"> Directeur</label>
                            <input type="Director" class="form-control bottom-1" name="director" id="director" placeholder="Director">
                        </div>
                        <div class="form-group">
                            <label for="category"> Categorie :</label>
                            <select id="category_id" name="category_id">
                                <option value=''>------------------</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <input type="submit" value="Créer le film"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <a data-bs-toggle="modal" data-bs-target="#createFilm">
            <button type="button" class="btn btn-warning btn-lg">Ajouter un film</button>
        </a>
        </br></br>
        <h1>Liste des films</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <table id="table_id" class="display" cellpadding="10" cellspacing="10">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Director</th>
                    <th>Categorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                <tr>
                    <td>{{$film->name}}</td>
                    <td>{{$film->director}}</td>
                    <td>{{$film->category->name}}</td>
                    <td>
                        <a href="{{ url('/films/edit', $film->id)}}" class="btn btn-warning">Modifier</a>
                    </td>   
                    <td>
                        <form action="{{ url('/films', $film->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
