<?php
/*
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
*/

// ======================
// Exemples
// ======================
class Personnage {
    const MAX_VIE = 100;
    
    protected $vie = 80;
    public $atk = 20;
    private $nom;

    public function __construct($n = null) {
        $this->setNom($n);
    }

    // Getters
    public function getNom() {
        return $this->nom;
    }

    public function getVie() {
        return $this->vie;
    }

    // Setters
    public function setNom($n) {
        $this->nom = $n;
    }

    public function setVie($v) {
        $this->vie = $v;
    }

    public function regenerer($v = null) {
        if (is_null($this->vie)) {
            $this->vie = self::MAX_VIE;
        } else {
            $this->vie += $v;
        }
    }

    public function isDead() {
        if ($this->vie !== 0) {
            echo $this->nom . ' est vivant avec ' . $this->vie . ' de vie.';
        } else {
            echo $this->nom . ' est mort';
        }
    }

    public function attaquer($cible) {
        // var_dump($cible);
        $cible->vie -= $this->atk;
        $cible->non_negatif();
    }

    private function non_negatif() {
        if ($this->vie < 0) {
            $this->vie = 0;
        }
    }

}


// ====================
// Propriétés et Méthodes statiques
// ====================
class Text {
    private static $suffix = '$';
    // Appeler la propriété avec le symbole '$' self::$nomPropriete

    // creer une constante
    // Appeler la constante sans le symbole '$' self::NOMCONSTANTE
    const SUFFIX = '$';

    private static function addZero($chiffre) {
        if ($chiffre < 10) {
            return 0 . $chiffre . self::SUFFIX;
        } else {
            return $chiffre . self::$suffix;
        }
    }

    public static function publicAddZero($chiffre) {
        return self::addZero($chiffre);
    }

    public static function getSuffix() {
        return self::$suffix;
    }
}


// ====================
// L'héritage
// ====================
class Archer extends Personnage {
    protected $vie = 75;
    // Dans la class Archer on a deux proprietes vie.
    // La propriete en private est accesible qu'a la class parente.
    // Pour donner acces a la propriete de base, il faut le mettre en protected.

    // Lorsque un propriete est mit en protected, on ne peut pas la mettre en private
    // mais on peut continuer la mettre en protected.

    public $arc = 3;

    // si on veux modifier le constructeur, il doit avoir les meme proprietes. 
    // Pareille pour les functions.
    public function __construct($nom) {
        $this->vie = $this->vie / 2;
        parent::__construct($nom);
    }

    public function attaquer($cible) {
        // $cible->vie -= 2 * $this->atk;
        $cible->vie -= $this->atk;
        // ou on peut appeler la function attaquer() parente
        // pour avoir le meme resultat.
        parent::attaquer($cible);
    }
}