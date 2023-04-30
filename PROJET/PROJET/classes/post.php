<?php

class Post {
    public $id;
    public $article;
    public $photo;
    public $nom;
    public $id_user;
    public $categorie;
    
    //fonction servant a ajouter un article
    public function ajout_post() {
        $query = "INSERT INTO post (nom, article, photo, id_user, categorie) VALUES (:nom, :article, :photo, :id_user, :categorie)";
        $stmt = Db::getDb()->prepare($query);
        if ($stmt->execute(['nom' => $this->nom, 'article' => $this->article, 'photo' => $this->photo, 'categorie' => $this->categorie, 'id_user' => $_SESSION['id']])) {
                // Initialiser la session
                $this->id = Db::getDb()->lastInsertId();
        }
    }
    
     public function process() {
        if (!empty($this->article) && !empty($this->photo)) {
            $this->ajout_post();
        } else {
            echo "Certains champs sont vides";
        }
    }
    
    // Créer une méthode qui va récupérer le post depuis la BDD 
    public static function recup_post($id) {
        $query = "SELECT id, nom, article, photo, id_user, categorie FROM post WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(Post::class);
    }
    
    public static function recup_posts_categorie($categorie) {
        $query = "SELECT id, nom, article, photo, id_user, categorie FROM post WHERE categorie=:categorie";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['categorie' => $categorie]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Post::class);
    }
    
    public function recup_id($nom) {
        $query = "SELECT id FROM post WHERE nom=:nom";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['nom' => $nom]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id'];
    }
    
    public static function recup_commentaires($id_post) {
        $query = "SELECT pseudo, commentaire FROM commentaire WHERE id_post=:id_post";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id_post' => $id_post]);
        // Renvoie tous les commentaires sous forme de tableau d'objets
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Commentaire");
    }
    
/*************** PARTIE ADMIN *****************************/ 

    //afficher l'article
    public function affiche_posts(){
        $query = "SELECT id, nom, article, photo from post";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    
    //modifier l'article
    public function edit_post($id) {
        $query = "UPDATE post SET WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $id]);
    }
    
    //effacer l'article
    public function delete_post($id) {
        $query = "DELETE FROM post WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $id]);
    }
}
//Créer une vue qui va afficher les données du post qui a été récupéré depuis la BDD