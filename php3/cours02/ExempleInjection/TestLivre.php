<html>
    <body>
    <?php
        require_once("Livre.php");
        
        $auteurs =  array();
        $auteurs[] = new Auteur("Stephen", "King", "20/01/57", "Drummondville");
        $auteurs[] = new Auteur("Dean", "Koontz", "10/03/51", "Chicoutimi");
        
        $monLivre = new Livre("The Talisman", 30, $auteurs);
        echo $monLivre->getDescription();
        ?>
    </body>
</html>