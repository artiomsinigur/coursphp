<?php
    class Livre {
        private $titre;
        private $prix;
        private $auteurs;

        public function __construct($t, $p, array $a) {
            $this->titre = $t;
            $this->prix = $p;
            $this->setAuteur($a);
        }

        public function getTitre() {
            return $this->titre;
        }

        public function getPrix() {
            return $this->prix;
        }

        public function setAuteur(array $auteurs) {
            foreach ($auteurs as $auteur) {
                if (!($auteur instanceof Auteur)) {
                    trigger_error("Le tableau envoyé en paramètres ne doit contenir que des auteurs.", E_USER_ERROR);
                }
            }
            $this->auteurs = $auteurs;
        }

        public function getDesc() {
            echo 'Titre du livre: ' . $this->titre . '<br>';
            echo 'Prix du livre: ' . $this->prix . '<br>';
            echo '<hr>';
            foreach ($this->auteurs as $a) {
                echo 'Nom de l\'auteur: ' . $a->getNom() . '<br>' ;
                echo 'Prenom de l\'auteur: ' . $a->getPrenom() . '<br>' ;
                echo 'Date de naissance: ' . $a->getDateNaissance() . '<br>' ;
                
            }
        }
    }
?>