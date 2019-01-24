<?php
	include 'functions.php';

	$aCouleurs = array(	
						"gris" => array("nom"=>"Gris", "code" => "#444444"), 
						"rouge" => array("nom"=>"Rouge pure", "code" => "#FF0000"), 
						"vert" => array("nom"=>"Vert émeraude", "code" => "#00FF00"), 
						"bleu" => array("nom"=>"bleu pure", "code" => "#0000FF"), 
						"test"=> array("nom"=>"Couleur aléatoire", "code" => "#23FF89")
					);

	// Lecture des donnes de GET
	if (!isset($_GET['page'])) {
		$page = 'socio';
	} else {
		$page = $_GET['page'];
	}

	$bValide = 0;
	switch ($page) {
		case 'socio':
			$nom = '';
			$genre = '';

			if (isset($_POST['nom'])) {
				$nom = $_POST['nom'];
			}
			if (isset($_POST['genre'])) {
				$genre = $_POST['genre'];
			}
			$bValide = validerFormSocio($_POST);
			break;
		
		default:
			# code...
			break;
	}
	
	if(!isset($_POST['couleur']))
	{
		$couleur_bg = '#FFFFFF';
	}
	else
	{
		$cle_couleur = $_POST['couleur'];
		/*$maCouleur = $aCouleurs[$cle_couleur];
		var_dump($maCouleur);
		$couleur_bg = $maCouleur['code'];
*/
		$couleur_bg = $aCouleurs[$cle_couleur]['code'];
	}

	/*echo "GET";
	var_dump($_GET);
	echo "<br>";
	echo "POST";
	var_dump($_POST);

	echo "<br>";*/
	
 ?>


<html>
<head>
	<meta charset="utf-8">
	<title>Cours 15 : Encore des chaines et des tableaux </title>
	<link rel="stylesheet" href="style.css">
	<style>
		body{
			background-color: <?php echo $couleur_bg ?>;
		}
	</style>
<head>


<body class="">
	<h1>Formulaire</h1>
	<nav>
		<ul>
			<li><a href="index.php?page=socio">Socio-demographique</a></li>
			<li><a href="?page=sport">Sport</a></li>
			<li><a href="?page=couleur">Couleurs</a></li>
		</ul>
	</nav>
	<?php
		// if ($page == 'socio') {
		// 	$prochaine_page = 'sport';
		// } else if () {}
	?>
	<!-- <form action="index.php?page=<?php //echo $prochaine_page ?>" method="post"> -->
	<form action="index.php?page=<?php echo $page ?>" method="post">
	<?php
		if ($page == 'socio')
		{
	?>
		<p>Nom : <input type="text" name="nom" value="<?php echo $nom ?>"></p>
		<?php
			if ($genre == 'f') {
				# code...
			}
			// Variant 2
			$mChecked = '';
			if ($genre == 'm') {
				$mChecked = 'checked';
			}

			// Variant 3

		?>
		<p><input type="radio" name="genre" value="f">F</p>
		<p><input type="radio" name="genre" value="m" <?php echo $mChecked ?>>M</p>
		<p><input type="radio" name="genre" value="a"
		<?php	echo ($genre == 'a' ? 'checked' : ''); ?> >Autre</p>
		
	<?php
		} else if ($page == 'sport') 
		{
	?>
		<p><input type="checkbox" name="sport[]" value="cap">Course à pied</p>
		<p><input type="checkbox" name="sport[]" value="ski">Ski</p>
		<p><input type="checkbox" name="sport[]" value="natation">Natation</p>
	<?php
		} else if ($page == 'couleur') 
		{
			foreach ($aCouleurs as $cle => $infoCouleur) 
			{
				//if($codeCouleur != $couleur_bg)
				//{
					echo '<p>'. $infoCouleur['nom'] .' : <input type="radio" value="'. $cle . '" name="couleur"></p>';
				//}
			}
		}
	?>

		<input type="submit" name="">
	</form>
</body>
</html>











