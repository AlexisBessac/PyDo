<section class="container py-5">
    <h1 class="text-center my-4">Gestion des utilisateurs</h1>
    <div class="button-container">
        <a href="/?page=index"><button class="btn btn-primary" title="Déconnexion">Déconnexion</button></a>
    </div>
    <div>
        <div>
            <a href="/?page=add-user"><button class="btn btn-primary my-4" title="Créer un utilisateur">Créer un utilisateur</button></a>
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody>
            <?php foreach ($user as $users) : ?>
                <tr>
                    <td><?= $users['firstname'] ?></td>
                    <td><?= $users['lastname'] ?></td>
                    <td><?= $users['email'] ?></td>
                    <td>
                        <a href="/?page=edit-user&id=<?= $users['id_utilisateur'] ?>" class="btn btn-success" title="Modifier">Modifier</a>
                    </td>
                    <td>
                        <form action="/?page=delete-user" method="POST" onsubmit="return confirm('Etes vous sûr de vouloir supprimer cet utilisateur ?')">
                            <input type="hidden" name="user_id" value="<?= $users['id_utilisateur'] ?>" />
                            <button class="btn btn-danger" type="submit" title="Supprimer">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($users)) : ?>
                <tr>
                    <td colspan="5" class="text-center">Aucun utilisateur présent dans la base de données</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>