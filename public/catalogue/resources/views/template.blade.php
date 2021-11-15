<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Binge Watch</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.ico" />
        <link href="css/newStyle.css" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://kit.fontawesome.com/e7a617acf5.js" crossorigin="anonymous"></script>   
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="index.html"> 
                    <img src="assets/logo.png" alt="" width="40" height="40">
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
                        <li class="nav-item me-3"><a class="nav-link" href="#">Aide</a></li>
                        <li class="nav-item">
                            <a data-bs-toggle="modal" data-bs-target="#connexionModal">
                                <button type="button" class="btn btn-warning">Connexion</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Modal Connexion-->
        <div class="modal " id="connexionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title  " id="exampleModalLabel">Connexion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control bottom-1"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom d'utilisateur">
                            </div>
                            <div class="form-group">
                                <input  type="password" class="form-control bottom-1" id="exampleInputPassword1" placeholder="Mot de passe">
                            </div>
                        </form>  
                        <a class="nav-link text-center" href="index_connecte.html">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Se connecter</button>  
                        </a>
                        <hr>
                        <div class="text-center">
                            <div class="bottom-1">OU</div>
                            <a data-bs-toggle="modal" data-bs-target="#inscriptionModal">
                                <button type="button" class="btn btn-warning " data-bs-dismiss="modal" >Créer un compte</button>
                            </a>
                        </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal Inscription-->
        <div class="modal" id="inscriptionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title  " id="exampleModalLabel">Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <input type="pseudo" class="form-control bottom-1"  id="exampleInputPseudo1" aria-describedby="pseudoHelp" placeholder="Pseudo">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control bottom-1"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom d'utilisateur">
                            </div>
                            <div class="form-group">
                                <input  type="password" class="form-control bottom-1" id="exampleInputPassword1" placeholder="Mot de passe">
                            </div>
                        </form>  
                        <a class="nav-link text-center" href="index_connecte.html">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">S'inscrire</button>  
                        </a>
                </div>
                </div>
            </div>
        </div>
        
        <br/>
        <br/>
        <br/>

        @yield("contentBody")
        
        <!-- Footer-->
        <footer class="py-5 bg-dark" id="footer">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Binge Watch 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>