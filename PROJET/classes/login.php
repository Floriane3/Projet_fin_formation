<?php

class Login {
    public $email;
    public $password;
    
    public function __construct() {
        $this->password = $this->sanitize('password');
        $this->email = $this->sanitize('email');
    }
    
    private function sanitize($name) {
        if (isset($_POST[$name])) {
            if (!empty($_POST[$name])) {
                return trim(htmlentities($_POST[$name]));
            }
        }
        return null;
    }
    
    public function process() {
        $user = new User();
        if ($user->loadFromMail($this->email)) {
            // Comme le mot de passe est haché, on ne peut pas faire autrement
            if (password_verify($this->password, $user->password)) {
                // On met les variables de session de l'utilisateur
                $_SESSION['id'] = $user->id;
                if ($user->admin == true) {
                    $_SESSION['admin'] = $user->admin;
                }
              
                // Redirection selon admin ou non
                if (isset($_SESSION['admin'])) {
                    header('location: index.php?action=home_adminC'); 
                    die;
                } 
                else if(isset($_SESSION['id'])) {
                    header('Location: index.php');
                    die;
                }
            } else {
                echo "Login ou mot de passe incorrect ou inexistant.";
            }
        } else {
            // Pas réussi à charger l'utilisateur à l'aide de son mail
            echo "Login ou mot de passe incorrect ou inexistant.";
        }
    }
}