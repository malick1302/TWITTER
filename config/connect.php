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
