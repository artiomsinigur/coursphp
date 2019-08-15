<?php
    class CompteEpargne extends CompteBancaire {
        protected $solde;
        private static $countCompteEpargnes = 0;

        public function __construct($n, $s) {
            $this->setNom($n);
            $this->solde = $s;
            self::$countCompteEpargnes++;
        }
        
        // function - calculer de l'intérêt avec un pourcentage spécifié en paramètre
        // et qui ajoute cet intérêt au solde du compte.
        public function calculerTaux($taux) {
            $newSolde = 0;
            if (is_numeric($taux)) {
                $this->solde = $this->solde * (1 + $taux / 100);
            } else {
                trigger_error('Le paramètre doit être en numeric', E_USER_NOTICE);
            }
        }

        public static function getCompteEpargnes() {
            return self::$countCompteEpargnes;
        }

        public static function calculerComptesEpargnes() {
            return self::getCompteEpargnes() / parent::$nrCompte * 100;
        }
    }