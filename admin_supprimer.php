<?php
include_once "inc\header.php";
global $bdd;
$id = (int)$_GET["id"];

$photo = $bdd->prepare("SELECT photo FROM events WHERE id = ?");
$photo->execute([$id]);
$photo = $photo->fetch()["photo"];

unlink($photo);

$supprimer = $bdd->prepare("DELETE FROM events WHERE id = ?");
$supprimer->execute([$id]);

header("Location: dashboard.php");
