<?php
	$tonne = $_GET['tonne'];
	var_dump($tonne);
/*
	if($tonne >= 0 && $tonne <=10)
	{
		$prix = $tonne * 0.1;
	}
	else if($tonne >=10 && $tonne <= 20)
	{
		$prix = (10 * 0.1) + ($tonne-10)*0.09;
	}
	else if($tonne >=20 && $tonne <100)
	{
		$prix = (10 * 0.1) + (10*0.09) + ($tonne-20)*0.08;
	}
	else if($tonne >=100)
	{
		$prix = $tonne * 0.06;
	}
*/
	$prix = 0;
	if($tonne >= 100){
		$prix = $tonne *0.06;
	}
	else
	{
		if($tonne >20)
		{
			$tonneASixSous = $tonne - 20;
			$prix = $prix + $tonneASixSous * 0.08;
			$tonne = $tonne - $tonneASixSous;
		}
		if($tonne > 10){
			$tonneAneufSous = $tonne-10;
			$prix = $prix + $tonneAneufSous * 0.09;
			$tonne = $tonne - $tonneAneufSous;
		}

		if($tonne > 0){
			$tonneADixSous = $tonne;
			$prix = $prix + $tonneADixSous * 0.10;
			
		}

	}


	echo "Le prix est : " . $prix;


?>