@extends( Auth::user()  ?  'template_loged' : 'template' )

@section("contentBody")        

<div class="row full-width top-1">
    <div id="columns">
        @foreach ($results as $media)
        <figure>
            <a class="no_decoration" href="{{ url('/media', $media->id_media ) }}">
                <img src="{{$media['poster_link']}}">
                <figcaption class="text-truncate">{{$media['title']}}</figcaption>
            </a>
        </figure>
        @endforeach	
    </div> 

</div>


@endsection