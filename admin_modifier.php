<?php
include_once "inc/header.php";
$bdd = $conn;
global $bdd;

$id = (int)$_GET["id"];

$post = $bdd->prepare("SELECT titre, description FROM events WHERE id = ?");
$post->execute([$id]);
$post = $post->fetch();
return $post;

if (!empty($_POST))
    global $bdd;
$erreur = "";
extract($_POST);

$id = (int)$_GET["id"];

if (!empty($titre) and !empty($description)) {
    $modifier = $bdd->prepare("UPDATE events SET titre = :titre, description = :description WHERE id = :id");
    $modifier->execute([
        "titre" => htmlentities($titre),
        "description" => nl2br(htmlentities($description)),
        "id" => $id
    ]);
} else
    $erreur .= "Les champs doivent contenir quelque chose";

return $erreur;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Modifier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
    <link rel="stylesheet" href="../main.css">
</head>

<body>
    <?php include "inc/header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1><?= $post["titre"] ?></h1>
            </div>
        </div>
        <form method="post" action="">
            <?php
            if (isset($erreur)) :
                if ($erreur) :
            ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="message erreur"><?= $erreur ?></div>
                        </div>
                    </div>
                <?php
                else :
                ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="message confirmation">Votre article a bien été modifié !</div>
                        </div>
                    </div>
            <?php
                endif;
            endif;
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <input type="text" name="titre" placeholder="Titre *" value="<?= $post["titre"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="description" placeholder="description *"><?= str_replace("<br />", "", $post["description"]) ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" value="Modifier!">
                </div>
            </div>
        </form>
        <?php include "inc/footer.php" ?>
    </div>
</body>

</html>