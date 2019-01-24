<?php

/**
 * 582-P11 - Exercice sur les formulaires (8%)
 * Vous devez compléter le fichier index.php afin qu'il permette d'afficher le résultat du calcul de l'aire ou du périmètre d'un cercle, 
 * selon les choix faits par l'utilisateur.
 * De plus, vous devez faire la validation des éléments du formulaire de la manière suivante : 
 * - le rayon doit être une valeur numérique positive (donc > 0)
 * - L'utilisateur doit avoir choisi une des deux options de calcul (Aire ou périmètre)
 * - Un message doit être affiché en cas d'erreur  
 * 
 * Calcul de l'aire : rayon * rayon * pi() 
 * Calcul du périmètre : rayon * 2 * pi()
 * pi() est une fonction qui retourne la valeur de la constante PI. La valeur peut être arrondie à 3.1416.
 * 
 * Critères de correction : /25
 * - Bonne utilisation du PHP : /10
 * - Code sans erreur : /5
 * - Fonctionnalité et respect des consignes : /5 
 * - Qualité des commentaires dans le code : /5
 * 
 * Démo : https://jmartel.webdev.cmaisonneuve.qc.ca/p11/exercice_cercle/index.php
 * 
 * @author {Artiom}
 * @version 1.0
 * @date 2019-01-17
 * 
 */

//  Function utilisées ==================//
// 1 intval() - Convertie une valeur en entier
// 2 round() - Arrondit un nombre à virgule flottante


// 1.1 À faire ==============//
// 1.2 Calcul l'aire
// 1.3 Calcul la circonference
// 1.4 Affiche le résultat lorsque le champe rayon et l'option cirfonférence sont choisi
// 1.5 Affiche le résultat lorsque le champe rayon et l'option aire sont choisi
// 1.6 Vérifi si le champe a été choisi
// 1.7 Vérifi si les otpions ont été choisi

// Function calculant l'aire
function calcAire($rayon) {
	$aire = $rayon * $rayon * pi();
	return round($aire, 4);
}

// Function calculant la circonférence
function calcCirconf($rayon) {
	$circonference = $rayon * 2 * pi();
	return round($circonference, 4);
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Exercice sur les formulaires (582-P11)</title>
		<link href="./css/style.css" rel="stylesheet" />
	</head>
	<body>
		<main>
		    <header>
                <h1>Périmètre et aire d'un cercle</h1>
            </header>
            <article class="formulaire">
        		<form method="post" action="index.php">
							<?php
								// Vérifie les cas lorsque le champ est vide ainsi que le rayon est différent de rien
								if (isset($_POST['bouton'])) {
									if ((isset($_POST['rayon']) && ($_POST['rayon'] != ''))) {
										$rayon = intval($_POST['rayon']);
										// var_dump($_POST);
										// $choix = $_POST['choix'];
										
										// Vérifie si l'une d'option du calcul est choisi
										if (isset($_POST['choix'])) {
											// Vérifie si le champ a un numero superieur à 0
											if ($rayon > 0) {
												if ($_POST['choix'] === 'circonference') {
													// echo 'La circonférence est: ' . calcCirconf($rayon);
													echo 'La circonférence est: ' . $circonference = $rayon * 2 * pi();
												} else if ($_POST['choix'] === 'aire') {
													echo 'La circonférence est: ' . calcAire($rayon);
												}
											} else {
												echo 'Veuillez écrire un numero superieur à 0';
											}
										} else {
											echo 'Veuillez selecter une des options du calcul';
										}
									} else {
										echo 'Veuillez écrire le rayon du cercle';
									}
								}

							?>
        		    <div class="grpBouton">
                        <label>Rayon du cercle : </label>
                        <input type="text" name="rayon">
        			</div>
        			<div class="grpBouton">
        			    <label>Choix du calcul : </label>
                        <input type="radio" name="choix" value="circonference">Circonférence
                        <input type="radio" name="choix" value="aire">Aire
        			</div>
        			<button name="bouton" type=submit>Calcul</button>
        		</form>
            </article>
            <footer>
                <p>582-P11 - Exercice sur les formulaires</p>
            </footer>
		</main>
	</body>
</html>








	