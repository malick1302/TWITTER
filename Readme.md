# TWITTER 🦜
 Projet d'un mois dans une Team de 4.
 L'objectif était de recréer les fonctionalités de base Twitter.

# TECHNOLOGIES 📒
- PHP
- Tailwind
- MYSQL
- AJAX

# FONCTIONALITéS 👨‍🏫
- Page inscription
- Page connexion
- Page home
- Page de profil
- Messagerie

Il est possible de : 
- Publier un post, liker, partager, répondre au post.
- Follow ou Unfollow un utilisateur.
- Communiquer avec un Utilisateur que l'on Follow.
- Modifier son profil: y ajouter une bio, une photo de profil, un photo de couverture


#UTILISATION 🤓
- Git clone le projet
- dans le terminal ajouter "gener output.css -> npx @tailwindcss/cli -i main.css -o ./src/output.css --watch "
- Ouvrir Visual Studio Code
- Faire un Source dans mysql de la base de donnée
- Dans le dossier config :

  ##Creation du "connect.php" --> y ajouter :
  <?php
 
class Connect{

    private $host = "localhost";
    private $dbname = "twitter";
    private $username = "root";
    private $password = "";
    private $connect = null;
 
public function pdo_connect(){
    try{
        $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    } catch(PDOException $error){
        echo "Database connexion error" . $error->getMessage();
    }
    return $this->connect;
}
}


##Creation du "private.php" --> y ajouter :

"<?php"
define('SALT', "vive le projet tweet_academy");
define('SALT_COOKIE', "let me in");

 
  
  









