<?php        
session_start();  
//session_destroy sert à detruire la session  
session_destroy();  
header("Location: https://florianefave.sites.3wa.io/PROJET/public/index.php?action=accueil");//redirection vers l'accueil
die;
?>  