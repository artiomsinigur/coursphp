<html>
    <head>
        <meta charset="utf-8">
        <title>Liste des professeurs</title>
    </head>
    <body>
        <h1>Liste des professeurs</h1>
        <?php
            try
            {
                //1. Établir la connexion au serveur de base de données (3 paramètres : chaineConnexion, username, password)
                $connexion = new PDO("mysql:host=localhost;dbname=ecole", "root", "");
                //configurer PDO pour qu'il génère des exceptions sur les requêtes invalides
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
                $requete = "SELECT id, nom, prenom FROM professeur";
                $resultats = $connexion->query($requete);

                echo "<ul>";
                //boucle de lecture des rangées
                foreach($resultats as $rangee)
                {
                    echo "<li>";
                    echo "<a href='ListeCoursParProfesseurPDO.php?idProf=" . $rangee["id"] . "'>";
                    echo $rangee["prenom"] . " " . $rangee["nom"];
                    echo "</a>";
                    echo "</li>";
                }
                echo "</ul>";

                echo $resultats->rowCount() . " professeurs.";         
            
            }
            catch(PDOException $e)
            {
                echo "Message de l'erreur : " . $e->getMessage()."<br>";
                echo "Code de l'erreur : " . $e->getCode()."<br>";
                echo "Ligne de l'erreur : " . $e->getLine()."<br>";
                echo "Fichier de l'erreur : " . $e->getFile()."<br>";
                echo "Trace de l'erreur : " . $e->getTraceAsString()."<br>";
            }
        ?>
    </body>
</html>


