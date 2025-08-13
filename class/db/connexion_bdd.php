<?php

class Connexion{

    private $user = "root";
    private $pass = "";

   public function connect() {
     return $dbh = new PDO('mysql:host=localhost;dbname=freelancehub', $this->user, $this->pass);
   }

}