<?php
// Sauvgarder les valeurs dans les champs déjà saisi =================//
$login = $_POST['login'] ?? '';
$email = $_POST['email'] ?? '';
?>
<form action="" method="post">
  <input type="text" name="login" value="<?=$login?>">
  <input type="email" name="email" value="<?=$email?>">
</form>

<?php
// Pour la balise option
$selected = ($row["id"] == $_POST["value"]) ? "selected" : "";
$anOption = "<option value='" . $row["id"] . "' $selected>" . $text . "</option>";
?>

<!-- Ou -->
<?php if (isset($_POST['category'])): ?>
  <?php echo ($key == $_POST['category'] ? 'selected' : '')?>
<?php endif;?>>


<?php
// Apliquer un class d\'erreur ===================//
$error_class = isset($errors['Login']) ? 'form-input-error' : '';
?>
<input class="<?=$error_class?>" type="text" name="login">


<?php
// Validation de form ================//
$required_fields = ['email', 'password', 'login'];
$errors = [];

foreach ($required_fields as $field) {
  if (empty($_POST[$field])) {
    $errors[$field] = 'Le champ est vide';
  }
}

if (count($errors)) {
  // Visualisé les erreurs de la validation
}


// Validation des champs au format requis ==================//
$errors = [];

foreach ($_POST as $key => $value) {
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


// Validation de format du fichier ===================//
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


// Assembler le tout ensemble ==================//
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $gif = $_POST;

  // Les champs exigés
  $required = ['title', 'description'];
  // Ce tableau sera utiliser pour nommer les clés dans le tableau $errors et lorsque on affchera les erreurs
  $desc = ['title' => 'Titre', 'description' => 'Description'];
  $errors = []; 
  foreach ($gif as $key => $value) {
    if (in_array($key, $required)) {
      if (!$value) {
        $errors[$desc[$key]] = 'Ce champ doit être rempli';
      }
    }
  }

  // Vérifier si le fichier à été téléversé 
  if (isset($_FILES['userfile']['name'])) {
    // Le nom temporaire du fichier qui sera chargé sur la machine serveur.
    $tmp_name = $_FILES['userfile']['tmp_name'];
    // Le nom original du fichier, tel que sur la machine du client web.
    $path = $_FILES['userfile']['name'];
   
    // Retourne le type de mime-type de fichier
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    // Récupère le type mime-type de fichier
    $finfo_type = finfo_file($finfo, $tmp_name);
    if ($file_type !== 'image/gif') {
      $errors[] = 'Téléversez une image avec en bonne formate GIF';
    } else {
        move_uploaded_file($tmp_name, 'uploads/'. $path);
        $gif['path'] = $path;
    }
  } else {
    $errors['Fichier'] = 'Le fichier n\'ai pas téléversé';
  }

  // Si la validation a passé avec succès, on affiche la page en cas contraire on affiche les erreurs
  if (count($errors)) {
    $page_content = include_template('add.php', ['gif' => $gif, 'errors' => $errors]);
  } else {
    $page_content = include_template('view.php', []);
  }
} else {
  // Si la forme n\'a pas été envoyer, on l'affchie de nouveau
  $page_content = include_template('add.php', []);
}

$layout_content = include_template('layout.php', [
  'content' => $page_content,
  'categories' => [],
  'title' => 'Ajout de l\'image GIF'
]);
print($layout_content);

?>