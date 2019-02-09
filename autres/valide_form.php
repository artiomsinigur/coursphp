<?php
// Sauvgarder les valeurs dans les champs déjà saisi 
$login = $_POST['login'] ?? '';
$email = $_POST['email'] ?? '';
?>
<form action="" method="post">
  <input type="text" name="login" value="<?=$login?>">
  <input type="email" name="email" value="<?=$email?>">
</form>