<?php
    class Auteur {
        public $nom;
        private $prenom;
        private $dataNaissance;

        public function getNom() {
            return $this->nom;
        }

        public function setName($n) {
            $this->nom = $n;
        }
    }

?>