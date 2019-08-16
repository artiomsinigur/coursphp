<?php
    class Telephoniste extends Employe {
         // abstract extends Employe
         //     nom
         //     prenom
        private $salaireHeure;
        private $heures;

        public function __construct($n, $p, $sH, $h) {
            parent::__construct($n, $p);
            $this->setSalaireHeure($sH);
            $this->setHeures($h);
        }
       
        public function setSalaireHeure($sH) {
            if (is_numeric($sH)) {
                $this->salaireHeure = $sH;
            } else {
                throw new Exception("La valeur doit être numérique!", 1);
            }
        }
        
        public function setHeures($h) {
            if (is_numeric($h)) {
                $this->heures = $h;
            } else {
                throw new Exception("La valeur doit être numérique!", 1);
            }
        }

        public function calculerSalaire() {
            return $this->salaireHeure * $this->heures;
        }

    }