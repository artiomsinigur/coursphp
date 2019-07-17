<?php
    /*
    *
    *   Classe Animal
        Contient 4 méthodes, mange(), dort(), le constructeur et le setter()
    */
    class Animal
    {
        protected $nom;
        
        public function __construct($nomAnimal)
        {
            $this->setNom($nomAnimal);
        }
        
        public function setNom($n)
        {
            $this->nom = $n;
        }
        
        public function mange()
        {
            echo "<p>$this->nom est en train de manger.</p>";
        }
        
        public function dort()
        {
            echo "<p>$this->nom est en train de dormir.</p>";
        }
        
        public function joue()
        {
            echo "<p>$this->nom est en train de jouer.</p>";
        }
    }

    /*
        Classe Chat
        Hérite de Animal et donc de ses attributs et de ses méthodes.
        Elle va aussi définir une méthode supplémentaire : miaule()
        Elle aura aussi un attribut supplémentaire : race
    */
    class Chat extends Animal
    {
        final public function miaule()
        {
            echo "<p>Le chat nommé " . $this->nom . " miaule. MIAOU.</p>";
        }
        
        public function joue()
        {
            parent::joue();
            echo "<p>Le chat nommé " . $this->nom . " grimpe.</p>";
        }
    }

    final class Persan extends Chat
    {
        /*
        //impossible de redéfinir miaule puisque cette méthode est finale
        public function miaule()
        {
            echo "<p>Le persan nommé $this->nom miaule d'une façon spéciale parce que j'ai payé plus de 1000$ pour ce chat</p>";
        }*/
    }

    class Chien extends Animal
    {
        public function jappe()
        {
            echo "<p>Le chien nommé " . $this->nom . " jappe. WOOF.</p>";
        }
        
        public function joue()
        {
            parent::joue();
            echo "<p>Le chien nommé " . $this->nom . " rapporte la balle.</p>";
        }
    }

/*
    //impossible de déclarer une classe qui hérite de Persan parce qu'elle est finale
    class PersanSpecial extends Persan
    {
        
    }
    */
   // class ChienChat extends Chien, Chat


    $monAnimal = new Animal("Robert");
    $monAnimal->dort();
    $monAnimal->mange();
    $monAnimal->joue();


    $monChat = new Chat("Colonel");
    $monChat->dort();
    $monChat->mange();
    $monChat->miaule();
    $monChat->joue();
    
    $monChien = new Chien("Rex");
    $monChien->dort();
    $monChien->mange();
    $monChien->jappe();
    $monChien->joue();
?>