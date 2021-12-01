@extends( Auth::user()  ?  'template_loged' : 'template' )

@section("contentBody")        

<div class="row full-width top-1">
    <div id="columns" class="header-align">
        <h1 >Liste des médias</h1>
        <!-- <div>
            <form method="GET" action="{{ route('all.movies') }}">
                @csrf
                <label>Trier par:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <a href="{{ route('all.movies', ['sort' => 'title', 'direction' => 'asc'] ) }}">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Titre
                        </label>
                    </a>
                </div>
                <div class="form-check">
                    <a href="{{ route('all.movies', ['sort' => 'release_date', 'direction' => 'desc'] ) }}">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Date de sortie
                        </label>
                    </a>
                </div>

            </form>
           
        </div> -->
        <!-- <select class="mdb-select md-form ms-5" searchable="Search here.."><label>Trier par:</label>
            <a href="{{ route('all.movies', ['sort' => 'title', 'direction' => 'asc'] ) }}">
                <option value="1">Titre</option>
            </a>
            <a href="{{ route('all.movies', ['sort' => 'release_date', 'direction' => 'desc'] ) }}">
                <option value="2">Date</option>
            </a>
        </select> -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Trier
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('all.movies', ['sort' => 'release_date', 'direction' => 'desc'] ) }}">Les plus récents</a></li>
                <li><a class="dropdown-item" href="{{ route('all.movies', ['sort' => 'release_date', 'direction' => 'asc'] ) }}">Les plus anciens</a></li>
                <li><a class="dropdown-item" href="{{ route('all.movies', ['sort' => 'title', 'direction' => 'asc'] ) }}">Ordre alphabétique</a></li>
                <li><a class="dropdown-item" href="{{ route('all.movies', ['sort' => 'title', 'direction' => 'desc'] ) }}">Ordre alphabétique inversé</a></li>
            </ul>
        </div>
    </div>

    <div id="columns">
        @foreach ($medias as $media)
        <figure>
        <img src="{{$media['poster_link']}}">
            <figcaption class="text-truncate">{{$media['title']}}</figcaption>
            </figure>
        @endforeach	
    </div> 
    <div class="d-flex justify-content-center">
    {{ $medias->onEachSide(1)->links() }}
    </div>
</div>


@endsection