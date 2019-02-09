<?php
// Sauvgarder les valeurs dans les champs déjà saisi 
$login = $_POST['login'] ?? '';
$email = $_POST['email'] ?? '';
?>
<form action="" method="post">
  <input type="text" name="login" value="<?=$login?>">
  <input type="email" name="email" value="<?=$email?>">
</form>

<?php
// Validation de form
$required_fields = ['email', 'password', 'login'];
$errors = [];

foreach ($required_fields as $field) {
  if (empty($_POST[$field])) {
    $errors[$field] = 'Le champs est vide';
  }
}

if (count($errors)) {
  // Visualisé les erreurs de la validation
}
?>