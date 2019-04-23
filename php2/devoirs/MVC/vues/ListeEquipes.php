<html>
    <head>
        <meta charset='utf-8'>
        <title>Liste des équipes</title>
    </head>
    <body>
        <h1>Liste des équipes</h1>
        <ul>
        <?php
            //affichage dynamique des équipes
            while($rangee = mysqli_fetch_assoc($donnees))
            {
                echo "<li><a href='index.php?action=ListeJoueursParEquipe&idE=" . $rangee["id"] . "'>" . $rangee["nom"] . " de " . $rangee["ville"] . "</a></li>";   
            }
        ?>            
        </ul>
        <a href="index.php?action=FormAjoutEquipe">Ajouter une équipe</a>
        <a href="index.php?action=Accueil">Retourner à l'accueil</a>
    </body>
</html>