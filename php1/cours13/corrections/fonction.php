<?php
// http://php.net/manual/fr/ref.strings.php
// http://php.net/manual/fr/ref.array.php

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

function compte_mot($sChaine)
{
	//$sChaine = trim($sChaine);	
	$nLongueur = strlen($sChaine);
	//$nbEspace = 0;
	//$nbMot = 0;

	if($nLongueur > 0 )
	{
		/*do
		{
			$nLongueur = strlen($sChaine);
			$sChaine = str_replace('  ', ' ', $sChaine);
			$nNouvelleLongueur = strlen($sChaine);
		}
		while($nLongueur != $nNouvelleLongueur );
		*/

		/*while(strpos($sChaine, "  ") !== false){
			$sChaine = str_replace('  ', ' ', $sChaine);
		}
 		$nLongueur = strlen($sChaine);	
		*/
/*

		for($i = 0; $i < $nLongueur; $i++)
		{
			if($sChaine[$i] == ' ')
			{
				$nbEspace++;
			}
		}
		$nbMot = $nbEspace+1;

		*/

		$aChaine = explode(' ', $sChaine);
		//var_dump($aChaine);
		$nbMot=0;
		$sNouvChaine = "";
		for($i=0; $i< count($aChaine); $i++)
		{
			if($aChaine[$i] != "")
			{
				$nbMot++;
				$sNouvChaine = $sNouvChaine . $aChaine[$i] . ' ';
			}
		}
		//var_dump(trim($sNouvChaine));


	}
	return $nbMot;
}

function compte_lettre($sChaine)
{
	$nbLettre = 0;
	
	for($i = 0; $i<strlen($sChaine); $i++)
	{
		if($sChaine[$i] != ' ')
		{
			$nbLettre++;
		}
	}

	
	// $aChaine = explode(" ", $sChaine);
	// $sChaine = implode($aChaine);
	// $nbLettre = strlen($sChaine);

	// $nbLettre = strlen(implode(explode(" ", $sChaine)));
	return $nbLettre;
}

function inverse_chaine($sChaine)
{
	// $sNouvChaine = '';
	// for($i = 0; $i<strlen($sChaine); $i++)
	// {
	// 	$sNouvChaine = $sChaine[$i].$sNouvChaine;
	// }

	$sNouvChaine = strrev($sChaine);
	return $sNouvChaine;
}

?>





