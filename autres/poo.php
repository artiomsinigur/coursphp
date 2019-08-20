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
    // Maintenant on peut appeler la méthode directement sans créer une instance.
    // Comme elles n’ont aucun lien avec une instance, il est impossible 
    // d’utiliser $this au sein d’une méthode de classe!
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

    // Injection de dépendances(type hinting) ===================//
        • Il est possible pour un attribut d’une classe d’être aussi un objet!
        • Par exemple, la classe Livre pourrait contenir un attribut Auteur qui
        serait de la classe Auteur!
            • Cela consiste à envoyer au constructeur de la classe conteneur
            une instance de la classe contenue.
            • On peut d’ailleurs renforcer ce comportement avec le type
            hinting, qui permet de forcer une fonction/méthode à recevoir un
            paramètre d’un certain type.
        
        // Exemple:
        public function transfertVers(CompteBancaire $compte, $montant)
        {
            $this->retire($montant);
            $compte->depose($montant);
            
            //façon alternative de vérifier la classe de $compte
            // if($compte instanceof CompteBancaire)
            // {
            //     $this->retire($montant);
            //     $compte->depose($montant);
            // }
            // else
            //     trigger_error("Le paramètre doit être un objet de type CompteBancaire.", E_USER_ERROR);       
        }

        Exemple - vérifier un tableau
        public function setEmployes(array $arrEmployes) {
            foreach ($arrEmployes as $employe) {
                if (!($employe instanceof Employe)) {
                    trigger_error('Le tableau en paramétre ne doit contenir que des employes', E_USER_NOTICE);
                }
            }
            $this->employes = $arrEmployes;
        }


    // Encapsulation et héritage ===================//
        - Attribut private que nous utilisons pour l’encapsulation restreint 
        l’utilisation des attributs et des méthodes à la classe qui les a défini.
        - Cela veut dire qu’un attribut private de la classe A
        n’est pas accessible par la classe B, bien qu’un objet
        appartenant à cette classe B possède bel et bien cet
        attribut.

    // Encapsulation : Le mot clé protected ==================//
        • Il sera toujours possible pour les méthodes de la classe B
        d’accéder aux méthodes public de la classe A, et donc
        aux setters de cette classe pour changer les attributs
        qui sont private.
        • Dans plusieurs cas, toutefois, nous voudrons qu’un
        attribut défini dans la classe A puisse être accessible
        directement par les classes qui en héritent.
            – Dans ce cas, plutôt que d’utiliser l’attribut private, nous
            utiliserons l’attribut protected.
            – En utilisant protected, on obtient la même encapsulation, à
            l’extérieur de la classe A, qu’en utilisant private. Toutefois,
            cette encapsulation sera enlevée pour les classes qui
            héritent de la classe A.

    // Redéfinir des méthodes déjà présentes dans la classe mere ===================//
        • Il suffit de redéfinir la même méthode, avec le même nom
        dans la classe fille que celui de la méthode présente dans la
        classe mère.
        • Cette méthode sera dorénavant appelée à la place de celle
        de la classe mère.
        • Il est aussi possible d’appeler une méthode de la classe mère
        à partir d’une classe fille même si cette classe fille possède
        une méthode possédant le même nom.
            Ex: parent::methode(); (l’opérateur de résolution de portée)

    // Méthodes et classes finales ====================//
        • Il est possible d’empêcher une méthode d’être 
        surchargée en mettant le mot clé final devant.
        • Il est aussi possible d’empêcher une classe d’être héritée 
        en mettant le même mot clé devant le mot class lors de sa définition.

    // Polymorphisme(abstraite) =================//
        Le polymorphisme consiste à créer une collection
        d’objets, elle-même typée à une classe de base (qui
        pourrait être abstraite) et à remplir cette collection
        d’objets qui appartiennent à une ou plusieurs classes
        héritant de cette même classe de base.

    // Classes et méthodes abstraites =================//
        • Pour forcer tous les objets à redéfinir une méthode d’une classe,
        il est préférable d’utiliser le concept de classe abstraite.
        • IMPORTANT : Une classe abstraite ne peut pas être instanciée.
        • Elle ne sert donc qu’à être un patron pour de futures classes
        qui hériteront de ses attributs et méthodes.
        • Elle est généralement accompagnée de méthodes abstraites.
        • Lorsque cette méthode est définie au sein d’une classe
        abstraite, cela force les classes qui hériteront de celle-ci à la
        redéfinir (surcharger).
        • N.B. Une classe qui a une méthode abstraite doit absolument être
        abstraite!

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

    // 1 ======================//
    function __construct( $nom, $prix, $fabricant, $description) {
        //ne pas faire l’affectation directement parce que cela
        //briserait le concept d’encapsulation
        //$this->nom = $nom …. Aucune validation!
        $this->setNom($nom);
        $this->setPrix($prix);
        $this->setFabricant($fabricant);
        $this->setDescription($description);
        }

    // 2 =======================//
    // Quand on utiliser une méthode du parent, 
    // il doit avoir les même paramétres et nom que celui du parent

    // 3 =========================//
    // Utilisation de Type Hinting 
    public function transfertVers(CompteBancaire $compte, $montant)
    {
        $this->retire($montant);
        $compte->depose($montant);
        
        //façon alternative de vérifier la classe de $compte
        /*if($compte instanceof CompteBancaire)
        {
            $this->retire($montant);
            $compte->depose($montant);
        }
        else
            trigger_error("Le paramètre doit être un objet de type CompteBancaire.", E_USER_ERROR);     
        */    
    }

    // Recevoir un tableau
        // class Equipe {
            private $joueurs = [];
            // ...
        // 1 Recevoir le tableau en paramétre.
        public function setJoueurs(array $arrJoueurs) {
            // 2 Vérifier si'il est bien instancier.
            foreach ($arrJoueurs as $j) {
                if (!($j instanceof Sportif)) {
                    throw new Exception("Le tableau en paramétre doit être une instance de Sportif", 1);
                }
            }
            // 3 Puis, l'ajouter à la variable.
            $this->joueurs = $arrJoueurs;
        }

    // 4 =======================//
    //Déconseillé d'accéder à une méthode de classe (statique) via une instance
    //echo $compte2->getCompteur();
    //la bonne façon : à partir de la classe et de l'opérateur de résolution de portée
    // echo CompteBancaire::getCompteur() . "<br>";

    // class CompteBancaire{
        //attribut statique - compteur accessible sans création d'instance
        protected static $compteur = 0;
        // ...
        public function __construct($numC, $nom)
        {
            //pour respecter l'encapsulation, on appelle les setters qui possèdent la logique de validation
            $this->setNomUsager($nom);
            $this->setNumeroCompte($numC);
            self::$compteur++;
        }

        public static function getCompteur()
        {
            return self::$compteur;
        }
    }

    
    // =========================//
    // PDO
    // =========================//
    // PDO::exec() ne retourne pas de résultat pour une requête SELECT. Pour une requête SELECT dont vous auriez besoin une seule fois dans le programme, utilisez plutôt la fonction PDO::query(). Pour une requête dont vous auriez besoin plusieurs fois, préparez un objet PDOStatement avec la fonction PDO::prepare() et exécutez la requête avec la fonction PDOStatement::execute().

    // La classe PDO
        // 1.0 PDO::__construct — Crée une instance PDO qui représente une connexion à la base
        // 1.1 PDO::exec — Exécute une requête SQL et retourne le nombre de lignes affectées
        // 1.2 PDO::lastInsertId — Retourne l'identifiant de la dernière ligne insérée ou la valeur d'une séquence
        // 1.3 PDO::prepare — Prépare une requête à l'exécution et retourne un objet
        // 1.4 PDO::query — Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement

    // DOStatement
        // 2.0 PDOStatement::bindParam — Lie un paramètre à un nom de variable spécifique
        // 2.1 PDOStatement::columnCount — Retourne le nombre de colonnes dans le jeu de résultats
        // 2.2 PDOStatement::execute — Exécute une requête préparée
        // 2.3 PDOStatement::fetch — Récupère la ligne suivante d'un jeu de résultats PDO
        // 2.4 PDOStatement::fetchAll — Retourne un tableau contenant toutes les lignes du jeu d'enregistrements

    
    
    // 6 ========================// 
    // Connexion à la base de donnée
    namespace App;
    use \PDO;

    abstract class Database {
        private $db_dsn = 'mysql:dbname=blog_test;host:localhost';
        private $db_user = 'root';
        private $db_pass = '';
        private $pdo;
        
        abstract function getTableName();
        abstract function getPrimaryKey();

        public function __construct() {
            // Dans le constructeur, on crée la connexion à la base de données qui sera utilisée par toutes les méthodes de l'objet
            try {
                $pdo = new PDO($this->db_dsn, $this->db_user, $this->db_pass);
            } catch (PDOExeption $e) {
                throw new Excepsion('Connexion échoué...' . $e->getMessage());
            }

            // Forcer d'afficher le message d'erreur
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Storer la rêquete PDO dans la variable actuelle ($this->pdo)
            $this->pdo = $pdo;
        }

        // Initialiser la BD
        public function getPDO() {
            return $this->pdo;
        }


    // 5 ========================// 
    // Exemple de CRUD
    
    /**
    * Obtenir toutes les éléments dans une requête
    */
    public function getAll() {
        try {
            // Connecter à la BD et faire une requête
            $sql = "SELECT * FROM " . $this->getTableName();
            $result = $this->getPDO()->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            trigger_error('La requête SQL a donné une erreur:' . $e->getMessage());
        }
    }


    /**
     * Obtenir l'élément par id 
     */
    public function getById($id) {
        try {
            $sql = "SELECT * FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() . "= :id";
            $result = $this->getPDO()->prepare($sql);
            $result->bindParam(':id', $id);
            $result->execute();

            return $result->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            trigger_error('La requête SQL a donné une erreur:', $e->getMessage());
        }
    }
    

    /**
     * Supprimer l'élément indiquer dans la requête
     */
    public function delete($id) {
        try {
            $sql = "DELETE FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() . "= :id";
            $result = $this->getPDO()->prepare($sql);
            $result->bindParam(':id', $id);
            $result->execute();
            return $result->rowCount();
        } catch (PDOException $e) {
            trigger_error('La requête SQL a donné une erreur:', $e->getMessage());
        }
    }


    /**
     * Ajout d'un élément
     */
    public function addPost($titre, $contenu, $date) {
        try {
            $sql = "INSERT INTO articles (`titre`, `contenu`, `datePublie`) 
                    VALUES (:titre, :contenu, :datePublie)";
            $result = $this->getPDO()->prepare($sql);
            $result->bindParam(':titre', $titre);
            $result->bindParam(':contenu', $contenu);
            $result->bindParam(':datePublie', $datePublie);
            $result->execute();
            return $result->rowCount();
        } catch (PDOException $e) {
            trigger_error('La requête SQL a donné une erreur:', $e->getMessage());
        }
    }
}