<?php

// Connexion à la base de données
try {
$bdd = new PDO('mysql:host=localhost;dbname=TP_commentaires_blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}

// Effectuer ici la requête qui insère le message reçu avec $_POST dans la base de données 
$requete = $bdd->prepare('INSERT INTO commentaires(id_billet,auteur,commentaire) VALUES(?,?,?)'); // j'aimerais rajouter un 4ème paramètre date_commentaire mais SQL ne veut pas de mon CURRENT_TIMESTAMP
$requete->execute(array($_POST['id2_billet'], $_POST['pseudo'], $_POST['message']));

// Puis rediriger le visiteur vers la page de commentaires.php comme ceci :

header('Location: commentaires.php');
?>