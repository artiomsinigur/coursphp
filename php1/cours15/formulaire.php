<?php
	$aCouleurs = array(
		"bleu" => array("nom" => "Nom Couleur Bleu", "code" => "#0000FF"), 
		"rouge" => array("nom" => "Nom Couleur Rouge", "code" => "#A52A2A"),
		"vert" => array("nom" => "Nom Couleur Vert", "code" => "#7FFF00")
	);

	if (!isset($_POST['couleur'])) {
		$couleur_bg = "#ffffff";
	} else {
		$cle_couleur = $_POST['couleur'];
		// $ma_couleur = $aCouleurs[$cle_couleur];
		// $couleur_bg = $ma_couleur['code'];
		// ou
		$couleur_bg = $aCouleurs[$cle_couleur]['code'];
	}

	var_dump($_GET);
	echo  '</br>';
	var_dump($_POST);
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Cours 15 : Encore des chaines et des tableaux </title>
	<style>
		body {
			background: <?php echo $couleur_bg ?>;
		}
	</style>
<head>
<body>
	<h1>Formulaire</h1>
	<form action="formulaire.php" method="post">
		<p><input type="text" name="nom"></p>
		<p><input type="radio" name="genre" value="F">F</p>
		<p><input type="radio" name="genre" value="M">M</p>
		<p><input type="radio" name="genre" value="Autre">Autre</p>

		<p><input type="checkbox" name="loisir[]" value="pied">Cours a pied</p>
		<p><input type="checkbox" name="loisir[]" value="sky">Sky</p>
		<p><input type="checkbox" name="loisir[]" value="fit">Fit</p>

		<?php
			foreach ($aCouleurs as $key => $infoCouleur) {
				echo '<p>' . $infoCouleur['nom'] . '<input type="radio" value="' . $key . '" name="couleur"></p>';
			}
		?>
		<input type="submit" name="">
	</form>
</body>
</html>
