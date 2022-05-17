<?php include "inc\header.php" ?>
<?php if (!empty($_GET)) {;
$login = $_SESSION['mail'];


$requete = mysqli_query($conn, "SELECT id from users  where email='$login'");
$data = mysqli_fetch_assoc($requete);
$auth = $data['id'];

$id_event = $_GET['id'];

        
    
   
    
    ?>

   



    
    <?php $result = $pdo->query("SELECT * FROM events WHERE id= " . $_GET['id']);
    while ($photo = $result->fetch(PDO::FETCH_OBJ)) { ?>


        <div class="container">

            <div class="row">



                <div class="col-lg-9">

                    <div class="card mt-4">
                        <img class="card-img-top img-fluid" src="assets/images/<?php echo "$photo->photo" ?>" alt="">

                        <div class="card-body">
                            <h3 class="card-title"><?php echo "$photo->titre" ?></h3>
                            <p class="card-text"><?php echo "$photo->description" ?> </p>
                            <?php
                            $login = $_SESSION['mail'];
                            $requete = mysqli_query($conn, "SELECT nom from users  where id='$photo->user'");
                            $data = mysqli_fetch_assoc($requete);
                            $aut = $data['nom'];

                            $requete2 = mysqli_query($conn, "SELECT prenom from users  where id='$photo->user'");;
                            $data2 = mysqli_fetch_assoc($requete2);
                            $autnom = $data2['prenom'];

                            $requete3 = mysqli_query($conn, "SELECT nom from categories  where id='$photo->categorie'");;
                            $data3 = mysqli_fetch_assoc($requete3);
                            $cat = $data3['nom'];

                            $requete4 = mysqli_query($conn, "SELECT nom from tags  where id='$photo->categorie'");;
                            $data4 = mysqli_fetch_assoc($requete4);
                            $tag = $data4['nom'];

                            

                            ?>
                            <small><?php echo $aut ?> <?php echo $autnom ?></small>

                            <small class="text-muted"><?php echo "$photo->date" ?></small>


                            

                            <?php


                            

                           



                           






                            ?>









                            <br>

                            <small class="text"><i class="fas fa-tag fa-2x"></i> <?php echo $cat ?> </small>
                            <small class="text"><i class="fas fa-tag fa-2x"></i> <?php echo $tag ?> </small>


                        </div>
                        <form class="form-horizontal"  method="POST" >
                        
                            <button type="submit"  name="Submit1" class="btn btn-success">Participer</button>
                        </form>


                    </div>


                </div>
                <!-- /.col-lg-9 -->

            </div>

        </div>
    <?php } ;
    if (isset($_POST["Submit1"])) {
        $sql = "INSERT INTO event_participant (id_event, id_participant) VALUES ('$id_event','$auth' )";

        // Execute query 
        mysqli_query($conn, $sql);
        

    }
   ?>

<?php } else { ?>
    <div class="alert alert-danger" role="alert">
        Impossible d'afficher les détails de cette photo
    </div>
<?php } ?>



<?php include "inc\/footer.php" ?>