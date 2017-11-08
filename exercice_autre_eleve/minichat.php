<?php include 'minichat_session.php'; ?>

<!DOCTYPE html>
<html>

	<head>
        <meta charset="utf-8" />
		<title>Mini-Chat</title>
	</head>

	<style>

		h1,
		p strong,
		label,
		.information {
			color:#033c73;
		}

		label,
		input[type="text"]{
			width:200px;
			height: 25px;
			margin-bottom: 10px;
			padding-left:5px;
		}

		input[type="radio"]{
			width:60px;
			height: 25px;
			margin-bottom: 10px;
			padding-left:5px;
		}
			
		hr {
			border-color: #033c73; 
		}

		input[type="submit"] {
			border:#033c73;
			background-color:#033c73;
			color:white;
			font-weight:bold;
			height: 40px;
			width:300px;
		}

		input[type="submit"]:hover {
			background-color:#034482;
			border:darkgrey:#034482;
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

		.information {
			width: 100%;
			text-align: center;
		}

		.radiolabel {
			line-height: 50px;
			padding-bottom:10px;
		}

	</style>

	<body>
		<!-- J'ajoute enctype="multipart/form-data" pour envoyer des fichiers -->
		<form method="post" action="minichat_post.php">
		<div class="formulaire">
			<h1>Mini-Chat</h1>
			<label for="pseudo">Pseudo&nbsp;&nbsp; :&nbsp;</label><input id="pseudo" name="pseudo" type="text" value='<?php echo $pseudo ?>' /><br/>
			<label for="message">Message :&nbsp;</label><input id="message" name="message" type="text" /><br/>
			<label class="radiolabel">Voir tout :</label>
			<label class="radiolabel">Oui</label> <input id="seeall" name="seeall" type="radio" value="on" <?php echo $seeall ? 'checked="checked"' : '' ; ?>/>
			<label class="radiolabel">Non</label>  <input id="seeall" name="seeall" type="radio" value="off" <?php echo (!$seeall) ? 'checked="checked"' : '' ; ?>/>
			<br/>
			<input type="submit" value="Envoyer"/>
		</div>

		<?php

		if(isset($_SESSION['Error'])) 
		{
		    echo '<div class="error">';
		    echo $_SESSION['Error'];
		    echo '<hr/>';
		    echo '</div>';
		    $_SESSION['Error'] = '';
		}
		?>

		<?php

		if($pseudo == '')
		{
		    echo '<div class="information">';
		    echo 'Merci de saisir un pseudo!';
		    echo '<hr/>';
		    echo '</div>';
		}
		else
		{
		?>
        	<div id="discussion">
        	</div>

        	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
			libs/jquery/1.3.0/jquery.min.js"></script>

			<script type="text/javascript">				

				RefreshDiscussion();

				var auto_refresh = setInterval(
				function ()
				{
					RefreshDiscussion();
				}, 2000); // refresh every 10000 milliseconds
				 
			 	
			 	function RefreshDiscussion() {
					$('#discussion').load('minichat_discussion.php').fadeIn("slow");
			 	}
			</script>

		<?php 
		}
		?>

		<br/>


	</body>

	

</html>


<?php




?>	