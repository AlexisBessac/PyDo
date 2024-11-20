<section class="container py-5">
    <h1 class="text-center">Ma liste de tâches</h1>
    <div class="button-container">
        <a href="/?page=index"><button class="btn btn-primary" title="Déconnexion">Déconnexion</button></a>
    </div>
    <div class="my-4 mx-2">
        <a href="/?page=add-task"><button class="btn btn-primary" title="Ajouter une tâche">Ajouter une tâche</button></a>
    </div>
    <table class=" table table-bordered table-striped my-4">
        <thead>
            <th>Nom de la tâche</th>
            <th>Date de Création</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody>
            <?php foreach ($task as $tasks) : ?>
                <tr>
                    <td><?= $tasks['name'] ?></td>
                    <td><?= date('d F Y', strtotime($tasks['created_at'])) ?></td>
                    <td>
                        <a href="/?page=edit-task&id=<?= $tasks['id_task'] ?>" class="btn btn-success" title="Modifier">Modifier</a>
                    </td>
                    <td>
                        <form action="/?page=delete-task" method="POST" onsubmit="return confirm('Etes vous sûr de vouloir supprimer cette tâche ?')">
                            <input type="hidden" name="task_id" value="<?= $tasks['id_task'] ?>" />
                            <button class="btn btn-danger" type="submit" title="Supprimer">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($tasks)) : ?>
                <tr>
                    <td colspan="3" class="text-center">Aucune tâche présente dans la base de données</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>