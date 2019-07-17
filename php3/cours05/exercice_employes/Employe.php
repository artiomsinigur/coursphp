<?php
    class Employe {
        private $nom;
        private $prenom;
        private $salaire;
    
        public function __construct($n, $p, $s) {
            $this->nom = $n;
            $this->prenom = $p;
            $this->salaire = $s;
        }

    }

    abstract class employe
        nom
        prenom
        __construct($n, $p)

    les class a creer
    SalaireHoraire
        extends Employe
            nom
            prenom
        salaireHoraire
        heure

    Vendeur
        extends Employe
            nom
            prenom
            extends SalaireHoraire
                salaireHoraire
                heure
        tauxCommission
        totalVente

    Superviseur
        extends Employe
            nom
            prenom
        salaireAnnuel


    ajouter des attributes dans la class abstrait et creer un constructeur qui recevra les attributs
    utiliser le constructeur de la class abstrait dans les class herite



?>