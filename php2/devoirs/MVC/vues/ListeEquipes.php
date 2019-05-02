<?php 
    $sort = $_POST["sort"] ?? "";    
?>
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
                <th><a href="index.php?action=sortByColumn&sort='nom'">Nom équipe</a></th>
                <th><a href="index.php?action=sortByColumn&sort='ville'">Ville</a></th>
                <th><a href="index.php?action=sortByColumn&sort='nbVictoire'">Nb. Victoires</th>
                <th>Trier par:
                <form action="index.php" method="POST">
                    <select name="sort">
                        <option value="nom"<?= ($sort == "nom") ? "selected" : ""?>>Nom équipe</option>
                        <option value="ville"<?= ($sort == "ville") ? "selected" : ""?>>Ville</option>
                        <option value="nbVictoire"<?= ($sort == "nbVictoire") ? "selected" : ""?>>Nb. Victoires</option>
                    </select>
                    <button type="submit" name="action" value="sortBy">Trier</button>
                </form>
                </th>
            </tr>
        <?php
            foreach($donnees as $row) {
                echo "<tr>";
                echo "<td><a href='index.php?action=ListeJoueursParEquipe&idE=" . $row["id"] . "'>" . $row["nom"] . "</a></td>";
                echo "<td>" . $row["ville"] . "</td>";
                echo "<td>" . $row["nbVictoire"] . "</td>";
                echo "<td><a href='index.php?action=supprimerEquipe&idEquipe=" . $row["id"] . "'>" . "Supprimer l'équipe</a></td>";
                echo "</tr>";
            }
        ?>
        </table>
        <a href="index.php?action=FormAjoutEquipe">Ajouter une équipe</a>
        <a href="index.php?action=Accueil">Retourner à l'accueil</a>
    </body>
</html>