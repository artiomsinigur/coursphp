<?php
    abstract class Sportif {
        protected $nom;
        protected $prenom;
        protected $dateNaissance;
        abstract function getStatistiques();

        public function __construct($n, $p, $dN) {
            $this->setNom($n);
            $this->setPrenom($p);
            $this->setDateNaissance($dN);
        }

        public function getDesc() {
            echo '<table>';
                echo "<tr><td>Nom:</td><td>" . $this->getNom() . "</td></tr>";    
                echo "<tr><td>Prénom:</td><td>" . $this->getPrenom() . "</td></tr>";    
                echo "<tr><td>Date de naissance:</td><td>" . $this->getDateNaissance() . "</td></tr>";    
                echo "<tr><td>Les statistiques: </td><td>" . $this->getStatistiques() . "</td></tr>";    
            echo '</table>';    
        }

        public function getNom() {
            return $this->nom;
        }
        public function setNom($n) {
            if (is_numeric($n)) {
                throw new Exception("Le nom doit être une chaine de caractère", 1);
            } else {
                $this->nom = $n;
            }
        }
        
        public function getPrenom() {
            return $this->prenom;
        }
        public function setPrenom($p) {
            if (is_numeric($p)) {
                throw new Exception("Le prénom doit être une chaine de caractère", 1);
            } else {
                $this->prenom = $p;
            }
        }
        
        public function getDateNaissance() {
            return $this->dateNaissance;
        }
        public function setDateNaissance($dN) {
            if (is_numeric($dN)) {
                throw new Exception("Le prénom doit être une chaine de caractère", 1);
            } else {
                $this->dateNaissance = $dN;
            }
        }

    }
?>