<?php
require_once "../vues/head.php";
require_once "../vues/header.php";
require_once "../vues/nav.php";

//si tu es admin, la page s'affiche
if(isset($_SESSION['admin'])) {
$post=new Post();
$edit = $post->affiche_posts();
//et renvoie un tableau contenant les infos post

//boucle qui parcours tous les posts
for ($i = 0; $i<count($edit); $i++) {
?>
<!--pour chaque user on affiche le titre, le texte de l'article et un lien pour le supprimer-->
    <div class="adminEdit">
        <p class = "edit_art">Titre : <p><?= $edit[$i]['nom'] ?></p></p>
        <p class = "edit_art">Article : <p><?= $edit[$i]['article'] ?></p></p>
        <a href="?action=deletePost&id=<?= $edit[$i]['id'] ?>">Supprimer l'article</a>
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