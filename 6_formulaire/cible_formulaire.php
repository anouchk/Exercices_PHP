<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Comment récupérer les infos d'un formulaire</title>
</head>
<body>

	<p>Bonjour 
		 <?php echo htmlspecialchars ($_POST['prenom']); ?> <!-- htmlspecialchars pour éviter les failles XSS -->
	</p>


	<?php
		if (isset($_POST['vegetarien'])) {
			echo $_POST['vegetarien'];
			echo '<p>Vous êtes donc végétarien. </p>';
		} else {
			echo '<p>Vous n\'êtes donc pas végétarien. </p>';
		}

		// envoi de fichiers
		// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
		if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
		{
		        // Testons si le fichier n'est pas trop gros
		        if ($_FILES['monfichier']['size'] <= 1000000)
		        {
		                // Testons si l'extension est autorisée
		                $infosfichier = pathinfo($_FILES['monfichier']['name']);
		                $extension_upload = $infosfichier['extension'];
		                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
		                if (in_array($extension_upload, $extensions_autorisees))
		                {
		                        // On peut valider le fichier et le stocker définitivement
		                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
		                        echo "L'envoi a bien été effectué !";
		                }
		        }
		}
	?>	

</body>
</html>