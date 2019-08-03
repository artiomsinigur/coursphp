<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
    <?php
        require_once("Rectangle.php");
        
        //création d'une instance de rectangle
        $monRectangle = new Rectangle();
        $monRectangle->longueur = 25;
        $monRectangle->largeur = 15;
        echo "La longueur du rectangle est : " .$monRectangle->getLongueur();
        echo "<br>";

        echo "L'aire du rectangle est : " .$monRectangle->getAire();
        echo "<br>";
        echo "Le périmètre du rectangle est : " .$monRectangle->getPerimetre();
        echo "<br>";
        if($monRectangle->estCarre())
            echo "Le rectangle est aussi un carré.";
        echo "<br>";
        
        $monDeuxiemeRectangle = new Rectangle();
        $monDeuxiemeRectangle->longueur = 12;
        $monDeuxiemeRectangle->largeur = 12;
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
        
    ?>
    </body>
</html>