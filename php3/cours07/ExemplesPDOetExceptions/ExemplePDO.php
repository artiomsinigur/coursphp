<html>
    <body>
        <?php
            $username = "root";
            $password = "";
            try
            {
                $connexion = new PDO("mysql:host=localhost;dbname=ligue", $username, $password);
                //forcer PDO à générer des exceptions pour les erreurs de requête SQL
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $requete = "SELECT nom, prenom FROM joueur";
                $resultats = $connexion->query($requete);
                
                echo "<h1>Liste des joueurs</h1>";
                echo "<ul>";
                foreach($resultats as $joueur)
                {
                    echo "<li>" . $joueur["prenom"] . " " . $joueur["nom"] . "</li>";
                }
                echo "</ul>";
                
                echo "Nombre de joueurs : " . $resultats->rowCount();
                
            }
            catch(PDOException $e)
            {
                echo "Message d'erreur : " . $e->getMessage() . "<br>";
                echo "Ligne de l'erreur : " . $e->getLine() . "<br>";
                echo "Code de l'erreur : " . $e->getCode() . "<br>";
                echo "Fichier de l'erreur : " . $e->getFile() . "<br>";
                echo "Trace de l'erreur : " . $e->getTraceAsString() . "<br>";
            }
        
    
        ?>
    </body>
</html>