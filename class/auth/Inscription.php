<?php
    require_once '../db/UseConnexion.php';

    class Gestion {

        private $pdo;

        public function __construct(){
            $this->pdo = UseConnexion::useConnect(); // appelle dde la méthode static useConnect() de la class UseConnexion pour récupérer l'objet PDO retourné et le stocké dans l'attribut $pdo 
        }

        public function inscription($prénom, $nom, $email, $password){
            $stmt = $this->pdo->prepare("INSERT INTO utilisateurs(prénom, nom, email, mot_de_passe) VALUE(?, ?, ?, ?)");

            $motDePasseHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute([$prénom, $nom, $email, $motDePasseHash]);

            //méthode faisant la requête préparée vie prepare() et execute(), aisni que le hashage du mot de passe
        }

    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $gestion = new Gestion();
            $gestion->inscription($_POST['prénom'], $_POST['nom'], $_POST['email'], $_POST['password']);
            /*
            si tout les champs on bien été transmis via la méthode POST alors on utilise la méthode inscription avec l'objet $gestion
            on rentre en paramètre de la méthode inscription les informations reçues du formulaires vie la méthode POST ce qui permet d'entrer ces infromations dans la bdd
            */

        }