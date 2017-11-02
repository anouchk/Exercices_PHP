<!DOCTYPE html>
    <head>

        <meta charset="utf-8" />

        <title>Mon blog</title>

    	<link href="style.css" rel="stylesheet" /> 

    </head>

        

    <body>

        <h1>Mon super blog !</h1>

        <a href="php?section=index">Retour à la liste des billets</a>

     <?php

		// foreach($billets as $billet) {
		// je devrais écrire un foreach ($commentaires as $commentaire)	{ }

 
	?>

			<div class="news">		
				<h3> 
					<?php echo htmlspecialchars($billet['titre']) ; ?>
					<em><?php echo htmlspecialchars($billet['date_creation_fr']) ; ?></em>
				</h3>

				<p> 
					<?php echo nl2br(htmlspecialchars($billet['contenu'])) ; 
					// La fonction nl2br() permet de convertir les retours à la ligne en balises HTML<br />. C'est une fonction dont vous aurez sûrement besoin pour conserver facilement les retours à la ligne saisis dans les formulaires.
					?> 
				</p>
			 </div>

			<h2> Commentaires </h2>

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