<?php

if(!empty($_POST['task_id']))
{
    require '../src/data/db-connect.php';

    $query = $dbh->prepare("DELETE FROM task WHERE id_type = :id_type");
    $query->execute([
        'id_task' => $_POST['task_id'],
    ]);
}

header('Location: /?page=dashboard-task');
exit;