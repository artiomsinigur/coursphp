<?php
    session_start();

    $errors = '';
    if(isset($_GET['username']) && isset($_GET['password'])) {
        if ($_GET['username'] == 'user' && $_GET['password'] == '1111') {
            $_SESSION['authentification'] = "oui";
            header('Location: pageProtegee.php');
        } else {
            $errors = "Le login ou mot de pass est invalide";
        }
    }

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