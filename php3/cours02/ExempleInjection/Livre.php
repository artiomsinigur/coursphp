<?php

    class Auteur
    {
        private $prenom;
        private $nom;
        private $dateNaissance;
        private $ville;
        
        public function __construct($p, $n, $d, $v)
        {
            $this->prenom = $p;
            $this->nom = $n;
            $this->dateNaissance = $d;
            $this->ville = $v;
        }
        
        public function getPrenom()
        {
            return $this->prenom;
        }
        
        public function getNom()
        {
            return $this->nom;
        }
        
        public function getDescription()
        {
            $description = "Prénom de l'auteur : " . $this->prenom . "<br>";
            $description .= "Nom de l'auteur : " . $this->nom . "<br>";
            $description .= "Date de naissance : " . $this->dateNaissance . "<br>";
            $description .= "Ville : " . $this->dateNaissance . "<br>";
            
            return $description;
        }
        
    }
    class Livre
    {
        private $titre;
        private $prix;
        private $auteurs;
        
        public function __construct($t, $prix, array $a)
        {
            $this->setTitre($t);
            $this->setPrix($prix);
            $this->setAuteurs($a);
        }
        
        public function getTitre()
        {
            return $this->titre;
        }
        
        public function setTitre($t)
        {
            $this->titre = $t;
        }
        
        public function getPrix()
        {
            return $this->prix;
        }
        
        public function setPrix($p)
        {
            if(is_numeric($p))
                $this->prix = $p;
            else
                trigger_error("Le prix doit être numérique.", E_USER_ERROR);
        }
        
        public function getAuteurs()
        {
            return $this->auteurs;
        }
        
        public function setAuteurs(array $a)
        {
            //déterminer que $a est bel et bien un tableau d'auteurs
            for($i = 0; $i < count($a); $i++)
            {
                if(!($a[$i] instanceof Auteur))
                    trigger_error("Chaque auteur doit être une instance de la classe Auteur.", E_USER_ERROR);
            }
            
            //si toutes les cases du tableau sont des auteurs, j'effectue l'affectation
            $this->auteurs = $a;
        }
        
        
        public function getDescription()
        {
            $description = "Titre du livre : " . $this->titre . "<br>";
            $description .= "Prix du livre : " . $this->prix . "<br>";
            foreach($this->auteurs as $auteur)
            {
                $description .= "<br>Auteur du livre : <br> " . $auteur->getDescription();
            }
            return $description;
        }
    }