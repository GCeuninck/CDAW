@extends( Auth::user()  ?  'template_loged' : 'template' )

@section("contentBody")        

<div class="row full-width top-1">
    <div id="columns" class="header-align">
        <div>
            <h1 >Liste des médias</h1>
            <div>
            @switch($sort)
                @case('new')
                    <p>Les plus récents</p>
                    @break

                @case('old')
                    <p>Les plus anciens</p>
                    @break

                @case('alpha')
                    <p>Par ordre alphabétique</p>
                    @break

                @case('zeta')
                    <p>Par ordre alphabétique inverse</p>
                    @break

                @default
                    <span ></span>
            @endswitch
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Trier
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('medias', ['type' => $type, 'sort' => 'new'] ) }}">Les plus récents</a></li>
                <li><a class="dropdown-item" href="{{ route('medias', ['type' => $type, 'sort' => 'old'] ) }}">Les plus anciens</a></li>
                <li><a class="dropdown-item" href="{{ route('medias', ['type' => $type, 'sort' => 'alpha'] ) }}">Ordre alphabétique</a></li>
                <li><a class="dropdown-item" href="{{ route('medias', ['type' => $type, 'sort' => 'zeta'] ) }}">Ordre alphabétique inversé</a></li>
            </ul>
        </div>
    </div>

    <div id="columns">
        @foreach ($medias as $media)
        <figure>
            <a class="no_decoration" href="{{ url('/media', $media->id_media ) }}">
                <img src="{{$media['poster_link']}}">
                <figcaption class="text-truncate">{{$media['title']}}</figcaption>
            </a>
        </figure>
        @endforeach	
    </div> 
    <div class="d-flex justify-content-center">
    {{ $medias->onEachSide(1)->links() }}
    </div>
</div>


@endsection