<?php

$title = "S'inscrire";
$description = "Sur cette page l'utilisateur trouve le formulaire qui lui permet de s'inscire à l'application";

// Vérifie que le formulaire à bien été envoyé
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_form_submit']))
{

    // Permettra de stocker les messages d'erreurs au fur-et-à-mesure
    $errors = [];

    // Validation du champs "NOM"
    if(empty($_POST['firstname']) || strlen($_POST['firstname']) <= 1)
    {
        $errors['firstname'] = 'Le champs Prénom ne doit pas être vide et doit contenir plus d\'un caractère';
    } 

    // Validation du champs "Nom"
    if(empty($_POST['lastname']) || strlen($_POST['lastname']) <= 1)
    {
        $errors['lastname'] = 'Le champs Nom ne doit pas être vide et doit contenir plus d\'un caractère';
    }

    // Validation du champs "Email"
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $errors['email'] = 'Le champs Email est obligatoire et doit être une adresse email valide';
    }

    // Validation du champs "Password"
    if(empty($_POST['password']))
    {
        $errors['password'] = 'Le mot de passe est obligatoire';
    }


    if(empty($errors))
    {
        require '../src/data/db-connect.php';
        // Vérification de l'email en BDD
        $email = $_POST['email'];
        $query = $dbh->prepare("SELECT id_utilisateur FROM utilisateur WHERE email = :email");
        $query->execute(['email' => $email]);
        $userId = $query->fetch();

        if($userId)
        {
            $errors['email'] = 'Un compte existe déjà pour cette adresse email.';
        }
        else
        {
            // Utilisation d'un grain de sel
            $salt = "pydo";

            // Ajout du grain de sel au mot de passe
            $mdpHache = $_POST['password'] . $salt;

            // Hachage du mot de passe
            $newMdp = password_hash($mdpHache, PASSWORD_DEFAULT);


            $query = $dbh->prepare("INSERT INTO utilisateur (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
            $query->execute([
                'firstname' => htmlspecialchars($_POST['firstname']),
                'lastname' => htmlspecialchars($_POST['lastname']),
                'email' => $email,
                'password' => $newMdp,
            ]);

            if($dbh->lastInsertId())
            {
                header('Location: /?page=connexion');
                exit;
            }
            else
            {
                $errors['form'] = "Une erreur s'est produit lors de l'inscription. Contacter l'administrateur à l'adresse [email].";
            }
        }
    }   
}