<?php
    /*
    *
        index.php est le CONTRÔLEUR de notre application "MVC-lite". TOUTES les
        requêtes vers notre application vont passer par ici. Le coeur du contrôleur est sa structure décisionnelle qui traite un paramètre que l'on nommera ACTION. C'est la valeur de ce paramètre qui déterminera les actions que posera le contrôleur.
    
    */
    //initialiser la session
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
            require_once("vues/Login.php");
            break;
        case "Verifier":
            //vérifier la combinaison username/password
            if(isset($_POST["username"]) && isset($_POST["password"]))
            {
                $resultat = Authentification($_POST["username"], $_POST["password"]);
                
                if($resultat)
                {
                    $_SESSION["usager"] = $_POST["username"];
                    header("Location: index.php?action=PageProtegee");
                }
                else
                {
                    $erreurs = "Combinaison username/password invalide.";
                    require_once("vues/Login.php");
                }
            }
            else
            {
                header("Location: index.php");
            }
            break;
        case "PageProtegee":
            if(isset($_SESSION["usager"]))
            {
                //obtenir la bio de l'usager authentifié
                $bio = GetBioParUsager($_SESSION["usager"]);
                require_once("vues/PageProtegee.php");
            }
            else
                header("Location: index.php");
            break;
        case "SauvegardeBio":
            if(isset($_POST["bio"]) && isset($_SESSION["usager"]))
            {
                UpdateBioParUsager($_SESSION["usager"], $_POST["bio"]);
                header("Location: index.php?action=PageProtegee");
            }
            else
            {
                header("Location: index.php");
            }
            break;
        case "Logout":
            //vider le tableau $_SESSION
            $_SESSION = array();
            
            //supprimer le cookie de session
            if(isset($_COOKIE[session_name()]))
            {
                setcookie(session_name(), '', time() - 3600);
            }
            
            //détruire la session complètement
            session_destroy();
            header("Location: index.php");
            break;
    }

   
?>