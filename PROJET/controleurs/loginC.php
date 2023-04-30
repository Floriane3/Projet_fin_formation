<?php

// Traitement des données formulaires
if (isset($_POST['login'])) {
    //création de l'objet
    $login = new Login();
    //sauver
    $login->process();
}

$template = "loginV.php";
require_once "../vues/layout.phtml";
