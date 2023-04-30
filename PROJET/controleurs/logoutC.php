<?php        
session_start();  
//session_destroy sert à detruire la session  
session_destroy();  
header("Location: ../public/index.php?action=accueil");
//redirection vers l'accueil
die;
?>  