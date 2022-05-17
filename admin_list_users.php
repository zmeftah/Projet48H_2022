<?php include "inc\header.php";
?>
    


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>
<?php 
$result = $pdo->query("SELECT * FROM users") ?>
<div>
    <div>
        <h3>email</h3>
    </div>
    <div>
<?php while ($user = $result->fetch(PDO::FETCH_OBJ)) {?>
    <div class="col">
        <th><?php echo $user->email ?></th>
        <a href="admin_supprimer_users.php?id=<?php echo $user->id ?>" class="glyphicon glyphicon-remove"></a>
    </div>  
    </div>
                
        <?php
        }
        ?>
</div>
</body>
<?php include "inc\/footer.php" ?>