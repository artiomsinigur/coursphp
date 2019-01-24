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
echo "<br>";
echo "<br>";
echo "<br>";
echo "Exercice 1";
echo "<br>";

function retireEspaces($sChaine)
{
	$sChaine = str_replace(" ", "", $sChaine);
	return $sChaine;
}

// Exemple de méthode de test
$sChaine = "  Allo   le    monde   ";
$sRes = retireEspaces($sChaine);
var_dump($sRes);




/*
#2
Fonction : compteMots
Fonction retourne le nombre (type Nombre) de mot d'une chaine de caractère passée en paramètre.
Paramètre : sChaine:String
*/
echo "<br>";
echo "<br>";
echo "<br>";
echo "Exercice 2";
echo "<br>";

function compteMots($sChaine)
{
	$sChaine = trim($sChaine); 
	if($sChaine)
	{
		$nCompteurRemplacement = 0;
		do 
		{
			$sChaine = str_replace("  ", " ", $sChaine, $nCompteurRemplacement );
		} while ( $nCompteurRemplacement != 0);
		$nbMot = count(explode(" ", $sChaine));	
	}
	else
	{
		$nbMot = 0;
	} 
 
	return $nbMot;
}

//Test
$sChaine = "  Allo   le    monde   ";
$nbMot = compteMots($sChaine);
var_dump($nbMot);



/*#3
Fonction : inverseMots
Écrire une fonction qui inverse les mots d'une chaine de caractère passée en paramètre. La fonction retourne la nouvelle chaine. La chaine ‘un deux trois’ devient ‘trois deux un’
Paramètre : sChaine:String
*/
echo "<br>";
echo "<br>";
echo "<br>";
echo "Exercice 3";
echo "<br>";

function inverseMots($sChaine)
{	
	$aChaine = explode(" ", $sChaine);  
	$aChaine = array_reverse($aChaine);
	$sChaine = implode(" ", $aChaine);	
	return $sChaine;
}

//Test
$sChaine = "    un     deux     trois       ";  
$sMotInverse = inverseMots($sChaine);   // reproduit :  "       trois     deux     un    "
var_dump($sMotInverse);


/*
#4
Fonction : inverseLettres
Fonction qui inverse les lettres des mots d'une chaine de caractère passée en paramètre. La fonction retourne la nouvelle chaine. La chaine ‘un deux trois’ devient ‘nu xued siort’
Paramètre : sChaine:String
*/

echo "<br>";
echo "<br>";
echo "<br>";
echo "Exercice 4";
echo "<br>";

function inverseLettres($sChaine)
{
	$aChaine = explode(" ", $sChaine);  
	for($i =0; $i < count($aChaine); $i++)
	{
		$aChaine[$i] = strrev($aChaine[$i]);
	}	
	$sChaine = implode(" ", $aChaine);	
	return $sChaine;
}

//Test
$sChaine = "    un     deux     trois            ";
$sChaine = inverseLettres($sChaine);
var_dump($sChaine);

//Écrire les fonctions suivantes sur les tableaux : 

/*
#5
Fonction : inversePaire
Fonction qui inverse les paires d’élément d’un tableau passé en paramètre Ex. [a1, a2, b1, b2, c1, c2] devient [a2, a1, b2, b1, c2, c1]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array
*/

echo "<br>";
echo "<br>";
echo "<br>";
echo "Exercice 5";
echo "<br>";

function inversePaire($aTableau)
{
	for($i = 0; $i < count($aTableau)-1; $i+=2)
	{
		$temp = $aTableau[$i];
		$aTableau[$i] = $aTableau[$i+1];
		$aTableau[$i+1] = $temp;
	}	
	return $aTableau;
}

//Test
$aTableau = ["a1", "a2", "b1", "b2", "c1", "c2", "d1"];
$aTableau = inversePaire($aTableau);
var_dump($aTableau);

/*
#6
Fonction : tourne
Fonction qui fait tourner X fois les éléments d’un tableau passé en paramètre. Ex. : tourne([1, 2, 3, 4], 2) devient [3, 4, 1, 2]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array, nFois:Nombre
*/

echo "<br>";
echo "<br>";
echo "<br>";
echo "Exercice 6";
echo "<br>";

function tourne($aTableau, $nFois)
{
	$nTailleTableau = count($aTableau);

	if($nTailleTableau > 1)  //  Pour ne pas generer d'erreur dans le cas ou $aTableau=[] et ne pas taiter le cas ou il y a un element
	{
		for($i = 0; $i < $nFois; $i++)
		{
			$temp = $aTableau[$nTailleTableau-1];
			for($j = $nTailleTableau-1; $j >0 ; $j--)
			{
				$aTableau[$j] = $aTableau[$j-1];
			}
			$aTableau[0] = $temp;
		}	
	}
	return $aTableau;
}

//Test
$aTableau = [1, 2, 3, 4,5,6];
$aTableau = tourne($aTableau, 5);
var_dump($aTableau);

/*
#7
Fonction : insere
Écrire une fonction qui insère un élément dans un tableau passé en paramètre, à un index précis. La fonction décale tous les éléments suivants.  La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array, element:*, index:Nombre
*/

echo "<br>";
echo "<br>";
echo "<br>";
echo "Exercice 7";
echo "<br>";

function insere($aTableau, $nElement, $nIndex)
{
	
	$nTailleTableau = count($aTableau);
	if($nIndex <= $nTailleTableau)			// on ajoute un element a l'interieur du tableau et non a l'exterieur
	{
		for($i = $nTailleTableau; $i > $nIndex ; $i--)
		{
			$aTableau[$i] = $aTableau[$i-1]; 
		}
		$aTableau[$nIndex] = $nElement;
	}
	else
	{
		$aTableau[] = $nElement;   // sinon on ajoute $nElement a la fin du tableau
	}	
	return 	$aTableau;
}

//Test
$aTableau = [1, 2, 3, 4, 5, 6, 7 ];
$nElement = 9;
$nIndex = 3;
$aTableau = insere($aTableau, $nElement, $nIndex);
//echo "<pre>"; print_r($aTableau); echo "</pre>";
var_dump($aTableau);

/*
#8 
Fonction : separe
Fonction qui retourne un tableau comprenant un tableau passé en paramètre séparé en deux. Ex : [1, 2, 3, 4, 5, 6] devient [[1,2,3],[4,5,6]]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array
*/

echo "<br>";
echo "<br>";
echo "<br>";
echo "Exercice 8";
echo "<br>";

function separe($aTableau)
{
	$nTailleTableau = count($aTableau);
	$aTableau2dimension = [[]]; //  ou $aTableau2dimension = array(array()) ; 
	if($nTailleTableau < 2)				//  pour avoir un tableau a 2 dimensions vide dans le cas ou, on a $aTableau vide ou avec un seul element
	{    
		$aTableau2dimension[0][0] = $nTailleTableau ? $aTableau[0]: "";    
		$aTableau2dimension[1][0] =  "";										
	}
	else
	{
		$nMoitie = ($nTailleTableau % 2 == 0) ? intdiv($nTailleTableau, 2) : intdiv($nTailleTableau+1, 2);  // pour faire la division entiere, si la longueur du tableau est pair on divise $nTailleTableau en 2 et si $nTailleTableau est impaire alors on ajoute 1 a $nTailleTableau soit $nTailleTableau+1, comme ca la premiere dimension sera plus grande que la deuxieme et non l'inverse.
 		for($i = 0; $i < $nMoitie; $i++)
		{
			$aTableau2dimension[0][$i] = $aTableau[$i];
		}
		for($i = $nMoitie; $i < $nTailleTableau; $i++)
		{
			$aTableau2dimension[1][$i - $nMoitie] = $aTableau[$i];
		}
	}
	
	return $aTableau2dimension;
}

//Test
$aTableau = [1,2,3,4,5,6,7];
$aTableau = separe($aTableau, $nElement, $nIndex);
//echo "<pre>"; print_r($aTableau); echo "</pre>";
var_dump($aTableau);




