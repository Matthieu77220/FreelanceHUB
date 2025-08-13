<?php

require_once "Connexion.php";

class UseConnexion{

    private static $pdo = null;

    public static function useConnect(){
        if (self::$pdo === null){
            $connexion = new Connexion();
            self::$pdo = $connexion->connect();
        }
        return self::$pdo;
    }

}