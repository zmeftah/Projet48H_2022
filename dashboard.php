<?php

include "inc/header.php";
$bdd = $conn;
if (!empty($_POST))
global $bdd;
extract($_POST);

$validation = true;
$erreurs = [];

if(empty($titre) || empty($description)) {
    $validation = false;
    $erreurs[] = "Tous les champs sont obligatoires";
}

if(!isset($_FILES["photo"]) OR $_FILES["photo"]["error"] > 0) {
    $validation = false;
    $erreurs[] = "Il faut indiquer un fichier";
}

if($validation) {
    $photo = basename($_FILES["photo"]["name"]);
    
    move_uploaded_file($_FILES["photo"]["tmp_name"], '../img/' . $photo);
    
    $poster = $bdd->prepare("INSERT INTO articles(titre, description, photo) VALUES(:titre, :description, :photo)");
    $poster->execute([
        "titre" => htmlentities($titre),
        "description" => nl2br(htmlentities($description)),
        "photo" => htmlentities($photo)
    ]);
    
    unset($_POST["titre"]);
    unset($_POST["description"]);
}

return $erreurs;
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
    <link rel="stylesheet" href="../main.css">
</head>

<body>
    <?php include "header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Poster un article !</h1>
            </div>
        </div>
        <form method="post" action="" enctype="multipart/form-data">
            <?php
            if (isset($erreurs)) :
                if ($erreurs) :
                    foreach ($erreurs as $erreur) :


            ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="message erreur"><?= $erreur ?> </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                else :
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="message confirmation">Votre article a bien été publié !</div>
                        </div>
                    </div>
            <?php
                endif;
            endif;

            ?>
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="titre" placeholder="Titre *" value="<?php if (isset($_POST["titre"])) echo $_POST["titre"] ?>">
                </div>
                <div class="col-sm-6">
                    <input type="file" name="file">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="description" placeholder="Corps de l'article *"><?php if (isset($_POST["description"])) echo $_POST["description"] ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" value="Poster!">
                </div>
            </div>
        </form>
        <?php include "footer.php" ?>
    </div>
</body>

</html>