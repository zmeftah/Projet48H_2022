<?php
// Initialiser la session
session_start();
 include "data\data.php" 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Accueil </title>
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="../scriptAssets/app.js"></script>
</head>
<body>
  <header id="mainHeader">
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ICI LOGO !</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.html">Accueil</a>
            </li>
            <?php if (isset($_SESSION['mail']) && !empty($_SESSION['mail'])) { ?>

                    <li class="nav-item ">
                        <a class="nav-link" href="logout.php">Se déconnecter</a>
                    </li>

                    
                    

                <?php } else { ?>




                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">S'inscrire</a>
                    </li>

                <?php } ?>
            
            <li class="nav-item">
              <a class="nav-link" href="./events.html">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./contact.html">Contact</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li> -->
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
       
    </header>

            




            





























</head>


<body>