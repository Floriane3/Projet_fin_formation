<?php

class User {
    public $id;
    public $pseudo;
    public $email;
    public $password;
    public $admin;
    
    public function __construct($id = null) {
        $this->id = $id;
    }
    
    public function loadNickname($id) {
        $query = "SELECT pseudo FROM user WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->pseudo = $row['pseudo'];
        return $this->pseudo;
    }
    
    public static function loadFromId($id) {
        $query = "SELECT id, pseudo, email, password, admin FROM user WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(User::class);
    }
    
    public function loadFromMail($email) {
        $query = "SELECT id, password, admin FROM user WHERE email=:email";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->email = $email;
            $this->id = $row['id'];
            $this->password = $row['password'];
            $this->admin = $row['admin'];
            return true;
        }
        return false;
    }

    public function save() {
        if (!$this->id) {
            // Nouvel utilisateur = INSERT INTO
            $query = "INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)";
            $stmt = Db::getDb()->prepare($query);
            if ($stmt->execute(['email' => $this->email, 'pseudo' => $this->pseudo, 'password' => $this->password])) {
                // Initialiser la session
                $this->id = Db::getDb()->lastInsertId();
                $_SESSION['id'] = $this->id;
            }
        } 
    }
    
    /*************** PARTIE MODIF PROFIL *****************************/
    
    public function edit_pseudo() {
        $query = "UPDATE user SET pseudo=:pseudo WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $_SESSION['id'], 'pseudo' => $this->pseudo]);
    }
    
    public function edit_email() {
        $query = "UPDATE user SET email=:email WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $_SESSION['id'], 'email' => $this->email]);
    }
    
    public function edit_password() {
        $query = "UPDATE user SET password=:password WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $_SESSION['id'], 'password' => $this->password]);
    }
    
     // effacer
    public static function delete_user($id) {
        $query = "DELETE FROM user WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $id]);
    }
    
/*************** PARTIE ADMIN *****************************/

    // afficher
    public function affiche_users(){
        $query = "SELECT id, pseudo, email from user";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}