<?php
	include 'fonctions.php';

	$aCouleurs = array(	
						"gris" => array("nom"=>"Gris", "code" => "#444444"), 
						"rouge" => array("nom"=>"Rouge pure", "code" => "#FF0000"), 
						"vert" => array("nom"=>"Vert émeraude", "code" => "#00FF00"), 
						"bleu" => array("nom"=>"bleu pure", "code" => "#0000FF"), 
						"test"=> array("nom"=>"Couleur aléatoire", "code" => "#23FF89")
					);
	// Lecture des données en GET
	if(!isset($_GET['page'])){
		$page = 'accueil';
	}
	else
	{
		$page = $_GET['page'];
	}

	$bValide = false;
	switch ($page) {
		case 'socio':
			$nom = '';
			$genre = '';

			if(isset($_POST['nom']))
			{
				$nom = $_POST['nom'];
			}
			
			if(isset($_POST['genre']))
			{
				$genre = $_POST['genre'];
			}
			$bValide = ValiderFormSocio($_POST);
			

			break;
		
		default:
			# code...
			break;
	}



	var_dump($page);

	if(!isset($_POST['couleur']))
	{
		$couleur_bg = '#FFFFFF';
		$cle_couleur = '';
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
	<title>Cours 17 : Encore des chaines et des tableaux </title>
	<style>
		body{
			background-color: <?php echo $couleur_bg ?>;
		}
	</style>
	<link href="style.css" rel="stylesheet">
<head>


<body class="">
	
	<nav>
		<ul>
			<li><a href="index.php?page=accueil">Accueil</a></li>
			<li><a href="index.php?page=socio">Socio-demographique</a></li>
			<li><a href="index.php?page=sport">Sport</a></li>
			<li><a href="index.php?page=couleur">Couleurs</a></li>
		</ul>
	</nav>
	<?php 
	/*if($page == 'socio'){

		$prochaine_page = 'sport';
	}
	else if($page == 'sport'){
		
		$prochaine_page = 'couleur';
	}
	else if($page == 'couleur'){
		
		$prochaine_page = 'socio';
	}
*/
	?>
	
		<?php 
		if($page == 'accueil')
		{
			?>
				<h1>Page d'accueil</h1>
			<?php
		}
		else if($page == 'socio')
		{
			?>
			<form action="index.php?page=<?php echo $page ?>" method="post">
			<p>Nom : <input type="text" name="nom" value="<?php echo $nom ?>"></p>
			<?php 
			if($genre == 'f')
			{
				?>
				<p><input type="radio" name="genre" value="f" checked>F</p>
				<?php 
			}
			else 
			{
				?>
				<p><input type="radio" name="genre" value="f">F</p>
				<?php 
			}
			

			$mChecked = '';
			if($genre == 'm')
			{
				$mChecked = 'checked';
			}
			?>
			<p><input type="radio" name="genre" value="m" <?php echo $mChecked ?> >M</p>
			<?php
			// ( condition ? si_vrai : si_faux );
			?>
			<p><input type="radio" name="genre" value="a" <?php echo ($genre == 'a' ? 'checked' : '') ?> >Autre</p>

			
				<input type="submit" name="">
			</form>
			<?php
		}
		else if($page == 'sport')
		{
			?>
			<form action="index.php?page=<?php echo $page ?>" method="post">
			<p><input type="checkbox" name="sport[]" value="cap">Course à pied</p>
			<p><input type="checkbox" name="sport[]" value="ski">Ski</p>
			<p><input type="checkbox" name="sport[]" value="natation">Natation</p>

				<input type="submit" name="">
			</form>
			<?php
		}
		else if($page == 'couleur')
		{
			?>
			<form action="index.php?page=<?php echo $page ?>" method="post">
			<?php 
			foreach ($aCouleurs as $cle => $infoCouleur) 
			{
				//if($codeCouleur != $couleur_bg)
				//{
				//echo '<p>'. $infoCouleur['nom'] .' : <input type="radio" value="'. $cle . '" name="couleur"></p>';
				?>
				<p><?php echo $infoCouleur['nom'] ?> : 
				<input type="radio" value="<?php echo $cle ?>" 
					name="couleur" <?php echo ( $cle_couleur == $cle ? 'checked' : '') ?> ></p>

				<?php
			}
			?>
				<input type="submit" name="">
			</form>
			<?php
		}
		?>

		
</body>
</html>











