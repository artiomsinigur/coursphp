<?php

  class Equipe
  {
    private $nom;
    private $ville;

    public function __construct($n, $v)
    {
        $this->nom = $n;
        $this->ville = $v;
    }

    //getters

    public function getNomEquipe()
    {
        return $this->nom;
    }

    public function getVille()
    {
        return $this->ville;
    }


    //setters
  public function setNom($n)
  {
    if(!(is_numeric($n))){
    $this->nom = $n;
  }
    else{
      trigger_error("La valeur rentrée doit être une chaine de caractères");
    }
  }

  public function setVille($v)
  {
    if(!(is_numeric($v))){
    $this->ville = $v;
  }
    else{
      trigger_error("La valeur rentrée doit être une chaine de caractères");
    }
  }


  }


  class Joueur
  {
    private $equipe;
    private $prenom;
    private $nom;
    private $passes;
    private $buts;


    public function __construct(Equipe $e, $p, $n, $passes, $buts)
    {
        $this->equipe = $e;
        $this->prenom = $p;
        $this->nom = $n;
        $this->passes = $passes;
        $this->buts = $buts;

    }


    //getters

    public function getEquipe()
    {
        return $this->equipe;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPasses()
    {
        return $this->passes;
    }

    public function getButs()
    {
        return $this->buts;
    }




    //setters

    public function setEquipe(array $equipe)
          {
              foreach($equipe as $e)
              {
                  if(!($e instanceof Equipe))
                      trigger_error("Le tableau envoyé en paramètres ne doit contenir que des equipes.", E_USER_ERROR);
              }
              //si je suis rendu ici c'est que tous les éléments du tableau sont des auteurs.
              $this->equipe = $equipes;
          }

  public function setPrenom($p)
  {
    if(!(is_numeric($p))){
    $this->passes = $p;
  }
    else{
      trigger_error("La valeur rentrée doit être une chaine de caractères");
    }
  }

  public function setNom($n)
  {
  if(!(is_numeric($n))){
  $this->nom = $n;
  }
  else{
    trigger_error("La valeur rentrée doit être une chaine de caractères");
  }
  }

  public function setPasses($passes)
  {
  if(is_int($passes)){
  $this->passes = $passes;
  }
  else{
    trigger_error("La valeur rentrée doit être un entier");
  }
  }

  public function setButs($buts)
  {
  if(is_int($buts)){
  $this->buts = $buts;
  }
  else{
    trigger_error("La valeur rentrée doit être un entier");
  }
  }

  //méthodes

  public function calculePoints()
    {
      return ($this->getButs()*2) + $this->getPasses();
    }





  public function getDescription()
        {
          $description = "Prénom du joueur : " . $this->getPrenom() . "<br>";
          $description .= "Nom du joueur : " . $this->getNom() . "<br>";
          $description .= "Nombre de passes : " . $this->getPasses() . "<br>";
          $description .= "Nombre de buts : " . $this->getButs() . "<br>";
          $description .= "Calcul de points : " . $this->calculePoints() . "<br>";

          //  ($this->equipe as $e)

                
                $description .= "Nom de l'équipe : " . $this->equipe->getNomEquipe() . "<br>";
                $description .= "Ville de l'équipe : " . $this->equipe->getVille() . "<br>";
                $description .= "<br>";




            return $description;
        }




  }


  class Participant
  {

        private $nom;
        private $prenom;
        private $joueurs;


        public function __construct($n, $p, array $j)
        {
            $this->nom = $n;
            $this->prenom = $p;
            $this->setJoueurs($j);
        }



        //getters
        public function getNomParticipant()
        {
            return $this->nom;
        }

        public function getPrenomParticipant()
        {
            return $this->prenom;
        }




          //setters
        public function setNomParticipant($n)
        {
        if(!(is_numeric($n))){
        $this->nom = $n;
        }
        else{
          trigger_error("La valeur rentrée doit être une chaine de caractères");
        }
        }

        public function setPrenomParticipant($p)
        {
          if(!(is_numeric($p))){
          $this->passes = $p;
        }
          else{
            trigger_error("La valeur rentrée doit être une chaine de caractères");
          }
        }




        public function setJoueurs(array $joueurs)
        {
            foreach($joueurs as $j)
            {
                if(!($j instanceof Joueur))
                    trigger_error("Le tableau envoyé en paramètres ne doit contenir que des joueurs.", E_USER_ERROR);
            }

            $this->joueurs = $joueurs;
        }



        //méthodes

        public function calculePoints()
        {
          $pointsParticipant = 0;
          foreach($this->joueurs as $j)
          {
            $pointsParticipant += $j->calculePoints();
          }
          return $pointsParticipant;
        }

        public function calculeMoyennePoints()
        {
          $pointsParticipant = 0;
          foreach($this->joueurs as $j)
          {
            $pointsParticipant += $j->calculePoints();
          }
          $moyenneParticipant = $pointsParticipant / sizeof($this->joueurs);

          return $moyenneParticipant;
        }


        public function getDescriptionParticipant()
        {
          $description = "Prénom du participant : " . $this->getPrenomParticipant() . "<br>";
          $description .= "Nom du participant : " . $this->getNomParticipant() . "<br>";
          $description .= "Calcul de points : " . $this->calculePoints() . "<br>";
          $description .= "Moyenne de points : " . $this->calculeMoyennePoints() . "<br>";
          $description .= "<br>";


            return $description;
        }





  }








 ?>
