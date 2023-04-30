<?php 

//charger l'utilisateur qui est connecté
$user = User::loadFromId($_SESSION['id']);


if (isset($_POST['save'])) {
    //on verifie si le pseudo a été modifié, si oui on enregistre les modif
    if (isset($_POST['pseudo'])) {
        if ($_POST['pseudo'] != $user->pseudo) {
            $user->pseudo = $_POST['pseudo'];
            $user->edit_pseudo();
        }
    }
    //on verifie si le mail a été modifié, si oui on enregistre les modif
    if (isset($_POST['email'])) {
        if ($_POST['email'] != $user->email) {
            $user->email = $_POST['email'];
            $user->edit_email();
        }
    }
}

if(isset($_SESSION['id'])) {
  // Suppression du compte avec l'id
  $id_utilisateur = $_SESSION['id'];
  // Suppression de l'utilisateur de la bdd
  if(isset($_POST['delete'])) {
  User::delete_user($id_utilisateur);
  // Déconnexion et redirection vers l'accueil
  session_destroy();
  header('Location: index.php?action=accueil');
  exit;
}
}
$template = "../vues/users/user_home.php";
require_once "../vues/layout.phtml";
