<!DOCTYPE html>
<html>
<body>
    <?php
        require_once('poo.php');

        $frodo = new Personnage('Frodo');
        $frodo->getVie();
        
        $sauron = new Personnage('Sauron');
        $frodo->attaquer($sauron);
        $sauron->regenerer();

        var_dump($frodo);
        var_dump($sauron);

        // Propriétés et Méthodes statiques
        var_dump(Text::publicAddZero(5));

        // L'héritage
        $legolas = new Archer('Legolas');
        $legolas->attaquer($sauron);
        var_dump($legolas);
        var_dump($sauron);
       
    ?>
</body>
</html>