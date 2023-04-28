<?php
// Traitement des données formulaires
if (isset($_POST['login'])) {
    $login = new Login();
    $login->process();
}

require_once "../vues/loginV.php";
