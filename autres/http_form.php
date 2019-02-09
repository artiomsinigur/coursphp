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