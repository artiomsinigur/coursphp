<?php
    class CompteBancaire
    {
        //attribut statique - compteur accessible sans création d'instance
        private static $compteur = 0;
        private $numeroCompte;
        private $nomUsager;
        private $solde;
        
        //constructeur de la classe CompteBancaire
        public function __construct($numC, $nom)
        {
            //pour respecter l'encapsulation, on appelle les setters qui possèdent la logique de validation
            $this->setNomUsager($nom);
            $this->setNumeroCompte($numC);
            $this->solde = 0;
            self::$compteur++;
        }
                
        //getters and setters
        public static function getCompteur()
        {
            return self::$compteur;
        }
        
        public function getNumeroCompte()
        {
            return $this->numeroCompte;
        }
        
        public function setNumeroCompte($n)
        {
            if(is_int($n))
                $this->numeroCompte = $n;
            else
                trigger_error("Le numéro de compte doit être un entier.", E_USER_ERROR);
        }
        
        public function getNomUsager()
        {
            return $this->nomUsager;
        }
        
        public function setNomUsager($n)
        {
            if(strlen($n) >= 5)
                $this->nomUsager = $n;
            else
                trigger_error("Le nom d'usager doit être plus grand que 5 caractères.", E_USER_ERROR);
        }
        //getter seulement pour le solde, qui devient en lecture seule
        public function getSolde()
        {
            return $this->solde;
        }
        //méthode pour faire afficher les caractéristiques du compte
        
        public function afficherCompte()
        {
            echo "Numéro de compte : " . $this->numeroCompte . "<br>";
            echo "Nom d'usager : " . $this->nomUsager . "<br>";
            echo "Solde : " . $this->solde . "<br>";
        }
        
        public function retire($montant)
        {
            if(is_numeric($montant))
            {
                if($this->solde - $montant >= 0)
                    $this->solde -= $montant;
                else
                    trigger_error("Le montant retiré doit être inférieur au solde du compte.");
            }
            else
                trigger_error("Le montant retiré doit être numérique.", E_USER_ERROR);   
        }
        
        public function depose($montant)
        {
            if(is_numeric($montant))
            {
                $this->solde += $montant;
            }
            else
                trigger_error("Le montant déposé doit être numérique.", E_USER_ERROR);   
        }
        
        //utilisation de Type Hinting 
        public function transfertVers(CompteBancaire $compte, $montant)
        {
            $this->retire($montant);
            $compte->depose($montant);
            
            //façon alternative de vérifier la classe de $compte
            /*if($compte instanceof CompteBancaire)
            {
                $this->retire($montant);
                $compte->depose($montant);
            }
            else
                trigger_error("Le paramètre doit être un objet de type CompteBancaire.", E_USER_ERROR);     
            */    
        }
    }

?>