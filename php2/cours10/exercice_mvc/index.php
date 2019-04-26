<?php
    // Obtenir la paramètre action 
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "accueil";
    }

    // inclure le modèle
    require_once("functions_db.php");

    // La structure décisionnelle
    switch($action) {
        case "accueil":
            require_once("vues/accueil.html");
            break;
        case "listeEquipes":
            // Chercher la liste des équipes dans le modéle
            getAllEquipes();
            // Inclure la page vue de la liste des équipes
            require_once("vues/listeEquipes.php");
            break;
    }
?>