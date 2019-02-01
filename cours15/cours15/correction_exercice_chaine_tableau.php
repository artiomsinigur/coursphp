<?php
/* Références utiles :
 * Fonction sur les tableaux : http://php.net/manual/fr/ref.array.php
 * Fonctions sur les chaines : http://php.net/manual/fr/ref.strings.php
 */

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
function retireEspaces($sChaine)
{
	/*$res = '';
	for($i=0; $i< strlen($sChaine); $i++)
	{
		if($sChaine[$i] != " ")
		{
			$res .= $sChaine[$i];
		}
	}

	return $res;
	*/

	return str_replace(" ", "", $sChaine);
}
// Exemple de méthode de test
/*$sChaine1 = "   Allo   le monde";
$sRes = retireEspaces($sChaine1);
var_dump($sRes);
*/

/*
#2
Fonction : compteMots
Fonction retourne le nombre (type Nombre) de mot d'une chaine de caractère passée en paramètre.
Paramètre : sChaine:String
*/
function compteMots($sChaine)
{
	$nbMot = 0;

	// Nettoyage de chaine
	$sChaine = trim($sChaine); // Supprime les espaces de début et de fin
	while(strpos($sChaine, "  ") !== false)
	{
		$sChaine = str_replace('  ', ' ', $sChaine);
	}
	var_dump($sChaine);

	// Comptons les mots...
	for ($i=0; $i < strlen($sChaine) ; $i++) 
	{ 
		if($sChaine[$i] == " ")
		{
			$nbMot++;
		}
	}
	if($sChaine != "")
	{
		$nbMot += 1;	// Ajout du dernier mot si la chaine n'est pas vide
	}
	return $nbMot;
}

/*$sChaine1 = "   J'ai   ";
$sRes = compteMots($sChaine1);
var_dump($sRes);
*/
/*#3
Fonction : inverseMots
Écrire une fonction qui inverse les mots d'une chaine de caractère passée en paramètre. La fonction retourne la nouvelle chaine. La chaine ‘un deux trois’ devient ‘trois deux un’
Paramètre : sChaine:String
*/
function inverseMots($sChaine)
{
	$aChaine = explode(" ", $sChaine);
	//var_dump($aChaine);
	//krsort($aChaine);
	$aChaine = array_reverse($aChaine);
	//var_dump($aChaine);
	
	
	$sChaine = implode(' ',$aChaine );



	return $sChaine;
}
/*
$sChaine1 = "Allo le monde";
$sRes = inverseMots($sChaine1);
var_dump($sRes);
*/
/*
#4
Fonction : inverseLettres
Fonction qui inverse les lettres des mots d'une chaine de caractère passée en paramètre. La fonction retourne la nouvelle chaine. La chaine ‘un deux trois’ devient ‘nu xued siort’
Paramètre : sChaine:String
*/
function inverseLettres($sChaine)
{
	$aChaine = explode(" ", $sChaine);	

	/*for($i = 0 ; $i< count($aChaine); $i++){
		$aChaine[$i] = strrev($aChaine[$i]);
	}
	$sChaine = implode(' ',$aChaine );
	*/

	foreach ($aChaine as $cle => $sMot) {
		$aChaine[$cle] = strrev($sMot);
	}
	$sChaine = implode(' ',$aChaine );
	return $sChaine;
}
/*
$sChaine1 = "Allo le monde";
$sRes = inverseLettres($sChaine1);
var_dump($sRes);
*/
//Écrire les fonctions suivantes sur les tableaux : 

/*
#5
Fonction : inversePaire
Fonction qui inverse les paires d’élément d’un tableau passé en paramètre Ex. [a1, a2, b1, b2, c1, c2] devient [a2, a1, b2, b1, c2, c1]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array
*/
function inversePaire($aTableau)
{
	for($i=0; $i< count($aTableau); $i+=2)
	{
		if(isset($aTableau[$i+1]))
		{
			$temp = $aTableau[$i];
			$aTableau[$i] = $aTableau[$i+1];
			$aTableau[$i+1] = $temp;
		}
	}
	return $aTableau;
}
/*
$aTableau = array("1", "2", "3", "4", "5");
$aRes = inversePaire($aTableau);
var_dump($aRes);
*/
/*
#6
Fonction : tourne
Fonction qui fait tourner X fois les éléments d’un tableau passé en paramètre. Ex. : tourne([1, 2, 3, 4], 2) devient [3, 4, 1, 2]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array, nFois:Nombre
*/
function tourne($aTableau, $nFois)
{
	for($i=0; $i<$nFois;$i++)
	{
		$temp = array_pop($aTableau);
		array_unshift($aTableau, $temp);
	}
	return $aTableau;
}
/*
$aTableau = array("1", "2", "3", "4", "5");
$aRes = tourne($aTableau, 25);
var_dump($aRes);
*/
/*
#7
Fonction : insere
Écrire une fonction qui insère un élément dans un tableau passé en paramètre, à un index précis. La fonction décale tous les éléments suivants.  La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array, element:*, index:Nombre
*/
function insere($aTableau, $element, $index)
{
	array_splice($aTableau, $index, 0, $element);
	return $aTableau;
}
/*
$aTableau = array(10 => "1", "2", "3", "4", "5");
$aRes = insere($aTableau, "25", 25);
var_dump($aRes);

$aTableau[] = "25";
var_dump($aTableau);
*/
/*
#8 
Fonction : separe
Fonction qui retourne un tableau comprenant un tableau passé en paramètre séparé en deux. Ex : [1, 2, 3, 4, 5, 6] devient [[1,2,3],[4,5,6]]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array
*/
function separe($aTableau)
{
	$taille = ceil(count($aTableau)/2);

	return array_chunk($aTableau, $taille );
}

$aTableau = array("1", "2", "3", "4", "5", "6", "7");
$aRes = separe($aTableau);
var_dump($aRes);










