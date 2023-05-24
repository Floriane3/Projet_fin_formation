   <fieldset> 
        <legend><h2>Identification</h2></legend>
                       
        <form method="post">
            <label for="Email">Email : </label>
            <input type="email" name="email" placeholder="email@example.com" required/>
            
            <label for="Mdp">Mot de passe : </label>
            <input type="password" name="password" placeholder="Password" required/>
            
            <button class="submit" type="submit" name="login">Se connecter</button>
        </form>
        <?php if (isset($error_message)): ?> <!--message d'erreur est stocké dans la variable $error_message-->
        <div class="error"><?php echo $error_message; ?></div> <!--on affiche le msg-->
    <?php endif; ?>
    </fieldset>

    

    <div class="form">Vous n'êtes pas encore inscrit ? <a title="redirection vers subscribe" href="../public/index.php?action=subscribeC">Inscription</a></div>
