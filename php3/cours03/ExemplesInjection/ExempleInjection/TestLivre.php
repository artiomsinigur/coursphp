<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
    <?php
        require_once("Livre.php");
        
        $monAuteur = new Auteur("Stephen", "King", "10/10/1950");
        $monLivre = new Livre("Carrie", 20, $monAuteur);
        echo $monLivre->getDescription();
        ?>
    </body>
</html>