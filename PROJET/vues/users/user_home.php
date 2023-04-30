        <fieldset> 
            <legend><h2>Modifier profil</h2></legend>
                       
        	<form method="post">
        	    <label for="pseudo">Pseudo : </label>
        	    <input type="text" name="pseudo" placeholder="<?= $user->pseudo ?>"/> <!-- on affiche ne placeholder le pseudo de la personne connectée-->
        	    
        	    <label for="Email">Email :</label>
        	    <input type="text" name="email" placeholder="<?= $user->email ?>"/><!-- on affiche ne placeholder l'email de la personne connectée-->
        	    
        	    <label for="mdp">Mot de passe :</label>
        	    <!--pour changer de mdp on est redirigés vers un autre formulaire-->
        	    <button type="submit" name="edit_pwd"><a href="index.php?action=edit_pwd">Modifier</a></button>
        	    <!--suppression du compte utilisateur-->
        	    <button class="warning" type="submit" name="delete">Supprimer mon compte</button>
        	    <!--enregistrement des modifs-->
        	    <button type="submit" name="save">Enregistrer les modifications</button>
        	</form>
        </fieldset>

    