<?php
	session_start();
	
	if(isset($_POST['pseudo']))
		$_SESSION['pseudo'] = htmlspecialchars($_POST['pseudo']);

	if(isset($_POST['seeall']))
		$_SESSION['seeall'] = $_POST['seeall'];

	$pseudo = (isset($_SESSION['pseudo'])) ? $_SESSION['pseudo'] : '';
	$message = (isset($_POST['message'])) ? htmlspecialchars($_POST['message']) : '';
	
	if (isset($_SESSION['seeall']) && $_SESSION['seeall'] == 'on')
		$seeall = true;
	else
		$seeall = false;

?>