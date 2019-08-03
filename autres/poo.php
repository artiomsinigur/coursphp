<?php
// Instanciation ===================//
    // Créer un objet ou une instance
    $data = new MaDate;
    // ou $data c'est un objet ou une instance 

// Propriétés ou attributs ==================//
    // Ce sont des variables
    $date->days;
    $date->months;

// Méthodes ===============//
    // Ce sont des fonctions
    $data->days();
    $data->months(2);

// la variable $this =================//
    // $this fait référence à la instance en cours
        // Pour propriété
        $this->vie

    // On peut définir une variable à la volé c'est-à-dire 
    // pas besoin de la déclarer dans la class. 
    // Toutefois cette pratique est déconseillé

// Constructeur __construct ==================//
    // Avant
    $merlin = new personnage;
    $merlin->nom = 'Merlin';

    // Après
    $harry = new personnage('Harry');


// GETTERS ==============//
    // Accéder à une VARIABLE PRIVÉ dans un class
    // on peut créer un fonction à l'interieur de la même class
    public function getNom() {
        return $this->nom;
    }
    $harry->nom; // Cannot access private property
    // avec la fonction on peut
    $harry->getNom(); // Harry

// SETTERS =================//
    // Changer ou donner une valeur à une variable en privé
    public function setNom($n) {
        $this->nom = $n;
    }

// STATIC =================//
    // Pour ne pas créer une instance d'un class juste pour afficher
    // des données simple, il est possible d'appliquer le mots clé STATIC à la méthode
    // Maintenant on peut appeler la méthode directement sans créer une instance
    // NameClass::Method
    private static function formateChiffre($chiffre) {
        if ($chiffre < 10) {
            return 0 . $chiffre;
        } else {
            return $chiffre;
        }
    }

    text::formateChiffre(4); // Cannot access private property

    // Quand la fonction est en private, 
    // on peut créer une fonction public pour l'afficher (item getters)
    public static function publicFormateChiffre($chiffre) {
        return text::FormateChiffre($chiffre);
    }
    
    text::formateChiffre(4); // 04

    // SELF fait référénce au nom de la class
    public static function publicFormateChiffre($chiffre) {
        return self::FormateChiffre($chiffre);
    }


?>