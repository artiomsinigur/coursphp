<?php
// Autorisations d'accès / Identification ===================//
// Hachage d'un mot de pass et la verification de celui-ci

// Crée une clé de hachage pour un mot de passe
$password_hash = password_hash('secret-password', PASSWORD_DEFAULT);

if (password_verify('bad-password', $password_hash)) {
  // Mot de pass correct
} else {
  // Mot de pass incorrect
}

// Interdire l'accès sur une page ================//
if (!isset($_SESSION['user'])) {
  header("Location: /");
  exit();
}
?>

<!-- // Afficher ou cacher une section sur une page =================// -->
<?php if (!isset($_SESSION['user'])): ?>
  <nav>
    <a href="/signup">S'inscrire</a>
    <a href="/signin">Se connecter</a>
  </nav>
<?php else: ?>
  <nav>
    <a href="<?=stript_tags($_SESSION['user']['name']);?>"></a>
    <a href="/favorits">Favorits</a>
    <a href="/logout">Déconnexion</a>
  </nav>
<?php endif;?>

<?php
// Déconnecter l'utilisateur ====================//
unset($_SESSION['user']);
header('Location: /index.php');