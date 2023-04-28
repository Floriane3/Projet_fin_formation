<!doctype html>
<html lang="en">
<?php require_once "head.php" ?>
<body>
    <?php require_once "header.php" ?>
    <?php require_once "nav.php" ?>

	    <fieldset> 
                    <legend><h1>Inscription</h1></legend>
                       
    		<form method="post">
    			<input type="text" name="pseudo" placeholder="Votre pseudo" required/>
    			<input type="mail" name="email" placeholder="email@example.com" />
    			<input type="password" name="password" placeholder="Password" required/>
    			<button class="submit" type="submit" name="subscribe">S'inscrire</button>
    		</form>
    	</fieldset>
    	<div class = "form" >Vous êtes déjà inscrit ? <a href="../public/index.php?action=loginC">Connexion</a></div>
	</body>
	<?php require_once "footer.php" ?>
</html>