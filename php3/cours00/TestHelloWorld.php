<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
    <?php
        require_once("HelloWorld.php");
        
        //création d'une instance en francais de votre classe HelloWorld
        $monHelloFrancais = new HelloWorld();
        $monHelloFrancais->langue = "francais";
        
        //création d'une instance en anglais de notre classe HelloWorld
        $monHelloAnglais = new HelloWorld();
        $monHelloAnglais->langue = "anglais";
        
        //accéder à un attribut
        echo "La langue d'affichage sera : " . $monHelloFrancais->langue;
        
        //accéder à la méthode direBonjour
        $monHelloFrancais->direBonjour();
        
        
        //avec notre instance en anglais
        echo "La langue d'affichage sera : " . $monHelloAnglais->langue;
        $monHelloAnglais->direBonjour();
        
    ?>
    </body>
</html>