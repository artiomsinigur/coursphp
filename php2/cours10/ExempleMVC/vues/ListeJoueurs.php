<html>
    <head>
        <meta charset='utf-8'>
        <title>Liste des joueurs</title>
    </head>
    <body>
        <h1>Liste des joueurs</h1>
        <table>
            <tr><th>Prénom</th><th>Nom</th><th>Équipe</th><th>Ville</th></tr>
        <?php
            //affichage dynamique des équipes
            while($rangee = mysqli_fetch_assoc($donnees))
            {
                echo "<tr>";
                echo "<td>" . $rangee["prenom"] . "</td>";
                echo "<td>" . $rangee["nomJoueur"] . "</td>";
                echo "<td>" . $rangee["nomEquipe"] . "</td>";   
                echo "<td>" . $rangee["ville"] . "</td>";
                echo "</tr>";
            }
        ?>            
        </table>
        <a href="index.php?action=Accueil">Retourner à l'accueil</a>
    </body>
</html>