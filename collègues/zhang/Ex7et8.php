/*
#7
Fonction : insere
Écrire une fonction qui insère un élément dans un tableau passé en paramètre, à un index précis. La fonction décale tous les éléments suivants.  La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array, element:*, index:Nombre
*/
echo "<hr/>Ex7";
echo " <br>";
function insere($aTableau,$sChaine7,$nN7)
{
    array_unshift($aTableau, $sChaine7);//input the new element at first of array
    $nLongeur=count($aTableau);
    $temp=$aTableau[0];
    for ($i=0; $i <$nN7 ; $i++) { 
        $aTableau[$i]=$aTableau[$i+1];
    }
    $aTableau[$nN7]=$temp;
    return($aTableau);
}

$aTableau7 = array("1","2","3","4","5","6","7");
$aTab7 = insere($aTableau7,"a",3);
var_dump($aTab7);
echo "<br>";
echo " <br>";
/*
#8 
Fonction : separe
Fonction qui retourne un tableau comprenant un tableau passé en paramètre séparé en deux. Ex : [1, 2, 3, 4, 5, 6] devient [[1,2,3],[4,5,6]]. La fonction retourne un nouveau tableau.
Paramètre : aTableau:Array
*/
echo "<hr/>Ex8";
echo " <br>";
function separe($aTableau)
{
    $nNumberElement=(count($aTableau)/2)+1;
    $aTableau=array_chunk($aTableau, $nNumberElement);//Chunks an array into arrays with size elements
    return($aTableau);
}
$aTableau8 = array("1","2","3","4","5","6","7");
$aTab8 = separe($aTableau8);
var_dump($aTab8);

?>