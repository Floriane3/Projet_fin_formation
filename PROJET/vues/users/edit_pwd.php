<!doctype html>
<html lang="en">
<?php require_once "../vues/head.php";?>
    <body>
        <?php require_once "../vues/header.php"; ?>
        <?php require_once "../vues/nav.php"; ?>
    
        <fieldset>
            <legend><h1>Modification mot de passe</h1></legend>
                <form method="post">
                			<input type="password" name="password1" placeholder="Mot de passe actuel" required>
                			<input type="password" name="password2" placeholder="Nouveau mot de passe" required>
                			<input type="password" name="password3" placeholder="Ressaisissez votre mot de passe" required>
                			<button class="submit" type="submit" name="registerpwd">Enregistrer</button>
                </form>
        </fieldset>
    </body>
	<?php require_once "../vues/footer.php" ?>
</html>