<?php
    class CompteBancaire {
        private $nom;
        protected $solde = 0;
        protected static $nrCompte;

        public function __construct($n, $s) {
            $this->setNom($n);
            $this->solde = $s;
            self::$nrCompte++;
        }

        public function getNom() {
            return $this->nom;
        }
        public function setNom($n) {
            if (is_numeric($n)) {
                trigger_error('Le champ doit être une chaine de caractère', E_USER_NOTICE);
            }
            $this->nom = $n;
        }

        public function getNumeroCompte() {
            return self::$nrCompte;
        }

        //getter seulement pour le solde, qui devient en lecture seule
        public function getSolde() {
            return $this->solde;
        }

        // function retirer($montant) qui retire le montant 
        // envoyé en paramètres du solde contenu dans le compte
        public function retirer($montant) {
            if (($this->getSolde() - $montant) >= 0) {
                $this->solde -= $montant;
            } else {
                trigger_error('Vous n\'avez pas suffisament d\'argent.', E_USER_NOTICE);
            }
        }

        // deposer($montant) qui dépose le montant 
        // envoyé en paramètres dans le solde contenu dans le compte
        public function deposer($montant) {
            $this->solde += $montant;
        }

        // public function transfererVers($montant, $compte) {
        //     // Verifier si il y a suffisement de moyen
        //     if (($this->getSolde() - $montant) >= 0) {
        //         $this->solde -= $montant;
        //         $compte->solde += $montant;
        //     } else {
        //         trigger_error('Operation refuser. Insuffisamment d\'argent.', E_USER_NOTICE);
        //     }
        // }

        // Ou, méthode plus optimiser
        public function transfererVers($montant, CompteBancaire $compte) {
            $this->retirer($montant);
            $compte->deposer($montant);
        }

        public function afficherCompte() {
            echo '<ul>';
                echo "<li>Nr. de compte: " . $this->getNumeroCompte() . "</li>";
                echo "<li>Nom de client: " . $this->getNom() . "</li>";
                echo "<li>Solde: " . $this->getSolde() . "</li>";
            echo '</ul>';
        }
    }