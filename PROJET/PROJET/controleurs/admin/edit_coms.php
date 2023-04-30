<?php
require_once "../vues/head.php";
require_once "../vues/header.php";
require_once "../vues/nav.php";

//si tu es admin, la page s'affiche
if(isset($_SESSION['admin'])) {
$post=new Commentaire();
$edit = $post->affiche_coms();
//et renvoie un tableau contenant les infos commentaire

//boucle qui parcours tous les commentaires
for ($i = 0; $i<count($edit); $i++) {
?>
<!--pour chaque user on affiche le pseudo, le commentaire et un lien pour le supprimer-->
    <div class="adminEdit">
        <p>Pseudo : <pre class ="pseudo"><?= $edit[$i]['pseudo'] ?></pre></p>
        <p>Commentaire : <pre><?= $edit[$i]['commentaire'] ?></pre></p>
        <a href="?action=deleteComs&id=<?= $edit[$i]['id'] ?>">Supprimer le commentaire</a>
    </div>
    
    
<?php
    }
} else { 
    //si tu n'es pas admin et que tu essaies d'accéder à cette page,
    //tu es redirigé vers l'accueil
    header("Location: https://florianefave.sites.3wa.io/PROJET/vues/accueil.php");
    die; }
    
require_once "../vues/footer.php";
