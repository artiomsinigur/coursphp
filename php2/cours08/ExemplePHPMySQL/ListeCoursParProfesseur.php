<?php
    if(isset($_GET["idProf"]))
        $idProf = $_GET["idProf"];
    else
    {
        //rediriger le client vers la page ListeProfesseursSimple.php
        header("Location: ListeProfesseurs.php");
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liste des cours par professeur</title>
    </head>
    <body>
        <h1>Liste des cours</h1>
        <?php
            //1. Établir la connexion au serveur de base de données
            $connexion = mysqli_connect("localhost", "root", "", "ecole");
        
            //vérifier si la connexion a fonctionné
            if(!$connexion)
            {
                trigger_error("Erreur de connexion : " . mysqli_connect_error());
            }
            else
            {               
                 //3. Effectuer la / les requêtes SQL dont vous voulez afficher les résultats. TESTEZ LA REQUÊTE AVANT DANS PHPMYADMIN!!!
                $requete = "SELECT sigle, titre FROM cours WHERE idProfesseur = $idProf";
                $resultat = mysqli_query($connexion, $requete);

                echo "<table><tr><th>Sigle</th><th>Titre</th></tr>";
                //boucle de lecture des rangées
                while($rangee = mysqli_fetch_assoc($resultat))
                {
                    echo "<tr>";
                    echo "<td>" . $rangee["sigle"] . "</td><td>" . $rangee["titre"] . "</td>";
                    echo "</tr>";
                }
                echo "</table><br>";

                echo mysqli_num_rows($resultat) . " cours.";                       
            }
        ?>
        <br><a href='ListeProfesseurs.php'>Retourner à la liste des professeurs</a>
    </body>
</html>


