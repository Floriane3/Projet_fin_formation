<?php

/**
 * Classe statique permettant de récupérer une connexion à la base de données PDO dans un singleton
 * 
 */
class Db {
    private static $host = "db.3wa.io";
    private static $user = "florianefave";
    private static $pwd = "caf48f0f9a61d5139e5a758bccef1f5b";
    private static $database = "florianefave_Plantes";
    private static $link = null;
    
    public static function getDb() {
        // Si le lien avec la BDD n'existe pas encore, on le recrée
        if (!self::$link) {
            $dsn = "mysql:dbname=".self::$database.";host=".self::$host;
            // Met le lien de la BDD dans l'attribut statique de la classe
            self::$link = new PDO($dsn, self::$user, self::$pwd);
        }
        return self::$link;
    }
}
