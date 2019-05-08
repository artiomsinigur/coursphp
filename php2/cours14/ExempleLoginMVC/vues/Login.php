<html>
    <body>
        <form method="post">
            Nom d'usager : <input type="text" name="username"/><br>
            Mot de passe : <input type="text" name="password"/><br>
            <input type="hidden" name="action" value="Verifier"/>
            <input type="submit" value="login"/>
        </form>
        <?php
            if(isset($erreurs))
                echo "<p>$erreurs</p>";
        ?>
    </body>
</html>