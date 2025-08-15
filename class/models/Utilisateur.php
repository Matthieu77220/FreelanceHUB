<?php 

class Utilisateur{

    private $prénom;
    private $nom;
    private $email;
    private $id;

    public function __construct($prénom, $nom, $email, $id){
        $this->prénom = $prénom;
        $this->nom = $nom;
        $this->email = $email;
        $this->id = $id;
    }

    public function getPrénom(){
        return $this->prénom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getId(){
        return $this->id;
    }

}