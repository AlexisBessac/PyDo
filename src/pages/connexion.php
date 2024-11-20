<?php

$title = "Se Connecter";
$description = "Sur cette page l'utilisateur trouve le formulaire qui lui permet de se connecter à son espace";

// Vérifie que le formulaire à bien été envoyé
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_form_submit']))
{

    // Permettra de stocker les messages d'erreurs au fur-et-à-mesure
    $errors = [];

    // Validation du champs "Email"
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $errors['email'] = 'Le champ Email est obligatoire et doit être une adresse email valide';
    }

    // Validation du champs "Password"
    if(empty($_POST['password']))
    {
        $errors['password'] = 'Le mot de passe est obligatoire.';
    }

    if(empty($errors))
    {
        require '../src/data/db-connect.php';

        // Vérification de l'email en BDD
        $email = $_POST['email'];
        $query = $dbh->prepare("SELECT u.*, r.name 
                                FROM utilisateur u 
                                LEFT JOIN role r ON u.id_role = r.id_role 
                                WHERE u.email = :email");

        $query->execute(['email' => $email]);
        $user = $query->fetch();

        if($user)
        {
            $salt = "pydo";
            $password = $_POST['password'] . $salt;

            if(password_verify($password, $user['password']))
            {
                // Authentification réussie et Ouverture de la session
                session_start();
                $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
                $_SESSION['role'] = $user['name'];

                if($user['name'] == "Utilisateur")
                {
                    header('Location: /?page=dashboard-task');
                    exit;
                }
                else if($user['name'] == "Administrateur")
                {
                    header('Location: /?page=users');
                    exit;
                }
            }
            else
            {
                $errors['email'] = 'Email ou le mot de passe est incorrect';
                $errors['password'] = 'Email ou le mot de passe est incorrect';
            }   

        }
        else
        {
            $errors['email'] = 'Email ou le mot de passe est incorrect';
            $errors['password'] = 'Email ou le mot de passe est incorrect';
        }

    }   
}