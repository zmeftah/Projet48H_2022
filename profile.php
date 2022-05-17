<?php include "inc\header.php";
$login = $_SESSION['mail'];


$requete = mysqli_query($conn, "SELECT id from users  where email='$login'");
$data = mysqli_fetch_assoc($requete);
$aut = $data['id'];
$result = $pdo->query("SELECT * FROM users where id='$aut' ");
$profil = $result->fetch(PDO::FETCH_OBJ);
?>

<div class="container">
        <div class="main-body">


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $profil->prenom ?></h4>
                                    
                                    <?php
                                    if ($profil->isadmin == 1) { ?>
                                        
                                        <a href="modifphotos.php" class="btn btn-outline-primary">Modifier un event</a>
                                        <a href="suppphoto.php" class="btn btn-outline-danger">Supprimer un event</a>
                                        <a href="dashboard.php" class="btn btn-outline-primary">Administration</a>
                                        
                                        

                                    <?php }else{ ?>
                                        <a href="modifphotos.php" class="btn btn-outline-primary">Modifier un event</a>
                                        <a href="suppphoto.php" class="btn btn-outline-danger">Supprimer un event</a>
                                        

                                    <?php }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    








                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $profil->nom  ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Prénom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $profil->prenom  ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $profil->email  ?>
                                </div>
                            </div>


                        </div>
                    </div>

                    







                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Mes events :</h4>

                            <div class="row">
                            <?php $result = $pdo->query("SELECT * FROM events where user='$aut'");
 while ($art = $result->fetch(PDO::FETCH_OBJ)) {
                                ?>


                                



                                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                        <a href="article.php?id=1" class="fancybox" rel="ligthbox">
                                            <img src="assets/images/" class="zoom img-fluid" alt="">
                                            <h3><?php echo $art->titre ?></h3>
                                        </a>
                                    </div>
                                    <?php }  ?>



                                






                            </div>
                            


                        </div>
                    </div>













                </div>
            </div>
        </div>
    </div>
