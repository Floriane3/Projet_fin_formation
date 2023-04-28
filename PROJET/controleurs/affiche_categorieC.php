<?php

    $categorie = intval($_GET['categorie']);
    $posts = Post::recup_posts_categorie($categorie);
    require "../vues/affiche_posts_categorie.phtml";
    