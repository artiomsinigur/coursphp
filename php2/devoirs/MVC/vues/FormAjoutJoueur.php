<?php
    $nom = $_POST["nom"] ?? "";
    $prenom = $_POST["prenom"] ?? "";
    $idEquipe = $_POST["idEquipe"] ?? "";
?>

<html>
    <head>
        <meta charset='utf-8'>
        <title>Formulaire d'ajout d'un joueur</title>
    </head>
    <body>
        <h1>Ajout d'un joueur</h1>
        <form method="POST" action="index.php">
            Nom joueur : <input type="text" name="nom" value="<?=$nom?>"><br>
            Prenom joueur : <input type="text" name="prenom" value="<?=$prenom?>"><br>
            Selectionner une équipe : 
            <select name="idEquipe">
                <?php
                foreach($donnees as $rangee) {
                    $selected = $rangee["id"] == $idEquipe ? "selected" : "";
                    echo "<option value='" . $rangee["id"] . "' $selected>" . $rangee["nom"] . "</option>";
                }
                ?>
            </select>
            <!-- <input type="hidden" name="action" value='AjoutJoueur'/> -->
            <!-- <input type="submit" value="Ajouter"/> -->
            <button type="submit" name="action" value="AjoutJoueur">Ajout ajouer</button>
        </form>
        <span><?php if(isset($erreurs)) echo $erreurs; ?></span>
    </body>
</html>
