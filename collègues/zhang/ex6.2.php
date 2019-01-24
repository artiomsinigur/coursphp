<?php
/*
/* Je teste avec $nFois=1/3/4 mais ca ne mache pas.
J'ai modifié le programme avec la même fonction(array_slice()).
Enfin, c'est mon programme. you can test it.
*/

//Methode 1 avec array_slice() =============//
function tourne($aTableau, $nFois)
{
  $nFois= ($nFois%count($aTableau)); // eviter nFois plus grand que 4;
  //var_dump($nFois);
  $aTemp = array_slice($aTableau, $nFois); // Extrait les n éléments d'un tableau et les stocker dans un autre0
  //var_dump($aTemp);
  //echo" <br>";

  $nFois=count($aTemp); 
  for ($i=0; $i < $nFois; $i++) {
    $aEnleve = array_pop($aTableau); // Enleve les n éléments de la fin du tableau
    //J'ai apporté un petit changement au programme.
    array_unshift($aTableau, array_pop($aTemp)); //ajoute la fin de element de $aTemp au debut de $aTableau
    //var_dump($aTableau);
    //echo "<br>";
  }
  
  return $aTableau;
}
$aRes = tourne([1, 2, 3, 4], 1);
var_dump($aRes); echo" <br>";
$aRes = tourne([1, 2, 3, 4], 2);
var_dump($aRes); echo" <br>";
$aRes = tourne([1, 2, 3, 4], 3);
var_dump($aRes); echo" <br>";
$aRes = tourne([1, 2, 3, 4], 4);
var_dump($aRes); echo" <br>";
$aRes = tourne([1, 2, 3, 4], 5);
var_dump($aRes); echo" <br>";
$aRes = tourne([1, 2, 3, 4], 6);
var_dump($aRes); echo" <br>";
$aRes = tourne([1, 2, 3, 4], 7);
var_dump($aRes); echo" <br>";
$aRes = tourne([1, 2, 3, 4], 8);
var_dump($aRes); echo" <br>";

/*  
//Mon programme 
function tourne($aTableau,$nFois)
{
    $nLongeur=count($aTableau);
    //$aNewArray=array();
    $j=$nFois%$nLongeur;
    for ($i=0; $i<$nLongeur ; $i++) { 
        
        if (($i+$j)<($nLongeur)) {
          $aNewArray[]=$aTableau[$i+$j];
      }
      else {
          $aNewArray[]=$aTableau[$j+$i-$nLongeur];
      }
  //echo($aNewArray);
  }
  return($aNewArray);    
}
$aTableau6 = array("1","2","3","4","5","6","7");
$aTab6 = tourne($aTableau6,13);
var_dump($aTab6);
*/
?>