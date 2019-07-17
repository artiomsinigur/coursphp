<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
    <?php
        require_once("pool.php");

        $monEquipe1 = new Equipe("Canadiens", "Montréal");
        $monEquipe2 = new Equipe("Sharks", "San José");
        $tabEquipe = [$monEquipe1, $monEquipe2];
        $monJoueur = new Joueur($monEquipe1, "Carey", "Price", 8, 2);
        $monJoueur2 = new Joueur($monEquipe2, "Sidney", "Crosby", 34, 16);
        $monJoueur3 = new Joueur($monEquipe1, "Brendan", "Gallagher", 22, 30);
        $tabJoueur = [$monJoueur, $monJoueur2, $monJoueur3];
        $monParticipant = new Participant("Bastien", "Potereau", $tabJoueur);
        $monParticipant2 = new Participant("Johny", "English", [$monJoueur, $monJoueur3]);
        

        echo $monJoueur->getDescription();
        echo $monJoueur2->getDescription();
        echo $monJoueur3->getDescription();

        echo $monParticipant->getDescriptionParticipant();
        echo $monParticipant2->getDescriptionParticipant();

        ?>
    </body>
</html>
