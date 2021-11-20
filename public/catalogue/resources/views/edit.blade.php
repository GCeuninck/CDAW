@extends("template")

@section("contentBody")
    <div class="container">
        <h1>Modifier le film</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ url('/films/edit', $film->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Titre</label>
              <input type="text" class="form-control" name="name" value="{{ $film->name }}"/>
          </div>

          <div class="form-group">
              <label for="director">Directeur</label>
              <input type="text" class="form-control" name="director" value="{{ $film->director }}"/>
          </div>
          <div class="form-group">
            <label for="category"> Categorie :</label>
            <select id="category_id" name="category_id">
                <option value='{{$film->category->id}}'>{{$film->category->name}}</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-warning">Modifier</button>
      </form>
    </div>

@endsection
