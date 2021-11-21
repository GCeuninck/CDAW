# Jalon 2
## Travail réalisé
- CRUD (Create Read Update Delete) d'une table de films, avec catégorie
- Conception de schémas MCD et MLD pour la base de données

## Schémas MCD & MLD
Les schémas MCD et MLD se situent dans un fichier PDF à la racine du dossier public/catalogue. Il se nomme MCD_MLD.pdf.

## Configuration CRUD
Pour accéder au CRUD il faut:
- Se connecter à PhpMyAdmin (root/root) et y créer la base de données "medias" de type "utf8_general_ci"
- Dans un terminal, dans le dossier catalogue, entrez dans cet ordre:
```
php artisan migrate
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=FilmSeeder
```

## Accès au CRUD
Une fois la base de données configurée, allez à l'adresse suivante:
`http://localhost:8080/catalogue/public/films`

A partir d'ici, on peut:
- Ajouter un film via le bouton "Ajouter un film" qui fait apparaître une pop-up de type Modal -> CREATE
- Consulter la liste des films (nom, directeur, catégorie) -> READ
- Modifier un film en particulier via une nouvelle vue "edit"-> UPDATE
- Supprimer un film en particulier -> DELETE

## Contraintes sur les données de films
Lors de la création ou de la modification d'un film, les champs sont soumis à des contraintes: 
- Le titre est une donnée obligatoire de 30 charactères maximum
- Le directeur est une donnée obligatoire de 30 charactères maximum
- La catégorie est une donnée obligatoire et limitée aux catégories déjà existantes

## Réalisation
- Guillaume Ceuninck
- Benjamin Leroux