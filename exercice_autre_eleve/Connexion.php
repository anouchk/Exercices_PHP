<?php
session_start();

$login = '';
			
if(isset($_POST['login']))
	$_SESSION['login'] = htmlspecialchars($_POST['login']);

if(isset($_POST['base']))
	$_SESSION['base'] = htmlspecialchars($_POST['base']);

if(isset($_POST['note']))
	$_SESSION['note'] = htmlspecialchars($_POST['note']);

$note = isset($_SESSION['note']) ? $_SESSION['note'] : '';
$base = isset($_SESSION['base']) ? $_SESSION['base'] : '';
$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
$query = isset($_POST['query']) ? htmlspecialchars($_POST['query']) : '';

$connected = false;

?>

<!DOCTYPE html>
<html>

	<head>
        <meta charset="utf-8" />
		<title>Formulaire</title>
	</head>

	<style>

		h1,
		p strong,
		label{
			color:#033c73;
			font-weight: bold;
		}

		hr {
			border-color: #033c73; 
		}

		label,
		input{
			width:200px;
			height: 25px;
			margin-bottom: 10px;
			padding-left:5px;
		}
			
		input[type="submit"] {
			border:#033c73;
			background-color:#033c73;
			color:white;
			font-weight:bold;
			height: 40px;
		}

		input[type="submit"]:hover {
			background-color:#034482;
			border:darkgrey:#034482;
		}

		table {
			width:100%;
			text-align: left;
			border-collapse: collapse;
		}

		table th {
			background-color:#033c73;
			border:white 1px solid;
			padding: 5px;
			color:white;
		}

		table td {
			border:#317eac 1px solid;
			padding: 5px;
		}

		.message {
			line-height: 20px;
			margin:10px;
			margin-left:10%;
		}

		.formulaire {
			line-height: 30px;
			margin:10px;
			text-align:center;
		}

		.error {
			width: 100%;
			color:red;
			text-align: center;
		}

	</style>

	<body>
		<!-- J'ajoute enctype="multipart/form-data" pour envoyer des fichiers -->
		<form method="post" action="connexion.php" enctype="multipart/form-data">

		<div class="formulaire">
			<label for="base" >Base&nbsp; :&nbsp;</label><input id="base" name="base" type="text" 
			value="<?php echo $base; ?>" /><br/>

			<label for="login" >Login :&nbsp;</label><input id="login" name="login" type="text" 
			value="<?php echo $login; ?>" /><br/>

			<div class="error">
				<?php

				if($base == "") 
				{
					echo "Merci de renseigner la base de donnée";
				}
				else if($login == "") 
				{
					echo "Merci de renseigner le login";
				}
				else 
				{
					try 
					{
						$bdd = OpenConnection($base, $login);
						$connected = true;
					}
					catch(Exception $e)
					{
						echo 'Connexion impossible : ' . $e->getMessage();
					}
				}

				?>
			</div>
			<br/>

		</div>

		<label for="query" >SQL&nbsp;</label>
		<textarea id="query" name="query" style="max-width:100%;min-width:100%;min-height:100px;" cols="10"><?php echo $query; ?></textarea>

		<div class="formulaire">
			<input type="submit" value="Executer"/>
		</div>

		<br/>


		<div style="width:100%;">
			
		<?php

		if(!$connected || !isset($_POST['query']) || $_POST['query'] == "")
			echo 'Aucun résulat';
		else
		{
			try 
			{

				$response = ExcecuteQuery($bdd, $query);
				echo ReadResponse($response);

			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
				//echo $e->getMessage();
			    echo '<div class="error">';
			    echo $e->getMessage();
			    echo '</div>';
			}
		}
		?>

		</div>

		<br>
		<br>

		<label for="query" >Note</label>
		<textarea id="note" name="note" style="max-width:100%;min-width:100%;min-height:1000px;" cols="10"><?php echo $note; ?></textarea>

	</body>



</html>







<?php
function OpenConnection($base, $login) {

	try 
	{
		//Connexion à la base de donnée 
		//array(PDO::MYSQL_ATTR_FOUND_ROWS => true) permet de s'avoir le nombre de ligne(s) affectée(s) lors des UPDATEs
		$bdd = new PDO('mysql:host=localhost;dbname=' . $base . ';charset=utf8', $login, '', array(
							PDO::MYSQL_ATTR_FOUND_ROWS => true, 
							PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
						)
			);

		return $bdd;
	}
	catch(Exception $e) 
	{
		throw new Exception("Impossible de se connecter à la base de donnèe <strong>" . $base . "</strong>. Merci de verifier le nom de la base et le login.");
		// $e->getMessage(), 1);
	}
}

function ExcecuteQuery($bdd, $query) {

	try  
	{
		//Execution de la requete
		$response = $bdd->query($query);

		//si l'execution de la requète renvoi une erreur, on lève un exeption
		$error = $bdd->errorInfo();

		if($error[2] > '')
			throw new Exception($error[2]);

		//echo "<pre>";
		//echo print_r($response);
		//echo "</pre>";

		return $response;
	}
	catch(Exception $e) 
	{
		throw new Exception("Une erreur SQL est survenue : " . $e->getMessage(), 1);
	}
}

function ReadResponse($response) {

	$return = "<table>";
	$nbligne = 0;
	$count = $response->rowCount();

	$headerSet = false;

	if(CheckIsSelectOnly($response->queryString))
	{
		//On parcours les colonnes. J'utilise PDO::FETCH_ASSOC pour éviter de parcourir également les columns index que rejoute PDO
		while($donnees = $response->fetch(PDO::FETCH_ASSOC))
		{
		
			$nbligne++;

			//Si ce n'est pas déjà fait, on ajoute les noms de columns au tablea
			if(!$headerSet)
			{
				$return = $return . "<thead><tr><th>" . implode("</th><th>", array_keys($donnees)) . "</th></th></thead>";

				$headerSet = true;
			}

			//On ajoute ensuite les lignes
			$return = $return . "<tr><td>" . implode("</td><td>", $donnees) . "</td></tr>";

			//secho "<pre>";
			//echo print_r($donnees);
			//echo "</pre>";
		}

		//Fermeture du curseur
		$response->closeCursor();

	}

	//Si $nbligne > 0 alors la requete est un Select only
	if($nbligne == 1)
		$return = "</strong>$nbligne ligne</strong><hr/>" . $return . "</table>";
	else if($nbligne > 0)
		$return = "</strong>$nbligne lignes</strong><hr/>" . $return . "</table>";	
	//Si sinon on affiche le nombre de lignes affectées par la requete
	else if($count == 1)
		$return = "</strong>$count ligne affectée</strong><hr/>" . $return . "</table>";
	else if($count > 0)
		$return = "</strong>$count lignes affectées</strong><hr/>" . $return . "</table>";
	else 
		$return = "</strong>0 ligne</strong><hr/>" . $return . "</table>";

	return $return;
}

function CheckIsSelectOnly($query) {
	$query = strtoupper($query);

echo strpos($query, 'INSERT');
	if(strpos($query, 'INSERT') !== false 
		|| strpos($query, 'DELETE') !== false  
		|| strpos($query, 'UPDATE') !== false 
	)
		return false;

	return true;
}

?>