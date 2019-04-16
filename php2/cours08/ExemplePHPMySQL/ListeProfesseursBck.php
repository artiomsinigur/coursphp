<html>
    <head>
        <meta charset="utf-8">
        <title>Liste des professeurs</title>
    </head>
    <body>
        <h1>Liste des professeurs</h1>
        <?php
            //1. Établir la connexion au serveur de base de données
            $connexion = mysqli_connect("localhost", "root", "");
        
            //vérifier si la connexion a fonctionné
            if(!$connexion)
            {
                trigger_error("Erreur de connexion : " . mysqli_connect_error());
            }
            else
            {
                //2. On sélectionne la base de données
                $selection = mysqli_select_db($connexion, "ecole");
                
                if(!$selection)
                {
                    trigger_error("La base de données n'existe pas.");
                }
                else
                {
                    //3. Effectuer la / les requêtes SQL dont vous voulez afficher les résultats. TESTEZ LA REQUÊTE AVANT DANS PHPMYADMIN!!!
                    $requete = "SELECT id, nom, prenom FROM professeur";
                    $resultat = mysqli_query($connexion, $requete);
                    
                    echo "<ul>";
                    //boucle de lecture des rangées
                    while($rangee = mysqli_fetch_assoc($resultat))
                    {
                        echo "<li>";
                        echo $rangee["prenom"] . " " . $rangee["nom"];
                        echo "</li>";
                    }
                    echo "</ul>";
                    
                    echo mysqli_num_rows($resultat) . " professeurs.";
                }
            }
        ?>
    </body>
</html>


