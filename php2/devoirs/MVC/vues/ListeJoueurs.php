<html>
    <head>
        <meta charset='utf-8'>
        <title>Liste des joueurs</title>
    </head>
    <body>
        <h1>Liste des joueurs</h1>
        <table>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Équipe</th>
                <th>Ville</th>
            </tr>
        <?php
            // affichage dynamique des équipes
            foreach($donnees as $rangee)
            {
                echo "<tr>";
                echo "<td>" . $rangee["prenom"] . "</td>";
                echo "<td>" . $rangee["nomJoueur"] . "</td>";
                echo "<td>" . $rangee["nomEquipe"] . "</td>";
                echo "<td>" . $rangee["ville"] . "</td>";
                echo "<td><a href='index.php?action=supprimerJoueur&idJoueur=" . $rangee["idJoueur"] . "'>Supprimer le joueur</a></td>";
                echo "<td><a href='index.php?action=FormModifierJoueur&idJoueur=" . $rangee["idJoueur"] . "'>Modifier le joueur</a></td>";
                echo "</tr>";
            }
        ?>
        </table>
        <a href="index.php?action=Accueil">Retourner à l'accueil</a>
        <a href="index.php?action=FormAjoutJoueur">Ajouter un joueur</a>
    </body>
</html>