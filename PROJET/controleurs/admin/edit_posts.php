<?php
require_once "../vues/head.php";
require_once "../vues/header.php";
require_once "../vues/nav.php";
//si tu es admin, la page s'affiche
if(isset($_SESSION['admin'])) {
$post=new Post();
$edit = $post->affiche_posts();

for ($i = 0; $i<count($edit); $i++) {
?>
    <div class="adminEdit">
        <p>Titre : <pre><?= $edit[$i]['nom'] ?></pre></p>
        <p>Article : <pre><?= $edit[$i]['article'] ?></pre></p>
        <a href="?action=deletePost&id=<?= $edit[$i]['id'] ?>">Supprimer l'article</a>
    </div>
<?php
    }
} else { 
    //si tu n'es pas admin et que tu essaies d'accéder à cette page,
    //tu es redirigé vers l'accueil
    header("Location: https://florianefave.sites.3wa.io/PROJET/vues/accueil.php");
    die; }
?>