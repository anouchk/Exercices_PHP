<?php
	
	

	//Connexion à la base de donnée
	function Connexion() 
	{
		try 
		{	
			//Constantes de connexion à MySQL
			$connexion_str = 'mysql:host=localhost;dbname=basedetest;charset=utf8';
			$mysql_user	= 'root';
			$mysql_psw	= 'root';

			//Connexion à la base de donnée 
			//array(PDO::MYSQL_ATTR_FOUND_ROWS => true) permet de s'avoir le nombre de ligne(s) affectée(s) lors des UPDATEs
			$bdd = new PDO($connexion_str, $mysql_user, $mysql_psw, array(
								PDO::MYSQL_ATTR_FOUND_ROWS => true, 
								PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
							)
				);

			//Passer le date en francais
			$query = "SET lc_time_names = 'fr_FR'";
			$bdd->query($query);

			return $bdd;
		}
		catch(Exception $e) 
		{
			throw new Exception("Impossible de se connecter à la base de donnèe <strong>" . $base . "</strong>.");
			// $e->getMessage(), 1);
		}
	}

	//Ajouter une message au MiniChat
	function AjouterMessageQuery($bdd, $pseudo, $message) 
	{

		try  
		{
			if($pseudo == '' || $message == '')
				return;

			$query = "INSERT INTO minichat (Pseudo, Message, Date) VALUES (:pseudo, :message, NOW())";
			//Execution de la requete
			$response = $bdd->prepare($query);
			$response->execute(array(
					'pseudo' => $pseudo,
					'message' => $message
				));
			
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

	function GetMessageQuery($min = 0, $max = 0) {
		
		$query = "SELECT Pseudo, Message, DATE_FORMAT(Date, 'le %W %d %M %Y à %H:%i') AS 'Date' FROM minichat ORDER BY Date DESC ";

		if((int)$min == 0)
			$min = 0;

		if((int)$max > 0) 
			$query = $query . ' LIMIT ' . $min . $max;

		return $query;
	}

	//Recuperation des derniers messages envoyé
	function ExcecuteQuery($bdd, $query) 
	{
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

	//Affichage des messages du MiniChat
	function WriteMessages($response) 
	{
		$return = "<table>";
		$nbligne = 0;
		$count = $response->rowCount();

		$headerSet = false;

		//On parcours les colonnes. J'utilise PDO::FETCH_ASSOC pour éviter de parcourir également les columns index que rejoute PDO
		while($donnees = $response->fetch(PDO::FETCH_ASSOC))
		{
			$nbligne++;


			//On ajoute ensuite les lignes
			$return = $return 
					. "<div class=\"message\"><p><strong>" 
					. $donnees['Pseudo'] 
					. "</strong>, "
					. $donnees['Date']
					. " : "
					. htmlspecialchars($donnees['Message'])
					. "</p></div>";

			//echo "<pre>";
			//echo print_r($donnees);
			//echo "</pre>";
		}

		//Fermeture du curseur
		$response->closeCursor();

		$return = "<div class=\"information\"></strong>$nbligne derniers messages</strong></div><hr/>" . $return . "</table>";

		return $return;
	}


?>