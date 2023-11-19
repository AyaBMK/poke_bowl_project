# Poké PARADISE

Ce projet PHP représente un site de vente en ligne spécialisé dans les délicieux Poke Bowls. L'objectif était de créer une plateforme permettant à l'administrateur de gérer facilement les produits disponibles tout en offrant aux utilisateurs une interface conviviale pour explorer, filtrer et acheter leurs Poke Bowls préférés.

## Fonctionnalités clés

- Interface d'administration (CRUD) et upload de fichiers : Cette fonctionnalité permet à l'administrateur de se connecter via des sessions, d'effectuer les opérations CRUD (ajout, suppression, modification) sur les produits disponibles et de télécharger des fichiers.
- Interface utilisateur : Les utilisateurs ont la possibilité de filtrer les produits en fonction des prix et d'ajouter des articles à leur panier pour effectuer des achats.
- Panier d'achats : Permet aux utilisateurs connectés de sélectionner, valider et supprimer des articles du panier, garantissant ainsi une gestion   des achats.
Système d'authentification et d'inscription : Garantit la sécurité de l'accès aux différentes fonctionnalités du site en offrant aux utilisateurs la possibilité de créer un compte sécurisé et de s'authentifier. 
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

### Gestion du Panier

La gestion du panier est assurée par plusieurs fichiers interdépendants dans le projet. Voici un aperçu du processus général suivi pour la gestion du panier :

- Ajout d'un produit au panier : Lorsqu'un utilisateur sélectionne un produit à partir de la page de produit (plat.php), les détails du produit, tels que l'ID, le nom, le prix et la quantité, sont capturés et ajoutés au panier via le formulaire. Cette action est gérée par le fichier cart_shopping_process.php.

- Stockage des détails du panier : Les détails des produits sélectionnés sont stockés dans une session pour que l'utilisateur puisse voir et gérer son panier. Ces détails sont maintenus en utilisant la superglobale SESSION.

- Affichage du panier : La page cart_shopping.php est chargée d'afficher les détails actuels du panier. Elle récupère les informations stockées en session sur les produits ajoutés, calcule le prix total et offre des options pour supprimer des produits individuels ou vider complètement le panier.

- Finalisation de la commande : Lorsque l'utilisateur souhaite finaliser sa commande en cliquant sur le bouton 'valider le panier'. La page order_process.php réinitialise le panier  une fois que l'utilisateur a confirmé sa commande en soumettant le formulaire et redirige l'utilisateur vers une page de remerciement pour lui indiquer que sa commande a été traitée avec succès.

## Améliorations Futures

Afin de poursuivre le développement et d'enrichir l'expérience offerte par Poké PARADISE, voici quelques améliorations que j'envisage d'intégrer :

- Refactorisation de l'Interface Utilisateur

Une des améliorations majeures serait de refactoriser le code de la partie utilisateur pour le rendre plus lisible et efficace. Cela inclut la refactorisation du processus de filtrage des produits par prix.

- Tunnel de Commande.

- Section Profil Personnalisée

Une section profil utilisateur serait introduite pour permettre aux utilisateurs de gérer plus facilement leurs informations personnelles. Cette section offrirait la possibilité de modifier les coordonnées, y compris la photo de profil, de changer de mot de passe et de désactiver définitivement leur compte si nécessaire.

- Section Commentaire et Notation des Plats 

J'envisage d'ajouter une fonctionnalité permettant aux utilisateurs de laisser des commentaires et de noter les plats. Cela permettra à chacun de partager son avis sur les plats qu'ils ont appréciés.

- Sécurisation de la Partie Inscription 

Je travaille également à renforcer la sécurité du processus d'inscription pour garantir la confidentialité et la protection des données des utilisateurs.

# Conclusion

C'est avec enthousiasme que je présente Poké PARADISE, mon premier projet en PHP. Les améliorations prévues pour cette plateforme visent à offrir une expérience utilisateur plus fluide et sécurisée. Je suis ravie de continuer à développer ce projet et d'apprendre davantage au fil de son évolution.
