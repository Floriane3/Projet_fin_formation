<?php
//variable pour les messages d'erreur
$errors = array();

if (isset($_POST['subscribe'])) {

    //si le mot de passe soumis fait moins de 8 caractères
    if (strlen($_POST['password'])<8) {
        $errors[] = 'Votre mot de passe n\'est pas valide. Il doit contenir 8 caractères au minimum.';
    }

    //entrer une adresse mail valide (format valide)
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Veuillez entrer une adresse mail valide';
    }
        //si il n'y a pas d'erreur, nouvelle inscription
    if (count($errors) == 0) {
        $subscribe = new Subscribe();
        $subscribe_errors = $subscribe->process();

        if (count($subscribe_errors) == 0) { //si il n'y a pas d'erreurs dans le tableau $subscribe_errors
            //redirection vers la page login
            header ("Location: index.php?action=loginC");
            die;
        } else { //permet de montrer les erreurs ds un seul tableau et de les afficher ensemble sous le form
            $errors = array_merge($errors, $subscribe_errors); 
        }
    }
}

// Connecté ou non ?
$pseudo = "";
if (isset($_SESSION['id'])) {
    // Récupération du pseudo de l'user selon son ID
    $user = new User($_SESSION['id']);
    $pseudo = $user->loadNickname();
}
require_once "../vues/subscribeV.php";