# Comment afficher le contenu de la bdd

## Creer la base : 
Se rendre sur :
http://localhost/IDAW/TP4/exo3/init_db.php

## Afficher les données :
Se rendre sur : 
http://localhost/IDAW/TP4/exo4/users.php

## Tester l'API : 

### Commandes curl pour tester l'API : 
.\exo5\commandes_curl_test_api.txt

### Fonctionnement : 
- Liste de tous les utilisateurs : users.php avec méthode __GET__
- Afficher un utilisateur en fonction de son id : user.php avec méthode __GET__ -> paramètre _id_
- Ajouter un utilisateur : user.php avec méthode __POST__ -> paramètres _name_ et _email_
- Modifier un utilisateur : user.php avec méthode __PUT__ -> paramètres _name_, _email_ et _id_
- Supprimer un utilisateur : user.php avec méthode __DELETE__ -> paramètre _id_