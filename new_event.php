<?php include "inc\header.php";

// require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
$description = (empty($_POST['description'])) ? null : $_POST['description'];
$titleEvent = (empty($_POST['Event'])) ? null : $_POST['Event'];
$error = null;
$success = null;

if (!is_null($description) && !is_null($titleEvent)) {
    // Security to avoid sql injection
    $description = htmlspecialchars($description);
    $titleEvent = htmlspecialchars($titleEvent);
    $conn->query("INSERT INTO articles (title, description, dateOfPost, idUser)
    VALUES (\"$titleEvent\", \"$description\", NOW(), " . $_SESSION['auth']->getId()  . ") ;");
    $success = "Votre event est bien publié";
} else {
    $error = "Veuillez compléter tout les champs !";
}
if (!empty($_FILES["image"]["name"]) && $success) {
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array(strtolower($fileType), $allowTypes)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // Insert image content into database 
        $insert = $conn->query("UPDATE articles set image = '$imgContent' WHERE idArticle = (SELECT idArticle FROM articles ORDER BY idArticle DESC LIMIT 1)");

        if ($insert) {
            $status = 'success';
            $statusMsg = "File uploaded successfully.";
        } else {
            $statusMsg = "File upload failed, please try again.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
} else {
    $success = null;
    $error = "Veuillez compléter tout les champs !";
}
?>

<html>

<head>
    <title>Insertion d'une nouvelle réponse</title>
</head>

<body>

    <div class="newPostContainer">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Titre</label> <br>
            <input type="text" name="title" id="title" placeholder="Un titre sympa aller !"> <br>
            <label for="">Description</label> <br>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <label>Select Image File:</label>
            <input type="file" name="image" style="color: white;"> <br>
            <button type="submit">Publier</button>
        </form>
    </div>
    <p><?= !empty($statusMsg) ? $statusMsg : "" ?></p>
    <p> <?= (!is_null($error)) ? $error : $success; ?> </p>
</body>

</html>