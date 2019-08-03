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
    }

    /*
        Classe Chat
        Hérite de Animal et donc de ses attributs et de ses méthodes.
        Elle va aussi définir une méthode supplémentaire : miaule()
        Elle aura aussi un attribut supplémentaire : race
    */
    class Chat extends Animal
    {
        public function miaule()
        {
            echo "<p>Le chat nommé " . $this->nom . " miaule. MIAOU.</p>";
        }
    }

    class Persan extends Chat
    {
        
    }

    class Chien extends Animal
    {
        public function jappe()
        {
            echo "<p>Le chien nommé " . $this->nom . " jappe. WOOF.</p>";
        }
    }

   // class ChienChat extends Chien, Chat


    $monAnimal = new Animal("Robert");
    $monAnimal->dort();
    $monAnimal->mange();

    $monChat = new Chat("Colonel");
    $monChat->dort();
    $monChat->mange();
    $monChat->miaule();

    
    $monChien = new Chien("Rex");
    $monChien->dort();
    $monChien->mange();
    $monChien->jappe();
?>