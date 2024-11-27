<section class="container py-5">
    <h1 class="text-center my-4">Modifier une tâche</h1>
    <div class="my-4">
        <a href="/?page=dashboard-task"><button class="btn btn-primary" title="Annuler">Annuler</button></a>
    </div>
    <div class="my-4 d-flex justify-content-center">
        <form action="" method="POST" class="row gy-3">
            <div class="col-12">
                <div class="form-group mb-4">
                    <label for="task_name" class="form-label">Nom de la tâche</label>
                    <input type="text" name="task_name" id="task_name" class="form-control" required value="<?= htmlspecialchars($taskName); ?>">
                    <?php if(isset($errors) && !empty($errors['task_name'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['task_name'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mb-4">
                    <label for="created_at" class="form-label">Date de Création de la tâche</label>
                    <input type="date" name="created_at" id="created_at" class="form-control" required value="<?= htmlspecialchars($taskStart); ?>">
                    <?php if(isset($errors) && !empty($errors['created_at'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['created_at'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary" name="edit_task_submit" id="edit_task_submit" title="Modifier">Modifier</button>
            </div>
        </form>
    </div>
</section>