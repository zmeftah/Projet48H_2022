<?php include "inc\header.php";





if (isset($_GET["recherche"]) and $_GET["recherche"] == "Rechercher") {
    $_GET["terme"] = htmlentities($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
    $terme = $_GET["terme"];
    $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
    $terme = strip_tags($terme); //pour supprimer les balises html dans la requête
    $terme = addslashes($terme); //pour ajouter des slashes pour prendre en compte les apostrophes

    

    
 
    
    if (isset($terme)) {
        $terme = strtolower($terme);
        $select_terme = $pdo->prepare('SELECT titre, description, user, photo, id, categorie, date FROM events WHERE titre LIKE ? OR description LIKE ? OR user LIKE ? OR photo LIKE ? OR id LIKE ? OR categorie LIKE ? OR date LIKE ? ');
        $select_terme->execute(array("%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%"));
        
    } else {
        $message = "Vous devez entrer votre requete dans la barre de recherche";
    }
}


$trouve = false;
$afficheaucun = false;









?>
<main id="mainPage">
    <?php while ($terme_trouve = $select_terme->fetch()) {
    ?>

            
                <a href="article.php?id=<?php echo $terme_trouve['id'] ?>" class="fancybox" rel="ligthbox">
                        
                    
                        
                            <div class="card">
                                <div class="card-image"><img src="<?php echo $terme_trouve['img']  ?>" /></div>
                                <div class="card-body"></div>
                                <div class="card-date">
                                    <time><?php echo $terme_trouve['date']  ?></time>
                                </div>
                                <div class="card-title">
                                    <h3><?php echo $terme_trouve['titre']  ?></h3>
                                </div>
                                

                            </div>
                        </div>
                </a>
            
            <br>
        
    <?php
    }
    

    ?>
    </main>



<?php include "inc\/footer.php" ?>