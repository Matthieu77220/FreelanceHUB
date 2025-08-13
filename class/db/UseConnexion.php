<?php

require_once "Connexion.php";

class UseConnexion{

    private static $pdo = null;  

    public static function useConnect(){
        if (self::$pdo === null){ 
            $connexion = new Connexion();
            self::$pdo = $connexion->connect(); //affecter l'objet connexion à l'attribut static $pdo, lui faire utiliser la méthode connect de la class Connexion
        }
        return self::$pdo; 
    }

}