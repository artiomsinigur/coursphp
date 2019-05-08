<?php
    //démarrage ou la récupération de la session
    session_start();
?>
<html>
    <body>
        <h1>Affichage du contenu des variables sessions</h1>
        <?php
            //affichage de toutes les variables sessions
            var_dump($_SESSION);
        
            //vérification de l'existence d'une variable session spécifique nommée message
            if(isset($_SESSION["message"]))
                echo "Contenu du message : " . $_SESSION["message"];
            else
                echo "Il n'y a pas de variable session nommée message.";
        ?>
        <a href="EcritureSession.php">Retourner à l'écriture</a>
    </body>
</html>