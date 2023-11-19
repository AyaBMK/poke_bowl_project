# Poké PARADISE

Ce projet PHP représente un site de vente en ligne spécialisé dans les délicieux Poke Bowls. L'objectif était de créer une plateforme permettant à l'administrateur de gérer facilement les produits disponibles tout en offrant aux utilisateurs une interface conviviale pour explorer, filtrer et acheter leurs Poke Bowls préférés.

## Fonctionnalités clés

- Interface d'administration (CRUD) : Permet à l'administrateur d'ajouter, supprimer et modifier les produits disponibles.
- Interface utilisateur : Les utilisateurs peuvent filtrer les produits en fonction des prix et ajouter des articles à leur panier.
- Panier d'achats : Fonctionnalité permettant de sélectionner, valider et supprimer les articles du panier.
Système d'authentification et d'inscription : Sécurisation de l'accès pour les utilisateurs et gestion des comptes.

## Système d’administrateurs pour administrer les plats.

- Ce système d'administration permet l'accès à une interface avec un utilisateur de type administrateur, identifiable par le user_type = 1 dans la page de connexion. Les informations de connexion pour cette interface sont les suivantes :

Email : aya@gmail.com
Mot de passe : 123

## Les layout de la page admin : 

Pour garantir une expérience utilisateur cohérente, j'ai reproduit la structure de la barre de navigation (navbar) de l'interface utilisateur dans l'interface d'administration. Cette approche a été choisie après avoir considéré le temps nécessaire pour créer une navbar distincte pour l'interface d'administration, ce qui aurait demandé un travail substantiel et dépassé les contraintes de temps fixées.


### Class Product : 
Cette classe gère l'accès aux données (les interactions avec la base de données) pour les produits du restaurants, notamment les requêtes. 

Elle comporte les méthodes suivantes (CRUD)

getAllProducts 
getProduct 
insertProduct  
updateProduct 
deleteProduct

### Class ProductController :

La classe ProductController agit comme un contrôleur intermédiaire entre l'interface (l'affichage) et la classe Product chargée de l'accès à la base de données pour les produits.

- Elle comprend les fonctions suivantes :

- listProducts: Récupère tous les produits et gère les erreurs liées à la connexion à la base de données.

- addProduct: Ajoute un nouveau produit en vérifiant les champs requis, le format correct, et en gérant le téléchargement et le stockage d'images.

- updateProduct: Met à jour un produit existant en faisant appel à la méthode correspondante dans la classe Product.

- deleteProduct: Supprime un produit en appelant la méthode appropriée de la classe Product, en vérifiant l'ID.


### Class AppError / AppSucces :
### Functions getErrorMessage / getSuccesMessage :

pour gérer les messages d'erreurs et de succès dans l'application.

###### Refactorisation dans le système d'administration

Dans la section dédiée à l'administration, j'ai effectué une refactorisation du code. J'ai isolé la liste des produits pour l'appeler de manière modulaire chaque fois que nécessaire, améliorant ainsi la structure et la maintenance du code. 

Cependant, dans la section du système d'utilisateur, cette optimisation spécifique n'a pas été réalisée. Les contraintes de temps m'ont amené à prioriser d'autres fonctionnalités et aspects du projet pour respecter les délais impartis. En conséquence, cette approche de refactorisation a été ciblée et appliquée spécifiquement à la partie d'administration du projet.


## Système d’utilisateurs.

L'interface utilisateur permet l'accès à une interface dédiée aux utilisateurs réguliers. Ces utilisateurs peuvent accéder à différentes fonctionnalités du site après s'être connectés avec leurs informations d'identification.

Les informations de connexion pour cette interface utilisateur sont les suivantes :

Email : meijuan@gmail.com
Mot de passe : 123

### Commençons par la page qui affiche les plats

La page "Menu" affiche une liste de plats avec une option de filtrage par prix. Elle utilise la classe ProductController pour récupérer les produits depuis la base de données. Les produits peuvent également être filtrés par prix à l'aide d'un formulaire.  

- Gestion des connexions à la base de données
Dans les pages menu, plat, owl-carousel, j'avais temporairement retiré le bloc try-catch qui gérait les erreurs de connexion à la base de données pour effectuer des tests spécifiques. Cependant, par inadvertance, j'ai oublié de rétablir cette structure.



