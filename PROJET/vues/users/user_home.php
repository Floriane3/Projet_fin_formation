<!doctype html>
<html lang="en">
<?php require_once "../vues/head.php" ?>
    <body>
    <?php require_once "../vues/header.php" ?>
    <?php require_once "../vues/nav.php" ?>

        <fieldset> 
            <legend><h1>Modifier profil</h1></legend>
                       
        	<form method="post">
        	    <h6>Pseudo<input type="text" name="pseudo" placeholder="<?= $user->pseudo ?>"/></h6>
        	    <h6>Email<input type="text" name="email" placeholder="<?= $user->email ?>"/></h6>
        	    <h6>Mot de passe<button type="submit" name="edit_pwd"><a href="index.php?action=edit_pwd">Modifier</a></button></h6>
        	    <button class="warning" type="submit" name="delete">Supprimer mon compte</button>
        	    <button type="submit" name="save">Enregistrer les modifications</button>
        	</form>
        </fieldset>

    </body>
    <?php require_once "../vues/footer.php" ?>
</html>