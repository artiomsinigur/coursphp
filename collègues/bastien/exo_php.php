<?php

// #1 function retireEspaces($sChaine)

{
  $sChaine = " salut les zouzous  hh h";
  $sRes = str_replace(' ', '', $sChaine);
echo $sRes;
}

// #2 function compteMots($sChaine)
{
  $sChaine = " un deux trois qutre cinq six sept huit neuf dix" ;
  $nMots = str_word_count($sChaine);
  echo $nMots;
}



// #3 function inverseMots($sChaine)
{
	$sChaine  = "piece1 piece2 piece3 piece4 piece5 piece6";
	$pieces = explode(" ", $sChaine);
	$reversed = array_reverse($pieces);
	//echo $pieces[0]; // piece1
	//echo $pieces[1]; // piece2
	echo $reversed[0];
}


// #4 function inverseLettres($sChaine)
{
	$sChaine = "hello world !";
	$inverse = strrev($sChaine);

	echo $inverse;





// #5 function inversePaire($aTableau)



{
	$aTableau = array("a1, a2, b1, b2, c1, c2");
	$string = implode($aTableau);
	if(strpos($string, "a") !== false)
	{
		$tabA = explode(",", $string);
		$reversedA = array_reverse($tabA);
		echo $reversedA;
	}

	if(strpos($string, "b") !== false)
	{
		$tabB = explode(",", $string);
		$reversedB = array_reverse($tabB);
		echo $reversedB;
	}

	if(strpos($string, "c") !== false)
	{
		$tabC = explode(",", $string);
		$reversedC = array_reverse($tabC);
		echo $reversedC;
	}

	else {
		echo "cet element n'a pas de pair dans le tableau";
	}
	}




}

// #6 Fonction : tourne
{
  $tab = array(1, 2, 3, 4);
  $aTableau = array(1, 2, 3, 4);
  $nFois = 1;
  for ($i=0; $i < sizeof($aTableau) ; $i++)
  {
    $tab[$i] = $aTableau[$i + $nFois];
  }
  echo $tab[1];
}

//#8 Fonction : separe
{
	$aTableau = array("1","salut","3","quatre");
	$tab = array();
	$mod = count($aTableau);
	echo $mod;
		if ($mod % 2 == 0)
		{
			$tab = array_chunk($aTableau, 2);
		}
		else
		{
			echo "Les elements rentres dans le tableau ne sont pas pairs";
		}

	echo $tab;
}





?>
