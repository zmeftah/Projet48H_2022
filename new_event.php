<?php include "inc\header.php"; ?>



<html>

<head>
    <title>Insertion d'une nouvelle réponse</title>
</head>

<body>

    <div class="newPostContainer">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="titre">Titre</label> <br>
            <input type="text" name="titre" id="title" placeholder="Un titre sympa aller !"> <br>
            <label for="titre">lieux</label> <br>
            <input type="text" name="lieux" id="title" placeholder="Un titre sympa aller !"> <br>
            <label for="">Description</label> <br>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <label>Select Image File:</label>
            <input type="file" name="uploadfile" style="color: white;"> <br>
            <button type="submit" name ="upload">Publier</button>
        </form>
    </div>
    <p><?= !empty($statusMsg) ? $statusMsg : "" ?></p>
    <p> <?= (!is_null($error)) ? $error : $success; ?> </p>
</body>

</html>



<?php 
if (isset($_POST['upload'])) {

$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "assets/images/" . $filename;


$_POST['titre'] = htmlentities($_POST['titre']);
$tre = $_POST["titre"];
$tre = addslashes($tre); //pour ajouter des slashes pour prendre en compte les apostrophes






$_POST["description"] = htmlentities($_POST["description"]);
$desc = $_POST["description"];
$desc = addslashes($desc); //pour ajouter des slashes pour prendre en compte les apostrophes

$_POST["lieux"] = htmlentities($_POST["lieux"]);
$lx = $_POST["lieux"];
$lx = addslashes($lx);

// Récuperer toutes les données soumises par le formulaire 
$sql = "INSERT INTO events (titre, description, photo, categorie, tag, user, lieux) VALUES ('$tre','$desc','$filename',1,1, 1, '$lx' )";

// Execute query 
mysqli_query($conn, $sql);

// Déplacer l'image télécharger dans le dossier : assest/images
if (move_uploaded_file($tempname, $folder)) {
    $msg = "Image téléchargée avec succès";
} else {
    $msg = "Erreur lors du téléchargement de l'image";
}

header('Location: index.php?ajout=true');
} ?>
