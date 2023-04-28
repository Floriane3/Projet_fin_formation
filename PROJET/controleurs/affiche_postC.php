<?php
    //$idpost recupère l'id de chaque post
    $post = Post::recup_post($_GET['post']);
    
    //recupere les commentaires
    $comms = Post::recup_commentaires($post->id);
    
    require "../vues/affiche_post.phtml";