<?php
echo "Regardons les jeux sur NES ou PC, et ordonnons-les par prix dans l'ordre décroissant :<br />";
// où se trouve le serveur de la bdd mysql ; quel est le nom de la bdd qu'on va utiliser ; quel est le login ; quel est le mot de passe pour s'y connecter :
$bdd = new PDO('mysql:host=localhost;dbname=test_pour_le_cours_OC', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT * FROM jeux_video WHERE console="NES" || console="PC" ORDER BY prix DESC LIMIT 10');
// on va faire une boucle qui s'exécute tant qu'il y de la donnée qu'on va récupérer
// fetch ça récupère une nouvelle ligne à chaque fois : à chaque tour de boucle, on aura le contenu d'une nouvelle ligne dans la table. On l'aura dans un array qui s'appelle $donnees.
while ($donnees = $reponse->fetch()) {
	echo '<p>' . $donnees['nom'] . ' - ' . $donnees['console'] . ' - ' . $donnees['prix'] . '€.</p>';
}
// => ça c'est une boucle qui va afficher tous les noms des jeux vidéo présents dans la table des jeux vidéo

echo '<br /><br />Maintenant on va varier en fonction de la console demandée :<br />';

// Maintenant on va varier en fonction de la console demandée
if(isset($_GET['console'])){
	$requete = $bdd->prepare('SELECT * FROM jeux_video WHERE console=? ORDER BY prix DESC');
	$requete->execute(array($_GET['console']));
	while ($donnees2 = $requete->fetch()) {
		echo '<p>' . $donnees2['nom'] . ' - ' . $donnees2['console'] . ' - ' . $donnees2['prix'] . '€.</p>';
	}
}

// Si on voulait insérer une nouvelle ligne dans notre table : 
// $requete = $bdd->prepare('INSERT INTO jeux_video(nom,possesseur) VALUES(?,?)');
// $requete->execute(array($_GET['nom'], $_GET['possesseur']));

?>