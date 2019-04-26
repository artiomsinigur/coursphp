<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <!-- $requete = "SELECT nom, prenom FROM etudiant JOIN notes n ON n.idEtudiant = etudiant.code"; -->
    <?php
    // 1. Etablir la connexion
    $connection = mysqli_connect("localhost", "root", "", "ecole");
    
    // 2. Vérifier la connexion
    if (!$connection) {
        $error = trigger_error("Erreur de connexion: " . mysqli_connect_error());
    } else {
        // 3. Effectuer la requête
        $query = "SELECT c.titre, e.code
        FROM etudiant e
        JOIN notes n ON n.idEtudiant = e.code
        JOIN cours c ON n.sigleCours = c.sigle
        GROUP BY code";
        $result = mysqli_query($connection, $query);
        
        // 4. Vérifier la requête
        if ($result) {
            // 5. Affichier le resultat
            // $etudiant = mysqli_fetch_all($result);
            // $etudiant = mysqli_fetch_assoc($result);
            // $etudiant = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo "<a href='listeEtudiantsParCours.php?codeEtudiant=" . $row['code'] . "'>";
                echo $row['titre'];
                echo "</li>";
            }
            // var_dump($etudiant);
        } else {
            $error = trigger_error("Erreur de la requête: " . mysqli_error($connection));
        }
    }
    ?>

</body>
</html>