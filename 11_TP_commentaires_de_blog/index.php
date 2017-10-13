<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />

        <title>Mon blog</title>

    	<link href="blog.css" rel="stylesheet" /> 

    </head>

    <body>

        <h1>Mon super blog !</h1>

        <p>Derniers billets du blog :</p>

       
        <?php
			//pour débuger
			//print_r($reponse->fetch()); die();

			try {
			$bdd = new PDO('mysql:host=localhost;dbname=TP_commentaires_blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			} catch(Exception $e) {
				die('Erreur : '.$e->getMessage());
			}

			// Récupération des 5 derniers billets
			$req = $bdd->query('SELECT * FROM billets ORDER BY ID DESC LIMIT 0, 5');

			// Affichage de chaque billet (toutes les données sont protégées par htmlspcialchars)
			// on va faire une boucle qui s'exécute tant qu'il y de la donnée qu'on va récupérer
			// fetch ça récupère une nouvelle ligne à chaque fois : à chaque tour de boucle, on aura le contenu d'une nouvelle ligne dans la table. On l'aura dans un array qui s'appelle $donnees.
			while ($donnees = $req->fetch()) {
		?>
		 <div class="news">
			<h3> 
				<?php echo htmlspecialchars($donnees['titre']) ;?>
				<em> Le <?php echo htmlspecialchars($donnees['date_creation']) ;?> </em>
			</h3>

			<p> 
				<?php 
				// On affiche le contenu du billet
				echo nl2br(htmlspecialchars($donnees['contenu'])) ;
				?>
				<br />
				<em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
			</p>
		</div>
		<?php
			} // fin de la boucle des billets

			$req->closeCursor();
		?>

    </body>

</html>