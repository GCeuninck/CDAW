# Jalon 3

## Configuration

Pour accéder à notre site, il faut :

- Se connecter à PhpMyAdmin (root/root) et y créer la base de données "medias" de type "utf8_general_ci".
- Créer et mettre à jour la structure des tables via les fichiers de migration.  

```console
php artisan migrate
```

- Remplir les bases de données grâce au seeder DatabaseSeeder qui lance dans le bon ordre l'ensemble des seeders nécessaires.

```console
php artisan db:seed
```

## Travail réalisé

### **1. Création de compte**

Création de compte via un pseudo, un email (login) et un mot de passe.  
Accessible depuis l'accueil via la bouton "Connexion", puis le bouton "Créer un compte" ou par la route :
```localhost:8080/catalogue/public/register```

### **2. Connexion**

Création de compte via un un email (login) et un mot de passe.  
Accessible depuis l'accueil via la bouton "Connexion" ou par la route :
```localhost:8080/catalogue/public/login```

### **3. Routes Protégées ou publiques**

Certaines routes sont accessibles à tous comme l'accueil :
``localhost:8080/catalogue/public/``

D'autres sont accessibles uniquement aux utilisateurs connectées, comme l'écran de profil, de playlists personelles ou l'historique :

- ``localhost:8080/catalogue/public/user/profile``
- ``localhost:8080/catalogue/public/user/playlists``
- ``localhost:8080/catalogue/public/user/history``

### **4. Consulter et modifier son profil**

La page de profil est accessible via le bouton "dropdown" ou en cliquant sur l'image de profil.  
Sur cette page il est possible de modifier son mot de passe, supprimer son compte ou modifier les informations suivantes :

- Pseudo (Unique et nécessaire)
- Mail (Unique et nécessaire)
- Nom
- Prénom
- Date de naissance
- Photo de profil

L'image de profil de base est une tête de robot jaune généré aléatoirement selon votre pseudo, grâce à l'API DiceBear Avatar: avatars.dicebear.com/styles/bottts.  

### **5. Déconnexion**

La déconnexion s'effectue via le bouton "dropdown" et redirige vers l'accueil.

### **6. Tests**

Pour vérifier le bon fonctionnement de notre site, nous avons dû créer des tests et modifier ceux déjà pré-créés :
Pour lancer l'ensemble de ces tests, il faut éxécuter la commande ci-dessous:

````console
php artisan test
````

### **7. Base de données**

Nous avons créé et alimenté nos tables imaginées dans les jalons précédents.

## Réalisation

- Guillaume Ceuninck
- Benjamin Leroux
