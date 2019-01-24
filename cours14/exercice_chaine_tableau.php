<?php
// Les functions utilisées
// 1 Des functions sur string
  // 1.1 strlen() - Calcule la taille d'une chaîne
  // 1.2 strpos() - Cherche la position de la première occurence dans une chaîne
  // 1.3 str_replace() - Remplace toutes les occurences dans une chaîne
  // 1.4 trim() - Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
  // 1.5 rtrim() - Supprime les espaces à la fin de chaîne
  // 1.6 strrev() - Inverse une chaîne
  // 1.7 str_split() - Convertit une chaîne de caractères en tableau
  // 1.8 explode() - Scinde/Divise une chaîne de charactères en segments
  // 1.9 implode() - Rassemble les éléments d'un tableau en une chaîne

// 2 Functions sur array
  // 2.1 count() - Compte toutes les éléments dans un tableau ou quelque chose d'un objet
  // 2.2 array_reverse() - Inverse les éléments d'un tableau
  // 2.3 array_chunk() - Sépare un tableau en tableaux de taille inférieure
  // 2.4 array_map() - Applique une function sur les éléments d'un talbeau 
  // 2.5 array_slice() - Extrait un portion de tableau
  // 2.6 array_splice() - Efface, ajoute et remplace une portion de tableau
  // 2.7 array_merge() - Fusionne plusieurs tableaux un un seul


//Exercice : Chaîne de caractères et tableaux! (8% total (4% pour chaine et 4% pour tableau))

//Écrire les fonctions suivantes sur les chaines : 

/*
NB : Vous ne pouvez pas utiliser les expressions régulières. 
NB 2 : Les solutions trouvées sur Internet peuvent être bonne, mais que vous apportent-elles dans votre apprentissage ? 
Une solution copiée sans la référence est du plagiat.

#1
Fonction : retireEspaces
Fonction qui retire tous les espaces d'une chaine de caractère passée en paramètre et retourne la nouvelle chaine
Paramètre : sChaine:String
*/


/*
// Methode 1 avec la function str_replace() =================//
function retireEspaces($sChaine)
{
  $nouvChaine = str_replace(" ", "", $sChaine);
  return $nouvChaine;
}
$sRes = retireEspaces(" Allo  le monde");
var_dump($sRes);
*/


/*
// Methode 2 avec explode() =================//
function retireEspaces($sChaine)
{    
  $aChaine = explode(" ", $sChaine);
  
  for ($i=0; $i < count($aChaine); $i++) { 
    if ($aChaine[$i] !== "") {
      $aSansEspace[] = $aChaine[$i]; //Ajoute les éléments différentes d'une éspace vide
    }
  }
  $sNouvChaine = implode($aSansEspace); // Rassemble les éléments du tableau en chaîne
  return $sNouvChaine;
}
$sRes = retireEspaces(" Allo  le monde");
var_dump($sRes);
*/


/*
#2
Fonction : compteMots
Fonction retourne le nombre (type Nombre) de mot d'une chaine de caractère passée en paramètre.
Paramètre : sChaine:String
*/

/*
Methode 1 avec for ================//
function compteMots($sChaine)
{
  $aChaine = explode(" ", $sChaine); // Divise la chaîne de caractères en tableau
  $nMots = 0;

  for ($i=0; $i < count($aChaine); $i++) { 
    if ($aChaine[$i] !== "") {
      $nMots++;
    }
  }
  return $nMots;
}
$sRes = compteMots(" Allo  le monde");
var_dump($sRes);
*/


/*
// Methode 2 avec la function str_word_count() =================//
function compteMots($sChaine)
{
  $nMots = str_word_count($sChaine, 0);
  return $nMots;
}
$sRes = compteMots(" Allo  le monde");
var_dump($sRes);
*/


/*#3
Fonction : inverseMots
Écrire une fonction qui inverse les mots d'une chaine de caractère passée en paramètre. La fonction retourne la nouvelle chaine. La chaine ‘un deux trois’ devient ‘trois deux un’
Paramètre : sChaine:String
*/


/*
// Methode 1 avec la function array_reverse() ===============//
function inverseMots($sChaine)
{
  $aChaine = explode(" ", $sChaine);
  $aRevChaine = array_reverse($aChaine); // Inverse les éléments d'un tableau
  $sRevChaine = implode(" ", $aRevChaine); // Ressemble les éléments d'un tableau en une chaîne
  return $sRevChaine;
}
$sRes = inverseMots("un deux trois");
var_dump($sRes);
*/


/*
// Methode 2 avec for ===============//
function inverseMots($sChaine)
{
  $aChaine = explode(" ", $sChaine);
  $nLongeur = count($aChaine);
  $sRevChaine = "";

  for ($i=$nLongeur-1; $i>=0; $i--) { 
    $sRevChaine .= $aChaine[$i] . " ";  // Concatène chaque éléments suivit d'une espace vide en une chaîne
  }

  $sRevChaine = rtrim($sRevChaine); // Supprime l'espace vide à la fin de la chaîne
  return $sRevChaine;
}
$sRes = inverseMots("un deux trois");
var_dump($sRes);
*/


/*
// Methode 3 avec la function implode() ===============//
function inverseMots($sChaine)
{
  $aChaine = explode(" ", $sChaine);
  $nLongeur = count($aChaine);

  // for ($i=$nLongeur-1, $j=0; $i>0, $j<$nLongeur; $i--, $j++) {
    // $aRevChaine[$j] = $aChaine[$i];
  // }

  for ($i=$nLongeur-1; $i>=0; $i--) {
    $aRevChaine[] = $aChaine[$i]; // De cette façon function aussi toutefois, je ne sais pas si c'est correct.
  }
  
  $aRevChaine = implode(" ", $aRevChaine); // Ressemble les éléments d'un tableau en une chaîne
  return $aRevChaine;
}
$sRes = inverseMots("un deux trois");
var_dump($sRes);
*/


/*
#4
Fonction : inverseLettres
Fonction qui inverse les lettres des mots d'une chaine de caractère passée en paramètre. La fonction retourne la nouvelle chaine. La chaine ‘un deux trois’ devient ‘nu xued siort’
Paramètre : sChaine:String
*/


/*
// Methode 1 avec la function strrev() ===============//
function inverseLettres($sChaine)
{
  $aChaine = explode(" ", $sChaine);
  
  for ($i=0; $i < count($aChaine); $i++) {
    $aRevChaine[] = strrev($aChaine[$i]);
  }
  $sRevChaine = implode(" ", $aRevChaine);
  return $sRevChaine;
}
$sRes = inverseLettres("un deux trois");
var_dump($sRes);
*/


/*
// Methode 2 avec la function array_map() ==============//
function inverseLettres($sChaine)
{
  $aChaine = explode(" ", $sChaine);
  $aChaine = array_map("strrev", $aChaine); // Applique la function strrev() sur chaque éléments du tableau
  $sRevChaine = implode(" ", $aChaine);
  
  return $sRevChaine;
}
$sRes = inverseLettres("un deux trois");
var_dump($sRes);
*/


//Écrire les fonctions suivantes sur les tableaux : 

/*
#5
Fonction : inversePaire
Fonction qui inverse les paires d’élément d’un tableau passé en paramètre Ex. [a1, a2, b1, b2, c1, c2] devient [a2, a1, b2, b1, c2, c1]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array
*/


/*
function inversePaire($aTableau)
{
  $aSepare = array_chunk($aTableau, 2); // Sépare le tableau en tableaux bidimensionnels
  $nLongeur = count($aSepare);

  for ($row=0; $row < $nLongeur; $row++) {
    for ($col=1; $col >= 0; $col--) {
      $aNouvTab[$row][$col] = $aSepare[$row][$col];
    }
  }
  $aNouvTab = array_merge($aNouvTab[0], $aNouvTab[1], $aNouvTab[2]); // Fusionne les tableaux bidimensionnels en unidimensionnel 
  return $aNouvTab;
}
$aRes = inversePaire(["a1", "a2", "b1", "b2", "c1", "c2"]);
var_dump($aRes);
*/


/*
#6
Fonction : tourne
Fonction qui fait tourner X fois les éléments d’un tableau passé en paramètre. Ex. : tourne([1, 2, 3, 4], 2) devient [3, 4, 1, 2]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array, nFois:Nombre
*/


/*
//Methode 1 pas finaliser =============//
function tourne($aTableau, $nFois)
{
  $aTemp = array_slice($aTableau, $nFois); // Extrait les n éléments d'un tableau et les stocker dans un autre
  $aTemp = array_reverse($aTemp);

  for ($i=0; $i < $nFois; $i++) {
    $aEnleve = array_pop($aTableau); // Enleve les n éléments de la fin du tableau
    $aRassemble = array_unshift($aTableau, $aTemp[$i]); // Ajoute le tableau stocké au début du nouveau tableau
  }
  return $aTableau;
}
$aRes = tourne([1, 2, 3, 4], 2);
var_dump($aRes);
*/


/*
//Methode 2 avec array_splice() ==============//
function tourne($aTableau, $nFois)
{
  $aTemp = array_splice($aTableau, $nFois, count($aTableau) - $nFois); // Enleve le n éléments du tableau
  $aNouvTab = array_merge($aTemp, $aTableau); // Fusionne les tableaux
  return $aNouvTab;
}
$aRes = tourne([1, 2, 3, 4], 2);
var_dump($aRes);
*/


/*
//Methode 3 ==============//
function tourne($aTableau, $nFois)
{
  $nLongeurTab = count($aTableau);

  if ($nLongeurTab >= 2) {
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


/*
#7
Fonction : insere
Écrire une fonction qui insère un élément dans un tableau passé en paramètre, à un index précis. La fonction décale tous les éléments suivants.  La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array, element:*, index:Nombre
*/

/*
Methode 1 ===================//
function insere($aTableau, $element, $nIndex)
{
  $ajouteElement = array_splice($aTableau, $nIndex, 0, $element);
  return $aTableau;
}
$aRes = insere([1, 2, 3, 4, 5], 'Hi', 2);
var_dump($aRes);
*/


/*
Methode 2 ===================/
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
Methode 1 ===================//
function separe($aTableau)
{
  $nLongeurTab = count($aTableau);
  $aMoitie = $nLongeurTab % 2;

  
  // Férifie si la longeur du tableau et divisible par deux, 
  // au cas contraire on ajoute un élément vide à la fin du tableau
  if ($aMoitie !== 0) {
    array_push($aTableau, "");
  }

  // Sépare le tableau en tableaux bidimesionnels 
  $aNouvTab = array_chunk($aTableau, intdiv(count($aTableau), 2));
	return $aNouvTab;
}
$aRes = separe([1, 2, 3, 4, 5, 6, 7]);
var_dump($aRes);
*/


/*
Methode 2 ===================//
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
