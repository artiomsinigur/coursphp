<?php
    
    class Tache
    {
        private $priorite;
        private $nom;
        
        public function __construct($n, $p)
        {
            $this->setNom($n);
            $this->setPriorite($p);
        }
        
        public function getNom()
        {
            return $this->nom;
        }
        
        public function getPriorite()
        {
            return $this->priorite;
        }
        
        public function setPriorite($p)
        {
            if(is_numeric($p) && $p >= 0)
                $this->priorite = $p;
            else
                throw new Exception("La priorité doit être numérique et plus grande que zéro.");
        }
        
        public function setNom($n)
        {
            $this->nom = $n;
        }
    }

    //classe ToDoList
    class ToDoList
    {
        //pas besoin de constructeur ni de setter. Le tableau de tâches est vide au départ et son contenu sera géré via des méthodes spécifiques. 
        private $tableauTaches = array();
        
        //méthode pour ajouter une tâche dans le tableau de tâches
        public function ajouteTache(Tache $t)
        {
            $this->tableauTaches[] = $t;
        }
        
        //méthode pour retourner le tableau de tâches
        public function getTaches()
        {
            return $this->tableauTaches;
        }
        
        //méthode pour fouiller le tableau de tâches et retourner la tâche la plus prioritaire
        public function plusPrioritaire()
        {
            $maxPriorite = 0;
            
            foreach($this->tableauTaches as $t)
            {
                if($t->getPriorite() >= $maxPriorite)
                {
                    $tacheMax = $t;
                    $maxPriorite = $t->getPriorite();
                }
            }
            
            if(isset($tacheMax))
                return $tacheMax;
        }
        
        
    }
 ?>