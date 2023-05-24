<?php

// Traitement des données formulaires

if (isset($_POST['subscribe'])) {
    
    //si le mot de passe soumis fait moins de 8 caractères
    if (strlen($_POST['password'])<8) {
         echo 'Votre mot de passe n\'est pas valide. Il doit contenir 8 caractères au minimum.';
         die;
    }
    //entrer une adresse mail valide (format valide)
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      echo "Veuillez entrer une adresse mail valide";
      die;
    }
    $subscribe = new Subscribe();
    $subscribe->checkMailUnique();
    $subscribe->process();

    header ("Location: index.php?action=loginC");
    die;
}

// Connecté ou non ?
$pseudo = "";
if (isset($_SESSION['id'])) {
    // Récupération du pseudo de l'user selon son ID
    $user = new User($_SESSION['id']);
    $pseudo = $user->loadNickname();
}


$template = "subscribeV.php";
require_once "../vues/layout.phtml";