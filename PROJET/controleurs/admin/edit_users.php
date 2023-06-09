<?php
require_once "../vues/head.php";
require_once "../vues/header.php";
require_once "../vues/nav.php";

//si tu es admin, la page s'affiche
if(isset($_SESSION['admin'])) {
$user=new User();
$edit = $user->affiche_users();
//et renvoie un tableau contenant les infos user

//boucle qui parcours tous les users
for ($i = 0; $i<count($edit); $i++) {
?>
<!--pour chaque user on affiche le pseudo et un lien pour le supprimer-->
    <div class="adminEdit">
        <p>Pseudo : <pre class="pseudo"><?= $edit[$i]['pseudo'] ?></pre></p>
        <a href="?action=deleteUser&id=<?= $edit[$i]['id'] ?>">Supprimer l'utilisateur</a>
    </div>
<?php
    }
} else { 
    //si tu n'es pas admin et que tu essaies d'accéder à cette page,
    //tu es redirigé vers l'accueil
    header("Location: https://florianefave.sites.3wa.io/PROJET/vues/accueil.php");
    die; 
    
}

require_once "../vues/footer.php";