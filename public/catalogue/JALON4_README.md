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
- La page de liste qui liste un ensemble de médias, selon la requête utilisateur

La page de liste est accessible de 3 façons :

- Depuis le carrrousel de films de la page d'accueil, un lien permet de consulter la totalité des films
- Depuis le carrrousel de série de la page d'accueil, un lien permet de consulter la totalité des séries
- Depuis la barre de recherche présente dans la barre de navigation

La recherche permet de sélectionner les médias qui commencent par une chaîne de cractère définie par l'utilisateur. Via un bouton déroulant, l'utilisateur précise s'il souhaite rechercher dans les films, les séries ou les deux.

La page de listing permet également d'appliquer un tri sur les médias. Il existe 4 tris différents :

- Les plus récents
- Les plus anciens
- Ordre alphabétique
- Ordre alphabétique inversé

### **2. Détail d'un média**

Lorsque l'on clique sur un média, on accède à une page de détail comprenant :

- Titre
- Poster (affiche)
- Auteur réalisateur (si renseigné)
- Genres
- Durée (si renseignée)
- Acteurs (si renseignés)
- Nombre de "j'aime"
- Liste des commentaires associés

Depuis cette page, un utilisateur connecté a la possibilité de :

- Attribuer ou retirer un "j'aime" à ce média
- Ajouter le média à une playlist existante
- Créer une nouvelle playlist avec ce média
- Attribuer un commentaire à ce média

### **3. Historique**

Un utilisateur connecté peut accéder à son historique de consultation depuis la barre de navigation. Cet historique contient l'ensemble des médias déjà consultés.

La page d'historique contient un tableau avec les informations suivantes :

- Date de visionnage (triable et cherchable)
- Titre (triable et cherchable)
- Type de média (triable et cherchable)
- Date de sortie (triable et cherchable)
- Réalisateur (triable et cherchable)
- Favoris (triable)
- Bouton d'action redirigeant vers le média

Cette page peut donc permettre de consulter l'ensemble des médias aimés en triant sur la colonne des favoris.

### **4. Playlist**

Un utilisateur connecté peut accéder à ses playlists depuis la barre de navigation. Cette page contient l'ensemble des playlists crées par l'utilisateur et permet d'en créer de nouvelles (vide) en indiquant un nom de playlist ou de supprimer les playlist existantes.

Chaque playlist contient un tableau des médias appartenant à la playlist, avec les informations suivantes :

- Date d'ajout a la playlist (triable et cherchable)
- Titre (triable et cherchable)
- Type de média (triable et cherchable)
- Date de sortie (triable et cherchable)
- Réalisateur (triable et cherchable)
- Bouton d'action redirigeant vers le média
- Bouton d'action permettant de supprimer le média de la playlist

TODO: Rajouter les abonements, etc

### **5. Liste des utilisateurs**

La page de liste des utilisateurs est accessible depuis la barre de navigation.

Un administrateur peut bloquer un utilisateur ou le promouvoir au rôle d'administrateur depuis cette page.

TODO : abo playlists ?

### **6. TODO**

TODO: jsp

### **7. Utilisateurs**

Identifiant sur le site :

- User1: User1@gmail.com / Password1
- User'n': User'n'@gmail.com / Password'n'
- User9: User9@gmail.com / Password9
- (ADMIN) Root1: Root1@gmail.com / PasswordRoot1

## Problèmatiques

Durant ce projet nous avons rencontrés plusieurs obstacles.

### Problèmes de base de données

Pour alimenter nos bases de données, nous avons fait appel à l'API IMDB où nous récupérons un top des 250 meilleurs films et séries.

Cependant ces appels d'API ne contiennent que peu d'informatiosn sur les médias. On ne retrouve quasimment que le titre, le lien vers le poster de mauvaise qualité et l'année de sortie. 

Il est certes possible de refaire un appel d'API sur chaque média pour obtenir ses détails mais nous sommes limité à 100 appels par jour avec notre version gratuite d'IMDB.

Dans un contexte où ce problème se pose uniquement à cause d'un problème de moyen lié à la nature pédagogique du projet, nous avons fait le choix d'appeler l'API de detail uniquement sur les médias dont on consulte les détails. Cela signifie qu'en cliquant sur un média pour le consulter, nous mettons a jour ses données grâce à un appel d'API.

Pour cette raison, l'ordre des médias triés par date peut être modifé après une consultation puisque la date en base de donnée passe d'un format avec uniquement l'année à un format avec le mois et le jour en plus.

### Problèmes de temps

Nous avons également des soucis de temps pour implémenter l'ensemble des attentes. Nous avons préféré peaufiner les fonctionnalités déjà implémentées pour s'assurer qu'elles soeint bien mises en valeur et sans bug.

Nous avons par exemple mis de côté le rôle d'administrateur et certaines fonctionalités du rôle d'administrateur.

Ce qu'on a pas fait : TODO

Pourquoi on l'a pas fait : TODO

## Vidéo de présentation

Vidéo : TODO
