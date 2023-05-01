<?php

	$cat_fleurs = Post::recup_posts_categorie(1);
	$cat_legs = Post::recup_posts_categorie(2);
	$cat_fruits = Post::recup_posts_categorie(3);

?>
<div class="burger-menu">
	
    <input id="menu__bascule" type="checkbox" />
    <label class="menu__btn" for="menu__bascule">
      <span></span>
    </label>

		<ul class="menu__box"><!-- nav barre avec toutes les catégories : accueil, fruits, légumes, fruits, utilisateurs -->
			<li><a class="menu__item" title="nav accueil" href="index.php?action=accueil">Accueil</a></li>
			<li><a class="menu__item" title ="nav categorie fleurs" href="index.php?action=affiche_categorie&categorie=1">Plantes fleuries</a>
<?php
	if (!empty($cat_fleurs)) { // si la catégorie fleurs n'est pas vide, 
?>
	<ul>
<?php
		foreach ($cat_fleurs as $post_fleur) { //on affiche le titre de la catégorie
?>											<!--ainsi que les articles qu'il y a dedans-->
		<li><a class="menu__under" title ="sous nav fleurs" href="index.php?action=affiche_post&post=<?= $post_fleur->id ?>"><?= $post_fleur->nom ?></a></li>
<?php
		}
?>
	</ul>
<?php
	}
?>

				<li><a class="menu__item" title ="nav categorie légumes" href="index.php?action=affiche_categorie&categorie=2">Légumes</a>
<?php
	if (!empty($cat_legs)) { // si la catégorie legumes n'est pas vide
?>
	<ul>
<?php
		foreach ($cat_legs as $post_leg) { //on affiche le titre de la catégorie
?>										<!--ainsi que les articles qu'il y a dedans-->
		<li><a class="menu__under" title ="sous nav légumes" href="index.php?action=affiche_post&post=<?= $post_leg->id ?>"><?= $post_leg->nom ?></a></li>
<?php
		}
?>
	</ul>
<?php
	}
?>
				<li><a class="menu__item" title ="nav categorie fruitiers" href="index.php?action=affiche_categorie&categorie=3">Fruitiers</a>
<?php
	if (!empty($cat_fruits)) { // si la catégorie fruits n'est pas vide
?>
	<ul>
<?php
		foreach ($cat_fruits as $post_fruit) {//on affiche le titre de la catégori
?>											<!--ainsi que les articles qu'il y a dedans-->
		<li><a class="menu__under" title ="sous nav fruitiers" href="index.php?action=affiche_post&post=<?= $post_fruit->id ?>"><?= $post_fruit->nom ?></a></li>
<?php
		}
?>
	</ul>
<?php
	}
?>
			<li><a class="menu__item" title ="nav utilisateur">Utilisateur</a>
				<ul>
				<?php
					if(isset($_SESSION['id'])) {
				?>
					<!-- déconnexion-->
					<li><a class="menu__under" title ="sous nav logout" href="../controleurs/logoutC.php">Se déconnecter</a></li>
					<!--modification du profil utilisateur-->	
					<li><a class="menu__under" title ="sous nav profil" href="../public/index.php?action=user_homeC">Gestion de profil</a></li>
				<?php 
				// si la personne connectée est admin, sous catégorie modifications admin dans la nav. 
						if(isset($_SESSION['admin'])) {
				?>
						<li><a class="menu__under" title ="sous nav admin" href="../public/index.php?action=home_adminC">Modification Admin</a></li>
				<?php
						}
					} else { ?>
					<!--souscrire-->
					<li><a class="menu__under" title ="sous nav subscribe" href="../public/index.php?action=subscribeC">S'inscrire</a></li>
					<!--se connecter-->
					<li><a class="menu__under" title ="sous nav login" href="../public/index.php?action=loginC">Se connecter</a></li>
				<?php } ?>
				
				</ul>
			</li>
		</ul>

</div>

