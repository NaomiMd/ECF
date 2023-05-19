# ECF
Déploiement en local

Xampp : 
Téléchargez le fichier(ou clonez le) et le placez dans le dossier htdocs situé dans le dossier Xampp.
Importez la base de donnée disponible dans le dossier BDD dans phpmyadmin.
*Pensez à changer les données pdo d'accès à votre phpmyadmin. 
*$this->pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'id', 'pws');(accessible dans les controller)
Ouvrir dans un navigateur http://localhost/ECF/index.php pour accéder au site.

Pour accéder au dashboard il faut se connecter avec les identifiants données dans la copie à rendre de l'ecf.
La création de l'admin se fait dès l'importation de la bdd dans phpmyadmin.
Si vous souhaitez créer un nouvel admin (à faire avant l'importation du fichier dans phpmyadmin):
Se rendre dans le fichier bdd.sql et faire un :
insert into admin (id, email, password, role) values (id, 'emailChoisi', 'un mot de passe hashé', 'admin');
Pour le mot de passe il faut le mettre en hashé dans la base de donnée pour se faire vous pouvez utiliser un site tel que bcrypt.(https://www.bcrypt.fr/).


