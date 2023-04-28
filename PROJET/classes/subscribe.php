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

     function checkMailUnique() {
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
        if (!empty($this->pseudo) && !empty($this->email) && !empty($this->password)) {
            $check = true;
  
            // Vérification des emails
            if (!$this->checkMailUnique()) {
                $check = false;
                echo "Email déjà existant";
                die;
            }
            if ($check) {
                $user = new User();
                $user->pseudo = $this->pseudo;
                $user->email = $this->email;
                $user->password = password_hash($this->password, PASSWORD_DEFAULT);
                $user->save();
            } else {
                echo "Erreur dans la saisie";
            }
        } else {
            echo "Certains champs sont vides";
        }
    }
}