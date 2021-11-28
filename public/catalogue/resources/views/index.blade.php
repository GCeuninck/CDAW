@extends( Auth::user()  ?  'template_loged' : 'template' )


@section("contentBody")        


        <!-- Films Section -->
        <div class="container px-4">
            <h1>Films</h1>
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($movies as $media)
                        <a class="card-link" href="#">
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

        <hr/>

        <!-- Anime Section-->
        <!-- <div class="container px-4">
            <h1>Anime</h1>
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                        <a class="card-link" href="detail.html">
                            <div class="card item width-18" >
                                <img class="card-img-top" src="https://fr.web.img3.acsta.net/c_310_420/pictures/19/08/01/09/52/4803203.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="item-center text-truncate">Hunter X Hunter<br>
                                        <a ><i class="far fa-heart  "></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="card-link" href="detail.html">
                            <div class="card item width-18" >
                                <img class="card-img-top" src="https://fr.web.img6.acsta.net/c_310_420/pictures/19/09/11/13/43/4503509.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="item-center text-truncate">Gintama<br>
                                        <a ><i class="far fa-heart  "></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="card-link" href="detail.html">
                            <div class="card item width-18" >
                                <img class="card-img-top" src="https://fr.web.img6.acsta.net/c_310_420/pictures/20/09/14/10/31/4875617.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="item-center text-truncate">Jujutsu Kaisen<br>
                                        <a ><i class="far fa-heart  "></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="card-link" href="detail.html">
                            <div class="card item width-18" >
                                <img class="card-img-top" src="https://fr.web.img3.acsta.net/c_310_420/pictures/18/01/18/14/35/2024405.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="item-center text-truncate">Death Note<br>
                                        <a ><i class="far fa-heart  "></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="card-link" href="detail.html">
                            <div class="card item width-18" >
                                <img class="card-img-top" src="https://fr.web.img2.acsta.net/c_310_420/pictures/19/07/30/12/08/0075575.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="item-center text-truncate">Fullmetal Alchemist<br>
                                        <a ><i class="far fa-heart  "></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="card-link" href="detail.html">
                            <div class="card item width-18" >
                                <img class="card-img-top" src="https://fr.web.img4.acsta.net/c_310_420/pictures/20/12/28/10/24/5603983.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="item-center text-truncate">L'attaque des titans<br>
                                        <a ><i class="far fa-heart  "></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="card-link" href="detail.html">
                            <div class="card item width-18" >
                                <img class="card-img-top" src="https://fr.web.img6.acsta.net/c_310_420/pictures/17/04/07/14/25/247555.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="item-center text-truncate">Mushishi<br>
                                        <a ><i class="far fa-heart  "></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="card-link" href="detail.html">
                            <div class="card item width-18" >
                                <img class="card-img-top" src="https://fr.web.img3.acsta.net/c_310_420/pictures/19/09/27/13/12/0190127.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="item-center text-truncate">Haikyu<br>
                                        <a ><i class="far fa-heart  "></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="card-link" href="detail.html">
                            <div class="card item width-18" >
                                <img class="card-img-top" src="https://fr.web.img5.acsta.net/c_310_420/pictures/14/12/15/11/21/267452.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="item-center text-truncate">Steins;Gate<br>
                                        <a ><i class="far fa-heart  "></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <button class="btn btn-warning leftLst"><</button>
                    <button class="btn btn-warning rightLst">></button>
                </div> -->
            </div>
        </div>
@endsection