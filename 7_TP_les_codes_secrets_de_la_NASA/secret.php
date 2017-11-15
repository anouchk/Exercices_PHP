<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Coffre fort de la NASA</title>
</head>
<body>
	<?php
		if (isset($_POST['mot_de_passe']) && $_POST['mot_de_passe']=== "kangourou") {
			echo '<p>Bien joué ! Les codes de la NASA sont les suivants. "On a marché sur la lune." </p>';
		} else {
			echo '<p>Vous n\'avez pas le bon mot de passe. </p>';
		}
	?>
</body>
</html>