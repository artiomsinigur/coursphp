<h1>Démo cours 10</h1>

<?php

// Ceci est un commentaire sur une ligne

/* Ceci est un commentaire
de type 
Multiligne */

// Ceci est un commentaire
// sur plusieurs
// lignes 

$test;	// Variable test non défini
//echo $test;
//var_dump($test);

$test = 0.1;

echo $test;

var_dump($test);	// Deboggage

$test = 'Allo   le   monde';
echo $test;
var_dump($test);
$test = "Allo le monde";
$test = 'J\'aime les oiseaux';

echo "<br>";
$res = 1 < 5;	// Plus petit 
$res = 1 > 5;	// Plus grand
$res = 1 >= 1;	// Plus grand ou égale
$res = 1 <= 1;	// Plus petit ou égale

$res = 1 == 1;	// Égalité


var_dump($res);

// Structure logique

// Syntaxe du if
//if(condition)
//{
	// instruction
//}

$cond = false;

if($cond == true)
{
	echo "ceci est vrai";
}

if("1" === 1)
{
	echo "ceci est vrai";
}
else
{
	echo "Je suis dans le else";
}

if("1" === 1)
{
	echo "ceci est vrai";
}
else if($cond)
{
	echo "Je suis dans le second if";
}
else
{
	echo "dans le else";
}


?>

















