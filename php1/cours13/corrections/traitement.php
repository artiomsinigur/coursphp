<?php
include "fonction.php";


$sChaine = $_GET['chaine'];
$sFonction = $_GET['fonction'];

switch ($sFonction) {
	case 'compte_mot':
		$nCompteMot =  compte_mot($sChaine);
		echo "Il y a ". $nCompteMot ." mot(s) dans la chaine : '". $sChaine. "'";
		break;
	case 'compte_lettre':
		$nLettre =  compte_lettre($sChaine);
		echo "Il y a ". $nLettre ." lettre(s) dans la chaine : '". $sChaine. "'";
		break;
	case 'inverse_chaine':
		$sChaine =  inverse_chaine($sChaine);
		echo "La chaine inverse est  : '". $sChaine. "'";
		break;
	default:
		# code...
		break;
}






?>









