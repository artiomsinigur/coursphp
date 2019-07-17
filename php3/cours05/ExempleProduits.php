<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
        <?php
            class Produit
            {
                public $nom;
                public $prix;
                public $description;
                
                public function __construct($n, $p, $d)
                {
                    $this->nom = $n;
                    $this->prix = $p;
                    $this->description = $d;
                }
                
                public function getResume()
                {
                    return "Le produit se nomme $this->nom, coute $this->prix et est décrit comme suit : $this->description.";
                }
            }
        
            class Livre extends Produit
            {
                public $nbPages;
                
                public function __construct($n, $p, $d, $nbP)
                {
                    parent::__construct($n, $p, $d);
                    $this->nbPages = $nbP;
                }
                
                public function getResume()
                {
                    $resumeParent = parent::getResume();
                    return $resumeParent . "C'est un livre et il a $this->nbPages pages.";
                }
            }
        
            class CD extends Produit
            {
                public $nbPistes;
                
                public function __construct($n, $p, $d, $nbP)
                {
                    parent::__construct($n, $p, $d);
                    $this->nbPistes = $nbP;
                }
                
                public function getResume()
                {
                    $resumeParent = parent::getResume();
                    return $resumeParent . "C'est un CD et il a $this->nbPistes pistes.";
                }
            }
        
        
            class Panier
            {
                //tableau encapsulé qui contiendra des produits
                private $tabProduits = array();
                
                public function ajouteProduit(Produit $p)
                {
                    $this->tabProduits[] = $p;
                }
                
                public function afficheContenu()
                {
                    echo "<ul>";
                    foreach($this->tabProduits as $p)
                    {
                        echo "<li>" . $p->getResume() . "</li>";
                    }
                    echo "</ul>";
                }
            }
        
        
            //test des classes
            $leProduit = new Produit("Sacs poubelles", 8, "Boite de sacs poubelles.");
            $leLivre = new Livre("The Road", 25, "Livre de Cormac McCarthy.", 350);
            $leCD = new CD("Slanted and Enchanted", 20, "CD de Pavement", 14);
        
            $lePanier = new Panier();
            $lePanier->ajouteProduit($leProduit);
            $lePanier->ajouteProduit($leCD);
            $lePanier->ajouteProduit($leLivre);
        
            $lePanier->afficheContenu();
        ?>