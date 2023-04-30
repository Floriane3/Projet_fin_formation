<?php
// Traitement des données formulaires
if (isset($_POST['commentaire'])) {
    //creation de l'objet
    $commentaire = new Commentaire();
    //affectation des attributs
    $commentaire->pseudo = $_POST['pseudo'];
    $commentaire->commentaire = $_POST['comment'];
    //creation d'un objet post pour recupérer les commentaire de ce post
    $post = Post::recup_post($_GET['post']);
    
    $commentaire->id_post = $post->id;
    //sauver
    $commentaire->process();
    //redirection
    header ("Location: index.php?action=affiche_post&post=".$post->id);
    die;
}

$template = "../vues/commentaire.phtml";
require_once "../vues/layout.phtml";