<?php 
	include 'minichat_functions.php'; 
	include 'minichat_session.php';

	try 
	{

		if($pseudo > '') 
		{

			$bdd = Connexion();
			$limit = !$seeall ? 10 : 0;
			$query = GetMessageQuery(0, $limit);
			$response = ExcecuteQuery($bdd, $query);

			echo WriteMessages($response);
		}

	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
		//echo $e->getMessage();
	    echo '<div class="error">';
	    echo $e->getMessage();
	    echo '</div>';
	}

?>
