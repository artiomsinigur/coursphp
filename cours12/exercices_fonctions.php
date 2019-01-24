<?php

//Exercices sur les fonctions (2 %)
/*
//1. Avec switch, écrire une fonction qui retourne le nom du mois selon la valeur du paramètre passé (1 à 12)
function mois($nMois)
{
  switch ($nMois) {
    case '1':
      echo 'Janvier';
      break;
    case '2':
      echo 'Février';
      break;
    case '3':
      echo 'Mars';
      break;
    case '4';
      echo 'Avril';
      break;
    case '5';
      echo 'Mai';
      break;
    case '6';
      echo 'Juin';
      break;
    case '7';
      echo 'Juillet';
      break;
    case '8';
      echo 'Août';
      break;
    case '9';
      echo 'Septembre';
      break;
    case '10';
      echo 'Octobre';
      break;
    case '11';
      echo 'Novembre';
      break;
    case '12';
      echo 'Décembre';
      break;
    default:
      echo 'Choisissez entre 1 et 12';
  }
}
$nMois = 1;
$sMois = mois($nMois);
var_dump($sMois);
*/


/*
//2. Écrire une fonction qui vérifie si un nombre passé en paramètre est divisible par 2 et qui retourne une valeur booléenne.
function pair($nValeur)
{
  $nSom = 0;
  $nSom = $nValeur % 2;
  if ($nSom == 0) {
    $rBoolean = true;
  } else {
    $rBoolean = false;
  }
  return $rBoolean;
}
$nValeur = 2;
$sPair = pair($nValeur);
var_dump($sPair);
*/


/*
//3. Écrire une fonction qui vérifie si un nombre est divisible par x et qui retourne une valeur booléenne. Les deux nombres sont passés par paramètre.
function divisible($nValeur, $nDiviseur)
{
  $sValeur = $nValeur % $nDiviseur;
  if ($sValeur == 0) { 
    $rBoolean = true;
  } else { 
    $rBoolean = false;
  } 
  return $rBoolean;
}
$sDivisible = divisible(10, 5);
var_dump($sDivisible);
*/


//4. Écrire une fonction qui retourne une valeur de la suite de Fibonacci selon sa position. L'index doit être passé en paramètre à la fonction. 2 étant la 3e valeur de la suite.
function fibo($nIndex)
{
  $som = 0;
  $a = 1;
  $b = 0;
  for ($i = 2; $i <= $nIndex; $i++) {
    $som = $a + $b;
    $b = $a;
    $a = $som;
  }
  return $som;
}
$nIndex = 8;
$nFibo = fibo($nIndex);
echo "Le nombre de Fibonncci: $nFibo";


?>