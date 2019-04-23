<html>
    <head>
        <meta charset='utf-8'>
        <title>Liste des joueurs</title>
    </head>
    <body>
        <h1>Liste des joueurs</h1>
        <table>
            <tr><th>ID</th><th>Prénom</th><th>Nom</th></tr>
        <?php
            //affichage dynamique des équipes
            while($rangee = mysqli_fetch_assoc($donnees))
            {
                echo "<tr>";
                echo "<td>" . $rangee["id"] . "</td>";
                echo "<td>" . $rangee["prenom"] . "</td>";
                echo "<td>" . $rangee["nom"] . "</td>";
                echo "</tr>";
            }
        ?>            
        </table>
        <a href="index.php?action=Accueil">Retourner à l'accueil</a><br>
        <a href="index.php?action=ListeEquipes">Retourner à la liste des équipes</a>
    </body>
</html>