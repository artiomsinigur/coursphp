<?php
    /***
    *
    *   Une classe représentant un rectangle ainsi que les opérations reliées à ce rectangle
    *
    */

    class Rectangle
    {
        //deux attributs, la longueur et la largeur
        private $longueur;
        private $largeur;

        //constructeur (les deux paramètres sont facultatifs, si les deux sont absents nous aurons un rectangle carré de 1 de long et large)
        public function __construct($lon, $lar)
        {
            //on appelle les setters pour s'assurer de la validité des paramètres
            $this->setLongueur($lon);
            $this->setLargeur($lar);
        }
        
        //méthodes
        
        //getters
        public function getLongueur()
        {
           return $this->longueur;
        }
        
        public function getLargeur()
        {
            return $this->largeur;
        }
        
        //setters
        public function setLongueur($l)
        {
            //validation du type du paramètre avant l'affectation à l'attribut
            if(is_numeric($l))
                $this->longueur = $l;
            else
                trigger_error("La longueur doit être une valeur numérique.", E_USER_ERROR);
        }
        
        public function setLargeur($l)
        {
            //validation du type du paramètre avant l'affectation à l'attribut
            if(is_numeric($l))
                $this->largeur = $l;
            else
                trigger_error("La largeur doit être une valeur numérique.", E_USER_ERROR);
        }
        
        //méthode getAire() qui retourne l'aire du rectangle calculé à partir de sa longueur et sa largeur
        public function getAire()
        {
            return $this->longueur * $this->largeur;
        }
        
        //méthode getPerimetre() qui retourne le périmètre du rectangle
        public function getPerimetre()
        {
            return 2 * ($this->longueur + $this->largeur);
        }
        
        //méthode estCarre() qui retourne true si notre rectangle est un carré et false sinon
        public function estCarre()
        {
            if($this->longueur == $this->largeur)
                return true;
            else
                return false;
        }
        
        //méthode getDescription() qui retourne une chaine de caractère contenant la description complète du rectangle, c'est à dire sa longueur, sa largeur, son aire, son périmètre ainsi qu'un bout de texte disant qu'il est un carré ou pas... le tout dans la même chaine. Vous pouvez appeler les méthodes de l'instance courante en faisant par exemple $this->getAire()
        
        public function getDescription()
        {
            $description = "Le rectangle a une longueur de $this->longueur et une largeur de $this->largeur.<br>";
            
            $description .= "L'aire de ce rectangle est : " . $this->getAire() . "<br>";
            
            $description .= "Le périmètre de ce rectangle est : " . $this->getPerimetre() . "<br>";
            
            if($this->estCarre())
                $description .= "Ce rectangle est aussi un carré.<br>";
            else
                $description .= "Ce rectangle n'est pas un carré.<br>";
            
            return $description;
        }
    }

    class Carre extends Rectangle
    {
        public function __construct($cote)
        {
            $this->setLongueur($cote);
            $this->setLargeur($cote);
        }   
    }

?>