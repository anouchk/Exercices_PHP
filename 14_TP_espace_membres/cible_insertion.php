<?php 

// Connexion à la base de données
try {
		$bdd = new PDO('mysql:host=localhost;dbname=TP_espace_membres;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
}


// Vérification de la validité des informations

// Hachage du mot de passe

$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);


// Insertion

$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');

$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email
));
