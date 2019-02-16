<?php
// Redirection d'URL
header('Location: http://google.com/');

// Interdiction de mettre en cache
header('Cache-Control: no-cache, max-age=0');

// Vérifier si dans le tableau $_GET sont attribuées des données
if (isset($_GET['tab'])) {
  $tab = $_GET['tab'];
} else {
  $tab = 'popular';
}

// La forme courte de code ci-dessus depuis PHP 7
$tab = $_GET['tab'] ?? 'popular';

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