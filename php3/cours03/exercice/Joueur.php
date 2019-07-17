<?php
    class Joueur {
        private $prenom;
        private $nom;
        private $nbPass;
        private $nbButs;
        private $equipe; // Type equipe

        public function __construct($p, $n, $nbP, $nbB, Equipe $e) {
            $this->prenom = $p;
            $this->nom = $n;
            $this->setNbPass($nbP);
            $this->setNbButs($nbB);
            $this->equipe = $e;
        }

        public function getNom() {
            return $this->nom;
        }

        public function getPrenom() {
            return $this->prenom;
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
            $desc = 'Prenom: ' . $this->getPrenom() . '<br>';
            $desc .= 'Nom: ' . $this->getNom() . '<br>';
            $desc .= 'Equipe: ' . $this->equipe->getNom() . '<br>';
            $desc .= 'Nombre des pass: ' . $this->nbPass . '<br>';
            $desc .= 'Nombre des buts: ' . $this->nbButs . '<br>';
            $desc .= 'Calcule des points: ' . $this->calculePoints() . '<br>';
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