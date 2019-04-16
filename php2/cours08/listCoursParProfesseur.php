<?php
    // if (isset($_GET['idProf'])) {
    //     $idProf = $_GET['idProf'];
    // } else {
    //     // Rediriger vers la page listCoursParProfesseur.php
    //     // header('Location: listCoursParProfesseur.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste cours par professeurs</title>
</head>
<body>
    <h1>La liste des professeurs</h1>
    <?php
    // 1. Etablir la connextion a la base de donnees
    $connexion = mysqli_connect('localhost', 'root', '', 'ecole');
    if (!$connexion) {
        triger_error("Erreur de connexion : " . mysqli_connect_error());
    } else {
        // 2. On selectionne la base de donnees
        $selection = mysqli_select_db($connexion, 'ecole');

        if (!$selection) {
            trigger_error("La base de donnees n'existe pas");
        } else {
            // 3. Effectuer la/les requetes SQL 
            // TESTER LA REQUETE DANS PHPMYADMIN
            $idProf = 2;
            $requete = "SELECT sigle, titre FROM cours WHERE idProfesseur = $idProf";
            $resultat = mysqli_query($connexion, $requete);

            // Boucle pour la lecture des rangees
            while ($rangee = mysqli_fetch_assoc($resultat)) {
                echo '<li>';
                echo($rangee['sigle'] . '-' . $rangee['titre']);
                echo '</li>';
            }
        }
    }
    ?>
</body>
</html>