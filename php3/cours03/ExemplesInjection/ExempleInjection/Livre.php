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
        private $auteur;
        
        
        public function __construct($t, $p, Auteur $a)
        {
            $this->titre = $t;
            $this->prix = $p;
            $this->auteur = $a;
        }
        
        public function getDescription()
        {
            $description = "Titre : $this->titre<br>";
            $description .= "Prix : $this->prix<br>";
            $description .= "Prénom de l'auteur : " . $this->auteur->getPrenom() . "<br>";
            $description .= "Nom de l'auteur : " . $this->auteur->getNom() . "<br>";
            $description .= "Date de naissance de l'auteur : " . $this->auteur->getDateNaissance() . "<br>";
            return $description;
        }
        
    }
    
?>    