# Auteurs

- LEROUX Benjamin
- CEUNINCK Guillaume

# Jalon 4

## Configuration

Pour accéder à notre site, il faut :

- Se connecter à PhpMyAdmin (root/root) et y créer la base de données "medias" de type "utf8_general_ci".
- Créer et mettre à jour la structure des tables via les fichiers de migration.

Pour ce faire :  

```console
php artisan migrate
```

- Remplir les bases de données grâce au seeder DatabaseSeeder qui lance dans le bon ordre l'ensemble des seeders nécessaires.

```console
php artisan db:seed
```

## Fonctionnalités implémentées lors de ce jalon

### **1. Consultation de médias**

Les médias sont consultables depuis deux pages différentes :

- La page d'accueil, qui propose deux caroussels affichant les 15 films et séries les plus récents.
- La page de liste qui liste un ensemble de médias, selon la requête utilisateur.

La page de liste est accessible de 3 façons :

- Depuis le carrrousel de films de la page d'accueil, un lien permet de consulter la totalité des films.
- Depuis le carrrousel de série de la page d'accueil, un lien permet de consulter la totalité des séries.
- Depuis la barre de recherche présente dans la barre de navigation.

La recherche permet de sélectionner les médias qui commencent par une chaîne de cractère définie par l'utilisateur. Via un bouton déroulant, l'utilisateur précise s'il souhaite rechercher dans les films, les séries ou les deux.

La page de listing permet également d'appliquer un tri sur les médias. Il existe 4 tris différents :

- Les plus récents.
- Les plus anciens.
- Ordre alphabétique.
- Ordre alphabétique inversé.

### **2. Détail d'un média**

Lorsque l'on clique sur un média, on accède à une page de détail comprenant :

- Titre.
- Poster (affiche).
- Auteur réalisateur (si renseigné).
- Genres.
- Durée (si renseignée).
- Acteurs (si renseignés).
- Nombre de "j'aime".
- Liste des commentaires associés.

Depuis cette page, un utilisateur connecté a la possibilité de :

- Attribuer ou retirer un "j'aime" à ce média.
- Ajouter le média à une playlist existante.
- Créer une nouvelle playlist avec ce média.
- Ajouter un commentaire à ce média.

### **3. Historique**

Un utilisateur connecté peut accéder à son historique de consultation depuis la barre de navigation. Cet historique contient l'ensemble des médias déjà consultés.

La page d'historique contient un tableau avec les informations suivantes :

- Date de visionnage (triable et cherchable).
- Titre (triable et cherchable).
- Type de média (triable et cherchable).
- Date de sortie (triable et cherchable).
- Réalisateur (triable et cherchable).
- Favoris (triable).
- Bouton d'action 'Voir' redirigeant vers le média.

Cette page peut donc permettre de consulter l'ensemble des médias aimés en triant sur la colonne des favoris.

### **4. Playlist**

Un utilisateur connecté peut accéder à ses playlists et abonnements depuis la barre de navigation. Cette page contient l'ensemble des playlists créées par l'utilisateur et permet d'en créer de nouvelles (vide) en indiquant un nom de playlist ou de supprimer les playlists et abonnements existants. 

Chaque playlist contient un tableau des médias appartenant à la playlist, avec les informations suivantes :

- Date d'ajout a la playlist (triable et cherchable).
- Titre (triable et cherchable).
- Type de média (triable et cherchable).
- Date de sortie (triable et cherchable).
- Réalisateur (triable et cherchable).
- Bouton d'action 'Voir' redirigeant vers le média.
- Bouton d'action 'Supprimer' permettant de supprimer le média de la playlist.

Chaque abonnement contient un tableau des médias appartenant à la playlist, avec les informations suivantes :

- Date d'ajout a la playlist (triable et cherchable).
- Titre (triable et cherchable).
- Type de média (triable et cherchable).
- Date de sortie (triable et cherchable).
- Réalisateur (triable et cherchable).
- Bouton d'action 'Voir' redirigeant vers le média.

### **5. Liste des utilisateurs**

La page de liste des utilisateurs est accessible depuis la barre de navigation.
Elle permet à tout utilisateur connecté ou non de voir la liste des utilisateurs afin de voir leurs playlists et abonnements, mais aussi de les administrer pour un admin.

En plus de voir les playlists des utilisateurs, un administrateur peut :

- Bloquer un utilisateur.
- Débannir un utilisateur.
- Promouvoir un utilisateur non banni au rôle d'administrateur.
- Déstituer un admin au rôle d'utilisateur.

### **6. Visualiser les playlists et abonnements des utilisateurs**

Lorsqu'un utilisateur visualise les playlists et abonnements d'un autre utilisateur, il a la possibilité de :
- S'abonner à une playlist créée par l'utilisateur visionné.
- S'abonner à une playlist dont l'utilisateur visionné est abonné.
- Voir un média d'une playlist créée ou abonnée.

Lorsqu'un utilisateur visualise les playlists et abonnements d'un autre utilisateur et que celui est abonné à l'une de ses playlists, il peut supprimer des médias de cette playlist.

Lorsqu'un admin visualise les playlists et abonnements d'un autre utilisateur, il peut réaliser les mêmes fonctionnalités que le créateur de la playlist en plus de celles d'un utilisateur.

### **7. Utilisateurs**

Identifiant sur le site :

- User1: User1@gmail.com / Password1
- User'n': User'n'@gmail.com / Password'n'
- (Bloqué) User6: User6@gmail.com / Password6
- (ADMIN) Root1: Root1@gmail.com / PasswordRoot1

## Problèmatiques

Durant ce projet nous avons rencontrés plusieurs obstacles.

### Problèmes de base de données

Pour alimenter nos bases de données, nous avons fait appel à l'API IMDB où nous récupérons un top des 250 meilleurs films et séries.

Cependant ces appels d'API ne contiennent que peu d'informations sur les médias. On ne retrouve quasimment que le titre, le lien vers le poster de mauvaise qualité et l'année de sortie (au format AAAA).

Il est certes possible de refaire un appel d'API sur chaque média pour obtenir ses détails mais nous sommes limités à 100 appels par jour avec notre version gratuite d'IMDB.

Dans un contexte où ce problème se pose uniquement à cause d'un problème de moyen lié à la nature pédagogique du projet, nous avons fait le choix d'appeler l'API de detail uniquement sur les médias dont on consulte les détails pour la première fois. Cela signifie qu'en cliquant sur un média pour le consulter, nous mettons a jour ses données grâce à un appel d'API, d'où le ralentissement pour charger un détail lors d'une première consultation.

La date de sortie étant initialement au format AAAA, l'ordre des médias triés par date peut être modifé après une consultation puisque la date en base de donnée passe d'un format AAAA à un format AAAA-MM-JJ (ex: 2021-01-02 > 2021).

### Problèmes de temps

Nous avons également des soucis de temps pour implémenter l'ensemble des attentes. Nous avons préféré peaufiner les fonctionnalités déjà implémentées pour s'assurer qu'elles soeint bien mises en valeur et sans bug.

Nous avons par exemple mis de côté :
- Le rôle de modérateur.
- Certaines fonctionalités du rôle d'administrateur (modération des commentaires).
- Génération automatique de playlists.
- Recommandation de playlists.

## Vidéo de présentation

Vidéo : TODO
