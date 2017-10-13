
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Comment récupérer les infos d'un formulaire</title>
</head>
<body>

<?php
// Le mot de passe n'a pas été envoyé ou n'est pas bon

if (!isset($_POST['mot_de_passe']) OR $_POST['mot_de_passe'] != "kangourou") {
// Afficher le formulaire de saisie du mot de passe
?>
	<form action="" method="post">
		<p><label> Mot de passe pour accéder aux codes de la Nasa : <input type="password" name="mot_de_passe"></label></p>
		<p><input type="submit" ></p>
	</form>
<?php
} else {
// Le mot de passe a été envoyé et il est bon
?>
    <h1>Voici les codes d'accès :</h1>

        <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>   
        <p>
        Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />
        La NASA vous remercie de votre visite.
        </p>
<?php
} ;
?>

</body>
</html>
