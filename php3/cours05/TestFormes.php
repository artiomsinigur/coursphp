<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
        <?php
            require_once("Forme.php");
            $uneForme = new Rectangle(10, 20);
            $unCercle = new Cercle(25);
 
            $maCollection = new CollectionFormes();
            $maCollection->ajouteForme($uneForme);
            $maCollection->ajouteForme($unCercle);
            $maCollection->afficheContenu();
        ?>
    </body>
</html>    