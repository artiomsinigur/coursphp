<html>
    <head>
        <meta charset='utf-8'>
        <title>Formulaire d'ajout d'un joueur</title>
    </head>
    <body>
        <h1>Ajout d'un joueur</h1>
        <form method="POST" action="index.php">
            Nom joueur : <input type="text" name="nom"><br>
            Prenom joueur : <input type="text" name="prenom"><br>
            Selectionner une équipe : 
            <select name="équipe" id="">
                <!-- Afficher les équipes avec un boucle-->
                <option value="équipe1">Équipe1</option>
                <?php
                while($rangee = mysqli_fetch_assoc($donnees)) {

                    echo "<option value='" . $rangee["id"] . "'>" . $rangee["nom"] . "</option>";

                    echo "<li>" . $rangee["nom"] . "</li>";
                }
                ?>
            </select>
            <input type="hidden" name="action" value='AjoutEquipe'/><br>
            <input type="submit" value="Ajouter"/>
        </form>
        <span><?php if(isset($erreurs)) echo $erreurs; ?></span>
    </body>    
</html>