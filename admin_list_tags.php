<?php include "inc\header.php";
?>
    


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - list catégorie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>
<?php 
$result = $pdo->query("SELECT * FROM tags") ?>
<div>
    <div>
        <h3>Tags</h3>
    </div>
    <div>
<?php while ($tag = $result->fetch(PDO::FETCH_OBJ)) {?>
    <div class="col">
        <th><?php echo $tag->nom ?></th>
        <a href="admin_supprimer_tags.php?id=<?php echo $tag->id ?>" class="glyphicon glyphicon-remove"></a>
    </div>  
    </div>
                
        <?php
        }
        ?>
</div>
</body>
<?php include "inc\/footer.php" ?>