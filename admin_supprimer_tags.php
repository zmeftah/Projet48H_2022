<?php
include_once "inc\header.php";
if (!empty($_GET)) {
    $pdo->query("DELETE FROM tags WHERE id= " . $_GET['id'] );

    header('Location: admin_list_tags.php?supp=true');

}
