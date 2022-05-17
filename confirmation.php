<?php include "inc\header.php" ?>


<?php

$login = $_SESSION['mail'];


$requete = mysqli_query($conn, "SELECT id from users  where email='$login'");
$data = mysqli_fetch_assoc($requete);
$auth = $data['id'];


$result = $pdo->query("SELECT * FROM event_participant where id_organisateur='$auth' ");

while ($event_participant = $result->fetch(PDO::FETCH_OBJ)) { 


    ?><h1></h1><?php
    echo $event_participant->id_participant;

}


?>







<?php include "inc\/footer.php" ?>