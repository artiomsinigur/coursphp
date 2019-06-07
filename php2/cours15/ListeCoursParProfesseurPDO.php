<?php
    if(isset($_GET["idProf"]))
        $idProf = $_GET["idProf"];
    else
    {
        //rediriger le client vers la page ListeProfesseursSimple.php
        header("Location: ListeProfesseursPDO.php");
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
        
             try
            {
                //1. Établir la connexion au serveur de base de données (3 paramètres : chaineConnexion, username, password)
                $connexion = new PDO("mysql:host=localhost;dbname=ecole", "root", "");
                //configurer PDO pour qu'il génère des exceptions sur les requêtes invalides
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
                 //3. Effectuer la / les requêtes SQL dont vous voulez afficher les résultats. TESTEZ LA REQUÊTE AVANT DANS PHPMYADMIN!!!
                $requete = "SELECT sigle, titre FROM cours WHERE idProfesseur = :idP";
                $requetePreparee = $connexion->prepare($requete);
                $requetePreparee->bindParam(":idP", $_GET["idProf"]);
                $requetePreparee->execute();
                 
                $resultats = $requetePreparee->fetchAll();

                echo "<table><tr><th>Sigle</th><th>Titre</th></tr>";
                //boucle de lecture des rangées
                foreach($resultats as $rangee)
                {
                    echo "<tr>";
                    echo "<td>" . $rangee["sigle"] . "</td><td>" . $rangee["titre"] . "</td>";
                    echo "</tr>";
                }
                echo "</table><br>";

                echo $requetePreparee->rowCount() . " cours.";                       
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
        <br><a href='ListeProfesseursPDO.php'>Retourner à la liste des professeurs</a>
    </body>
</html>


