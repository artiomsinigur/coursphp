<?php
    // Controler
    session_start();

    if (isset($_REQUEST['action'])) {
        $action = $_REQUEST['action'];
    } else {
        $action = 'index';
    }

    require_once('functionsDB.php');
    
    switch($action) {
        case "index":
            require_once('vues/login.php');
            break;
        case "authentication":
            $required_fields = ['username', 'password'];
            $errors = [];

            // $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Eviter l'erreur "undefined" en cas si on appelle la page 
            // directement dans url index.php?action=authentication
            if (isset($_POST['username']) && isset($_POST['password'])) {
                // 1 Validation des des champs
                foreach ($required_fields as $field) {
                    if (empty(trim($_POST[$field]))) {
                        $errors = 'Veuillez remplir les champs correctement';
                        require_once('vues/login.php');
                    }
                }
    
                // 2 Si les champs sont remplis
                if (empty($errors)) {
                    // 3 Verifier si l'usager et mot de pass existe dans la BD
                    $data = authentication($_POST['username'], $_POST['password']);
                    // 4 Si la raquête authentication retourn true
                    if ($data) {
                        $_SESSION['user'] = $_POST['username'];
                        // 5 Aller dans le case zoneUser 
                        header('Location: index.php?action=zoneUser');
                    } else {
                        $errors = 'Login ou mot de pass invalide';
                        require_once('vues/login.php');
                    }
                }
            }
            break;
        case "zoneUser":
            // 1 Autoriser l'accès sur la page si authentifier
            if (isset($_SESSION['user'])) {
                require_once('vues/zoneUser.php');
            } else {
                // 2 Si non, interdire l'accès sur la page
                header('Location: index.php');
            }
            break;
        case "logout":
            //vider le tableau $_SESSION
            $_SESSION = array();

            //supprimer le cookie de session
            if(isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600);
            } 
            
            //détruire la session complètement
            session_destroy();
            header('Location: index.php');
            break;
    }
    // unset($_SESSION['user']);
    var_dump($_REQUEST, $_SESSION);
?>