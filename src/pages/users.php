<?php

require '../src/data/db-connect.php';

$query = $dbh->query("SELECT * FROM utilisateur");
$user = $query->FETCHALL();

$title = "Liste des utilisateurs";
$description = "Sur cette page l'administrateur trouve la liste de tous les utilisateurs de l'application";
