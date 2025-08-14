<?php 
    require_once '../db/UseConnexion.php';
    class Form{

       public function connect(){
        return $pdo = UseConnexion :: useConnect();
       }
    }
?>

<form action="Inscription.php" method="POST">
    <section>
        <h1>S'inscrire</h1>
        <div>
            <label for="prénom">Prénom :</label>
            <input type="text" id="prénom" name="prénom" required>
        </div>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password"  name="password" required>
        </div>
        <div>
            <button type="submit">Soumettre</button>
        </div>
    </section>
</form>

<form action="SignIn.php" method="POST">
    <section>
        <h1>Se connecter</h1>
        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Mot de passe: </label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <button type="submit">Soumettre</button>
        </div>
    </section>
</form>