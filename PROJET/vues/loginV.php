
<!doctype html>
<html lang="en">
<?php require_once "head.php" ?>
<body>
    <?php require_once "../vues/header.php"?>
    <?php require_once "../vues/nav.php" ?>

		 <fieldset> 
                    <legend><h1>Identification</h1></legend>
                       
    		<form method="post">
    			<input type="email" name="email" placeholder="email@example.com" />
    			<input type="password" name="password" placeholder="Password" required>
    			<button class="submit" type="submit" name="login">Se connecter</button>
    		</form>
    	</fieldset>
    	<div class = "form">Vous n'êtes pas encore inscrit ? <a href="../public/index.php?action=subscribeC">Inscription</a></div>
	</body>
	<?php require_once "footer.php" ?>
</html>
