@extends( Auth::user()  ?  'template_loged' : 'template' )

@section("contentBody")        

<div class="row full-width top-1">
    <h1 class="text-center">Liste des médias</h1>

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