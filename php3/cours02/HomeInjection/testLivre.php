<!DOCTYPE html>
<body>
    <?php
    require_once('Auteur.php');

    $auteur1 = new Auteur;
    $auteur1->$nom = 'Stephan';

    echo $auteur1->$nom;
    echo $auteur1->getNom();
    
    ?>
</body>
</html>