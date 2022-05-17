<?php
include_once "inc\header.php";
if (!empty($_GET)) {
    $pdo->query("DELETE FROM categories WHERE id= " . $_GET['id'] );

    header('Location: admin_list_categories.php?supp=true');

}