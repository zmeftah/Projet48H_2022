<?php include "inc\header.php" ?>

<div class="container">
        <div class="main-body">


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>pseudo</h4>
                                    <p class="text-secondary mb-1">Inscription :</p>
                                    <p class="text-muted font-size-sm">257-652</p>
                                    <?php
                                    if (1 == 1) { ?>
                                        
                                        <a href="modifphotos.php" class="btn btn-outline-primary">Modifier une  photo</a>
                                        <a href="suppphoto.php" class="btn btn-outline-danger">Supprimer une photo</a>
                                        <a href="admin.php" class="btn btn-outline-primary">Administration</a>
                                        
                                        

                                    <?php }else{ ?>
                                        <a href="modifphotos.php" class="btn btn-outline-primary">Modifier une photo</a>
                                        <a href="suppphoto.php" class="btn btn-outline-danger">Supprimer une photo</a>
                                        

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
                                    Ceci est un nom
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Prénom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                Ceci est un prénom
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    ceci est un email
                                </div>
                            </div>


                        </div>
                    </div>

                    








                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Contributions :</h4>

                            <div class="row">


                                



                                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                        <a href="article.php?id=1" class="fancybox" rel="ligthbox">
                                            <img src="assets/images/" class="zoom img-fluid" alt="">
                                            <h3>titre</h3>
                                        </a>
                                    </div>


                                






                            </div>
                            


                        </div>
                    </div>













                </div>
            </div>
        </div>
    </div>