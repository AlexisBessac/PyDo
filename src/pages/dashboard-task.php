<?php

$title = "Liste des tâches de l'utilisateur";
$description = "Sur cette page l'utilisateur trouve la liste de ces tâches qu'il doit faire, en créer, les modifier et les supprimer";

require '../src/data/db-connect.php';

$query = $dbh->query("SELECT * FROM task");
$task = $query->FETCHALL();
