<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    $connexion = mysqli_connect('localhost', 'root', '', 'ecole');
    if (!$connexion) {
        trigger_error("Erreur de connexion: " . mysqli_connect_error());
    } else {
        $requete = "SELECT nom, prenom FROM etudiant";
        $resultat = mysqli_query($connexion, $requete);
        // $rangee = mysqli_fetch_assoc($resultat);
        while ($rangee = mysqli_fetch_assoc($resultat)) {
            echo("<li>");
            echo($rangee["nom"] . " " . $rangee["prenom"]);
            echo("</li>");
        }
    }
    ?>
</body>
</html>