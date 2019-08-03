<?php
    class Joueur {
        private $prenom;
        private $nom;
        private $nbPass;
        private $nbButs;
        private $equipe; // Type equipe

        public function __construct($p, $n = null, $nbP, $nbB, Equipe $e) {
            $this->prenom = $p;
            $this->nom = $n;
            $this->setNbPass($nbP);
            $this->setNbButs($nbB);
            $this->equipe = $e;
        }

        // public function getNbPass

        public function setNbPass($nbP) {
            if (is_numeric($nbP)) {
                $this->nbPass = $nbP;
            } else {
                trigger_error('Les pass doivent être numérique!', E_USER_ERROR);
            }
        }

        public function setNbButs($nbB) {
            if (is_numeric($nbB)) {
                $this->nbButs = $nbB;
            } else {
                trigger_error('Les buts doivent être numérique!', E_USER_ERROR);
            }
        }

        public function getDesc() {
            $desc = $this->prenom;
            $desc .= $this->nom;
            $desc .= $this->nbButs;
            $desc .= $this->equipe->getNom();
            return $desc;
        }

        public function calculePoints() {
            // chaque but d'un joueur compte pour 2 points 
            $points = $this->nbButs * 2;
            // et chaque passe compte pour un point.
            $points += $this->nbPass;
            return $points;
        }
    }

?>