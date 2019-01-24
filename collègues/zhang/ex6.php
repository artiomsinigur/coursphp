<?php
/*
/* Je teste avec $nFois=1/3/4 mais ca ne mache pas.
J'ai modifié le programme avec la même fonction(array_slice()).
Enfin, c'est mon programme. you can test it.
*/

//Methode 1 avec array_slice() =============//
function tourne($aTableau, $nFois)
{
  $aTemp = array_slice($aTableau, -$nFois, $nFois); // Extrait le n élément de fin du tableau

  for ($i=0; $i<count($aTableau)-$nFois; $i++) { 
    $aTemp[] = $aTableau[$i];
  }

  return $aTemp;
}
$aRes = tourne([1, 2, 3, 4], 2);
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
$aTab6 = tourne($aTableau6,4);
var_dump($aTab6);

?>
*/