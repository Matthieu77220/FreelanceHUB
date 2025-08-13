<?php

class Connexion{

    private $user = "root";
    private $pass = "";

    public function getUser(){
        return $this->user;
    }

    public function getPass(){
        return $this->pass;
    }

   public function connect() {
     return $dbh = new PDO('mysql:host=localhost;dbname=freelancehub', $this->user, $this->pass);
   }

}