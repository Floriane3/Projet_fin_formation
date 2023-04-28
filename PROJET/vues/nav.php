<?php

	$cat_fleurs = Post::recup_posts_categorie(1);
	$cat_legs = Post::recup_posts_categorie(2);
	$cat_fruits = Post::recup_posts_categorie(3);

?>
<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

		<ul class="menu__box">
			<li><a class="menu__item" href="index.php?action=accueil">Accueil</a></li>
			<li><a class="menu__item" href="index.php?action=affiche_categorie&categorie=1">Plantes fleuries</a>
<?php
	if (!empty($cat_fleurs)) {
?>
	<ul>
<?php
		foreach ($cat_fleurs as $post_fleur) {
?>
		<li><a class="menu__under" href="index.php?action=affiche_post&post=<?= $post_fleur->id ?>"><?= $post_fleur->nom ?></a></li>
<?php
		}
?>
	</ul>
<?php
	}
?>

				<li><a class="menu__item" href="index.php?action=affiche_categorie&categorie=2">Légumes</a>
<?php
	if (!empty($cat_legs)) {
?>
	<ul>
<?php
		foreach ($cat_legs as $post_leg) {
?>
		<li><a class="menu__under" href="index.php?action=affiche_post&post=<?= $post_leg->id ?>"><?= $post_leg->nom ?></a></li>
<?php
		}
?>
	</ul>
<?php
	}
?>


				<li><a class="menu__item" href="index.php?action=affiche_categorie&categorie=3">Fruitiers</a>
<?php
	if (!empty($cat_fruits)) {
?>
	<ul>
<?php
		foreach ($cat_fruits as $post_fruit) {
?>
		<li><a class="menu__under" href="index.php?action=affiche_post&post=<?= $post_fruit->id ?>"><?= $post_fruit->nom ?></a></li>
<?php
		}
?>
	</ul>
<?php
	}
?>
			<li><a class="menu__item">Utilisateur</a>
				<ul>
				<?php
					if(isset($_SESSION['id'])) {
				?>
					<li><a class="menu__under" href="../controleurs/logoutC.php">Se déconnecter</a></li>
					<li><a class="menu__under" href="../public/index.php?action=user_homeC">Gestion de profil</a></li>
				<?php 
						if(isset($_SESSION['admin'])) {
				?>
						<li><a class="menu__under" href="../public/index.php?action=home_adminC">Modification Admin</a></li>
				<?php
						}
					} else { ?>
					<li><a class="menu__under" href="../public/index.php?action=subscribeC">S'inscrire</a></li>
					<li><a class="menu__under" href="../public/index.php?action=loginC">Se connecter</a></li>
				<?php } ?>
				
				</ul>
			</li>
		</ul>

</div>

