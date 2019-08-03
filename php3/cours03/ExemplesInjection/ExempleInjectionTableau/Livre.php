<?php

    class Auteur
    {
        private $prenom;
        private $nom;
        private $dateNaissance;
        
        public function __construct($p, $n, $d)
        {
            $this->prenom = $p;
            $this->nom = $n;
            $this->dateNaissance = $d;
        }
        
        public function getPrenom()
        {
            return $this->prenom;
        }
        
        public function getNom()
        {
            return $this->nom;
        }
        
        public function getDateNaissance()
        {
            return $this->dateNaissance;
        }
    }

    class Livre
    {
        private $titre;
        private $prix;
        private $auteurs;
        
        
        public function __construct($t, $p, array $a)
        {
            $this->titre = $t;
            $this->prix = $p;
            $this->setAuteurs($a);
        }
        
        public function setAuteurs(array $auteurs)
        {
            foreach($auteurs as $a)
            {
                if(!($a instanceof Auteur))
                    trigger_error("Le tableau envoyé en paramètres ne doit contenir que des auteurs.", E_USER_ERROR);
            }
            //si je suis rendu ici c'est que tous les éléments du tableau sont des auteurs.
            $this->auteurs = $auteurs;
        }
        
        public function getDescription()
        {
            $description = "Titre : $this->titre<br>";
            $description .= "Prix : $this->prix<br>";
            foreach($this->auteurs as $a)
            {
                $description .= "<br>";
                $description .= "Prénom de l'auteur : " . $a->getPrenom() . "<br>";
                $description .= "Nom de l'auteur : " . $a->getNom() . "<br>";
                $description .= "Date de naissance de l'auteur : " . $a->getDateNaissance() . "<br>";
            }
            return $description;
        }
        
    }
    
?>    