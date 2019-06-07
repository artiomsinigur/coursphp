<?php
    session_start();

    $username = $_GET['username'] ?? '';
    $password = $_GET['password'] ?? '';
    $errors = [];
    
    // Hacher le mot de pass lors de l'inscription
    // $password_hash = password_hash($_GET['password'], PASSWORD_DEFAULT);
    $passUser = '$2y$10$5mmDkf1gqarUidqaa4lsDOaNR0YsbE.JjzJoKJUfN1zyrXMk0oB2a';

    if ($username && $password) {
        // Verifier le login
        if (($username == 'user')) {
            // Verifier le mot de pass 
            if (password_verify($_GET['password'], $passUser)) {
                $_SESSION['authentification'] = 'userAccepted';
                header("Location: pageUser.php");
            } else {
                $errors = 'Login ou mot de pass invalide';
            }
        } else {
            $errors = 'Login ou mot de pass invalide';
        }
    }

    // unset($_SESSION['authentification']);
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="" method="GET">
        <div>
            Nom d'usager: <input type="text" name="username">
        </div>
        <div>
            Mot de pass: <input type="password" name="password">
        </div>
        <button type="submit" value="login">Se connecter</button>
        <p><?= ($errors) ? $errors : ""?></p>
    </form>
</body>
</html>