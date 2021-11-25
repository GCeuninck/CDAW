@extends("template_loged")

@section("contentBody")    

    <div class="container width-50">
        <h1>Profil</h1>
        <hr/> 
        <h4>Modifier mes informations</h2>
        <br/> 
        <form>
            <div class="form-group row bottom-1">
                <label for="Username" class="col-sm-3 col-form-label">Pseudo</label>
                <div class="col-37-5">
                    <input type="text" class="form-control" id="Username" placeholder="Pseudo">
                </div>
            </div>
            <div class="form-group row bottom-1">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group row bottom-1">
                <label for="inputCurrentPassword" class="col-sm-3 col-form-label">Mot de passe actuel</label>
                <div class="col-37-5">
                    <input type="password" class="form-control" id="inputCurrentPassword" placeholder="Mot de passe actuel">
                </div>
            </div>
            <div class="form-group row bottom-1">
                <label for="inputNewPassword" class="col-sm-3 col-form-label">Nouveau mot de passe</label>
                <div class="col">
                    <input type="password" class="form-control" id="inputNewPassword" placeholder="Nouveau mot de passe">
                </div>
                <div class="col">
                    <input type="password" class="form-control" id="inputConfirmNewPassword" placeholder="Resaisissez">
                </div>
            </div>
            <div class="form-group row bottom-1">
                <label for="inputFirstName" class="col-sm-3 col-form-label">Prénom</label>
                <div class="col-37-5">
                    <input type="password" class="form-control" id="inputFirstName" placeholder="Prénom">
                </div>
            </div>
            <div class="form-group row bottom-1">
                <label for="inputName" class="col-sm-3 col-form-label">Nom</label>
                <div class="col-37-5">
                    <input type="password" class="form-control" id="inputName" placeholder="Nom">
                </div>
            </div>
            <div class="form-group row bottom-1">
                <label for="inputBirthDay" class="col-sm-3 col-form-label">Date de naissance</label>
                <div class="col-37-5">
                    <input type="date" class="form-control" id="inputBirthDay">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAvatar" class="col-sm-3 col-form-label">Modifier mon avatar</label>
                <div class="col-37-5">
                    <input type="file" class="form-control-file" id="inputAvatar">
                </div>
            </div>
            <br/>
            <div class="form-group row bottom-1">
                <div class="col-md-6">
                    <a class=".btn-link text-center" href="#">
                        <button type="button" class="btn btn-dark float-end">Annuler</button>
                    </a>
                </div>
                <div class="col-md-6">
                    <a class=".btn-link text-center" href="#">
                        <button type="button" class="btn btn-warning">Enregistrer</button>
                    </a>
                </div>
            </div>
        </form>

        <hr/> 
        <h4>Mes statistiques</h2>
        <br/>

        <div class="row">
            <label for="NbTotalView" class="col-sm-4 col-form-label">Total de vue</label>
            <div class="col">
                <p Id="NbTotalView" class="p-1">30</p>
            </div>
            <label for="NbTotalLike" class="col-sm-4 col-form-label">Total de j'aime</label>
            <div class="col">
                <p Id="NbTotalLike" class="p-1">10</p>
            </div>
        </div>
        <div class="row">
            <label for="NbMovieLike" class="col-sm-4 col-form-label">Nombre de j'aime (Films)</label>
            <div class="col">
                <p Id="NbMovieLike" class="p-1">3</p>
            </div>
            <label for="NbSeriesLike" class="col-sm-4 col-form-label">Nombre de j'aime (Séries)</label>
            <div class="col">
                <p Id="NbSeriesLike" class="p-1">5</p>
            </div>
        </div>
        <div class="row">
            <label for="NbAnimeLike" class="col-sm-4 col-form-label">Nombre de j'aime (Anime)</label>
            <div class="col">
                <p Id="NbAnimeLike" class="p-1">2</p>
            </div>
            <label for="NbPlaylists" class="col-sm-4 col-form-label">Nombre de playlists</label>
            <div class="col">
                <p Id="NbPlaylists" class="p-1">5</p>
            </div>
        </div>
        <div class="row">
            <label for="NbSubscription" class="col-sm-4 col-form-label">Nombre d'abonnements</label>
            <div class="col">
                <p Id="NbSubscription" class="p-1">3</p>
            </div>
            <label for="NbSubscriber" class="col-sm-4 col-form-label">Nombre d'abonnés</label>
            <div class="col">
                <p Id="NbSubscriber" class="p-1">0</p>
            </div>
        </div>
    </div>

@endsection