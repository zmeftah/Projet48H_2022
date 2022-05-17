<?php

include "inc\header.php";
$result2 = $pdo->query("SELECT * FROM events ") ?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
</head>

<body>
<div class="row">
    <?php while ($photo2 = $result2->fetch(PDO::FETCH_OBJ)) {?>
    
        <tr>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a href="article.php?id=<?php echo $photo2->id ?>" class="fancybox" rel="ligthbox">
                <img src="<?php echo $photo2->photo  ?>" class="zoom img-fluid" alt="">
                <h3><?php echo $photo2->titre  ?></h3>
                <a href="admin_supprimer.php?id=<?php echo $photo2->id ?>" class="glyphicon glyphicon-remove"></a>
            </a>
        </div>
        </tr>
    <?php
    }

    ?>
</div>
</body>
