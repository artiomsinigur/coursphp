<?php

/**
 * 582-P11 - Exercice sur les formulaires (5%)
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
 * @author Jonathan Martel
 * @version 1.0
 * @date 2019-01-17
 * 
 */

// Tableau qui contiendra les messages d'erreur
$aErreurs = array();
// Pré-initialisation de la variable de résultat du calcul
$calcul =0;

// Si la requête HTTP contient un post : Dans le cas où le formulaire a été soumis (similaire à isset($_POST))
if(!empty($_POST))
{
    // Pré-initialisation des variables pour éviter les "Notices" 
    $rayon = 0;
    $choix = '';

    // Lecture des données envoyées en post, vérification de l'existence de la clé, ensuite copie de la valeur dans la variable.
    if(isset($_POST['rayon']))
    {
        $rayon = $_POST['rayon'];
    }
    
    if(isset($_POST['choix']))
    {
        $choix = $_POST['choix'];
    }
    
    // Si le rayon est positif
    if($rayon > 0)
    {
        // Selon le choix fait
        switch ($choix) {
            case 'aire':
                $calcul = $rayon * $rayon * pi();
                break;
             case 'perimetre':
                $calcul = $rayon * 2 * pi();
                break;
            
        }
    }
    else {
        $aErreurs[] = 'Le rayon doit être une valeur supérieure à 0';   // Ajout du message d'erreur dans le tableau si le rayon n'est pas > 0
    }
    // vérification que le choix est "aire" ou "perimetre"
    if(!($choix == 'aire' || $choix == 'perimetre'))
    {
        $aErreurs[] = 'Vous devez sélectionner une opération de calcul (aire ou périmètre)'; // ajout du message d'erreur dans le tableau
    }
    
   
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
                <?php
                    // Si le tableau d'erreur n'est pas vide
                    if(!empty($aErreurs))
                    {
                        // Afficher séquentiellement les erreurs du tableau dans une liste à puce
                        echo "<ul class='erreur'>";
                        foreach ($aErreurs as $sErreur) 
                        {
                            echo "<li>". $sErreur ."</li>";    
                        }
                        echo "</ul>";
                    }
                    // Si le résultat du calcul est valide, affiche le résultat
                    if($calcul != 0)
                    {
                        echo "<p>". ($choix=='aire' ? "L'aire est : " : "Le périmètre est : " ). $calcul  ."</p>";
                    }
                
                ?>
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








	