<?php
    /*
    *
    *   La classe Forme est la classe de base de TOUTES les formes.
    *   Elle est ABSTRAITE et donc : 
        a) Elle ne peut pas être instanciée.
        b) Elle peut posséder des MÉTHODES ABSTRAITES.
    
    */
    abstract class Forme
    {
         //les méthodes abstraites forcent les classes qui héritent de cette classe à définir les comportements nécessaires (redéfinir les méthodes abstraites)
        abstract function getAire();
        abstract function getPerimetre();
        
        //il est possible de définir un comportement général qui se base sur le retour des méthodes abstraites (qui ne sont pas encore définies mais qui le seront NÉCESSAIREMENT dans els classes qui en héritent)
        public function getDescription()
        {
            return "La forme a une aire de " . $this->getAire() . " et un périmètre de " . $this->getPerimetre() . ".";
        }
        
    }

    class Cercle extends Forme
    {
        private $rayon;
        
        public function __construct($r)
        {
            $this->rayon = $r;
        }
        
        public function getAire()
        {
            return 3.1415 * $this->rayon * $this->rayon;
        }
        
        public function getPerimetre()
        {   
            return 2 * 3.1415 * $this->rayon;
        }
            
    }

    class Rectangle extends Forme
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

    class CollectionFormes
    {
        //tableau qui va contenir des formes
        private $tabFormes = array();
        
        public function ajouteForme(Forme $f)
        {   
            $this->tabFormes[] = $f;
        }
        
        public function afficheContenu()
        {
            echo "<ul>";
            foreach($this->tabFormes as $f)
            {
                echo "<li>" . $f->getDescription() . "</li>";
            }
            echo "</ul>";
        }
        
    }

?>