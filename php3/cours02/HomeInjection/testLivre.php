<!DOCTYPE html>
<body>
    <?php
    require_once('Livre.php');
    require_once('Auteur.php');

    $auteurs[] = new Auteur('Peter', 'Jackson', '01/03/1963');
    $auteurs[] = new Auteur('Stephan', 'King', '01/05/1957');
    // $auteurs[] = ['Hello'];
    
    $livre = new Livre('The lord of the rings', '45$', $auteurs);

    echo $livre->getDesc();
    var_dump($auteurs);
    
    ?>
</body>
</html>