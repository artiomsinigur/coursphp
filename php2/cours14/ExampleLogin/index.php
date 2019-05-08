<?php
    session_start();

    //1. Recevoir le paramètre action
    if(isset($_REQUEST["action"]))
    {
        $action = $_REQUEST["action"];
    }
    else
    {
        //action par défaut
        $action = "Login";
    }

    //inclure le modèle
    require_once("fonctionsDB.php");
    //structure décisionnelle
    switch($action)
    {
        case "Login":
            require_once("vues/login.php");
            break;
        case "Verifier":
            if(isset($_POST['username']) && isset($_POST['password'])) {
                
            }
            break;
        case "PageProtegee":
            break;
    }
?>