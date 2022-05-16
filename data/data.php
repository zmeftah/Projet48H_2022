<?php

require_once ('auth.php');

// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
 $pdo = new PDO("mysql:host=localhost;dbname=challenge48h", "root", "" , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); 

?>