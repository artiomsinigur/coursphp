<html>
    <head>
        <meta charset='utf-8'>
        <title>Liste des équipes</title>
    </head>
    <body>
        <h1>Liste des équipes</h1>
        <ul>
        <table>
            <tr>
                <th>Nom équipe</th>
                <th>Ville</th>
            </tr>
        <?php
            foreach($donnees as $row) {
                echo "<tr>";
                echo "<td><a href='index.php?action=ListeJoueursParEquipe&idE=" . $row["id"] . "'>" . $row["nom"] . "</a></td>";
                echo "<td>" . $row["ville"] . "</td>";
                echo "<td><a href='index.php?action=supprimerEquipe&idEquipe=" . $row["id"] . "'>" . "Supprimer l'équipe</a></td>";
                echo "</tr>";
            }
        ?>
        </table>
        <a href="index.php?action=FormAjoutEquipe">Ajouter une équipe</a>
        <a href="index.php?action=Accueil">Retourner à l'accueil</a>
    </body>
</html>