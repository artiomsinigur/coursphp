<?php
$aTauxFumeurSex = [
  'homme' => [
    1999 => 27,
    2000 => 26,
    2001 => 24,
    2002 => 23,
    2003 => 23,
    2004 => 22,
    2005 => 22,
    2006 => 20,
    2007 => 20,
    2008 => 20,
    2009 => 19,
    2010 => 20
  ],
  'femme' => [
    1999 => 23,
    2000 => 23,
    2001 => 20,
    2002 => 20,
    2003 => 18,
    2004 => 17,
    2005 => 16,
    2006 => 17,
    2007 => 18,
    2008 => 16,
    2009 => 16,
    2010 => 14
  ]
];

$aTableau = $aTauxFumeurSex;
function tauxFumeurSex($aTableau, $sex, $an) {
  foreach ($aTableau as $keySex => $value) {
    if ($keySex == $sex) {
      foreach ($aTableau[$keySex] as $keyAn => $valueTaux) {
        if ($keyAn == $an) {
          echo $valueTaux . '%' . '<br>';
        }
      }
    }
  }
  return $valueTaux;
}

tauxFumeurSex($aTableau, 'homme', 2003);

// var_dump($tauxFumeurSex[$femme][2003]);

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Taux fumer au Canada</title>
</head>
<body>
  <form action="index.php" method="POST">
    <select name="sex" id="tauxFumeurSex">
      <option value="1999">1999</option>
      <option value="2000">2000</option>
      <option value="2001">2001</option>
    </select>
    <input type="radio" name="genre" value="h">Homme
    <input type="radio" name="genre" value="f">Femme
  </form>
</body>
</html>