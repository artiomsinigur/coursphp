<?php
// Cookie ================//
// Type des données:    Chaîne de caractères | string
// Taille maximale:     ~4Kb
// Place de souvgarde:  Navigateur
// La durée de vie:     Jusqu'à 20 ans
// Accès du client:     Possible
  # NAME=VALUE; expires=DATE; path=PATH; domain=DOMAIN_NAME;
  # NAME=VALUE; ex. $name_array=12,53,42
  # expire=DATE; ex. expire=Mon, 25-Jan-2021 10:00:00 GMT
  # path=PATH; ex. / ou /news/

// Travailler avec cookie
strtotime();
setcookie($name, $value, $expire, $path); 
$name = 'visit_count'; // Nom de cookie
$value = 1;
$expire = 'Mon, 25-Jan-2021 10:00:00 GMT';
$path = '/';

if (isset($_COOKIE['visit_count'])) {
  print($_COOKIE['visit_count']);
}

// Effacer le cookie
if (isset($_COOKIE['visit_count'])) {
  unset($_COOKIE['visit_count']);

  setcookie('key', '', time() - 3600, '/');
}

// Accroître la sécurité de cookie
  # Pour plus de détails, voir setcookie en http://php.net/manual/fr/function.setcookie.php
  # $secure = true - Transmission seulement via une connexion HTTPS
  # $httponly = false - Interdiction d'utiliser via JS(XSS)


// Session ====================//
// Type des données:    Chaîne de caractères, tableaux, numéros, objets
// Taille maximale:     Illimité
// Place de souvgarde:  Serveur
// La durée de vie:     Jusqu'à la fin de session
// Accès du client:     Impossible
// Elle est crée de coté de serveur en créant des IDs pour chanque utilisateur 
// La durée de vie de session
  # Par default: 24 minutes
  # Elle se détruit quand on ferme le navigateur

// Prolonger la durée de vie de la session
init_set('session.cookie_lifetime', 86400);
init_set('session.gc_maxlifetime', 86400);

// Obligatoire quand on utilise la session
session_start();

if (isset($_SESSION['username'])) {
  print($_SESSION['username']);
}

// Écriture d'une valeur dans la session
$_SESSION['username'] = 'Nom';

// Effacer la session
$_SESSION = [];