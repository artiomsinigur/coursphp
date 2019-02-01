<?php

/**
 * 582-P11 - Examen final (30 %)
 * Vous devez compléter le fichier index.php afin de créer un formulaire d'inscription dans un club de natation. Le prix de base est de 50$. 
 * En plus du nom, du prénom et de l'age, l'utilisateur doit choisir au moins une activitée spécialisée que l'enfant pratiquera. Si les informations entrées sont valides, 
 * une page de résultat est affichée. Cette page comprend un résumé des valeurs entrées (nom, prénom, activités inscrite), 
 * la catégorie d'age de l'enfant et le prix total (prix de base + activité). 
 * Le prix est en fonction des activités choisies et du prix de base. 
 * 
 * Catégorie d'age : 
 * - 5-7 ans : grenouille
 * - 8-10 ans : poisson rouge
 * - 11-12 ans : baleine
 * - 13-16 ans : requin
 * 
 * Activités et prix
 * - Compétition natation : 50$
 * - Picnic annuel : 10$
 * - Sortie au lac : 20$
 * - Camp de perfectionnement : 150$
 * 
 * Vous devez faire la validation des éléments du formulaire de la manière suivante : 
 * - Le nom et le prénom ne doivent pas être vide
 * - l'age doit être entre 5 et 16 ans
 * - au moins une activité doit être choisie
 * - Des messages doivent être affichées en cas d'erreur  
 * 
 * 
 * Critères de correction :     /35 
 * - Validation des champs :    /10
 * - Affichage des résultats :  /10
 * - Affichage des erreurs :    /5
 * - Code et page sans erreur : /5
 * - Respect des consignes :    /5
 * 
 * NB : Aucun commentaire n'est nécessaire.
 * 
 * Demo : https://jmartel.webdev.cmaisonneuve.qc.ca/p11/natation/index.php
 * 
 * @author Artiom Sinigur
 * @version 1.0
 * @date 2019-02-01

 */
$aErreurs = array();
$nom = '';
$prenom = '';
$age = '';
$activite = [];
$bValide = false;
$aCategories = array(
                    5=>"Grenouille", 
                    6=>"Grenouille", 
                    7=>"Grenouille", 
                    8=>"Poisson rouge", 
                    9=>"Poisson rouge", 
                    10=>"Poisson rouge", 
                    11=>"Baleine", 
                    12=>"Baleine",
                    13=>"Requin",
                    14=>"Requin",
                    15=>"Requin",
                    16=>"Requin");

$aActivites = array( "compe" => array("nom"=> "Compétition de natation", "prix"=>50), 
                    "picnic" => array("nom"=>"Picnic", "prix" => 10),
                    "lac" => array("nom"=>"Sortie au lac", "prix" => 20),
                    "camp" => array("nom"=>"Camp de perfectionnement", "prix" => 150)
 );

if (!empty($_POST)) {
    // Validation de nom
    if(isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    }

    if ($nom == '' || is_numeric($nom)) {
        $aErreurs['nom'] = 'Le nom est vide';
    }

    // Validation de prénom
    if(isset($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
    }

    if ($prenom == '' || is_numeric($prenom)) {
        $aErreurs['prenom'] = 'Le prénom est vide';
    }

    // Validation de group d'âge
    if (isset($_POST['age'])) {
        $age = $_POST['age'];
    }

    if ($age == '' || $age < 5 || $age > 16) {
        $aErreurs['age'] = "L'age doit être comprise entre 5 et 16 ans";
    }

    // Validation activite
    if (isset($_POST['activite'])) {
        $activite = $_POST['activite'];
    }

    if (empty($activite)) {
        $aErreurs['activite'] = 'Vous devez choisir au moins une activité';
    }

    // Calcule le total
    $prixTotal = '';
    if (!empty($activite)) {
        $compt = 0;
        $picnic = 0;
        $lac = 0;
        $camp = 0;
        foreach ($activite as $keyActivite => $valueActivite) {
            if($valueActivite == 'compe') {
                $compt = 50;
                $sActvite = 'Compétition de natation';
            } 
            if ($valueActivite == 'picnic') {
                $picnic = 10;
                $sActvite = 'Picnic annuel';
            }
            if ($valueActivite == 'lac') {
                $lac = 20;
                $sActvite = 'Sortie au lac';
            }
            if ($valueActivite == 'camp') {
                $camp = 150;
                $sActvite = 'Camp de perfectionnement';
            }
        }
        $prix = $compt + $picnic + $lac + $camp;
        $prixTotal = $prix + 50;
    }

    if(empty($aErreurs))
    {
        $bValide = true;
    }

    // foreach ($aActivites as $key => $value) {
    //     if ($activite == $aActivites[$key]) {
    //         # code...
    //         echo '<li>' . $value['nom'] . '</li>';
    //     }
    // }
}

// echo '<pre>';
// var_dump($activite);
// var_dump($_POST);
// echo '</pre>';
 
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Examen final (582-P11)</title>
		<link href="./css/style.css" rel="stylesheet" />
	</head>
	<body>
		<main>
		    <header>
                <h1>Natation</h1>
            </header>
            <article class="formulaire">
                <?php
                if(!empty($aErreurs)) {
                    foreach ($aErreurs as $cle => $sErreur) {
                        echo "<li class='erreur'>" . $sErreur . "</li>";
                    }
                }
                ?>

                <?php
                if ($bValide) {
                ?>
                        <p>Nom :<?php echo $nom ?></p>
                        <p>Prénom : <?php echo $prenom ?></p>
                        <p>Catégorie : <?php echo $age ?></p>
                        <p>Activités : <?php echo $sActvite ?></p>
                        <ul>
                            
                        </ul>
                        <p>Prix : <?php echo $prixTotal ?></p>
                        <p><a href="index.php">Inscrire un autre enfant</a>
                       
                <?php
                } else {
                ?>
                        <form method="post" action="index.php">
                            <div class="grpBouton">
                                <label>Nom : </label>
                                <input type="text" name="nom">
                            </div>
                            <div class="grpBouton">
                                <label>Prénom : </label>
                                <input type="text" name="prenom">
                            </div>
                            <div class="grpBouton">
                                <label>Age (entre 5 et 16): </label>
                                <input type="number" name="age">
                            </div>
                            <div class="grpBouton">
                                <label>Activités (au moins 1): </label>
                                <input type="checkbox" name="activite[]" value="compe">Compétition de natation (50$)<br>
                                <input type="checkbox" name="activite[]" value="picnic">Picnic annuel (10$)<br>
                                <input type="checkbox" name="activite[]" value="lac">Sortie au lac (20$)<br>
                                <input type="checkbox" name="activite[]" value="camp">Camp de perfectionnement (150$)<br>
                                   
                            </div>
                            <button name="bouton" type=submit>Inscrire</button>
                        </form>
                <?php
                }
                ?>
                        
            </article>
            <footer>
                <p>582-P11 - Examen final</p>
            </footer>
		</main>
	</body>
</html>








	