<section class="container py-5">
    <h1 class="text-center my-4">Se Connecter</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">
            <form method="POST" action="" class="my-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?= isset($errors) && !empty($errors['email']) ? 'is-invalid' : '' ?>" name="email" id="email" aria-describedby="emailHelp" required placeholder="john.doe@email.fr">
                    <?php if(isset($errors) && !empty($errors['email'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control <?= isset($errors) && !empty($errors['password']) ? 'is-invalid' : '' ?>" name="password" id="password" aria-describedby="passwordHelp" minlength="10" required>
                    <?php if(isset($errors) && !empty($errors['password'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['password'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary" name="login_form_submit" title="Se Connecter">Se connecter</button>
            </form>
        </div>
    </div>
</section>