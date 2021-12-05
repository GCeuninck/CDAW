<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Binge Watch</title>
        <link rel="icon" type="image/x-icon" href="{{asset('../resources/assets/logo.ico')}}" />
        <link href="{{asset('../resources/css/newStyle.css')}}" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://kit.fontawesome.com/e7a617acf5.js" crossorigin="anonymous"></script>   
        <link href="{{asset('../resources/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
       <!-- Navigation-->
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-default navbar-static-top bottom-1" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="{{url('')}}"> 
                    <img src="{{asset('../resources/assets/logo.png')}}" alt="logo" width="40" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                        <li>      
                            <form class="d-flex" action="{{ route('medias.search' ) }}" method="POST">
                                @csrf
                                <!-- Boutton type de recherche-->
                                <select name="type" id="type" class="mdb-select md-form ms-5" searchable="Search here..">
                                    <option value="all">Tous</option>
                                    <option value="movies">Films</option>
                                    <option value="series">Séries</option>
                                  </select>
                                <input class="form-control ms-2" type="search" name="search" id="search" placeholder="Rechercher" aria-label="Rechercher">
                                <button class="btn btn-outline-light ms-2" type="submit">Rechercher</button>
                          </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item border-right "><a class="nav-link me-2 ms-2" href="{{URL::asset('/users')}}">Liste des utilisateurs</a></li>
                        <li class="nav-item border-right "><a class="nav-link me-2 ms-2" href="{{URL::asset('/' . Auth::user()->pseudo . '/playlists')}}">Mes playlists</a></li>
                        <li class="nav-item border-right"><a class="nav-link me-2 ms-2" href="{{URL::asset('/' . Auth::user()->pseudo . '/history')}}">Mon historique</a>   </li>
                        <li class="nav-item"><a class="nav-link me-2 ms-2" href="https://github.com/GCeuninck/CDAW" target="_blank" rel="noopener noreferrer">Aide</a> </li>

                        <li class="nav-item me-2"><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->pseudo }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profil</a></li>
                              <!-- <li><a class="dropdown-item" href="#">Paramètres</a></li> -->
                              <li>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Déconnexion') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                          </div></a>
                        </li>
                    </ul>
                </div>
                <a class="navbar-brand" href="{{ route('profile.show') }}" > 
                    <!-- API Avatar generator -->
                    @if(Auth::user()->profile_photo_path == null)
                        <img src="https://avatars.dicebear.com/api/bottts/'+ {{ Auth::user()->pseudo }} + '.svg?colors=yellow" alt="image de profil" width="40" height="40">
                    @else
                        <img class="profile_pic" src="{{ Auth::user()->profile_photo_url }} " alt="Profil pic" width="40" height="40">                    @endif
                </a>
            </div>
        </nav>

        @yield("contentBody")
        
        <!-- Footer-->
        <footer class="py-5 bg-dark" id="footer">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Binge Watch 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('../resources/js/scripts.js')}}"></script>
    </body>
</html>