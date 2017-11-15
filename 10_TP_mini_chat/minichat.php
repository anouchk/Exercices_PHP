<?php
	//mise en place du cookie
	//if (isset($_POST['pseudo'])) {
	//	setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
	//} 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>TP Mini chat</title>
	</head>
	<body>
		<form action="minichat_post.php" method="post">
			<p>
				<label for "pseudo"> Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value="<?php
  				if (isset($_COOKIE['pseudo'])) {
    				echo htmlspecialchars($_COOKIE['pseudo']);
  				} else {
  					echo "entrez votre pseudo";
  				}
   			?>">
  			</p>
  			
			<p><label for "message"> Message</label> : <input type="text" name="message"></p>
			<p><input type="submit" ></p>
		</form>	
		<br/ >
		<p><h1> LE SUPER MINI CHAT </h1></p>

		<?php
			
			// Connexion à la base de données
			try {
			$bdd = new PDO('mysql:host=localhost;dbname=TP_minichat', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			} catch(Exception $e) {
				die('Erreur : '.$e->getMessage());
			}

			// Récupération des 10 derniers messages
			$reponse = $bdd->query('SELECT ID, Pseudo, Message, DATE_FORMAT(date_com, \'%d/%m/%Y à %Hh%imin%ss\') AS date_com_fr  FROM minichat ORDER BY ID DESC  LIMIT 10');

			// Affichage de chaque message (toutes les données sont protégées par htmlspcialchars)
			// on va faire une boucle qui s'exécute tant qu'il y de la donnée qu'on va récupérer
			// fetch ça récupère une nouvelle ligne à chaque fois : à chaque tour de boucle, on aura le contenu d'une nouvelle ligne dans la table. On l'aura dans un array qui s'appelle $donnees.
			while ($donnees = $reponse->fetch()) {
				echo '<p>[' . htmlspecialchars($donnees['date_com_fr']) . '] <strong>' . htmlspecialchars($donnees['Pseudo']) . ' : </strong> ' . htmlspecialchars($donnees['Message']). '</p>';
			}

			$reponse->closeCursor();

		?>

	</body>
</html>