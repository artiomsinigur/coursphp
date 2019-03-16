<?php
// Vérifier si le champ nom est vide 
$name = $_GET['nom'];

if ($name == '') {
  echo 'Le champ nom est vide. Entrez un nom' . '<br>';
}

// 1.0 Vérifier si le champ age est inférieur ou égale à zero
// 1.1 Entre 1 et 16 vous etes Debutant
// 1.2 Entre 16 et 20 vous etes Novice
// 1.3 Entre 20 et 30 vous etes Expert
// 1.4 Entre 30 plus vous etes Elite
$age = $_GET['age'];
$category = $_GET['categorie'];

if ($age <= 0) {
  echo 'Entrez un age positive' . '<br>';
} else {
  if ($age >= 1 && $age <= 16) {
    if ($category !== 'debutant') {
      echo 'Vous devez choisir la categorie debutant. Age entre 1 et 16' . '<br>';
    }
  } elseif ($age >= 16 && $age <= 20) {
    if ($category !== 'novice') {
      echo 'Vous devez choisir la categorie novice. Age entre 16 et 20' . '<br>';
    }
  } elseif ($age >= 20 && $age <= 30) {
    if ($category !== 'expert') {
      echo 'Vous devez choisir la categorie expert. Age entre 20 et 30' . '<br>';
    }
  } elseif ($age >= 30) {
    if ($category !== 'elite') {
      echo 'Vous devez choisir la categorie elite. Age 30 et plus' . '<br>';
    }
  }
}


var_dump($category);
var_dump($name);
var_dump($age);
?>
