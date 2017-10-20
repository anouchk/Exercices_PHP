<?php
	//mise en place du cookie
	//setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);

	// Connexion à la base de données
	try {
		// où se trouve le serveur de la bdd mysql ; quel est le nom de la bdd qu'on va utiliser ; quel est le login ; quel est le mot de passe pour s'y connecter :
		$bdd = new PDO('mysql:host=localhost;dbname=TP_minichat', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	// Insertion du message reçu avec $_POST dans la base de données 
	$requete = $bdd->prepare('INSERT INTO minichat(Pseudo,Message, date_com) VALUES(?,?,?)');
	$requete->execute(array($_POST['pseudo'], $_POST['message'],  date('Y-m-d H:i:s')));

	// Puis rediriger le visiteur vers la page du minichat.php comme ceci :
	header('Location: minichat.php');
