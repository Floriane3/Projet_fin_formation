<?php
    // recupère l'id de chaque catégorie
    $categorie = intval($_GET['categorie']);
    //recupere les posts de chaque catégorie
    $posts = Post::recup_posts_categorie($categorie);
    
    $template = "../vues/affiche_posts_categorie.phtml";
    require_once "../vues/layout.phtml";
    