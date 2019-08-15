<?php
    class GardienBut extends JoueurTerrain {
        private $victoires;
        private $nrTireRecus;
        private $tempsJoue;
        private $nrButsAlloues;

        public function __construct($n, $p, $dN, $buts, $passes, $v, $nTR, $tJ, $nBA) {
            parent::__construct($n, $p, $dN, $buts, $passes);
            $this->setVictoires($v);
            $this->setNrTireRecus($nTR);
            $this->setTempsJoue($tJ);
            $this->setnrButsAlloues($nBA);
        }

        public function setNrTireRecus($nTR) {
            if (is_numeric($nTR)) {
                $this->nrTireRecus = $nTR;
            } else {
                throw new Exception("La valeur doit être des nombres", 1);
            }
        }

        public function setTempsJoue($tJ) {
            if (is_numeric($tJ)) {
                $this->tempsJoue = $tJ;
            } else {
                throw new Exception("La valeur doit être des nombres", 1);
            }
        }

        public function setnrButsAlloues($nBA) {
            if (is_numeric($nBA)) {
                $this->nrButsAlloues = $nBA;
            } else {
                throw new Exception("La valeur doit être des nombres", 1);
            }
        }

        public function setVictoires($v) {
            if (is_numeric($v)) {
                $this->victoires = $v;
            } else {
                throw new Exception("Les victoires doivent être des nombres", 1);
            }
        }

        public function getPourcentageArret() {
            $nrArrets = $this->nrTireRecus - $this->nrButsAlloues;
            return round($nrArrets / $this->nrTireRecus, 3);
        }

        public function getMoyenneButs() {
            $minutesMatch = 60;
            $nrMatchJoue = $this->tempsJoue / $minutesMatch;
            $butsParMatch = $this->nrButsAlloues / $nrMatchJoue;
            return round($butsParMatch, 3);
        }

        public function getStatistiques() {
            $stats = "Le gardien " . $this->getNom() . " " . $this->getPrenom() . " a un pourcentage d'arrêt: " . $this->getPourcentageArret() . " et une moyenne de buts alloués: " . $this->getMoyenneButs() . " par match.";
            return $stats;
        }

        
    }
    
?>