<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
    <?php
        require_once("Rectangle.php");
        
        //création d'une instance de rectangle
        $monCarre = new Carre(25);
        //$monRectangle->setLongueur(25);
        //$monRectangle->setLargeur(15);
        echo "La longueur du carré est : " .$monCarre->getLongueur();
        echo "<br>";

        echo "L'aire du carré est : " .$monCarre->getAire();
        echo "<br>";
        echo "Le périmètre du carré est : " .$monCarre->getPerimetre();
        echo "<br>";
        if($monCarre->estCarre())
            echo "Le carré est aussi un carré.";
        echo "<br>";
       
        
    ?>
    </body>
</html>