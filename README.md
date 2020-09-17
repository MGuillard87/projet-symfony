# projet-symfony

##Installation

###Prérequis: avant de créer votre première application symfony, il faut installer quelques outils au préalable
  - installer PHP 7.4.5
  - Installez Composer , qui est utilisé pour installer les packages PHP -> [installer composer](https://getcomposer.org/download/)
  - en option (mais non obligatoire pour le fonctionnement de l'application): vous pouvez [installer Symfony CLI](https://symfony.com/download),  un outil pour vérifier si votre ordinateur répond à toutes les exigences concernant symfony
  
###Clonage du projet sur votre pc (pas besoin de l'installer dans var/www/html, le framework a un serveur interne qu'on peut utliser)
    - git clone https://github.com/MGuillard87/projet-symfony
    - placer vous ensuite dans le projet en tapant cette commande:
      cd projet-symfony
    
###configuration du projet 
    - composer install (les dépendances)   
    - personnaliser le fichier .env, à la ligne ci-dessous, pour qu'il s'adapte à votre base de données: user, mot de passe, nom de la base de données
      DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
    
###Lancement du projet (commandes utiles)
 *_symfony server:start_ ou _symfony serve -d_ (lancer le serveur en arrière plan sur la console)
 *ctrl + c ou _symfony server:stop_ pour stopper le serveur
 
 
  
