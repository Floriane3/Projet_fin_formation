<?php
if(isset($_SESSION['id'])) {
    
    // Traitement des données formulaires
    if (isset($_POST['post']) && isset($_SESSION['id'])) {
        // Création de l'objet
        $article  = new Post();
        
        // Affectation des attributs
        $article->nom = $_POST['nom'];
        $article->article = $_POST['article'];
        $article->photo = $_POST['image'];
        $article->categorie = $_POST['categorie'];
        
        // Sauver
        $article->process();
        //Redirection
        header('Location: index.php?action=accueil');
        die;
        }
    } 
//si pas connecté, msg d'erreur dans affiche_post_categorie
$template = "../vues/post.phtml";
require_once "../vues/layout.phtml";
