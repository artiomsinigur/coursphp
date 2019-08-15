<?php
    class Equipe {
        private $nom;
        private $ville;

        public function __construct($n, $v) {
            $this->setNom($n);
            $this->ville = $v;
        }

        // Getters
        public function getNom() {
            return $this->nom;
        }
        public function setNom($n) {
            if (is_numeric($n)) {
                trigger_error('Le champ doit être une chaine de caractère', E_USER_NOTICE);
            } else {
                $this->nom = $n;
            }
        }

        public function getVille() {
            return $this->ville;
        }

        
    }


?>