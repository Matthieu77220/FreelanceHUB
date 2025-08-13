<?php
    require_once '../db/UseConnexion.php';

    class Gestion {

        private $pdo;

        public function __construct(){
            $this->pdo = UseConnexion::useConnect();
        }

        public function inscription($prénom, $nom, $email, $password){
            $stmt = $this->pdo->prepare("INSERT INTO utilisateurs(prénom, nom, email, mot_de_passe) VALUE(?, ?, ?, ?)");

            $motDePasseHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute([$prénom, $nom, $email, $motDePasseHash]);
        }

    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $gestion = new Gestion();
            $gestion->inscription($_POST['prénom'], $_POST['nom'], $_POST['email'], $_POST['password']);

            echo 'Utilsateur ajouté';
        } else {
            "échec d'ajout d'utilisateur";
        }