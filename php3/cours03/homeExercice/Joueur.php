<?php
    class Joueur {
        protected $nom;
        protected $prenom;
        private $equipe;
        private $nbPasses;
        private $nbButs;
        public static $countJoueur = 0;

        public function __construct($n, $p, Equipe $e, $nbP, $nbB) {
            $this->nom = $n;
            $this->prenom = $p;
            $this->equipe = $e;
            $this->setPasses($nbP);
            $this->setButs($nbB);
            self::$countJoueur++;
        }

        // Getters
        public function getNom() {
            return $this->nom;
        }

        public function getPrenom() {
            return $this->prenom;
        }

        public function getPasses() {
            return $this->nbPasses;
        }
        public function setPasses($p) {
            if (!is_numeric($p)) {
                trigger_error('Le champ doit être numeric', E_USER_NOTICE);
            } else {
                $this->nbPasses = $p;
            }
        }
        
        public function getButs() {
            return $this->nbButs;
        }
        public function setButs($b) {
            if (!is_numeric($b)) {
                trigger_error('Le champ doit être numeric', E_USER_NOTICE);
            } else {
                $this->nbButs = $b;
            }
        }

        public static function getCountJoueur() {
            return self::$countJoueur;
        }

        public function calculePoints() {
            $nbPoints = $this->getPasses();
            $nbPoints += $this->getButs() * 2;
            return $nbPoints;
            // 1 chaque but d'un joueur compte pour 2 points et 
            // 2 chaque passe compte pour un point.
        }

        public function getDesc() {
            echo '<table>';
                echo '<tr>';
                    echo "<td>Nom joueur: </td><td>" . $this->getNom() . "</td>";
                echo '<tr>';
                echo '<tr>';
                    echo "<td>Prénom joueur: </td><td>" . $this->getPrenom() . "</td>";
                echo '<tr>';
                echo '<tr>';
                    echo "<td>Nombre de passes: </td><td>" . $this->getPasses() . "</td>";
                echo '<tr>';
                echo '<tr>';
                    echo "<td>Nombre de buts: </td><td>" . $this->getButs() . "</td>";
                echo '<tr>';
                echo '<tr>';
                    echo "<td>Total de points: </td><td>" . $this->calculePoints() . "</td>";
                echo '<tr>';
                echo '<tr>';
                    echo "<td>Équipe: </td><td>" . $this->equipe->getNom() . "</td>";
                echo '<tr>';
                echo '<tr>';
                    echo "<td>Ville: </td><td>" . $this->equipe->getVille() . "</td>";
                echo '<tr>';
                echo '<br>';
            echo '</table>';
        }
        
    }


?>