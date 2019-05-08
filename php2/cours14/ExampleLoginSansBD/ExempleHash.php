<?php
    if(isset($_POST["password"]))
    {
        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }
?>
<html>
    <body>
        <form method="post">
            Mot de passe : <input type="text" name="password"/><br>
            <input type="submit" value="Encrypter"/>
        </form>
        <?php
            if(isset($hashed_password))
                echo $hashed_password;
        ?>
    </body>
</html>