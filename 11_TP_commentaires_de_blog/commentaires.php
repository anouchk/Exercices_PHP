<!DOCTYPE html>
    <head>

        <meta charset="utf-8" />

        <title>Mon blog</title>

    	<link href="blog.css" rel="stylesheet" /> 

    </head>

        

    <body>

        <h1>Mon super blog !</h1>

        <a href="index.php">Retour à la liste des billets</a>

     <?php
     // Connexion à la base de données
			try {
			$bdd = new PDO('mysql:host=localhost;dbname=TP_commentaires_blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			} catch(Exception $e) {
				die('Erreur : '.$e->getMessage());
			}

			
			$idBillet=$_GET['billet'];
			// Récupération du billet
			$reponse = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
			$reponse->execute(array($idBillet));
			//print_r($reponse); die();
			//print_r($_GET); die();
			//print_r($_GET['billet']); die();
		
			// fetch ça récupère une ligne à chaque fois 
			$donnees = $reponse->fetch();
			//print_r($reponse->fetch()); die();
			//A priori c'est ici où je peux vérifier si le billet existe sur la page de commentaires, genre : if $donnees=empty alors msg d'erreur, else, continue. 
	?>

			<div class="news">		
				<h3> 
					<?php echo htmlspecialchars($donnees['titre']) ; ?>
					<em><?php echo htmlspecialchars($donnees['date_creation_fr']) ; ?></em>
				</h3>

				<p> 
					<?php echo nl2br(htmlspecialchars($donnees['contenu'])) ; 
					// La fonction nl2br() permet de convertir les retours à la ligne en balises HTML<br />. C'est une fonction dont vous aurez sûrement besoin pour conserver facilement les retours à la ligne saisis dans les formulaires.
					?> 
				</p>
			 </div>

			<h2> Commentaires </h2>

			<?php
			
			$reponse->closeCursor(); // Important : on libère le curseur pour la prochaine requête

			// Récupération des commentaires
			$reponse2 = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet=? ORDER BY id DESC');
			$reponse2->execute(array($_GET['billet']));
			?>

			<form action="commentaires_post.php" method="post">
				<p><label> Pseudo</label> : <input type="text" name="pseudo"></p>
				<p><label> Message</label> : <input type="text" name="message"></p>
				<input type ="hidden" name="id2_billet" value="<?php echo $_GET['billet']?>">
				<p><input type="submit" ></p>
			</form>	

			<?php
				
			while ($donnees2 = $reponse2->fetch()) {
			?>
				<p>
					<strong><?php echo htmlspecialchars($donnees2['auteur']) ; ?></strong>
					Le <?php echo htmlspecialchars($donnees2['date_commentaire_fr']) ; ?>
				</p>
				<div><?php echo nl2br (htmlspecialchars($donnees2['commentaire'])) ; ?></div>
			<?php	
			} // fin de la boucle des commentaires 
			$reponse2->closeCursor();
			?>
    </body>
</html>