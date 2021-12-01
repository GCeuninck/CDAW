@extends( Auth::user()  ?  'template_loged' : 'template' )

@section("contentBody")        

<!-- Films Section -->
<div class="container px-4 top-1">
    <h1>Films</h1>
    <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
                @foreach ($movies as $media)
                <a class="card-link" href="{{ url('/media', $media->id_media ) }}">
                    <div class="card item width-18">
                        <img class="card-img-top carroussel-img" src="{{ $media->poster_link }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="item-center text-truncate">{{ $media->title }}<br>
                                <a ><i class="far fa-heart  "></i></span></a>
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <button class="btn btn-warning leftLst"><</button>
            <button class="btn btn-warning rightLst">></button>
        </div>
    </div>
</div>

<hr/>

<!-- Series Section-->
<div class="container px-4">
    <h1>Séries</h1>
    <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
            @foreach ($series as $media)
                <a class="card-link" href="#">
                    <div class="card item width-18">
                        <img class="card-img-top carroussel-img" src="{{ $media->poster_link }}" alt="Image">
                        <div class="card-body">
                            <p class="item-center text-truncate">{{ $media->title }}<br>
                                <a ><i class="far fa-heart  "></i></span></a>
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
                
            </div>
            <button class="btn btn-warning leftLst"><</button>
            <button class="btn btn-warning rightLst">></button>
        </div>
    </div>
</div>

@endsection