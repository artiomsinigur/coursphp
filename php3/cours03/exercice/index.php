<?php
    require_once 'Equipe.php';
    require_once 'Joueur.php';
    require_once 'Participant.php';

    $canadiens = new Equipe('Canadiens', 'Montréal');
    $rangers = new Equipe('Rangers', 'New York');

    // $joueurs = [];
    $ronaldo = new Joueur('Cristi', 'Ronaldo', 10, 5, $canadiens);
    $messi = new Joueur('Leo', 'Messi', 25, 10, $canadiens);
    $tores = new Joueur('Fernando', 'Tores', 15, 3, $rangers);

    echo $messi->getDesc();
    echo '<hr>';

    $part1 = new Participant('Artiom', 'Sinigur', [
        $ronaldo,
        $messi
    ]);

    $part2 = new Participant('Bernard', 'Dubois', [
        $tores
    ]);

    // $tabParticipants = [$part1, $part2];

    var_dump($part1->calculePoints());

    // var_dump($part1->calculeMoyennePoints());


?>