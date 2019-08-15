<?php    
    class Auteur {
        private $nom;
        private $prenom;
        private $dateNaissance;

        public function __construct($n, $p, $d) {
            $this->setNom($n);
            $this->prenom = $p;
            $this->dateNaissance = $d;
        }

        public function getNom() {
            return $this->nom;
        }

        public function getPrenom() {
            return $this->prenom;
        }

        public function getDateNaissance() {
            return $this->dateNaissance;
        }

        public function setNom($n) {
            $this->nom = $n;
        }

        public function getDesc() {
            echo 'Nom de l\'auteur: ' . $this->nom . '<br>' ;
            echo 'Prenom de l\'auteur: ' . $this->prenom . '<br>' ;
            echo 'Date de naissance: ' . $this->dateNaissance . '<br>' ;
        }
    }

?>