<?php
    
    class HelloWorld
    {
        //modificateur d'accès public - à voir plus tard avec l'encapsulation
        //définition d'un attribut
        public $langue;
        
        //la méthode direBonjour utilisera l'attribut langue pour déterminer la langue d'affichage du message de bienvenue
        public function direBonjour()
        {
            echo "<p>";
            switch($this->langue)
            {
                case "francais":
                    echo "Bonjour le monde!";
                    break;
                case "anglais":
                    echo "Hello World!";
                    break;
            }
            echo "</p>";
            
        }
        
    }

?>