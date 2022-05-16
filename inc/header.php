<?php
// Initialiser la session
session_start();
 include "data\data.php" 
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 48h</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet"> 
    



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!--<li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li> -->











                <?php
                if (isset($_SESSION['mail']) && !empty($_SESSION['mail'])) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Se déconnecter</a>
                    </li>

                    
                    

                <?php } else { ?>




                    <li class="nav-item active">
                        <a class="nav-link" href="signin.php">Se connecter</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="signup.php">S'inscrire</a>
                    </li>

                <?php } ?>




            </ul>
        
        </div>
    </nav>





























</head>


<body>