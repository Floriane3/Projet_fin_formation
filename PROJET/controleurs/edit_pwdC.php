<?php
// Vérifier si le formulaire a été soumis
if(isset($_POST['registerpwd'])) {
    // Vérifier si les mots de passe sont identiques
    if($_POST['password2'] !== $_POST['password3']) {
        echo "Les mots de passe ne sont pas identiques";
    } else {
        // Vérifier si le mot de passe actuel est correct
        $user = User::loadFromId($_SESSION['id']);
        
        
        
        if(!password_verify($_POST['password1'], $user->password)) {
            echo "Mot de passe actuel incorrect";
        } else {
            // Mettre à jour le mot de passe
            $user->password = password_hash($_POST['password2'], PASSWORD_DEFAULT);
            $user->edit_password();
            echo "Mot de passe mis à jour avec succès";
        }
    }
}

require "../vues/users/edit_pwd.php";