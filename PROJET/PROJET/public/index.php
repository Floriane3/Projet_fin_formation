<?php
session_start();
require_once "../public/autoloader.php";


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === "accueil") {
        require "../controleurs/accueilC.php";
    }
    if ($action === "subscribeC") {
        require "../controleurs/subscribeC.php";
    }
    if ($action === "loginC") {
        require "../controleurs/loginC.php";
    }
    if ($action === "logoutC") {
        require "../controleurs/logoutC.php";
    }
    if ($action === "postC") {
        require "../controleurs/postC.php";
    }
    if ($action === "commentaireC") {
        require "../controleurs/commentaireC.php";
    }
    if ($action === "affiche_categorie") {
        require "../controleurs/affiche_categorieC.php";
    }
    if ($action === "affiche_post") {
        require "../controleurs/affiche_postC.php";
    } 
    if ($action === "user_homeC") {
        require "../controleurs/user_homeC.php";
    }
    if ($action === "home_adminC") {
        require "../controleurs/home_adminC.php";
    }
    if ($action === "editPosts"){
        require "../controleurs/admin/edit_posts.php";
    }
    if ($action ==="deletePost"){
        $post=new Post();
        $result=$post->delete_post($_GET['id']);
        require "../controleurs/admin/edit_posts.php";
    }
    if ($action === "editUsers"){
        require "../controleurs/admin/edit_users.php";
    }
    if ($action ==="deleteUser"){
        $post=new User();
        $result=$post->delete_user($_GET['id']);
        require "../controleurs/admin/edit_users.php";
    }
    if ($action === "editComs"){
        require "../controleurs/admin/edit_coms.php";
    }
    if ($action ==="deleteComs"){
        $post=new Commentaire();
        $result=$post->delete_coms($_GET['id']);
        require "../controleurs/admin/edit_coms.php";
    }
    if ($action ==="delete_user"){
        require "../controleurs/user_homeC.php";
    }
    if ($action === "edit_pwd"){
        require "../controleurs/edit_pwdC.php";
    }
    
} else {
    // Page par défaut
    header("Location: index.php?action=accueil");
    die();
}