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

// Validation des champs au format requis
$errors = [];

foreach ($$_POST as $key => $value) {
  if ($key == 'email') {
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      $errors[$key] = 'Entrez un email valdie';
    }
  } elseif ($key == 'ip') {
    if (!filter_var($value, FILTER_VALIDATE_IP)) {
      $errors[$key] = 'Entrez un IP valide';
    }
  }
}

if (count($errors)) {
  // Visualisé les erreurs de la validation
}

// Validation de format du fichier
if (isset($_FILES['avatar'])) {
  $finfo = finfo_open(FILEINFO_MIME_TYPE);

  $file_name = $_FILES['avatar']['tmp_name'];
  $file_size = $_FILES['avatar']['size'];

  $file_type = finfo_file($finfo, $file_name);

  if ($file_type !== 'image/gif') {
    print('Téléverser l\'image en format gif');
  }

  if ($file_size > 200000) {
    print('La taille maximale du fichier est de 200kb');
  }
}

?>