<?php
include_once "/inc/header.php";
$bdd = $conn;
global $bdd;
$posts = $bdd->query("SELECT id, titre FROM events ORDER BY id DESC");
$posts = $posts->fetch_all();
return $posts;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Posts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
    <link rel="stylesheet" href="../main.css">
</head>

<body>
    <?php include "header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Anciens posts !</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table>
                    <?php
                    foreach ($posts as $post) :
                    ?>
                        <tr>
                            <td><?= $post["titre"]  ?></td>
                            <td><a href="admin_modifier.php?id=<?= $post["id"] ?>" class="glyphicon glyphicon-pencil"></a></td>
                            <td><a href="admin_supprimer.php?id=<?= $post["id"] ?>" class="glyphicon glyphicon-remove"></a></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>


                </table>
            </div>
        </div>
        <?php include "inc/footer.php" ?>
    </div>
</body>

</html>