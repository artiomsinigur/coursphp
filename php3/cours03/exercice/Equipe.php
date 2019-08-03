<?php
    class Equipe {
        private $nom;
        private $ville;
        // private $joueurs;

        public function __construct($n, $v = null) {
            $this->nom = $n;
            $this->ville = $v;
        }
 
        // getters
        public function getNom() {
            return $this->nom;
        }

        public function getVille() {
            return $this->ville;
        }
    }

?>