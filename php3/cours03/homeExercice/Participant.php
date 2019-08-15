<?php
    class Participant extends Joueur {
        private $joueurs;

        public function __construct($n, $p, array $j) {
            $this->nom = $n;
            $this->prenom = $p;
            $this->setJoueurs($j);
        }

        public function setJoueurs(array $arrJoueurs) {
            foreach ($arrJoueurs as $j) {
                if (!($j instanceof Joueur)) {
                    trigger_error("Le tableau envoyé en paramètres ne doit contenir que des joueurs.", E_USER_ERROR);
                }
            }
            $this->joueurs = $arrJoueurs;
        }
        
        // $totalPointsParticipant - calcule le total des points de ce participant
        // en traversant le tableau de joueurs
        public function calculePoints() {
            $totalPointsParticipant = 0;
            foreach ($this->joueurs as $j) {
                $totalPointsParticipant += $j->calculePoints();
            }
            return $totalPointsParticipant;
        }
        
        // function calculeMoyennePoints() - calcule la moyenne des points 
        // des joueurs de ce pool
        // $totalPointsParticipant / $nbTotalJoueurs
        public function calculeMoyennePoints() {
            $moyennePoints = 0;
            $moyennePoints = $this->calculePoints() / parent::getCountJoueur();
            return $moyennePoints;
        }

        public function getDesc() {
            echo '<table>';
                echo '<tr>';
                    echo "<td>Nom participant: </td><td>" . $this->nom . "</td>";
                echo '</tr>';
                echo '<tr>';
                    echo "<td>Total de points: </td><td>" . $this->calculePoints() . "</td>";
                echo '</tr>';
                echo '<tr>';
                    echo "<td>Moyenne de points: </td><td>" . $this->calculeMoyennePoints() . "</td>";
                echo '</tr>';
                echo '<br>';
            echo '</table>';
        }

    }


?>