<?php
date_default_timezone_set('America/Montreal');
// microtime(1987);

// Date courant
$cur_date = date('d M Y');
print("Date courant: $cur_date <br>");

// Heure courant
$cur_time = date('H:i:s A');
print("Heure courant: $cur_time <br>");

// Jour courant
// Il faut également installer la langue sur le serveur 
setlocale(LC_ALL, 'fr-CA');
$cur_day = date('d F');
print("Heure courant: $cur_day <br>");

// Combien de temps il reste jusqu'à Nouvel An
$cur_day = date('z');
$leap_year = date('L') ? 366 : 365;
$days_remaining = $leap_year - $cur_day;

print("Jusqu'à le Nouvel An il reste: $days_remaining jours <br>");


// Obtenir le timestamp actuel
$ts = time();

// Apprendre quand sera mon anniversaire
$int_end = '15 March 2019';
// strtotime() convertir une date normal en seconde
$end_ts = strtotime($int_end);

// Seconde dans un jour 86400
$secs_in_day = 86400;
$ts_diff = $end_ts - $ts;
$days_until_end = floor($ts_diff / $secs_in_day);

Print("Jusqu'à mon anniversaire il reste: $days_until_end <br>");


// Obtenir une période en heures ou/et minutes
$ts_tomorrow = strtotime('tomorrow');
$secs_to_midnight = $ts_tomorrow - $ts;

$hours = floor($secs_to_midnight / 3600);
$minutes = floor(($secs_to_midnight % 3600) / 60);

print("Jusqu'à minuit il reste: $hours heurs et $minutes minutes");


date('l') . ', le ' . date('d F Y'); // ou
date('l, \l\e d F Y');

// Définir le décalage horaire par défaut
date_default_timezone_set('America/Toronto');
// Modifier les informations de localisation
setlocale(LC_TIME, 'fr');
ucfirst(strftime('%A, le %d ')) . ucfirst(strftime('%B %Y'));


// Calculer le temps
$posted_time = strtotime('2019-06-23 13:14:43');
$cur_time = time();
$secs_in_day = 86400;
$secs_in_hour = 3600;

$ts_time = $cur_time - $posted_time;
$days = floor($ts_time / $secs_in_day);
$hours = floor($ts_time / $secs_in_hour);
$minutes = floor(($ts_time * 60) / $secs_in_hour);
$secs = floor(($ts_time * 60) / 60);