<?php
function post_commentaire () {
	// Récupération de la base de données
    global $bdd;

	// Effectuer ici la requête qui insère le message reçu avec $_POST dans la base de données 
	$requete = $bdd->prepare('INSERT INTO commentaires(id_billet,auteur,commentaire, date_commentaire) VALUES(?,?,?,?)'); 
	$requete->execute(array($_POST['id2_billet'], $_POST['pseudo'], $_POST['message'], date('Y-m-d H:i:s')));
}