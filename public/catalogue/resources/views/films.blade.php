@extends("template")

@section("contentBody")
    <a data-bs-toggle="modal" data-bs-target="#createFilm">
        <button type="button" class="btn btn-warning">Créer un film</button>
    </a>
    <!-- Create-->
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
                            <label for="titleMovie"> Titre : </label>
                            <input type="Titre" class="form-control bottom-1" name="titleMovie" id="titleMovie" aria-describedby="title" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="directorMovie"> Director : </label>
                            <input type="Director" class="form-control bottom-1" name="directorMovie" id="directorMovie" placeholder="Director">
                        </div>
                        <div class="form-group">
                            <label for="category"> Genre : </label>
                            <select id="category" name="category">
                                <option value=''>------------------</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Créer le film"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Liste des films</h1>
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Director</th>
                    <th>Categorie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                <tr>
                    <td>{{$film->name}}</td>
                    <td>{{$film->director}}</td>
                    <td>{{$film->category->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
