<?php 

// Connexion à la base de données
try {
		$bdd = new PDO('mysql:host=localhost;dbname=TP_espace_membres;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
}

// Récupération des identifiants entrés par l'utilisateur à l'inscription
$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');

// Initialisation des variables récupérant les identifiants entrés par l'utilisateur à la connexion
$pass = $_POST['pass'];
$pseudo = $_POST['pseudo'];

password_verify($_POST['pass'], $pass)

$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass));
$resultat = $req->fetch();

if ($resultat) 
{
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    echo 'Vous êtes connecté !';
} 
else 
{
    echo 'Mauvais identifiant ou mot de passe !';
}

// if (!$resultat)
// {
//     echo 'Mauvais identifiant ou mot de passe !';
// }
// else
// {
//     session_start();
//     $_SESSION['id'] = $resultat['id'];
//     $_SESSION['pseudo'] = $pseudo;
//     echo 'Vous êtes connecté !';
// }
