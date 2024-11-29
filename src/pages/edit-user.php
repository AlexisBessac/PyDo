<?php

$title = "Modifier un utilisateur";
$description = "Sur cette page l'administrateur trouve le formulaire pour modifier un utilisateur";

require '../src/pages/role.php';


if(!empty($_GET['id'])) 
{

    require '../src/data/db-connect.php';

    // On vérifie que le formulaire de modification est envoyé
    if(isset($_POST['edit_user_submit'])) 
    {
        // On rajoute l'id dans les données du POST
        $_POST['id_utilisateur'] = $_GET['id'];

        $errors = [];

        if(empty($_POST['firstname']) || strlen($_POST['firstname']) <=1) 
        {
            $errors['firstname'] = "Le champ Prénom est obligatoire et doit contenir plus d'un caractère";
        }

        if(empty($_POST['lastname']) || strlen($_POST['lastname']) <=1) 
        {
            $errors['lastname'] = "Le champ Nom est obligatoire et doit contenir plus d'un caractère";

        }
       

        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $errors['email'] = "Le champ Email est obligatoire et doit contenir une adresse email valide";
        }
        
        if(empty($errors)) 
        {
            // Correction : Ajout de l'ID de l'utilisateur dans les paramètres de la requête
            $query = $dbh->prepare("UPDATE utilisateur SET firstname = :firstname, lastname = :lastname, email = :email WHERE id_utilisateur = :id_utilisateur");
            $query->execute([
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'id_utilisateur' => $_POST['id_utilisateur'] // Ajout de ce paramètre
            ]);

            if($query->rowCount() > 0)
            {
                header("Location: /?page=users");
                exit;
            } 
            else 
            {
                $errors['error'] = "Une erreur s'est produite lors de la mise à jour.";
            }
        }
    }

    // On recupère les données (modifiable) de l'utilisateur
    $query = $dbh->prepare("SELECT firstname, lastname, email FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
    $query->execute([
        'id_utilisateur' => $_GET['id']
    ]);
    $user = $query->fetch();

    if(!$user) 
    {
        echo "Utilisateur inexistant.";
        exit;
    }

    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $email = $user['email'];
    }
    else 
    {
    echo "Erreur : id de l'utilisateur manquant";
    exit;
}