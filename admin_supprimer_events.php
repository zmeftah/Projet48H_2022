<?php
include_once "inc\header.php";
if (!empty($_GET)) {
    $pdo->query("DELETE FROM events WHERE id= " . $_GET['id'] );

    header('Location: dashboard.php?supp=true');

}

