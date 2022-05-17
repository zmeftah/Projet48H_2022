<?php include "inc\header.php" ?>


<?php

$login = $_SESSION['mail'];


$requete = mysqli_query($conn, "SELECT id from users  where email='$login'");
$data = mysqli_fetch_assoc($requete);
$auth = $data['id'];


$result = $pdo->query("SELECT * FROM event_participant where id_organisateur='$auth' ");
?> <div>
    <h1>Liste des demandes de participation à l'event</h1><?php
                                                            while ($event_participant = $result->fetch(PDO::FETCH_OBJ)) {


                                                                $result2 = $pdo->query("SELECT * FROM users where id='$event_participant->id_participant' ");
                                                                $event_participant2 = $result2->fetch(PDO::FETCH_OBJ);


                                                            ?>

        <p>Nom: <?php echo $event_participant2->nom ?></p>

        <p>prenom: <?php echo $event_participant2->prenom ?></p>
        <button type="button" class="btn btn-success">Confirmer</button>
        <button type="button" class="btn btn-danger">Supprimer</button>



    <?php } ?>
</div>









<?php include "inc\/footer.php" ?>