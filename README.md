## Agence Immobilière - Immoveïs

#### Contexte

Immoveïs est un projet s'inscrivant dans un cadre scolaire. 

En effet, il s'agit ici de développer un site web, statique ou marchand, attestant d'un niveau junior sur le framework Symfony 5.

#### Compétences évaluées :

- Compréhension de l'architecture d'un projet Symfony
- Compréhension du concept de Controllers et Routes
- Compréhension de l'ORM Doctrine et la liaison avec la base de données, ainsi que la création de requêtes DQL personnalisées
- Compréhension du concept d'Entité et du cycle de vie, ainsi que du concept de Repository et système de Migrations
- Utilisation du moteur de template Twig
- Utilisation du composant Form et mise en place des validations
- Utilisation du composant Security pour sécuriser l'accès aux pages du site et gérer des rôles utilisateurs
- Utilisation du Guard Authenticator pour sécuriser l’authentification utilisateur
- Utilisation du système de Fixtures pour créer un jeu de fausses données
- Utilisation de Bundles

### Le projet

Le projet étant libre, j'ai décidé pour ma part de développer un site web et back-office d'une agence immobilière fictive.

***Site Web*** :

- Page Accueil : Listing des dernières offres non loués ni vendus.
- Page Toutes les annonces : Listing des dernières offres non loués ni vendus, mais avec un système de filtres.
- Page Annonce unique : Présentation de l'offre détaillée, ainsi que sa localisation sur une carte (Non implémentée)

***Site Back-Office*** :

- Page Connexion : Formulaire permettant de se connecter au back-office.
- Page Accueil : Listing de toutes les offres de l'entreprise par ordre décroissant, filtrables par villes.
- Page Annonce unique : Présentation de l'offre détaillée, ainsi que sa localisation sur une carte (Non implémentée)
- Page Nouvelle annonce : Formulaire permettant la création d'une nouvelle offre
- Page Editer une annonce : Formulaire permettant la modification d'une offre
- Bouton Supprimer l'annonce : Formulaire permettant de supprimer une annonce unique (Dans la page Accueil)

### Installation

```git clone git@github.com:Ervin11/AgenceImmoveis.git```

```cd AgenceImmoveis && composer install```

```php bin/console doctrine:database:create```

```php bin/console doctrine:make:migrations```

```php bin/console doctrine:fixtures:load```
