<?php
    abstract class Employe {
        // ajouter des attributes dans la class abstrait et creer un constructeur qui recevra les attributs
        // utiliser le constructeur de la class abstrait dans les class herite 
        protected $nom;
        protected $prenom;

        public function __construct($n, $p) {
            $this->setNom($n);
            $this->setPrenom($p);
        }

        abstract function calculerSalaire();

        public function getDescription() {
            echo '<table class="table table-sm table-striped table-bordered">';
                echo "<tr><td>Nom: </td><td>" . $this->getNom() . "</td></tr>";
                echo "<tr><td>Prénom: </td><td>" . $this->getPrenom() . "</td></tr>";
                echo "<tr class='table-success'><td>Salaire mois: </td><td>" . $this->calculerSalaire() . "</td></tr>";
            echo '</table>';
        }

        public function getNom() {
            return $this->nom;
        }
        public function setNom($n) {
            if (!is_numeric($n)) {
                $this->nom = $n;
            } else {
                throw new Exception('La valeur doit être une chaine de caractère!');
            }
        }

        public function getPrenom() {
            return $this->prenom;
        }
        public function setPrenom($p) {
            if (!is_numeric($p)) {
                $this->prenom = $p;
            } else {
                throw new Exception('La valeur doit être une chaine de caractère!');
            }
        }
    }
?>