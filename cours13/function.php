<?php
function compte_mot($sChaine) {
	$nLongueur = strlen($sChaine);
	$nbEspace = 0;
    $nbMot = 0;
	
	if($nLongueur > 0 )
	{
		$nDebut = premierCaractere($sChaine);
		$nFin = dernierCaractere($sChaine);
		
		if($nDebut >= 0)
		{
			for($i = $nDebut; $i < $nFin; $i++) 
			{
				if($sChaine[$i] == ' ')
				{
					$nbEspace++;
				}
			}
			$nbMot = $nbEspace+1;
		}
	}
    return $nbMot;
    /*
    {
		$nDebut = premierCaractere($sChaine);
		$nFin = dernierCaractere($sChaine);
		
		if($nDebut >= 0)
		{
			for($i = $nDebut; $i < $nFin; $i++) 
			{
				if($sChaine[$i] == ' ')
				{
					$nbEspace++;
				}
			}
			$nbMot = $nbEspace+1;
		}
    }
    */
}

/*
function compte_lettre($sChaine) {
	$nLongueur = strlen($sChaine);
	$nLettre = 0;

	if ($nLongueur >= 0) {
		while (strpos($sChaine, " ") !== false) {
				$sChaine = str_replace(" ", "", $sChaine);
		}
		$nLongueur = strlen($sChaine);
		$nLettre = $nLongueur;

		for($i = 0; $i < $nLongueur; $i++) {
				$nLettre++;
		}
	}
	return $nLettre;
}
$nComptLettre = compte_lettre($sChaine);
var_dump($nComptLettre);
*/













// Déclaration d'une fonction avec 1 paramètre
function premierCaractere($sMaChaine)
{
	$i = 0;
	$nPosition = -1;
	$nLongueur = strlen($sMaChaine);
	do
	{
		if($sMaChaine[$i] != ' ')
		{
			$nPosition = $i;
		}
	}
	while($sMaChaine[$i++] == ' ' && $i<$nLongueur);
	return $nPosition;
}


function dernierCaractere($sMaChaine)
{
	$i = strlen($sMaChaine)-1;	// Dernier caractère de la chaine
	$nFin = -1;
	do
	{
		if($sMaChaine[$i] != ' ')
		{
			$nFin = $i;
		}
	}
	while($sMaChaine[$i--] == ' ' && $i>=0);
	return $nFin;
}

?>