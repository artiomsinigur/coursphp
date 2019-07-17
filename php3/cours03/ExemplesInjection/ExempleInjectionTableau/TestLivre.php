<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
    <?php
        require_once("Livre.php");
        
        $monAuteur1 = new Auteur("Stephen", "King", "10/10/1950");
        $monAuteur2 = new Auteur("Dean", "Koontz", "10/10/1950");
        $tabAuteurs = [$monAuteur1, $monAuteur2];
        $monLivre = new Livre("Talisman", 20, $tabAuteurs);
        echo $monLivre->getDescription();
        ?>
    </body>
</html>