<?php

require_once '../db/Useconnexion.php';
require_once '../models/Utilisateur.php';

class SignIn{

    private $pdo;
    private $utilisateur;

    public function __construct(){
        $this->pdo = UseConnexion::useConnect(); // appelle de la méthode static useConnect() de la class UseConnexion pour récupérer l'objet PDO retourné et le stocké dans l'attribut $pdo
    }

    public function signin($email, $password){

        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?"); //requête préparée qui va permettre de comparer l'email dans la bdd à celui reçu vie POST
        $stmt->execute([$email]); // on récupère l'email transmis par POST
        $utilisateurData = $stmt->fetch();
        // on retourne les lignes retournées par la requête préparée vie fetch()

        if($utilisateurData === false){

            echo "email introuvable";
            //le fetch de la requête préparé affecter à $utilisateurData retourne false cet à dire aucune ligne donc l'email est introuvable
        } else {

            if($utilisateurData && password_verify($password, $utilisateurData['mot_de_passe'])){
                // vérification du mot de passe
                $this->utilisateur = new Utilisateur(
                    $utilisateurData['prénom'],
                    $utilisateurData['nom'],
                    $utilisateurData['email'],
                    $utilisateurData['id'],
                );
                //instancier un objet utilisateur qui va prendre en param les infos de l'utilisateur excepté le mdp pour la sécurité

                session_start();
                $_SESSION['prénon'] = $this->utilisateur->getPrénom();
                $_SESSION['nom'] = $this->utilisateur->getNom();
                $_SESSION['email ']= $this->utilisateur->getEmail();
                $_SESSION['id'] = $this->utilisateur->getId();
                //démarre une session conservant les infos utiles de l'utilisateur

                echo "Connexion réussi";

            } else {
                echo "Mot de passe incorrect";
            }
            // on compare si le mot de passe reçu vie post est identique au mot de passe hashé en bdd
        }
    }

}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $connexion = new SignIn();
    $connexion->signin($_POST['email'], $_POST['password']);
}
/*si tout les champs on bien été transmis via POST on instancie l'objet connexion de la class SignIn 
et on lui fait utiliser la méthode signin*/
