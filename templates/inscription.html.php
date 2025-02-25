<section class="container py-5">
    <h1 class="text-center my-4">Inscription</h1>
    <div class="row justify-content-around align-items-center">
        <div class="col-12 col-md-6 col-lg-4">
            <form method="POST" class="my-4 p-4 border rounded shadow-sm bg-white" action="">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['firstname']) ? 'is-invalid' : '' ?>" name="firstname" id="firstname" required placeholder="John">
                    <?php if(isset($errors) && !empty($errors['firstname'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['firstname'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['lastname']) ? 'is-invalid' : '' ?>" name="lastname" id="lastname" required placeholder="Doe">
                    <?php if(isset($errors) && !empty($errors['lastname'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['lastname'] ?>
                        </div>
                    <?php endif; ?>
                </div>
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
                <button type="submit" class="btn btn-primary w-100" name="register_form_submit" title="S'inscrire">S'inscrire</button>
            </form>
        </div>
    </div>
</section>