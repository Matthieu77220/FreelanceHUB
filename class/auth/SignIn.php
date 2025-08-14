<?php

require_once '../db/Useconnexion.php';

class SignIn{

    private $pdo;

    public function __construct(){
        $this->pdo = UseConnexion::useConnect(); // appelle de la méthode static useConnect() de la class UseConnexion pour récupérer l'objet PDO retourné et le stocké dans l'attribut $pdo
    }

    public function signin($email, $password){

        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?"); //requête préparée qui va permettre de comparer l'email dans la bdd à celui reçu vie POST
        $stmt->execute([$_POST['email']]); // on récupère l'email transmis par POST
        $user = $stmt->fetch(); // on retourne les lignes retournées par la requête préparée vie fetch()

        if($user && password_verify($_POST['password'], $user['mot_de_passe'])){
            echo "connexion résussie";
        } else {
            echo "échec de connexion";
        }
        // on compare si le mot de passe reçu vie post est identique au mot de passe hashé en bdd

    }

}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $connexion = new SignIn();
    $connexion->signin($_POST['email'], $_POST['password']);
}
/*si tout les champs on bien été transmis via POST on instancie l'objet connexion de la class SignIn 
et on lui fait utiliser la méthode signin*/