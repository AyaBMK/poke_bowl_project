# poke_bowl_project



## Système d’administrateurs pour administrer les plats.

- Ce système d'administration permet l'accès à une interface avec un utilisateur de type administrateur, identifiable par le user_type = 1 dans la page de connexion. Les informations de connexion pour cette interface sont les suivantes :

Email : aya@gmail.com
Mot de passe : 123


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

- listProducts: Récupère tous les produits et gère les erreurs liées à la connexion à la base de données.

- addProduct: Ajoute un nouveau produit en vérifiant les champs requis, le format correct, et en gérant le téléchargement et le stockage d'images.

- updateProduct: Met à jour un produit existant en faisant appel à la méthode correspondante dans la classe Product.

- deleteProduct: Supprime un produit en appelant la méthode appropriée de la classe Product, en vérifiant l'ID.


### Class AppError / AppSucces :
### Functions getErrorMessage / getSuccesMessage :

pour gérer les messages d'erreurs et de succès dans l'application.


## Système d’utilisateurs

### Commençons par la page qui affiche les plats

La page "Menu" affiche une liste de plats avec une option de filtrage par prix. Elle utilise la classe ProductController pour récupérer les produits depuis la base de données. Les produits peuvent également être filtrés par prix à l'aide d'un formulaire. 
Les messages d'erreur et de succès sont intégrés à travers les classes AppError et AppSucces.



