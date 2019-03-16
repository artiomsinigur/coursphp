<?php
/*
#6
Fonction : tourne
Fonction qui fait tourner X fois les éléments d’un tableau passé en paramètre. Ex. : tourne([1, 2, 3, 4], 2) devient [3, 4, 1, 2]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array, nFois:Nombre
*/

/*
function tourne($aTableau, $nFois)
{
  $nLongeurTab = count($aTableau);

  if ($nLongeurTab > $nFois) {
    for ($i=0; $i<$nFois; $i++) {
      for ($j=$nLongeurTab-1; $j>0; $j--) {
        $temp1 = $aTableau[$j];
        $temp2 = $aTableau[$j-1];
        $aTableau[$j] = $temp2;
        $aTableau[$j-1] = $temp1;
      }
    }
  }
  
  return $aTableau;
}
$aRes = tourne([1,2,3,4], 2);
var_dump($aRes);
*/

function tourne($aTableau, $nFois)
{
  $tab = array(4, 3, 2, 1);
  $aTableau = array(1, 2, 3, 4);
  $nFois = 2;
  for ($i=$nFois-1; $i > 0; $i--)
  {
    $tab[] = $aTableau[$i];
  }
  // echo $tab[1];
  
  return $tab;
}
$aRes = tourne([1,2,3,4], 2);
var_dump($aRes);



/*
#7
Fonction : insere
Écrire une fonction qui insère un élément dans un tableau passé en paramètre, à un index précis. La fonction décale tous les éléments suivants.  La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array, element:*, index:Nombre
*/

/*
function insere($aTableau, $element, $nIndex)
{
  $aDebutTab = array_slice($aTableau, 0, $nIndex != 0 ? $nIndex : $nIndex+1);
  $aNouvElement[] = $element;
  if ($nIndex != 0) {
    $aNouvTab = array_merge($aDebutTab, $aNouvElement);
  } else {
    $aNouvTab = array_merge($aNouvElement, $aDebutTab);
  }
  $aFinTab = array_slice($aTableau, $nIndex != 0 ? $nIndex : $nIndex+1, count($aTableau)-1);
  $aTableau = array_merge($aNouvTab, $aFinTab);

  return $aTableau;
}
$aRes = insere([1, 2, 3, 4, 5], 'Hi', 2);
var_dump($aRes);
*/



/*
#8 
Fonction : separe
Fonction qui retourne un tableau comprenant un tableau passé en paramètre séparé en deux. Ex : [1, 2, 3, 4, 5, 6] devient [[1,2,3],[4,5,6]]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array
*/

/*
function separe($aTableau)
{
  $nLongeurTab = count($aTableau);
  
  // Obtenir la moitié des éléments du tableau 
  if (($nLongeurTab % 2) == 0) {
    $nMoitieTab = intdiv($nLongeurTab, 2);
  } else {
    $nMoitieTab = intdiv($nLongeurTab+1, 2);
  }

  // Le cas ou le tableau est divisible par deux
  if ($nMoitieTab) {
    // Complete le premier niveau de tableau
    for ($i=0; $i < $nMoitieTab; $i++) { 
      $aNouvTableau[0][$i] = $aTableau[$i];
    }
    // Complete le deuxiem niveau de tableau
    for ($i=$nMoitieTab; $i < $nLongeurTab; $i++) { 
      $aNouvTableau[1][$i-$nMoitieTab] = $aTableau[$i];
    }
  }
  
  return $aNouvTableau;
}
$aRes = separe([1, 2, 3, 4, 5, 6, 7]);
var_dump($aRes);
*/