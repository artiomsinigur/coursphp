<?php
    $nom = $_POST["nom"] ?? "";
    $prenom = $_POST["prenom"] ?? "";
    // $idJoueur = $_GET["idJoueur"] ?? "";
    $idEquipe = $_POST["idEquipe"] ?? "";
?>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Formulaire de modification d'un joueur</title>
        <style>
            td {text-align: left;}
            th {text-align: right;}
        </style>
    </head>
    <body>
        <h1>Formulaire de modification d'un joueur</h1>
        <form method="POST" action="index.php">
            <table>
                <tr>
                    <th>Nom joueur :</th>
                    <td><input type="text" name="nom" value="<?=$nom?>"></td>
                </tr>
                <tr>
                    <th>Prenom joueur :</th>
                    <td><input type="text" name="prenom" value="<?=$prenom?>"></td>
                </tr>
                <tr>
                <?php foreach ($donneesJoueur as $row):?>
                    <td><input type="hidden" name="idJoueur" value="<?=$row["idJoueur"]?>"></td>
                    <!-- <th>Équipe actuelle :</th> -->
                    <!-- Essayer d'afficher l'équipe actuelle -->
                <?php endforeach;?>
                </tr>
                <tr>
                <th>Équipe :</th>
                <td>
                <select name="idEquipe">
                    <option value="">Sélectionnez</option>
                    <?php
                    foreach($donneesEquipe as $rangee) {
                        $selected = $rangee["id"] == $idEquipe ? "selected" : "";
                        echo "<option value='" . $rangee["id"] . "' $selected>" . $rangee["nom"] . "</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="action" value="SauvegarderJoueur">Sauvegarder</button>
                </td>
                </tr>
            </table>
        </form>
        <span><?php if(isset($erreurs)) echo $erreurs; ?></span>
    </body>
</html>