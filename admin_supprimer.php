<?php
include_once "inc\header.php";
if (!empty($_GET)) {
    $pdo->query("DELETE FROM events WHERE id= " . $_GET['id'] );

    header('Location: dashboard.php?supp=true');

}

if (!empty($_GET)) {
    $pdo->query("DELETE FROM users WHERE id= " . $_GET['id'] );

    header('Location: admin_list_user.php?supp=true');

}