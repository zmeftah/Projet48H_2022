<?php include "inc\header.php" ?>


<?php



if (isset($_POST['mail'])) {
    $mail = stripslashes($_REQUEST['mail']);
    $mail = mysqli_real_escape_string($conn, $mail);
    $mdp = stripslashes($_REQUEST['mdp']);
    $mdp = mysqli_real_escape_string($conn, $mdp);
    $query = "SELECT * FROM `users` WHERE email='$mail' and mdp='" . hash('sha256', $mdp) . "'";
    $result = mysqli_query($conn, $query) or die();
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['mail'] = $mail;
        $_SESSION['id'] = $id;

        header("Location: index.php");
    } else {
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
}



?>













<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Connexion</h2>
        <div class="form-group">
            <input type="text" name="mail" class="form-control" placeholder="email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="mdp" class="form-control" placeholder="Mot de passe " required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Se rappeler de moi</label>
            <a href="#" class="float-right">Mot de passe oublié ?</a>
        </div>
    </form>
    <p class="text-center"><a href="signup.php">Créer un compte </a></p>
</div>






<?php include "inc\/footer.php" ?>