<?php
include "function.php"; // c'est la meme choise: include ("function.php");

$sChaine = $_GET['chaine'];
$sFunction = $_GET['fonction'];

$nCompteMot = compte_mot($sChaine);
var_dump($nCompteMot);

switch ($sFunction) {
	case 'compteNom':
		$nCompteMot = compte_mot($sChaine);
		echo "Il y a $nCompteMot";
		break;
	
	default:
		# code...
		break;
}
$a = str_replace('  ', ' ', $sChaine);
var_dump($a);
?>


