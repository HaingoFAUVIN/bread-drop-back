# Projet BreadDrop

Nous allons mettre en place un backoffice qui permet de gérer les commandes, produits ainsi que les profils des boulangeries.

Voici quelques captures et contenus fournis, pour entrevoir les fonctionnalités attendues. Les étapes du projet sont détaillées ensuite.

### 1. Page d'accueil

- Affiche la liste des commandes à traiter
- Permet de changer le status d'une commande

["ROLE_MANAGER"]
manager@manager.com

bin/console security:hash-password
$2y$13$LRAAiecZam83Be2I2pcaUu2y/9R.IQXD6vrv1hOKHuZv/KNnS/Giy


### 2. Page Fiche de la commande

- Affiche le détail d'une commande

### 3. Page Archive

- Affiche la liste des commandes traitées
- Permet de changer le status d'une commande

### 4. Page Profil

- Affiche le détail d'un profil

### 5. Page Modification de Profil

- Permet de modifier un profil

### 6. Page Liste des produits

- Permet d'afficher le détail d'un produit, d' en ajouter, modifier et supprimer 

### 7. Page Fiche d'un produit

- Affiche le détail d'un produit
- Permet de supprimer et mdoifier le produit affiché

### 8. Page Ajout d'un produit

- Permet d'ajouter un produit

### 8. Page Modification d'un produit

- Permet de modiifer un produit

---

### Objectifs

  - Gérer les produits, les commandes et profil des boulangeries
  - Envoyer les données vers le front via API .

## Etapes du projet

### Installation

    a- Installation d'un nouveau projet Symfony, depuis votre dossier cloné

        -composer create-project symfony/skeleton:"^5.4" bread-drop
        - mv ./bread-drop/* ./bread-drop/.* 
        - rmdir ./bread-drop/
        - composer require webapp

    b- Démarrage du serveur
      - php -S 0.0.0.0:8000 -t public : le serveur démarré et site accessible

    c- Installation de la bibliothèque bundle Faker pour gégérer de fausses données
      - composer require fzaninotto/faker

    d- Installation de la bibliothèque bundle Faker pour gégérer de fausses données de photos
     - composer require bluemmb/faker-picsum-photos-provider

    e- On installe FakerPHP avec Composer
     - composer require fakerphp/faker

    f- Installation de la gestion d'authentification
      - composer require "lexik/jwt-authentication-bundle"
      - bin/console lexik:jwt:generate-keypair
    
    g- Installation de la gestion de sécurité
      - composer require symfony/security-bundle

    h- Installation de la gestion de fausses données
      - composer require --dev orm-fixtures


### Base de données

   - Nom de la base : bread_drop
   - User : bread_drop
   - Mot de passe : bread_drop

   - Création des entités

### Les routes

> Les noter dans le fichier `routes.md`.

### Dico de données
> Les noter dans le fichier `dico-donnees.md`.

### API


