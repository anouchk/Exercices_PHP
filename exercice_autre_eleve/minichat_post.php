<?php
	include 'minichat_session.php';
	include 'minichat_functions.php';

	$_SESSION["Error"] = '';

	if($pseudo == '') 
	{
		$_SESSION["Error"] = 'Pseudo non renseigné';
		header('Location: minichat.php?e=pseudo');
	}
	else if($message == '') 
	{
		//$_SESSION["Error"] = 'Message non renseigné';
		header('Location: minichat.php?e=msg');
	}
	else 
	{
		try 
		{
			$bdd = Connexion();

			AjouterMessageQuery($bdd, $pseudo, $message);
			header('Location: minichat.php');

		}
		catch(Exception $e) 
		{
			$_SESSION["Error"] = $e->getMessage();
			header('Location: minichat.php?e=sql');
		}
	}

	
	

?>	