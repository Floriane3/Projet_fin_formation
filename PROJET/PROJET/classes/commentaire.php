<?php

 class Commentaire {
    public $id;
    public $pseudo;
    public $commentaire;
    public $id_post;
    
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }
    
    public function getPseudo() {
        return $this->pseudo;
    }
    
    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }
    
    public function getCommentaire() {
        return $this->commentaire;
    }
    
    public function ajout_commentaire() {
        $query = "INSERT INTO commentaire (pseudo, commentaire, id_post) VALUES (:pseudo, :commentaire, :id_post)";
        $stmt = Db::getDb()->prepare($query);
        if ($stmt->execute(['pseudo' => $this->pseudo, 'commentaire' => $this->commentaire, 'id_post' => $this->id_post])) {
                // Initialiser la session
                $this->id = Db::getDb()->lastInsertId();
        }
    }
        public function process() {
        if (!empty($this->pseudo) && !empty($this->commentaire)) {
            $check = true;
            $user=new User($_SESSION['id']);

            // Vérification du pseudo
            if ($user->loadNickname($_SESSION['id'])){
                $check = true;
                $this->ajout_commentaire();
            } else {
                echo "Erreur dans la saisie";
            }
        } else {
            echo "Certains champs sont vides";
        }
    }
    
/*************** PARTIE ADMIN *****************************/ 
    //afficher
    public function affiche_coms(){
        $query = "SELECT id, pseudo, commentaire from commentaire";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    //effacer
    public function delete_coms($id) {
        $query = "DELETE FROM commentaire WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $id]);
    }
   
}