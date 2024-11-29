<?php

$title = "Ajouter un utilisateur";
$description = "Sur cette page l'administrateur trouve le formulaire pour pouvoir ajouter des utilisateurs";

require '../src/pages/role.php';

// Vérification de l'envoi du formulaire et des champs
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user_submit'])) 
{
    $errors = [];

    // Validation des champs
    if (empty($_POST['firstname']) || strlen($_POST['firstname']) <= 1)
    {
        $errors['firstname'] = "Le champ Prénom est obligatoire et doit contenir plus d'un caractère";
    }

    if (empty($_POST['lastname']) || strlen($_POST['lastname']) <= 1) 
    {
        $errors['lastname'] = "Le champ Nom est obligatoire et doit contenir plus d'un caractère";
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
        $errors['email'] = "Le champ Email est obligatoire et doit contenir une adresse email valide";
    }

    if (empty($_POST['password'])) 
    {
        $errors['password'] = "Le champ Mot de passe est obligatoire";
    }

    
    if (empty($_POST['role_id'])) 
    {
        $errors['role_id'] = "Veuillez cocher l'un des rôles";
    }

    if (empty($errors)) 
    {
        // Utilisation d'un grain de sel
        $salt = "pydo";

        // Ajout du grain de sel au mot de passe
        $mdpHache = $_POST['password'] . $salt;
        
        // Hachage du mot de passe
        $newMdp = password_hash($mdpHache, PASSWORD_DEFAULT);

        require '../src/data/db-connect.php';
        $query = $dbh->prepare("INSERT INTO utilisateur(firstname, lastname, email, password, id_role) VALUES(:firstname, :lastname, :email, :password, :id_role)");
        $user = $query->execute([
            'firstname' => htmlspecialchars($_POST['firstname']),
            'lastname' => htmlspecialchars($_POST['lastname']),
            'email' => htmlspecialchars($_POST['email']),
            'password' => $newMdp,
            'id_role' => htmlspecialchars($_POST['role_id'])
        ]);

        if(!$dbh->lastInsertId())
        {
            $errors['error'] = "Erreur lors de la création de l'utilsateur";
        }

        header('Location: /?page=users');
        exit;
    }
}