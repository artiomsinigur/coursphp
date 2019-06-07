<html>
    <body>
        <form method="POST">
            Nom d'usager : <input type="text" name="username"/><br>
            Mot de passe : <input type="text" name="password"/><br>
            <input type="hidden" name="action" value="authentication"/>
            <input type="submit" value="login"/>
        </form>
        <?php
            if(!empty($errors))
                echo "<p>$errors</p>";
        ?>
    </body>
</html>