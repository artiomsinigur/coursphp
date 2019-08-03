<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
    <?php
        require_once("Rectangle.php");
        
        //création d'une instance de rectangle
        $monRectangle = new Rectangle(25, 15);
        //$monRectangle->setLongueur(25);
        //$monRectangle->setLargeur(15);
        echo "La longueur du rectangle est : " .$monRectangle->getLongueur();
        echo "<br>";

        echo "L'aire du rectangle est : " .$monRectangle->getAire();
        echo "<br>";
        echo "Le périmètre du rectangle est : " .$monRectangle->getPerimetre();
        echo "<br>";
        if($monRectangle->estCarre())
            echo "Le rectangle est aussi un carré.";
        echo "<br>";
        
        $monDeuxiemeRectangle = new Rectangle(12);
        //$monDeuxiemeRectangle->setLongueur(12);
        //$monDeuxiemeRectangle->setLargeur(12);
        echo "La longueur du rectangle est : " . $monDeuxiemeRectangle->getLongueur();
        echo "<br>";
        echo "L'aire du rectangle est : " .$monDeuxiemeRectangle->getAire();
        echo "<br>";
         echo "Le périmètre du rectangle est : " .$monDeuxiemeRectangle->getPerimetre();
        echo "<br>";
        if($monDeuxiemeRectangle->estCarre())
            echo "Le rectangle est aussi un carré.";
        echo "<br>";
        echo "<br>";
        echo $monRectangle->getDescription();
        echo "<br>";
        echo $monDeuxiemeRectangle->getDescription();
            echo "<br>";
        
        $monCarre = new Rectangle();
        //$monDeuxiemeRectangle->setLongueur(12);
        //$monDeuxiemeRectangle->setLargeur(12);
        echo "La longueur du rectangle est : " . $monCarre->getLongueur();
        echo "<br>";
        echo "L'aire du rectangle est : " .$monCarre->getAire();
        echo "<br>";
         echo "Le périmètre du rectangle est : " .$monCarre->getPerimetre();
        echo "<br>";
        if($monCarre->estCarre())
            echo "Le rectangle est aussi un carré.";
        echo "<br>";
        echo "<br>";
        echo $monCarre->getDescription();
       
        
    ?>
    </body>
</html>