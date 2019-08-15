<?php
     class Vendeur extends Telephoniste {
        // abstract extends Employe
        //     nom
        //     prenom
        //     extends Telephoniste
        //         salaireHoraire
        //         heure
        // tauxCommission
        // totalVente
        private $tauxCommission;
        private $totalVente;

        public function __construct($n, $p, $sH, $h, $tC, $tV) {
            parent::__construct($n, $p, $sH, $h);
            $this->setTauxCommission($tC);
            $this->setTotalVente($tV);
        }

        public function getTauxCommission() {
            return $this->tauxCommission;    
        }
        public function setTauxCommission($tC) {
            if (is_numeric($tC)) {
                $this->tauxCommission = $tC;
            } else {
                throw new Exception("La valeur doit être numérique!", 1);
            }
        }

        public function getTotalVente() {
            return $this->totalVente;    
        }
        public function setTotalVente($tV) {
            if (is_numeric($tV)) {
                $this->totalVente = $tV;
            } else {
                throw new Exception("La valeur doit être numérique!", 1);
            }
        }

        public function calculerSalaire() {
            $commission = $this->totalVente * ($this->tauxCommission / 100);
            return parent::calculerSalaire() + $commission;
        }

        public function getDescription() {
            echo '<table class="table table-sm table-striped table-bordered">';
                echo "<tr><td>Nom: </td><td>" . $this->getNom() . "</td></tr>";
                echo "<tr><td>Prénom: </td><td>" . $this->getPrenom() . "</td></tr>";
                echo "<tr><td>Taux commission: </td><td>" . $this->getTauxCommission() . "</td></tr>";
                echo "<tr><td>Total vente: </td><td>" . $this->getTotalVente() . "</td></tr>";
                echo "<tr class='table-success'><td>Salaire mois: </td><td>" . $this->calculerSalaire() . "</td></tr>";
            echo '</table>';
        }
    }