<?php
     class Superviseur extends Employe {
        // abstract extends Employe
        //     nom
        //     prenom
        // salaireAnnuel
        private $salaireAnnuel;

        public function __construct($n, $p, $sA) {
            parent::__construct($n, $p);
            $this->setSalaireAnnuel($sA);
        }

        public function getSalaireAnnuel() {
            return $this->salaireAnnuel;
        }

        public function setSalaireAnnuel($sA) {
            if (is_numeric($sA)) {
                return $this->salaireAnnuel = $sA;
            } else {
                throw new Exception("La valeur doit être numérique!", 1);
            }
        }
        
        public function calculerSalaire() {
            return round($this->salaireAnnuel / 12);
        }

        public function getDescription() {
            // return parent::getDescription();
            echo '<table class="table table-sm table-striped table-bordered">';
                echo "<tr><td>Nom: </td><td>" . $this->getNom() . "</td></tr>";
                echo "<tr><td>Prénom: </td><td>" . $this->getPrenom() . "</td></tr>";
                echo "<tr><td>Salaire annuel: </td><td>" . $this->getSalaireAnnuel() . "</td></tr>";
                echo "<tr class='table-success'><td>Salaire mois: </td><td>" . $this->calculerSalaire() . "</td></tr>";
            echo '</table>';
        }
    }