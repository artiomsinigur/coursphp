<?php
// Redirection d'URL
header('Location: http://google.com/');

// Interdiction de mettre en cache
header('Cache-Control: no-cache, max-age=0');

// Vérifier si dans le tableau $_GET sont attribuées des données
if (isset($_GET['username'])) {
  $username = $_GET['username'];
} else {
  $username = 'nobody';
}

// La forme courte de code ci-dessus depuis PHP 7
  // Null coalescing operator
  // Utiliser une troisième conjonction avec la fonction isset()
$username = $_GET['user'] ?? 'nobody';
// This is equivalent to:
  // Ternary Operator
  // Syntax (condition) ? (true return value) : (false return value)
$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';

// Somme exemple:
  // Basic True / False Declaration
$is_admin = ($user['permissions'] == 'admin') ? true : false;
  // Conditional Welcome Message
echo 'Welcome '.($user['is_logged_in'] ? $user['first_name'] : 'Guest').'!';
  // Conditional PHP Redirect
header('Location: '.($valid_login ? '/members/index.php' : 'login.php?errors=1')); exit();

// Afficher les éléments d'un tableau avec while
$count_items = count($categories)-1;
$cur_item = 1;
?>
<ul class="nav__list container">
<?php while ($count_items >= $cur_item): ?>
    <li class="nav__item">
        <a href="all-lots.html"><?=$categories[$cur_item]?></a>
    </li>
<?php $cur_item++?>
<?php endwhile;?>