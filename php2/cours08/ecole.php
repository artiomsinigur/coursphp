<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des professeurs</title>
</head>
<body>
    <h1>La liste des professeurs</h1>
    <?php
    // 1. Etablir la connextion a la base de donnees
    $connexion = mysqli_connect('localhost', 'root', '', 'ecole');
    if (!$connexion) {
        triger_error("Erreur de connexion : " . mysqli_connect_error());
    } else {
        // echo('La connexion est fonctionnelle');
        // 2. On selectionne la base de donnees
        $selection = mysqli_select_db($connexion, 'ecole');

        if (!$selection) {
            trigger_error("La base de donnees n'existe pas");
        } else {
            // 3. Effectuer la/les requetes SQL 
            // TESTER LA REQUETE DANS PHPMYADMIN 
            $requete = 'Select id, nom, prenom FROM professeur';
            // $noteEtudiant = '
            // SELECT prenom, note 
            // FROM etudiant
            // JOIN notes ON notes.idEtudiant = etudiant.code';
            $resultat = mysqli_query($connexion, $requete);
            // $resultatNotes = mysqli_query($connexion, $noteEtudiant);
            // var_dump($resultat);

            // Boucle pour la lecture des rangees
            while ($rangee = mysqli_fetch_assoc($resultat)) {
                echo '<li>';
                echo($rangee['prenom'] . '' . $rangee['nom']);
                echo '</li>';
            }
            // Afficher le nombre des professieurs
            // echo(mysqli_num_rows($resultat) . ' professeurs');
        }
    }
    ?>
</body>
</html>