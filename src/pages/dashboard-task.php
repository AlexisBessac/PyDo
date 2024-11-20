<?php

session_start();

$title = "Liste des tâches de l'utilisateur";
$description = "Sur cette page l'utilisateur trouve la liste de ces tâches qu'il doit faire, en créer, les modifier et les supprimer";

require '../src/data/db-connect.php';

// Remplacez cette ligne par la manière dont vous obtenez l'ID de l'utilisateur
$id_utilisateur = $_SESSION['id_utilisateur'];

$query = $dbh->prepare("SELECT * FROM task WHERE id_utilisateur = :id_utilisateur");
$query->execute([':id_utilisateur' => $id_utilisateur]);

$task = $query->fetchAll(); 