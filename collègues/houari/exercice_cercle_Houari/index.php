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
 * @author {Houari Djedaini}
 * @version 1.0
 * @date 2019-01-17
 * 
 */

    


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

            <?php 

                if (isset($_POST["bouton"])) 
                {
                    $bTestRayon = false; 
                    $bTestChoix = false; 

                    if (!isset($_POST["rayon"])) 
                    {
                        echo "<ul style=\"color:red;\"><li>Le rayon doit être une valeur supérieure à 0</li>";
                    }
                    else 
                    {
                        if(!is_numeric($_POST["rayon"])  || $_POST["rayon"] <= 0) {

                            echo "<ul style=\"color:red;\" ><li>Le rayon doit être une valeur supérieure à 0</li></ul>";
                        }
                        else {                        
                            $bTestRayon = true; 
                        }
                    }

                    if (!isset($_POST["choix"])) 
                    {
                        echo "<ul style=\"color:red;\"><li>Vous devez sélectionner une opération de calcul (aire ou périmètre)</li></ul>";
                    }
                    else
                    {
                        $bTestChoix = true; 
                    }

                    
                    if($bTestRayon && $bTestChoix){
                        $nRayon = $_POST["rayon"];
                        $sChoix = $_POST["choix"];
                        if($sChoix==="perimetre")
                        {
                            $nPerimetre = $nRayon*2*pi();
                            echo "<br>Le périmètre est : ".$nPerimetre;
                        }
                        else 
                        {
                            $nAire = $nRayon*$nRayon*pi();
                            echo "<br>L'aire est : ".$nAire;
                        }

                    }

                }


                

            ?>


            <article class="formulaire">
        		<form method="post" action="index.php">
        		    <div class="grpBouton">
                        <label>Rayon du cercle : </label>
                        <input type="text" name="rayon">
        			</div>
        			<div class="grpBouton">
        			    <label>Choix du calcul : </label>
                        <input type="radio" name="choix" value="perimetre">Périmètre
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








	