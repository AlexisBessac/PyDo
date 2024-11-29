<section class="container py-5">
    <h1 class="text-center my-4">Modifier un utilisateur</h1>
    <div class="my-4">
        <a href="/?page=users"><button class="btn btn-primary" title="Annuler">Annuler</button></a>
    </div>
    <div class="row justify-content-around align-items-center">
        <div class="col-12 col-md-4">
            <form method="POST" class="my-4" action="">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['firstname']) ? 'is-invalid' : '' ?>" name="firstname" id="firstname" required value="<?= htmlspecialchars($firstname);?>">
                    <?php if (isset($errors) && !empty($errors['firstname'])): ?>
                        <div class="invalid-feedback d-block">
                            <?= $errors['firstname'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['lastname']) ? 'is-invalid' : '' ?>" name="lastname" id="lastname" required value="<?= htmlspecialchars($lastname);?>">
                    <?php if (isset($errors) && !empty($errors['lastname'])): ?>
                        <div class="invalid-feedback d-block">
                            <?= $errors['lastname'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?= isset($errors) && !empty($errors['email']) ? 'is-invalid' : '' ?>" name="email" id="email" aria-describedby="emailHelp" required value="<?= htmlspecialchars($email);?>">
                    <?php if (isset($errors) && !empty($errors['email'])): ?>
                        <div class="invalid-feedback d-block">
                            <?= $errors['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary" name="edit_user_submit" title="Modifier">Modifier</button>
            </form>
        </div>
</section>