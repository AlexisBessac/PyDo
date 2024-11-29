<?php

if (!empty($_POST['user_id'])) 
{
    require '../src/data/db-connect.php';

    // Supprimer les tâches associées à l'utilisateur
    $query = $dbh->prepare("DELETE FROM task WHERE id_utilisateur = :id_utilisateur");
    $query->execute([
        'id_utilisateur' => $_POST['user_id'],
    ]);

    // Supprimer l'utilisateur
    $query = $dbh->prepare("DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
    $query->execute([
        'id_utilisateur' => $_POST['user_id'], 
    ]);
}

header('Location: /?page=users');
exit;