<!DOCTYPE html>
<html>
<head>
    <title>Pool hokey</title>
</head>
<body>
    <?php
        require_once('Equipe.php');
        require_once('Joueur.php');
        require_once('Participant.php');

        // Equipes
        $canadiens = new Equipe('Canadiens', 'Montréal');
        $sharks = new Equipe('Sharks', 'San José');
        
        // Joueurs (nom, prénom, équipe, passes, buts)
        $joueur1 = new Joueur('Leo', 'Messi', $canadiens, 25, 10);
        $joueur2 = new Joueur('Fernando', 'Torres', $sharks, 20, 15);
        $joueur3 = new Joueur('Anatol', 'Beiron', $sharks, 50, 5);
        $joueurs = [$joueur1, $joueur2, $joueur3];
        $joueur1->getDesc();
        $joueur2->getDesc();
        $joueur3->getDesc();
        echo '<hr>';

        // Participant
        $part1 = new Participant('Artiom', 'Sinigur', [$joueur1, $joueur2, $joueur3]);
        $part2 = new Participant('Bernard', 'Legeau', [$joueur1, $joueur3]);
        $part1->getDesc();
        $part2->getDesc();

    ?>
</body>
</html>