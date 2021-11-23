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
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-default navbar-static-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="index_connecte.html"> 
                    <img src="assets/logo.png" alt="logo" width="40" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                        <li>      
                            <form class="d-flex">
                                <!-- Boutton type de recherche-->
                                <select class="mdb-select md-form ms-5" searchable="Search here..">
                                    <option value="1">Tous</option>
                                    <option value="2">Films</option>
                                    <option value="3">Séries</option>
                                    <option value="4">Animes</option>
                                  </select>
                                <input class="form-control ms-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
                                <button class="btn btn-outline-light ms-2" type="submit">Rechercher</button>
                          </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item border-right "><a class="nav-link me-2 ms-2" href="#">Playlist</a></li>
                        <li class="nav-item border-right"><a class="nav-link me-2 ms-2" href="#">Historique</a>   </li>
                        <li class="nav-item"><a class="nav-link me-2 ms-2" href="#">Aide</a> </li>

                        <li class="nav-item me-2"><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Jedi Velloper
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="profil.html">Profil</a></li>
                              <li><a class="dropdown-item" href="#">Paramètres</a></li>
                              <li><a class="dropdown-item" href="index.html">Déconnexion</a></li>
                            </ul>
                          </div></a>
                        </li>
                    </ul>
                </div>
                <a class="navbar-brand" href="#" > 
                    <!-- API Avatar generator -->
                    <img src="https://avatars.dicebear.com/api/bottts/.svg?colors=yellow" alt="image de profil" width="40" height="40">
                </a>
            </div>
        </nav>
        
        <br/>

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