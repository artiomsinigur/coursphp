<?php
// Réinitialiser le mot de passe ===============//
  # Dans le fichier index.php
session_start();
$success_send = false;

if ($_SERVER['REQUIRED_METHOD'] == 'POST') {
  $email = $_POST['email'];

  if (searchUserByEmail($email, $users)) {
    $code = uniqid();
    $url = "http://" . $_SERVER['HTTP_HOST'] . "/forgot.php?code=" . $code;
    $message = "Le lien pour la réinitialisation de mot de pass: " . $url;

    $_SESSION['password'] = [$email, $code];
    mail($email, "Réinitialisation de mot de pass", $url);

    $success_send = true;
  }
}
?>


<?php
  # Dans le fichier forgot.php
session_start();

// Code est un attribut suplimetaire à ajouter dans le tableau user
// c'est grace à cet attribut qu'on pourra réinitialiser le mot de pass
if (isset($_GET['code'])) {
  $code = $_GET['code'];

  if (isset($_SESSION['password'])) {
    $password_code = $_SESSION['password'];

    if ($code == $password_code) {
      // Générer une id unique
      $new_password = substr(uniqid(), 0, 6);
      $hash = password_hash($new_password, PASSWORD_DEFAULT);
      $message = "Votre nouveau mot de pass: " . $new_password;
      mail($password_code[0], "Le nouveau mot de pass", $message);
      // Ici il faudra souvgarder le nouveau mos de pass d'utilisateur

      print("Le nouveau mot de pass a été envoyé sur votre email");
    } else {
      print("Le code de réinitialisation ne pas identique");
    }
  }
}



?>

<?php
function searchUserByEmail($email, $users) {
  $result = null;
  foreach ($users as $user) {
    if ($user['email'] == $email) {
      $result = $user;
      break;
    }
  }
  return $result;
}