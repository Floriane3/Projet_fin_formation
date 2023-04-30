<?php

class Subscribe {
    public $pseudo;
    public $email;
    public $password;
    
    public function __construct() {
        $this->pseudo = $this->sanitize('pseudo');
        $this->email = $this->sanitize('email');
        $this->password = $this->sanitize('password');
    }
  
    private function sanitize($name) {
        if (isset($_POST[$name])) {
            if (!empty($_POST[$name])) {
                return trim(htmlentities($_POST[$name]));
            }
        }
        return null;
    }

    private function checkMailUnique() {
        $query = "SELECT email FROM user WHERE email=:email";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['email' => $this->email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return false;
        } else {
        return true;
        }
    }
    
    public function process() {
        $errors = array(); //variable "tableau vide" pour les messages d'erreur
        
        if (!empty($this->pseudo) && !empty($this->email) && !empty($this->password)) {
            $check = true; // si champs pas vides ->true
    
            // Vérifier si mail pas présent dans bdd
            if (!$this->checkMailUnique()) {
                $check = false; //si mail déja dans bdd ->false : on affiche le msg d'erreur
                $errors[] = "Email déjà existant";
            }
            
            // Vérification de la longueur du mot de passe
            if (strlen($this->password) < 8) {
                $check = false;//si mdp trop court : on affiche le msg d'erreur
                $errors[] = "Le mot de passe doit contenir au moins 8 caractères";
            }
            
            // Vérification du format de l'email
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $check = false; //si mail dans un mauvais format ->false : on affiche le msg d'erreur
                $errors[] = "L'adresse email est invalide";
            }
            
            if ($check) { //si tout est ok : enregistrement du nouvel utilisateur
                $user = new User();
                $user->pseudo = $this->pseudo;
                $user->email = $this->email;
                $user->password = password_hash($this->password, PASSWORD_DEFAULT);
                $user->save();
                return true;
            } else {  //sinon on retourne le msg d'erreur correspondant
                return $errors;
            }
        } 
    }
}

$errors = array(); //on redéfinit la variable "tableau vide" en dehors de la fonction process
$success = false; //crée une variable $success pour stocker l'état du formulaire.
if (isset($_POST['subscribe'])) {
    $subscribe = new Subscribe();
    $result = $subscribe->process(); //valide les données et traite le formulaire
    if (is_array($result)) { //vérifie si le résultat renvoyé par process() est un tableau (si oui = erreur).
        $errors = $result; //les erreurs trouvées sont stockées dans la variable $errors
    } else { //si le résultat n'est pas une erreur, 
        $success = true; //succes=true,  l'inscription est réussie
    }
}

// Connecté ou non ?
$pseudo = "";
if (isset($_SESSION['id'])) {
    // Récupération du pseudo de l'user selon son ID
    $user = new User($_SESSION['id']);
    $pseudo = $user->loadNickname();
}
require_once "../vues/subscribeV.php";