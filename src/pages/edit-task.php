<?php

$title = "Modifier une tâche";
$description = "Sur cette page l'utilisateur trouve le formulaire qui lui permet de modifier une tâche";

if (!empty($_GET['id'])) 
{
    require '../src/data/db-connect.php';

    $id_task = $_GET['id'];

    if (isset($_POST['edit_task_submit'])) 
    {
        $errors = [];

        if (empty($_POST['task_name']) || strlen($_POST['task_name']) <= 1) 
        {
            $errors['task_name'] = "Le champ Nom de la tâche est obligatoire et doit contenir plus d'un caractère.";
        }
    
        if (empty($_POST['created_at']) || ctype_digit($_POST['created_at'])) 
        {
            $errors['created_at'] = "Le champ Date de création de la tâche est obligatoire et doit être au format JJ-MM-AAAA.";
        }

        if (empty($errors)) 
        {
            $query = $dbh->prepare("UPDATE task SET name = :name, created_at = :created_at WHERE id_task = :id_task");
            $query->execute([
                'name' => htmlspecialchars($_POST['task_name']),
                'created_at' => htmlspecialchars($_POST['created_at']),
                'id_task' => $id_task,
            ]);

            if ($query->rowCount() > 0) 
            {
                header("Location: /?page=dashboard-task");
                exit;
            } 
            else 
            {
                $errors['error'] = "Une erreur s'est produite lors de la mise à jour.";
            }
        }
    }

    // Récupération des données de la formation
    $query = $dbh->prepare("SELECT name, created_at FROM task WHERE id_task = :id_task");
    $query->execute(['id_task' => $id_task]);
    $task = $query->fetch();

    if (!$task) 
    {
        echo "Formation inexistante";
        exit;
    }

    $taskName = $task['name'];
    $taskStart = $task['created_at'];
} 
else 
{
    echo "Erreur : id de la tâche manquant";
    exit;
}