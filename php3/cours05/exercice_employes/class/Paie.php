<?php
    class Paie {
        private $employes = array();
        private $message;
        const DOLLAR_SYMBOL = '$';
    
        // public function __construct(array $e = array()) {
        //     $this->setEmployes($e);
        //     // tableau contenant tous les employés de l'entreprise
        // }

        // public function setEmployes(array $arrEmployes) {
        //     foreach ($arrEmployes as $employe) {
        //         if (!($employe instanceof Employe)) {
        //             trigger_error('Le tableau en paramétre ne doit contenir que des employes', E_USER_NOTICE);
        //         }
        //     }
        //     $this->employes = $arrEmployes;
        // }

        public function getEmployes() {
            return $this->employes;
        }

        public function calculePaie() {
            // qui calcule la paie pour la semaine
            $salaireTotal = 0;
            foreach ($this->getEmployes() as $e) {
                $salaireTotal += $e->calculerSalaire();
            }
            return round($salaireTotal /= (52 / 12)) . self::DOLLAR_SYMBOL;
        }

        public function getResume() {
            echo '<p class="p-4 bg-warning">Un montant de ' . '<strong>' .$this->calculePaie() . '</strong>' . ' à payer par semaine</p>';
        }

        public function addEmploye($e) {
            $this->employes[] = $e;
        }
    }

?>