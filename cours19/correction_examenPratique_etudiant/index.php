<?php

/**
 * 582-P11 - Examen final (pratique)
 * Vous devez compléter le fichier index.php afin qu'il permette à un utilisateur de faire une réservation pour un restaurant. 
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
 * @author {votre nom}
 * @version 1.0
 * @date 2019-01-24

 */
?>

<?php

//var_dump($_POST);
var_dump(isset($_POST));
var_dump(empty($_POST['totolemagicien']));

$aErreurs = array();
$bValide = false;

if(!empty($_POST)){


   // echo 'avec post';

    $nom = "";
    $nbpersonne = "";
    $date = "";
    $heure = "";
    // Validation du nom
    if(isset($_POST['nom'])){
        $nom = $_POST['nom'];
    }
    // 
    if($nom == ""){
        $aErreurs['nom'] = 'Le nom doit être spécifié';
    }

    // Validation du nombre
    if(isset($_POST['nbpersonne'])){
        $nbpersonne = $_POST['nbpersonne'];
    }
    // 
    if($nbpersonne == "" || !is_numeric($nbpersonne) || $nbpersonne <= 0){
        $aErreurs['nbpersonne'] = 'Le nombre de personne doit être une valeur plus grande que 0';
    }


    // Validation de la date
    if(isset($_POST['date'])){
        $date = $_POST['date'];
    }
    // 
    if($date == ""){
        $aErreurs['date'] = 'Vous devez faire un choix de date';
    }

    // Validation de l'heure
    if(isset($_POST['heure'])){
        $heure = $_POST['heure'];
    }
    // 
    if($heure == ""){
        $aErreurs['heure'] = 'Vous devez faire un choix d\'heure';
    }

    if(empty($aErreurs))
    {
        $bValide = true;
    }

var_dump($aErreurs);
}




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
                    if($bValide){
                        ?>
                        <article>
                            <h2>Confirmation de la réservation</h2>
                            <p>Nom : <?php echo $nom ?> </p>
                            <p>Nombre : <?php echo $nbpersonne ?></p>
                            <p>Date : <?php echo $date ?></p>
                            <p>Heure : <?php echo $heure ?></p>
                            <p><a href="index.php">Refaire une réservation</a></p>
                        </article>
                        <?php
                    }
                    else{
                        if(!empty($aErreurs)){

                            //echo '<ul>';
                            foreach ($aErreurs as $cle => $sErreur) {
                                echo "<p>".$sErreur. "(". $cle .")</p>";
                            }
                            foreach ($aErreurs as$sErreur) {
                                echo "<p>".$sErreur ."</p>";
                            }
                            //echo '</ul>';

                        }
                        ?>             
                        <form method="post" action="index.php">
                            <div class="grpBouton">
                                <label>Nom : </label>
                                <input type="text" name="nom">
                                <?php
                                if(isset($aErreurs['nom']))
                                {
                                    echo $aErreurs['nom'];
                                }
                                ?>
                            </div>
                            <div class="grpBouton">
                                <label>Nombre de personne : </label>
                                <input type="number" name="nbpersonne">
                                <?php
                                if(isset($aErreurs['nbpersonne']))
                                {
                                    echo $aErreurs['nbpersonne'];
                                }
                                ?>
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








	