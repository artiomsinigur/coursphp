<?php

/**
 * 582-P11 - Examen final (pratique)
 * Vous devez compléter le fichier index.php afin qu'il permette d'afficher à un utilisateur de faire une réservation pour un restaurant. 
 * L'utilisateur entre son nom, le nombre de personne, la date et l'heure de sa réservation, si tout est valide, le site affiche les informations et la confirmation.
 * Vous devez faire la validation des éléments du formulaire de la manière suivante : 
 * - le nom ne doit pas être vide
 * - Le nombre de personne doit être une valeur positive supérieur à 0 (au moins 1)
 * - L'utilisateur doit choisir une date et une heure
 * - Un message spécifique pour chaque erreur doit être affiché
 *
 * NB : Les valeurs ne doivent pas être replacé dans le formulaire en cas d'erreur
 * 
 * Demo : https://jmartel.webdev.cmaisonneuve.qc.ca/p11/examenPratique/index.php
 * 
 * Critères de correction (théorique) : 20 %
 * - Bonne utilisation du PHP : /10
 * - Code sans erreur : /5
 * - Fonctionnalité et respect des consignes : /5 
 * 
 * NB : Aucun commentaire n'est nécessaire.
 * 
 * @author {Artiom}
 * @version 1.0
 * @date 2019-01-24

 */

// À faire =========//
// 1 - Vérifier le champ nom et afficher un message d'erreur s'il n'ai pas remplit
// 2 - Vérifier le champ nombre de personne et afficher un message s'il n'ai pas remplit
// 3 - Vérifier la date, si elle n'ai pas séléctionner afficher un message d'erreur
// 4 - Vérifier l'heure, si elle n'ai pas séléctionner afficher un message d'erreur
// 5 - Après avoire envoyé le formulaire il doit avoir un lien dirigent au début du formulaire

/*
if(!isset($_GET['page'])) {
    $page = 'form';
} else {
    $page = $_GET['page'];
}
*/

// Tableau qui cointendra les erreurs
$aErreurs = [];

$nom = '';
$nbpersonne = '';
$date = '';
$heure = '';
$erreur = '';
if(isset($_POST['bouton'])) {
    if (isset($_POST['nom']) && ($_POST['nom'] != '')) {
        $nom = $_POST['nom'];
    } else {
        $aErreurs[] = 'Le nom ne doit pas être vide';
    }
    
    if (isset($_POST['nbpersonne']) && ($_POST['nbpersonne'] > 0)) {
        $nbpersonne = $_POST['nbpersonne'];
    } else {
        $aErreurs[] = 'Le nombre de personne doit être une valeur numérique supérieure à 0';
    }
    
    if (isset($_POST['date']) && ($_POST['date'] != '')) {
        $date = $_POST['date'];
    } else {
        $aErreurs[] = 'Vous devez choisir une date';
    }
    
    if (isset($_POST['heure']) && ($_POST['heure'] != '')) {
        $heure = $_POST['heure'];
    } else {
        $aErreurs[] = 'Vous devez choisir une heure';
    }
}


echo '<pre>';
var_dump($aErreurs);
echo '</pre>';
?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Examen pratique (582-P11)</title>
		<link href="./css/style.css" rel="stylesheet" />
	</head>
	<body>
		<main>
		    <header>
                <h1>Réservation au restaurant</h1>
            </header>
            <article class="formulaire">
            <?php
            if ($nom && $nbpersonne && $date && $heure) {
            ?>
                <article>
                    <h2>Confirmation de la réservation</h2>
                    <p>Nom : <?php echo $nom ?></p>
                    <p>Nombre : <?php echo $nbpersonne ?></p>
                    <p>Date : <?php echo $date ?></p>
                    <p>Heure : <?php echo $heure ?></p>
                    <p><a href="index.php">Refaire une réservation</a></p>
                </article>
            <?php
            } else {
            ?>
                <!-- Afficher les erreurs -->
                <?php
                // Version 1 afficher les erreurs avec echo
                /*
                if (isset($_POST['bouton'])) {
                    if (!$nom) {
                        echo '<li class="erreur">' . 'Le nom ne doit pas être vide' . '</li>';
                    }
                    if (!$nbpersonne) {
                        echo '<li class="erreur">' . 'Le nombre de personne doit être une valeur numérique supérieure à 0' . '</li>';
                    }
                    if (!$date) {
                        echo '<li class="erreur">' . 'Vous devez choisir une date' . '</li>';
                    }
                    if (!$heure) {
                        echo '<li class="erreur">' . 'Vous devez choisir une heure' . '</li>';
                    }
                }
                */

                // Version 2 afficher les erreurs depuis un tableau
                if (isset($_POST['bouton'])) {
                    echo '<ul>';
                    foreach ($aErreurs as $valueErreur) {
                        echo '<li class="erreur">' . $valueErreur . '</li>';
                    }
                    echo '</ul>';
                }
                ?>

        		<form method="post" action="index.php">
        		    <div class="grpBouton">
                        <label>Nom : </label>
                        <input type="text" name="nom">
        			</div>
                    <div class="grpBouton">
                        <label>Nombre de personne : </label>
                        <input type="number" name="nbpersonne">
        			</div>
        			<div class="grpBouton">
        			    <label>Dates : </label>
                        <select name="date">
                            <option value="">Choisissez une date</option>
                            <option value="25 janvier">25 janvier</option>
                            <option value="26 janvier">26 janvier</option>
                            <option value="27 janvier">27 janvier</option>
                            <option value="28 janvier">28 janvier</option>
                            <option value="29 janvier">29 janvier</option>
                        </select>
        			</div>
                    <div class="grpBouton">
        			    <label>Heures : </label>
                        <input type="radio" name="heure" value="18:00">18:00
                        <input type="radio" name="heure" value="19:00">19:00
                        <input type="radio" name="heure" value="20:00">20:00
                        <input type="radio" name="heure" value="21:00">21:00
        			</div>
        			<button name="bouton" type=submit>Réserver</button>
        		</form>
            <?php
            }
            ?>
               
            </article>
            <footer>
                <p>582-P11 - Examen final (pratique)</p>
            </footer>
		</main>
	</body>
</html>








	