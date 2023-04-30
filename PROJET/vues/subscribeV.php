<?php
$errors = array(); // Déclaration de la variable

if (isset($_POST['subscribe'])) {
    $subscribe = new Subscribe();
    $errors = $subscribe->process(); // On assigne les erreurs à la variable $errors pour qu'elles soient affichées sous le formulaire
}
?>
<!doctype html>
<html lang="fr">
<?php require_once "head.php" ?>
<body>
    <?php require_once "header.php" ?>
    <?php require_once "nav.php" ?>

	    <fieldset> 
            <legend><h2>Inscription</h2></legend>
                       
    		<form method="post">
    		    <label for="pseudo">Pseudo : </label>
    			<input type="text" name="pseudo" placeholder="Votre pseudo" required/>
    			
    			<label for="Email">Email : </label>
    			<input type="mail" name="email" placeholder="email@example.com" required/>
    			
    			<label for="Mdp">Mot de passe :</label>
    			<input type="password" name="password" placeholder="Password" required/>
    			
    			<button class="submit" type="submit" name="subscribe">S'inscrire</button>
    		</form>
    		<?php if (!empty($errors)) : ?> <!--si le tableau $errors n'est pas vide-->
    <?php if (count($errors) > 0) : ?> <!--et si le compte des erreurs est supérieur a 0-->
        <div class="error"> <!--on ouvre le div "errors" qui affichera les msg d'erreur-->
            <?php foreach ($errors as $error) : ?> <!--pour toutes les erreurs du tableau $errors-->
                <p><?php echo $error; ?></p><!--echo du msg d'erreur correspondant-->
            <?php endforeach; ?>
        </div>
    <?php endif; ?><!--fin de la 1e condition-->
<?php endif; ?><!--fin de la 2e condition-->
    	</fieldset>
    	
    	<div class = "form" >Vous êtes déjà inscrit ? <a title="redirection vers login" href="../public/index.php?action=loginC">Connexion</a></div>
	</body>
	<?php require_once "footer.php" ?>
</html>