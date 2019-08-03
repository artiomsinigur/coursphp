<?php
    class Participant {
        private $prenom;
        private $nom;
        private $joueurs;

        public function __construct($p, $n, array $j) {
            $this->prenom = $p;
            $this->nom = $n;
            $this->setJoueurs($j);
        }

        public function setJoueurs(array $joueurs) {
            foreach ($joueurs as $joueur) {
                if ($joueur instanceof Joueur) {
                    $this->joueurs = $joueurs;
                } else {
                    trigger_error('Le tableau envoyé en paramètres ne doit contenir que des joueurs.', E_USER_ERROR);
                }
            }
        }

        public function calculePoints() {
            // qui calcule le nombre total de points de ce participant
            // en passant à travers le tableau de joueurs
            $totalPoints = 0;
            foreach ($this->joueurs as $j) {
                $totalPoints += $j->calculePoints();
            }
            return $totalPoints;
        }

        public function calculeMoyennePoints() {
            // qui calcule la moyenne des points des joueurs compris dans ce pool
            // $moyennePoints = ($tousPoints + $tousPoints) / $nbJoueurs;
            foreach ($joueurs as $j) {
                $pointsParJoueur += $j->calculePoints();
                $nbJoueurs++;
            }
            return $pointsParJoueur / $nbJoueurs;
        }

    }


?>