<?php

//Exercices sur les fonctions (2 %)

//1. Avec switch, écrire une fonction qui retourne le nom du mois selon la valeur du paramètre passé (1 à 12)
function mois($nMois)
{
	$sMois = "";
	switch ($nMois) {
		case 1:
			$sMois = 'Janvier';
			break;
		case 2:
			$sMois = 'Février';
			break;
		/* ici les autres mois*/
		case 12:
			$sMois = 'Décembre';
			break;
	}
	//echo $sMois;
	return $sMois;
}

$nMois = 1;
$sMois = mois($nMois);
var_dump($sMois);

//2. Écrire une fonction qui vérifie si un nombre passé en paramètre est divisible par 2 et qui retourne une valeur booléenne.
function pair1($nValeur)
{

	if($nValeur % 2 == 1)
	{
		$bPaire = false;
	}
	else
	{
		$bPaire = true;
	}

	return $bPaire;
}
$bRes = pair1(13);
var_dump($bRes);
$bRes = pair1(12);
var_dump($bRes);

function pair2($nValeur)
{
	return ($nValeur % 2 == 0);
}
$bRes = pair2(13);
var_dump($bRes);
$bRes = pair2(12);
var_dump($bRes);


//3. Écrire une fonction qui vérifie si un nombre est divisible par x et qui retourne une valeur booléenne. Les deux nombres sont passés par paramètre.
function divisible($nValeur, $nDiviseur)
{
	$bDivisible = false;
	if($nValeur % $nDiviseur == 0 )
	{
		$bDivisible = true;
	}

	return $bDivisible;
}

//4. Écrire une fonction qui retourne une valeur de la suite de Fibonacci selon sa position. L'index doit être passé en paramètre à la fonction. 2 étant la 3e valeur de la suite.
function fibo($nIndex)
{
	$nPrec = 1;
	$nActuel = 1;
	$nSuivant = 1;
	for($i=2; $i<$nIndex; $i++){
		$nSuivant = $nPrec + $nActuel;
		$nPrec = $nActuel;
		$nActuel= $nSuivant;	
	}
	
	return $nSuivant;

}

$nRes = fibo(5);
var_dump($nRes);










?>