<?php
    require_once('Sportif.php');
    require_once('JoueurTerrain.php');
    require_once('GardienBut.php');
    require_once('Equipe.php');

    $tomasTatar = new JoueurTerrain('Tomas', 'Tatar', '01-12-90', 25, 33);
    $maxDomi = new JoueurTerrain('Max', 'Domi', '02-03-95', 28, 44);
    $jeffPetry = new JoueurTerrain('Jeff', 'Petry', '09-09-87', 13, 33);
    // $maxDomi->getDesc();
    
    $gareyPrice = new GardienBut('Garey', 'Price', '16-08-87', 0, 1, 35, 1952, 3880, 161);

    $canadiens = new Equipe('Canadiens', [$tomasTatar, $maxDomi, $jeffPetry, $gareyPrice]);
    $canadiens->showDescEquipe();
?>

<html>

</html>