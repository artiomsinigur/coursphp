<?php

	$aCouleurs = array("gris", "Rouge", "Vert", "Fushia", "test");

	if(!isset($_GET['couleur']))
	{
		$classe_css = '';
	}
	else
	{
		$classe_css = $_GET['couleur'];
	}

	var_dump($_GET);
	var_dump($classe_css);
 ?>




<html>
<head>
	<meta charset="utf-8">
	<title>Cours 15 : Encore des chaines et des tableaux </title>
	<style>
		.rouge{
			background-color: #FF0000;
		}
		.gris{
			background-color: #AAAAAA;
		}
	</style>
<head>


<body class="<?php echo $classe_css; ?>">
	<h1>Formulaire</h1>
	<form action="formulaire.php">
		<?php
			foreach ($aCouleurs as $couleur) 
			{
				if($couleur != $classe_css)
				{
					echo '<p>'. $couleur .' : <input type="radio" value="'. $couleur . '" name="couleur"></p>';
				}
				
			}
		?>

		<input type="submit" name="">
	</form>
</body>
</html>











