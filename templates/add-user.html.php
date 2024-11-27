<section class="container py-5">
    <h1 class="text-center my-4">Ajouter un utilisateur</h1>
    <div class="my-4">
        <a href="/?page=users"><button class="btn btn-primary" title="Annuler">Annuler</button></a>
    </div>
    <div class="my-4 d-flex justify-content-center">
        <form action="" method="POST" class="row gy-3">
            <div class="col-12">
                <div class="form-group mb-4">
                    <label for="fisrtname" class="form-label">Prénom</label>
                    <input type="text" name="firstname" id="firstnamename" class="form-control" placeholder="John" required>
                    <?php if(isset($errors) && !empty($errors['firstname'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['firstname'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="mb-4">
                <button type="submit" class="btn btn-primary" name="add_user_submit" id="add_user_submit" title="Ajouter">Ajouter</button>
            </div>
        </form>
    </div>
</section>