<?php

$title = "Ajouter une tâche";
$description = "Sur cette page l'utilisateur peut ajouter une tâche à sa iste de choses à faire";

// On vérifie si le formulaire est envoyé
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_task_submit'])) 
{
    $errors = [];

    // Validation des champs
    if (empty($_POST['task_name']) || strlen($_POST['task_name']) <= 1) 
    {
        $errors['task_name'] = "Le champ Nom de la tâche est obligatoire et doit contenir plus d'un caractère.";
    }

    if (empty($_POST['created_at']) || ctype_digit($_POST['created_at'])) 
    {
        $errors['created_at'] = "Le champ Date de création de la tâche est obligatoire et doit être au format JJ-MM-AAAA.";
    }

    // Si pas d'erreurs, on insère dans la base de données
    if (empty($errors)) 
    {
        require '../src/data/db-connect.php';
        session_start();
        $id_utilisateur = $_SESSION['id_utilisateur'];
        $query = $dbh->prepare("INSERT INTO task (name, created_at, id_utilisateur) VALUES (:name, :created_at, :id_utilisateur)");
        $result = $query->execute([
            'name' => htmlspecialchars($_POST['task_name']),
            'created_at' => htmlspecialchars($_POST['created_at']),
            'id_utilisateur' => $id_utilisateur
        ]);

        if ($result) 
            {
                header('Location: /?page=dashboard-task');
                exit;
            } 
            else 
            {
                $errors['form'] = "Une erreur s'est produite lors de la création de cette tâche. Veuillez contacter l'administrateur à l'adresse [email].";
            }
    }
}