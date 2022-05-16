<?php
include_once "inc/header.php";
$bdd = $conn;
global $bdd;
$id = (int)$_GET["id"];

$image = $bdd->prepare("SELECT image FROM articles WHERE id = ?");
$image->execute([$id]);
$image = $image->fetch()["image"];

unlink('../img/' . $image);

$supprimer = $bdd->prepare("DELETE FROM articles WHERE id = ?");
$supprimer->execute([$id]);

header("Location: admin_post.php");
