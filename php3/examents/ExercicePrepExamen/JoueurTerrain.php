<?php
    class JoueurTerrain extends Sportif {
        private $buts;
        private $passes;

        // Numéro de joueur - à voir

        public function __construct($n, $p, $dN, $buts, $passes) {
            parent::__construct($n, $p, $dN);
            $this->setButs($buts);
            $this->setPasses($passes);
        }

        public function getButs() {
            return $this->buts;
        }
        public function setButs($b) {
            if (is_numeric($b)) {
                $this->buts = $b;
            } else {
                throw new Exception("Les buts doivent être des nombres", 1);
            }
        }

        public function getPasses() {
            return $this->passes;
        }
        public function setPasses($p) {
            if (is_numeric($p)) {
                $this->passes = $p;
            } else {
                throw new Exception("Les passes doivent être des nombres", 1);
            }
        }

        public function getPoints() {
            return $this->getButs() + $this->getPasses();
        }
       
        public function getStatistiques() {
            $stats = "Le joueur " . $this->getNom() . " a marqué: " . $this->getButs() . " buts et a passé " . $this->getPasses() . " fois avec un total des point de: " . $this->getPoints();
            return $stats;
        }
    }
    
?>