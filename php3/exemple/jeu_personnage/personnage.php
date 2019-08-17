<?php
class personnage {
    private $vie = 80;
    private $atk = 20;
    // protected $nom;
    private $nom;

    public function __construct($n) {
        $this->nom = $n;
    }

    // GETTERS
    public function getVie() {
        return $this->vie;
    }

    public function getNom() {
        return $this->nom;
    }

    // SETTERS
    public function setVie($v) {
        $this->nom = $nom;
    }

    public function setNom($n) {
        $this->nom = $n;
    }

    public function crier() {
        echo 'Attaque!!!';
    }

    public function regenerer($vie = null) {
        if (is_null($vie)) {
            $this->vie = 100;
        } else {
            $this->vie += $vie;
        }
    }

    public function mourir() {
        if ($this->vie <= 0) {
            return true;
        } else {
            return false;
        }
    }

    public function attaquer($cible) {
        $cible->vie -= $this->atk;
    }
}

?>