<?php
$aTauxFumeurSex = [
  'homme' => [
    1999 => 27,
    2000 => 26,
    2001 => 24,
    2002 => 23,
    2003 => 23,
    2004 => 22,
    2005 => 22,
    2006 => 20,
    2007 => 20,
    2008 => 20,
    2009 => 19,
    2010 => 20
  ],
  'femme' => [
    1999 => 23,
    2000 => 23,
    2001 => 20,
    2002 => 20,
    2003 => 18,
    2004 => 17,
    2005 => 16,
    2006 => 17,
    2007 => 18,
    2008 => 16,
    2009 => 16,
    2010 => 14
  ]
];


function afficherTauxFumeurSexe($aTauxFumeurSex, $sex, $periode) {
  $valueTaux = 0;
  foreach ($aTauxFumeurSex as $keySex => $value) {
    if ($keySex == $sex) {
      foreach ($aTauxFumeurSex[$keySex] as $keyPeriode => $valueTaux) {
        if ($keyPeriode == $periode) {
          echo $valueTaux . '%' . '<br>';
        }
      }
    }
  }
  return $valueTaux;
}

function afficherPeriodeFumeurSexe($aTauxFumeurSex, $sex, $periode) {
  $keyPeriode = 0;
  foreach ($aTauxFumeurSex as $keySex => $value) {
    if ($keySex == $sex) {
      foreach ($aTauxFumeurSex[$keySex] as $keyPeriode => $valueTaux) {
        if ($keyPeriode == $periode) {
          echo $keyPeriode . '<br>';
        }
      }
    }
  }
  return $keyPeriode;
}


$aErreur = [];
$nPeriodeSex = '';
$sGenre = '';
if (!empty($_POST)) {
  // Séparer les tableaux pour la function in_array()
  foreach ($aTauxFumeurSex as $keySex => $value) {
    $aSex[] = $keySex;
    foreach ($aTauxFumeurSex[$keySex] as $keyPeriode => $valueTaux) {
      $aPeriode[] = $keyPeriode;
    }
  }

  // Validation de genre
  if (isset($_POST['genre'])) {
    $sGenre = $_POST['genre'];
  }

  if (!in_array($sGenre, $aSex)) {
    echo 'Selecter un genre valide' . '<br>';
  }

  // Validation de periode
  if (isset($_POST['periode-sex'])) {
    $nPeriodeSex = $_POST['periode-sex'];
  }

  if(!in_array($nPeriodeSex, $aPeriode)) {
    echo 'Selecter un periode valide';
  }
  
  // Variante 2 pour valider le periode
  // if($nPeriodeSex == '' || !is_numeric($nPeriodeSex) || $nPeriodeSex < 1999 || $nPeriodeSex > 2001) {
  //   echo 'Selecter un periode valide';
  // } else {
  //   echo 'Periode recu';
  // }
  
  afficherTauxFumeurSexe($aTauxFumeurSex, $sGenre, $nPeriodeSex);
  afficherPeriodeFumeurSexe($aTauxFumeurSex, $sGenre, $nPeriodeSex);
}

var_dump($_POST);
var_dump($_GET);

// Lecture des donnes GET
if (!isset($_GET['page'])) {
  $page = 'acceuil';
} else {
  $page = $_GET['page'];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Taux fumer au Canada</title>
</head>
<body>
  <nav>
    <ul>
      <li><a href="?page=acceuil">Acceuil</a></li>
      <li><a href="?page=taux_sex">Taux selon sex</a></li>
      <li><a href="?page=taux_age">Taux selon le groupe d'âge</a></li>
    </ul>
  </nav>
  
  <form action="index.php" method="POST">
    <?php
    if ($page == 'acceuil') {
    ?>

    <div class="taux-sex">
      <select name="periode-sex">
        <option value="">Choisir l'année</option>
        <?php
        foreach ($aTauxFumeurSex['homme'] as $keyPeriode => $value) {
          echo '<option value="' . $keyPeriode . '">' . $keyPeriode . '</option>';
        }
        ?>
      </select>

      <input type="radio" name="genre" value="homme">Homme
      <input type="radio" name="genre" value="femme">Femme

      <button type="submit" name="soumettre">Soumettre</button>
      <button type="reset" name="effacer">Effacer</button>
      <a href="">Faire une autre requête</a>
    </div>

    <?php
    } else if ($page == 'taux_age') {
    ?>

    <div class="groupe-age">
      <select name="periode-age">
        <option value="">Choisir l'année</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
      </select>

      <select name="taux-age">
        <option value="15-19">15-19</option>
        <option value="20-24">20-24</option>
        <option value="25-34">25-34</option>
      </select>

      <button type="submit" name="soumettre">Soumettre</button>
      <button type="reset" name="effacer">Effacer</button>
      <a href="">Faire une autre requête</a>
    </div>
    <?php
    }
    ?>
  </form>
</body>
</html>