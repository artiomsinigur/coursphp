<?php
    $nom = $_POST["nom"] ?? "";
    $ville = $_POST["ville"] ?? "";
?>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Formulaire d'ajout d'une équipe</title>
    </head>
    <body>
        <h1>Ajout d'équipe</h1>
        <form method="POST" action="index.php">
            Nom de l'équipe : <input type="text" name="nom" value="<?= $nom ?>"/><br>
            Ville de l'équipe : <input type="text" name="ville" value="<?= $ville ?>"/><br>
            <input type="hidden" name="action" value='AjoutEquipe'/><br>
            <input type="submit" value="Ajouter"/>
        </form>
        <span><?php if(isset($erreurs)) echo $erreurs; ?></span>
    </body>    
</html>