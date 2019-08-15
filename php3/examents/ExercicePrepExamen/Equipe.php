<?php
    class Equipe {
        private $nomEquipe;
        private $joueurs = [];

        public function __construct($nE, array $j) {
            $this->setNomEquipe($nE);
            $this->setJoueurs($j);
        }

        public function setNomEquipe($nE) {
            if (is_numeric($nE)) {
                throw new Exception("Le nom d'équipe doit être une chaine de caractère!", 1);
            } else {
                $this->nomEquipe = $nE;
            }
        }

        public function getJoueurs() {
            return $this->joueurs;
        }
        // 1 Recevoir le tableau en paramétre.
        public function setJoueurs(array $arrJoueurs) {
            // 2 Vérifier si'il est bien instancier.
            foreach ($arrJoueurs as $j) {
                if (!($j instanceof Sportif)) {
                    throw new Exception("Le tableau en paramétre doit être une instance de Sportif", 1);
                }
            }
            // 3 Puis, l'ajouter à la variable joueurs.
            $this->joueurs = $arrJoueurs;
        }

        private function calculerTotalPointsParEquipe() {
            $totalPoints = 0;
            foreach ($this->joueurs as $j) {
                $totalPoints += $j->getButs();
            }
            return $totalPoints;
        }

        public function showDescEquipe() {
            echo "<h2>Équipe " . $this->nomEquipe . "</h2>";
            foreach ($this->joueurs as $j) {
                $j->getDesc();
            }
            echo "<p>Total de buts marqués par " . $this->nomEquipe . " est: " . $this->calculerTotalPointsParEquipe() . "</p>";
        }
        
    }
    
?>