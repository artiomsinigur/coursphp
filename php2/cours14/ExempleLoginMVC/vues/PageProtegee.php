<html>
    <body>
        <h1>Vous êtes l'usager <?= $_SESSION["usager"] ?> et votre bio suit plus bas.</h1>
        <?php if(isset($bio)) echo "<p>$bio</p>"; ?>
        Modifier la bio : <form action="index.php" method="POST">
            <input type="hidden" name="action" value="SauvegardeBio"/>
            <textarea name="bio"><?= $bio ?></textarea>
            <input type="submit" value="Sauvegarder"/>
        </form>
        <a href='index.php?action=Logout'>Logout</a>
    </body>
</html>